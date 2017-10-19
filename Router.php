<?php
  class Router{
    static private $instance ;
    private function Router(){}

    static function getInstance(){
      if(!self::$instance)
        self::$instance = new Router();
      return self::$instance;
    }

    private $routes = [] ;

    function get($name, $route, $cb){
      $this->addRoute($name, 'GET', $route, $cb);
    }
    function post($name, $route, $cb){
      $this->addRoute($name, 'POST', $route, $cb);
    }
    function patch($name, $route, $cb){
      $this->addRoute($name, 'PATCH', $route, $cb);
    }
    function put($name, $route, $cb){
      $this->addRoute($name, 'PUT', $route, $cb);
    }
    function delete($name, $route, $cb){
      $this->addRoute($name, 'DELETE', $route, $cb);
    }

    function addRoute($name, $verb, $route, $cb){
      $this->routes[$name] = [ 'verb' => $verb, 'regex' => $route, 'callback' => $cb ];
    }


    function match($name, &$request){
      $request->routerParams = [];
      if($this->routes[$name]['verb'] == $request->method() &&
          preg_match($this->routes[$name]['regex'], $request->pathInfo(),
              $request->routerParams)){
                ob_start();
                print_r($request->routerParams);
                $tab = ob_get_clean();
                $tab = str_replace("\n", '', $tab);
                error_log("Route : $name -- params : $tab");
                $this->routes[$name]['callback']($request);
                return true;
      }
      return false;

    }


    function dispatch(&$request){
      foreach ($this->routes as $name => $osef) {
        if($this->match($name, $request))
          return(true);
      }
      return false;
    }


  }
