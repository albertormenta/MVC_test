<?php

class NotFound extends ControladorFront{
    public function __construct(){
        
    }

    public function index(){
        $this->cargarErrorPage();
    }


   
}