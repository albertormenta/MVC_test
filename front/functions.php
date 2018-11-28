<?php

$vistas = array( 'getheader', 'getsidebar', 'getfooter');
$template = new Template();
$template->assign('titulo', 'el título');
$template->assign('pie', 'EL DEL FOOTER');

$template->views($vistas);
$template->show();

