<?php


function dataFunctionsFont($allData){
    require_once BASE_DIR  . FRONT . DS . 'index.php';
    class Template
        {
            var $assignedValues = array();
            var $tpl = array();

            function __construct()
            {

            }
            
            function views(&$_path)
            {
                foreach ($_path as $key) 
                {
                    switch ($key)
                    {
                        case 'getheader':
                                array_push($this->tpl , file_get_contents(BASE_DIR . FRONT . DS . "header.html"));
                             break;
                         case 'getfooter':
                                array_push($this->tpl , file_get_contents(BASE_DIR . FRONT . DS . "footer.html"));
                             break;
                         case 'getsidebar':
                                array_push($this->tpl , file_get_contents(BASE_DIR . FRONT . DS . "sidebar.html"));
                             break;
                         default:
                             echo 'No existe la vista ' . $key;
                    }
                }  
            }        
            function assign($_searchString, $replaceString)
            {
                if (!empty($_searchString)) 
                {
                    $this->assignedValues[strtoupper($_searchString)] = $replaceString;
                }

            }
            function show()
            {
                foreach ($this->tpl as $tmpl) 
                {
                    if (count($this->assignedValues) > 0) 
                    {
                        foreach ($this->assignedValues as $key => $value) 
                        {
                            $tmpl = str_replace('{'. $key .'}', $value, $tmpl);
                        }
                    }
    
                    echo $tmpl;

                }
                

            }
    }


}
