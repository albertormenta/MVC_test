<?php

class admin extends ControladorAdmin
{
    public function __construct(){
        
    }

    public function index(){
        $data = [
            'Titulo' => NOMBRE_SITIO
        ];
        $this->cargarAdmin($data);
    }


   
}