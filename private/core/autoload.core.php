<?php 

require "config.core.php";
require "functions.core.php";
require "database.core.php";
require "controller.core.php";
require "model.core.php";
require "app.core.php";
spl_autoload_register(function($class_name){
 require "../private/models/" . ucfirst($class_name). ".model.php";
});