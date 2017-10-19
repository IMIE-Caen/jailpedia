<?php

class MyHttp{
    public $routerParams = [];
    function MyHttp(){
      $this->request = $_SERVER;
    }
    function method(){
      return $this->request['REQUEST_METHOD'];
    }
    function pathInfo(){
      if(! array_key_exists('PATH_INFO', $_SERVER))
        return '/';
      else
        return $_SERVER['PATH_INFO'];
    }
}
