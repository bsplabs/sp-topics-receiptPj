<?php

// สร้าง method ตาแบบ rest api
$app->get('/', function($request, $response, $arg) {
	return $this->view->render($response, 'index.phtml', $arg);
});

$app->get('/login', function($request, $response, $arg){
	if (!$_SESSION['user'])
	{
		return $this->view->render($response, 'login.phtml', $arg);
	}
	else
	{
		return $this->view->render($response, 'home.phtml', $arg);
	}
});

$app->post('/login', 'App\Managers\Login:postLogin');

$app->get('/logout', 'App\Managers\Logout:getLogout');

$app->get('/register', 'App\Managers\Register:getRegister');
$app->post('/register', 'App\Managers\Register:postRegister');


$app->get('/upload', 'App\Managers\Upload:getUploadFile');
$app->post('/upload', 'App\Managers\Upload:postUploadFile');

$app->get('/home', 'App\Managers\Home:getHomepage');

$app->get('/pdfmake', 'App\Managers\Pdfmake:getPdf');

// $app->get('/hello/{say}', function($request, $response, $arg){
// 	echo 'Hello World!!! ' . $arg['say'];
// });

// $app->get('/home')
// $app->group('/home', function(){
//   $this->get('',function($request, $response){
//     return $this->view->render($request, 'home.phtml');
//   });
//   $this->get('/index', 'App\Managers\Home:index');
//   $this->get('/showdata','App\Managers\Home:showdata');
//   $this->get('/showdata/{id}','App\Managers\Home:showdataById');
//   $this->post('/showdata', 'App\Managers\Home:finddataByName');
// });
