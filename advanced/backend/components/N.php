<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of N
 * 数值处理类
 * @author Administrator
 */
class N {
    /**
     * 验证手机号码格式
     * @param type $mobile
     * @return type
     */
    public function checkMobile($mobile) {
        $pattern = "/^(13[0-9]{9})|(15[0-35-9][0-9]{8})|(18[056789][0-9]{8})|(147[0-9]{8})$/";
        return preg_match($pattern, $mobile);
    }
}

?>
