<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Query
 * QueryBuilder公共类
 * @author Administrator
 */
class Query extends CDbCommand{
    
    //获取最后执行的sql语句
    public function lastSql()
    {
        return strtr($this->text,$this->params);
    }
}
?>
