<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ARGroupon
 * 后台groupon公共AR类
 * @author Administrator
 */
class ARGroupon extends DBGroupon{
    const STATUS_DRAFT = 1;//草稿
    const STATUS_PUSH = 2;//提交审核
    const STATUS_FAIL = 3;//审核失败
    const STATUS_SUCCESS = 4;//审核通过
    
    static public $states = array('online'=>'在线','offline'=>'已下线','beonline'=>'未上线');// 在线状态
    static public $status = array(1=>'草稿',2=>'提交审核',3=>'审核失败',4=>'审核通过');//审核状态

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function rules() {
        return array(
                array('title, short_title, sms_title, cate_1_id, cate_2_id, biz_id, contract_id', 'required'),
                array('max_number, display, is_copy, examine_status', 'numerical', 'integerOnly'=>true),
                array('price, market_price, cost', 'numerical'),
                array('title', 'length', 'max'=>255),
                array('short_title', 'length', 'max'=>18),
                array('sms_title, cate_1_id, cate_2_id, cate_3_id, biz_id, contract_id, begin_time, end_time, expire_time, per_number, once_number, begin_number, now_number, pre_number, sort, examine_id, create_id, create_time, update_time', 'length', 'max'=>10),
                array('image, examine_reason', 'length', 'max'=>128),
//                array('image','file',
//                    'types' => 'jpg, gif, png,jpeg',
//                    'maxSize' => 1024 * 1024 * 2, // 2MB
//                    'tooLarge' => '文件超过 2MB. 请上传小一点儿的文件.',
//                    'allowEmpty' => true,
//                    'on' => 'sell'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, title, short_title, sms_title, image, cate_1_id, cate_2_id, cate_3_id, biz_id, contract_id, price, market_price, cost, begin_time, end_time, expire_time, per_number, once_number, begin_number, now_number, pre_number, max_number, display, sort, is_copy, examine_status, examine_id, examine_reason, create_id, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }
    
    public function behaviors() {
        return array(
            'timestamp' => array(
			'class' => 'zii.behaviors.CTimestampBehavior',
			'setUpdateOnCreate'=>true
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
                   'title' => '长标题',
                   'short_title' => '短标题',
                   'sms_title' => '短信标题',
                   'image' => '主图',
                   'cate_1_id' => '一级分类',
                   'cate_2_id' => '二级分类',
                   'cate_3_id' => '三级分类',
                   'biz_id' => '商家',
                   'contract_id' => '合同',
                   'price' => '团购价',
                   'market_price' => '市场价',
                   'cost' => '成本价',
                   'begin_time' => '团购开始时间',
                   'end_time' => '团购结束时间',
                   'expire_time' => '团购过期时间',
                   'per_number' => '每人限购数量',
                   'once_number' => '每单限购数量',
                   'begin_number' => '起购数量',
                   'now_number' => '销量',
                   'pre_number' => '加水量',
                   'max_number' => '库存量',
                   'display' => '是否展示',
                   'sort' => '排序',
                   'is_copy' => '是否为复制商品',
                   'examine_status' => '审核状态',
                   'examine_id' => '审核人',
                   'examine_reason' => '审核理由',
                   'create_id' => '创建人',
                   'create_time' => 'Create Time',
                   'update_time' => 'Update Time',
           );
    }
}

?>
