<?php
//controlador principal para cargar modelos y vistas de las carpetas correcpondientes
class ControladorFront
{
    //cargar modelo
    public function cargarModelo($modelo){
        require_once BASE_DIR . DS . MODELOS . DS . $modelo . '.php';

        return new $modelo();
    }


public function cargarFront($a){
    if (file_exists(BASE_DIR  . FRONT . DS . 'index.php')) {
        dataFunctionsFont($a);
        require_once BASE_DIR  . FRONT . DS . 'functions.php';
        
       
    }else{
        header('Location:' . BASE_URL  .   'NotFound');
    }
}

public function cargarErrorPage(){
    include_once BASE_DIR . FRONT . DS . '404.php';
}
    
}
