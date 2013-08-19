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
    static public $states = array('online'=>'在线','offline'=>'已下线','beonline'=>'未上线');// 在线状态
    static public $status = array(1=>'草稿',2=>'提交审核',3=>'销售审核通过等待编辑',4=>'销售审核失败', 5=>'编辑完成等待审核', 6=>'编辑审核失败',7=>'编辑审核成功等待上线');//审核状态

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    
}

?>
