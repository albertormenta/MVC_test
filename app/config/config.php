<?php

$protocolo;

if (isset($_SERVER['HTTPS'])) {
    $protocolo = 'https://';
} else {
    $protocolo = 'http://';
}
$directorio = rtrim(buscar($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'WebPage.path'), 'WebPage.path');
$urlbase = str_replace($_SERVER['CONTEXT_DOCUMENT_ROOT'], $_SERVER['SERVER_NAME'], $directorio);
define('DS', '/');
define('BASE_URL', $protocolo . $urlbase);

define('BASE_DIR', $directorio);

define('CONTROLADORES', 'app' . DS . 'controladores');
define('VISTAS', 'app' . DS . 'vistas' );
define('MODELOS', 'app' . DS . 'modelos' );
define('HELPERS', 'app' . DS . 'helpers' );
define('APP', 'app');
define('FRONT', 'front' );
define('ADMIN', 'admin' );
define('NOMBRE_SITIO', 'a81.mx');



define ('DBMVC_HOST', 'localhost');
define('DBMVC_USER','MVC');
define('DBMVC_PASS','imo125I5dF30MRMt');
define('DBMVC_NAME', 'mvc');
define('DBMVC_CHAR', 'utf8');

function buscar($dir,$archivo_buscar)
      {
           if ( is_dir($dir) )
           {
                $d=opendir($dir); 
                while( $archivo = readdir($d) )
                {
                  if ( $archivo!="." AND $archivo!=".."  )
                  {
                       if ( is_file($dir.'/'.$archivo) )
                       {
                            if ( $archivo == $archivo_buscar  )
                            {
                                 return ($dir.'/'.$archivo);
                          }
                      }
                      if ( is_dir($dir.'/'.$archivo) )
                      {
                           $r=buscar($dir.'/'.$archivo,$archivo_buscar);
                           if ( basename($r) == $archivo_buscar )
                           {
                                return $r;
                          }
                      }
                  }
              }
          }
          return FALSE;
      }

