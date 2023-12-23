<?php

class Post
{
    public function __construct() {
        echo "I am constructor of " . __CLASS__ . "<br/>";
    }
    public function index() {
        echo "I am methods of " . __CLASS__ . "<br/>";
    }
    public function show() {
        echo "I have nothing to show";
    }
}