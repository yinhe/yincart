<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContractController
 *
 * @author Jiulong Zhang <kowloon29320@163.com>
 */
class ContractController extends LonxomController{
    
//    public function actions() {
//        return array(
//              'upload'=>array(
//                  'class'=>'comext.xupload.actions.XUploadAction',
//                  'path' =>Yii::app() -> getBasePath() . "/../upload/groupon/attach",
//                  'publicPath' =>  "http://img.yincart.com/upload/groupon/attach",
//                  'subfolderVar' => "parent_id",
//              ),
//          );
//    }
    
    public function actionUpload() {
	Yii::import("xupload.models.XUploadForm");
//Here we define the paths where the files will be stored temporarily
        $path = Yii::app() -> getBasePath() . "/../";
        $publicPath = 'http://img.yincart.com';
//
//	if (!file_exists($path)) {
//	    mkdir($path, 0777, true);
//	}
//	$ymd = date("Ymd");
//	$path .= $ymd . '/';
//	if (!file_exists($path)) {
//	    mkdir($path, 0777, true);
//	}


//This is for IE which doens't handle 'Content-type: application/json' correctly
	header('Vary: Accept');
	if (isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
	    header('Content-type: application/json');
	} else {
	    header('Content-type: text/plain');
	}

//Here we check if we are deleting and uploaded file
	if (isset($_GET["_method"])) {
	    if ($_GET["_method"] == "delete") {
		if ($_GET["file"][0] !== '.') {
		    $file = $path . $_GET["file"];
		    if (is_file($file)) {
			unlink($file);
		    }
		}
		echo json_encode(true);
	    }
	} else {
	    $model = new XUploadForm;
            $upload = new FileUpload(array($model,'file'), 'upload/groupon');
            if(!$upload->isNull()){
                $model->mime_type = $upload->instance->getType();
		$model->size = $upload->instance->getSize();
		$model->name = $upload->instance->getName();
                if($model->validate()){
                    $filename = $upload->save();
//                }
//            }
//	    $model->file = CUploadedFile::getInstance($model, 'file');
//We check that the file was successfully uploaded
//	    if ($model->file !== null) {
//Grab some data
//		$model->mime_type = $model->file->getType();
//		$model->size = $model->file->getSize();
//		$model->name = $model->file->getName();
//(optional) Generate a random name for our file


//		$filename = date("YmdHis") . '_' . rand(10000, 99999);
//		$filename .= "." . $model->file->getExtensionName();
//		$filename =  $ymd . '/' . $filename;

//		if ($model->validate()) {
//Move our file to our temporary dir
//		    $model->file->saveAs($path . $filename);
//		    chmod($path . $filename, 0777);
//here you can also generate the image versions you need 
//using something like PHPThumb
//Now we need to save this path to the user's session
		    if (Yii::app()->user->hasState('images')) {
			$userImages = Yii::app()->user->getState('images');
		    } else {
			$userImages = array();
		    }
		    $userImages[] = array(
			"path" => $path . $filename,
			//the same file or a thumb version that you generated
			"thumb" => $path . $filename,
			"filename" => $filename,
			"url" =>  $publicPath.'/'.$filename,
			'size' => $model->size,
			'mime' => $model->mime_type,
			'name' => $model->name,
		    );
		    Yii::app()->user->setState('images', $userImages);

//Now we need to tell our widget that the upload was succesfull
//We do so, using the json structure defined in
// https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
		    echo json_encode(array(array(
			    "name" => $model->name,
			    "type" => $model->mime_type,
			    "size" => $model->size,
			    "url" => $publicPath .  '/' . $filename,
			    "thumbnail_url" => $publicPath . '/' . "$filename",
			    "delete_url" => $this->createUrl("upload", array(
				"_method" => "delete",
				"file" => $filename
			    )),
			    "delete_type" => "POST"
		    )));
		} else {
//If the upload failed for some reason we log some data and let the widget know
		    echo json_encode(array(
			array("error" => $model->getErrors('file'),
		    )));
		    Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
		    );
		}
	    } else {
		throw new CHttpException(500, "Could not upload file");
	    }
	}
    }
    
    public function actionCreate(){
        Yii::import("xupload.models.XUploadForm");
        $biz_id = Yii::app()->request->getParam('biz_id');
        if(empty($biz_id)){
            $this->go('请选择具体的商家', Yii::app()->request->urlReferrer);
        }
        $biz = ARBiz::model()->findByPk($biz_id);
        if($biz == null){
            $this->go('该商家不存在', Yii::app()->request->urlReferrer);
        }
        $model = new ARContract('sell');
//        $attach = new ARGrouponAttach();
        $upload = new XUploadForm();
        $model->biz_id = $biz->id;
//        $this->performAjaxValidation($model);
        if(Yii::app()->request->isPostRequest && !empty($_POST['ARContract'])){
//            dump($_POST);
            $model->attributes = $_POST['ARContract'];
            $model->create_id = Yii::app()->user->id;
            $model->sign_time = strtotime($model->sign_time);
            $model->online_time = strtotime($model->online_time);
            $model->end_time = strtotime($model->end_time);
            if($model->save()){
               $this->go('<strong>合同添加成功</strong>',$_POST['return_url'],'success'); 
            }
        }
        $this->render('create',array(
            'model'=>$model,
            'upload'=>$upload,
            'biz'=>$biz,
        ));
    }
    
    public function performAjaxValidation($model){
        if(isset($_POST['ajax']))
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

?>
