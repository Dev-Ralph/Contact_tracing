<?php

require 'functions.php';
spl_autoload_register(function($class){
  require_once $_SERVER['DOCUMENT_ROOT'].'/Contact_tracing/resources/class/'.$class.'.php';
});
 ?>
