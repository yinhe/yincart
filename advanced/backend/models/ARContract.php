<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ARContract
 * 团购合同model
 * @author Jiulong Zhang <kowloon29320@163.com>
 */
class ARContract extends DBGrouponContract{
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function behaviors() {
        return array(
            'timestamp' => array(
			'class' => 'zii.behaviors.CTimestampBehavior',
                        'setUpdateOnCreate'=>true,
		)
        );
    }
    
   /**
    * @return array customized attribute labels (name=>label)
    */
   public function attributeLabels()
   {
           return array(
                   'id' => 'ID',
                   'name' => '合同名称',
                   'biz_id' => 'Biz',
                   'sign_time' => '签订时间',
                   'online_time' => '预计上线时间',
                   'end_time' => '团购结束时间',
                   'create_id' => 'Create',
                   'if_billing' => '开具发票',
                   'examine_status' => '审核状态',
                   'examine_id' => '审核人',
                   'examine_reason' => '审核原因',
                   'create_time' => 'Create Time',
                   'update_time' => 'Update Time',
           );
   }
   
   protected function afterSave() {
       $this->addImages();
       parent::afterSave();
   }
   
   public function addImages() {
	//If we have pending images
	if (Yii::app()->user->hasState('images')) {
	    $userImages = Yii::app()->user->getState('images');
//            dump($userImages);exit;
	    //Resolve the final path for our images
//	    $path = Yii::app()->getBasePath() . "/../images/uploads/";
//	    $path = realpath(Yii::app()->getBasePath() . "/../upload/item/image") . "/";
//	    //Create the folder and give permissions if it doesnt exists
//	    if (!is_dir($path)) {
//		mkdir($path);
//		chmod($path, 0777);
//	    }
	    //Now lets create the corresponding models and move the files
	    foreach ($userImages as $k => $image) {
		if (is_file($image["path"])) {
//		    if (rename($image["path"], $path . $image["url"])) {
//			chmod($path . $image["filename"], 0777);
//		    $img = new ItemImg( );
                    $img = new ARGrouponAttach();
                    $img->relation_id = $this->id;
                    $img->title = $this->name.'合同附件';
                    $img->file_path = $image['filename'];
                    $img->create_time = time();
//			$img->size = $image["size"];
//			$img->mime = $image["mime"];
//			$img->name = $image["name"];
		    
		    if (!$img->save()) {
			//Its always good to log something
			Yii::log("Could not save Image:\n" . CVarDumper::dumpAsString(
					$img->getErrors()), CLogger::LEVEL_ERROR);
			//this exception will rollback the transaction
			throw new Exception('Could not save Image');
		    }
//		    }
		} else {
		    //You can also throw an execption here to rollback the transaction
		    Yii::log($image["path"] . " is not a file", CLogger::LEVEL_WARNING);
		}
	    }
	    //Clear the user's session
	    Yii::app()->user->setState('images', null);
	}
    }
    
    //获取当前用户创建的合同
    public static function myContracts(){
        $user_id = Yii::app()->user->id;
        $concat = new CDbExpression('concat("合同编号:",id," ",name) as name');
        $contracts = Yii::app()->db->createCommand()->select(array('id',$concat))->from('groupon_contract')->where('create_id=:uid',array(':uid'=>$user_id))->queryAll();
        $contracts = A::map($contracts, 'id', 'name');
        return $contracts;
    }
}

?>
