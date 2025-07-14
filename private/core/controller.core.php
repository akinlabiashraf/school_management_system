<?php

class controller
{
    public function View($view, $data = array())
    {
        extract($data);
        // echo "../private/views/" . $view . ".view.php";
        if (file_exists("../private/views/" . $view . ".view.php")) {
            // return file_get_contents("../private/views/" . $view . ".view.php");
            require("../private/views/" . $view . ".view.php");
        } else {
            // return file_get_contents("../private/views/404.view.php");
            require("../private/views/404.view.php");
        }
    }

    // public function load_model($model){
    //     if (file_exists("../private/models/".ucfirst($model) .".model.php")) {
    //         require("../private/models/" . ucfirst($model) . ".model.php");
    //         $model = new model();
    //         return $model;
    //     }
    //     return false;
    // }
    public function load_model($model)
    {
        $path = "../private/models/" . ucfirst($model) . ".model.php";
        if (file_exists($path)) {
            require_once($path);
            $class = ucfirst($model);
            if (class_exists($class)) {
                return new $class();
            } else {
                die(" Class '$class' not found in '$path'.");
            }
        }
        die(" Model file '$path' not found.");
    }

    public function redirect($link){
        header("location: ".ROOT.trim($link, '/'));
    }
    
}
