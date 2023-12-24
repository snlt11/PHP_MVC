<?php


class Home extends Controller
{
    public function __construct(){
        echo "I am Constructor of " . __CLASS__ . " class " . "<br/>";
    }
    public function index(){
        $this->view("home/index");
    }
}