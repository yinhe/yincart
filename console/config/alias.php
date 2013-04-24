<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$root = dirname(__FILE__) . '/../../';
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('console', $root . DIRECTORY_SEPARATOR . 'console');
Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
Yii::setPathOfAlias('comext', $root . '/common/extensions');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');;