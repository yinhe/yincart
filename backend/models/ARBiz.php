<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ARBiz
 * 团购商家后台AR类
 * @author Administrator
 */
class ARBiz extends DBGrouponBiz{
    const DISPLAY = 1;//是否显示
    static public $status = array(1=>'草稿状态', 2=>'审核提交', 3=>'审核通过' ,4=>'审核驳回');

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function rules() {
        return array(
                array('title,username,password,contact,mobile,bank_no,bank_name,bank_child,bank_user', 'required','on'=>'sell,update'),
                array('examine_status, display', 'numerical', 'integerOnly'=>true),
                array('username, password, contact, bank_no', 'length', 'max'=>32),
                array('title, license_photo, bank_name, bank_child, examine_reason', 'length', 'max'=>128),
                array('phone, bank_user', 'length', 'max'=>18),
                array('mobile', 'checkMobile'),
                array('create_id, examine_id, create_time, update_time', 'length', 'max'=>10),
                array('license_photo', 'file',
                    'types' => 'jpg, gif, png',
                    'maxSize' => 1024 * 1024 * 2, // 2MB
                    'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
                    'allowEmpty' => true,
                    'on' => 'sell'
                ),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, username, password, title, license_photo, contact, phone, mobile, bank_user, bank_name, bank_child, bank_no, create_id, examine_status, examine_id, examine_reason, create_time, update_time, display', 'safe'),
        );
    }
    
    public function checkMobile(){
        $int = N::checkMobile($this->mobile);
        if(!$int){
            $this->addError('mobile', '手机号格式不正确');
        }
    }

        /**
    * @return array customized attribute labels (name=>label)
    */
   public function attributeLabels()
   {
           return array(
                   'id' => 'ID',
                   'username' => '商户用户名',
                   'password' => '商户密码',
                   'title' => '商家店名',
                   'license_photo' => '营业执照',
                   'contact' => '联系人',
                   'phone' => '联系电话',
                   'mobile' => '手机号',
                   'bank_user' => '开户名',
                   'bank_name' => '开户行',
                   'bank_child' => '支行',
                   'bank_no' => '银行账号',
                   'create_id' => 'Create',
                   'examine_status' => '状态',
                   'examine_id' => 'Examine',
                   'examine_reason' => 'Examine Reason',
                   'create_time' => 'Create Time',
                   'update_time' => 'Update Time',
                   'display' => 'Display',
           );
   }
   
   protected function beforeSave() {
       $now = time();
       if(parent::beforeSave()){
           if($this->isNewRecord){
               $this->create_time = $now;
               $this->update_time = $now;
           }else{
               $this->update_time = $now;
           }
           return true;
       }
       return false;
   }
   
   public function getPhotoPath(){
       return Yii::app()->request->hostInfo.'/'.$this->license_photo;
   }
}

?>
