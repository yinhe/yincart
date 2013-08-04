<?php
/**
 * params-prod.php
 *
 * Common parameters for the application on production
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 1:41 PM
 */
/**
 * Replace following tokens for correspondent configuration data
 *
 * {DATABASE-NAME} ->   database name
 * {DATABASE-HOST} -> database server host name or ip address
 * {DATABASE-USERNAME} -> user name access
 * {DATABASE-PASSWORD} -> user password
 *
 * {DATABASE-TEST-NAME} ->   Test database name
 * {DATABASE-TEST-HOST} -> Test database server host name or ip address
 * {DATABASE-USERNAME} -> Test user name access
 * {DATABASE-PASSWORD} -> Test user password
 */
return array(
	'env.code' => 'prod',
	// DB connection configurations
	'db.name' => '',
	'db.connectionString' => 'mysql:host=localhost;dbname=yincart',
	'db.username' => 'root',
	'db.password' => '',

	// test database {
	'testdb.name' => '',
	'testdb.connectionString' => 'mysql:host=localhost;dbname=yincart_test',
	'testdb.username' => 'root',
	'testdb.password' => '',
);