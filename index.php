<?php

require 'config.php';
require 'helper.php';

// function controller($name){
// 	require 'controllers/$name.php';
// }

// if (!isset(($_GET['url'])) {
// 	// $_GET['url'] = 'main';
// }
run_controller($_GET['url']);
