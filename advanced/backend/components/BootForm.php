<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BootForm
 * FormBuider
 * @author Administrator
 */
Yii::import('bootstrap.widgets.*');
class BootForm extends TbForm{
    
    public static function createForm($config, $model, $options = array())
    {
        $class = __CLASS__;
        if(empty($options)){
            $options = array(
                'class'=>'TbActiveForm',
                'htmlOptions'=>array('class'=>'well'),
	        'type'=>'inline', //'inline','horizontal','vertical'
            );
        }
        

        $form = new $class($config, $model);
        $form->activeForm = $options;

        return $form;
    }
}

?>
