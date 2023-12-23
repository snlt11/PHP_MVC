<?php

$className = "Home";
$methodName = "index";
$params = [];

$url = isset($_GET['url']) ? rtrim($_GET['url'],'/') : "";
$url = explode("/", $url);

if(!empty($url[0])){
    if(file_exists(ucfirst($url[0]).'.php'))
    $className = $url[0];
}
require_once ucfirst($className).".php";
$className = new $className();

if(!empty($url[1])){
    if(method_exists($className,$url[1])){
        $methodName = $url[1];
    }
}

call_user_func_array([$className, $methodName],$params);

echo "<br><hr>"."<pre>"; print_r($url);







