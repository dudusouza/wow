<?php
session_start();
//Define o nivel de erros e a timezone
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/Sao_Paulo');

include_once './vendor/autoload.php';
include_once './framework/wow/Wow.php';

//inicia o framework
wow\Wow::create()->run();

?>