<?php


class Post extends Controller
{
    public function __construct(){
        echo "I am Constructor of " . __CLASS__ . "class " . "<br/>";
    }
    public function index(){
        echo "I am index method of " . __CLASS__ . "class " . "<br/>";
    }
    public function show($data = []){
        echo "I am show method of " . __CLASS__ . "<br/>";
        echo "<pre>". print_r($data, true) . "<pre/>";
    }

}