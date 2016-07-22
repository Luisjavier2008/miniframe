<?php

class HomeController {
    public function  indexAction()
    {
        $language = "lol";
        $title = "this is a simple framework";
        view('main', array('language' => $language, 'title' => $title));
    }

}


?>


