<?php

class Core {
    protected $controladorActual = 'front';
    protected $metodoActual = 'index';
    protected $parametros = [];
public $error;
    public function __construct(){
     
        $url = $this->getUrl();
     
            if (file_exists(BASE_DIR . CONTROLADORES . DS . ucwords($url[0]).'.php')) {
                //si existe pasa a controlador actual
                $this->controladorActual = ucwords($url[0]);
                //unset indice 0
                unset($url[0]);
            }else if (ucwords($url[0])) {
            header('Location:' . BASE_URL  .   'NotFound');
                 
         }



       
       //requerir el controlador nuevo
       require_once BASE_DIR . CONTROLADORES . DS . $this->controladorActual . '.php';
       $this->controladorActual = new $this->controladorActual;
 

       //el metodo indice 1
     
       if (isset($url[1])) {
        if (method_exists($this->controladorActual, $url[1])) {
            $this->metodoActual = $url[1];
            unset($url[1]);
        }else if($url[1]){
            header('Location:' . BASE_URL  .   'NotFound');  throw new Exception ('Metodo ' . ucwords($url[1]) . ' No encontrado' );
        }
       }
  
       //parametros
$this->parametros = $url ? array_values ($url) : [];

//callback parametros
call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
      
    }

    public function getUrl (){
        //la url es del htaccess

        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }


    }
}