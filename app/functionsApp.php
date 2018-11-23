<?php


function dataFunctionsFont($allData){
    
    $header = include_once BASE_DIR . FRONT . DS . "header.php";

    function getheader(){
        $header;
    }

function putheader($n){
    removeheader();
    $doc = new DOMDocument();
    $doc->loadHTMLFile(BASE_DIR . FRONT . DS . "header.php");
    echo $doc->saveHTML(); 

}
//usar el dom para cambiar el html en ligar de borrar y cargarlo de nuevo... acceder a las propiedades
function removeheader(){
   $header = '';
}

        function getfooter() {
            include_once BASE_DIR . FRONT . DS . "footer.php";
            }
        function getsidebar() {
            include_once BASE_DIR . FRONT . DS . "sidebar.php";
        } 
        
        require_once BASE_DIR  . FRONT . DS . 'index.php';
}
