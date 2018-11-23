<?php
//cargar librerias
require_once 'config/config.php';

spl_autoload_register(function($nombreClase){
    require_once 'libs/' . $nombreClase . '.php';
}

);
