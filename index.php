<?php

require_once 'vendor/autoload.php';
require_once 'config/config.php';
// require_once "assets/ThaiPDF/thaipdf.php";

use mikehaertl\wkhtmlto\Pdf;

error_reporting(~E_NOTICE);
session_start();

// สร้าง Object
$app = new Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer('./views');

$container['db'] = function($c) {
	$db = $c['settings']['db'];
	$pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
	$db['user'], $db['pass']);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // รายงานปัญหาการเชื่อมต่อ
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$pdo->exec("set names utf8");
	return $pdo;
};

require_once 'routes.php';

$app->run();

?>
