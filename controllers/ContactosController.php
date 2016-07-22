<?php

class ContactosController {
    
    public function  indexAction()
    {
        $language = "lol";
        $title = "Contactos";

        view('main', array('language' => $language, 'title' => $title));

    }

    public function  cityAction($city)
    {

    }

    public function  javierAction($city)
    {

    }

}

