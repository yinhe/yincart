<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WUltimoTopNav extends CWidget {

    public function getCount(){
        $cart = Yii::app()->cart;
        $count = $cart->total_items();
        return $count;
    }
    public function run() {
        $this->render('ultimoTopNav');
    }

}