<?php
//controlador principal para cargar modelos y vistas de las carpetas correcpondientes
class ControladorAdmin
{
    //cargar modelo
    public function cargarModelo($modelo){
        require_once BASE_DIR . DS . MODELOS . DS . $modelo . '.php';

        return new $modelo();
    }

public function cargarAdmin($datos = []){
    if (file_exists(BASE_DIR  . ADMIN . DS . 'functions.php')) {
       require_once BASE_DIR  . ADMIN . DS . 'functions.php';
    }else{
        header('Location:' . BASE_URL  .   'NotFound');
    }
}
    
}
