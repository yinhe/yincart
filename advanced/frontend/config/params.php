<?php

/**
 * params.php
 *
 * Holds frontend specific application parameters.
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 1:38 PM
 */
$paramsLocalFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'params-local.php';
$paramsLocalFileArray = file_exists($paramsLocalFile) ? require($paramsLocalFile) : array();

$paramsEnvFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'params-env.php';
$paramsEnvFileArray = file_exists($paramsEnvFile) ? require($paramsEnvFile) : array();

$paramsCommonFile = $frontendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
	'common' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'params.php';

$paramsCommonArray = file_exists($paramsCommonFile) ? require($paramsCommonFile) : array();

return CMap::mergeArray(
		$paramsCommonArray,
		// merge frontend specific with resulting env-local merge *override by local
		CMap::mergeArray(
			array(
		    'url.rules' => array(
			/* for REST please @see http://www.yiiframework.com/wiki/175/how-to-create-a-rest-api/ */
			/* other @see http://www.yiiframework.com/doc/guide/1.1/en/topics.url */
			'page/<key:\w+>' => 'page/index',
			'catalog/<key:\w+>' => 'catalog/index',
			'list/<category_id:\d+>' => 'item/index',
			'item-list-<key:\w+>' => 'item/list',
//                        'item-<id:\d+>' => 'item/view',
			'item/<id:\d+>/<title:.*?>' => 'item/view',
			'article/<id:\d+>/<title:.*?>' => 'article/view',
			'<_c:\w+>/<id:\d+>' => '<_c>/view',
			'<_c:\w+>/<_a:\w+>/<id:\d+>' => '<_c>/<_a>',
			'<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
		    ),
			// add here all frontend-specific parameters
			),
			// merge environment parameters with local *override by local
			CMap::mergeArray($paramsEnvFileArray, $paramsLocalFileArray)
		)
);