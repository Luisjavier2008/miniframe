<?php

require 'config.php';
require 'helper.php';

//library
require 'library/Request.php';
require 'library/Inflector.php';

//call the controller

if(empty($_GET['url'])){
    $url = '';
}
else{
    $url = $_GET['url'];
}

$request = new Request($url);
$request->execute();
//echo '<h1>'.$request->getUrl().'</h1>';
//var_dump($request->getActionMethodName());
//echo "</ br>";
//var_dump($request->getParams());
//exit();
//run_controller($request->getControllerClassName());
