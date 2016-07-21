<?php

function view($template, $vars)
{

	extract($vars);
	require "templates/$template.tpl.php";
}

function run_controller($name){
	if(empty($name)){
		$name = 'main';
	}
	$file = "controllers/$name.php";
	if(file_exists($file))
		require $file;
	else{
		header("HTTP/1.0 404 Not Found");
		exit("Page Not Found");
	}
}

?>