<?php

namespace app\core;
require_once 'Request.php';

class Router {

    public Request $request;
    protected array $routes = [];

    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

    public function get($path,$callback){
        $this->routes['get'][$path] = $callback; 
    }
    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback){
            echo "Not Found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        
    }

    protected function layoutContent() {
        include Application::$ROOT_DIR."/views/layouts/main.php";
    }
    protected function renderOnlyView($view) {
        ob_start();
        include Application::$ROOT_DIR."/views/layouts/$view.vhp";
        return ob_get_clean();
    }

    public function renderView($view) {
        $layout = $this->layoutContent();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        include Application::$ROOT_DIR."/views/$view.php";
    }

    

}