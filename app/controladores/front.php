<?php

class front extends ControladorFront
{
    public function __construct(){
        
    }

    public function index(){
        require_once BASE_DIR  . APP . DS . 'functionsApp.php';
        $a = [
            'Titulo' => NOMBRE_SITIO
        ];
        $this->cargarFront($a);
    }


   
}