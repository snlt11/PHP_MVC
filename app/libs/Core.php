<?php

class Core
{
    private $className = "Home";
    private $methodName = "index";
    private $params = [];
    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl()
    {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : "";
        $url = explode("/", $url);

        if (!empty($url[0])) {
            if (file_exists(ucfirst($url[0]) . '.php'))
                $className = $url[0];
            unset($url[0]);
        }
        require_once ucfirst($className) . ".php";
        $className = new $className();

        if (!empty($url[1])) {
            if (method_exists($className, $url[1])) {
                $methodName = $url[1];
                unset($url[1]);
            }
        }
        $params = !empty($url) ? array_values($url) : [];
        call_user_func_array([$className, $methodName], $params);
    }
}






