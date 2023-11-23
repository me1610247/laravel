<?php

class App
{
    protected $controller="HomeController";
    protected $action="index";
    protected $params=[];
    public function __construct()
    {
        
           $this->prepareUrl();
           $this->render();
    }
    /* 
    extract controllers , methods and parametes
    @return void
    */
private function prepareUrl(){
    $url = $_SERVER['REQUEST_URI'];
    if(!empty($url)){
       $url=trim($url,"/");

       $url=explode("/",$url);
       // define the controlloer
       $this->controller=isset($url[0]) ? ucwords($url[0])."controller":"HomeController";
       // define action
       $this->action=isset($url[1]) ? $url[1]:"index";

       unset($url[0],$url[1]);
       // define params
       $this->params=!empty($url)?array_values($url):[];
    }
}
    private function render(){
        if(class_exists($this->controller)){
            $controller=new $this->controller;
            if(method_exists($controller,$this->action)){
                call_user_func_array([$controller,$this->action],$this->params);
            }else{
                echo "Method is not exist";
            }
        }
        else{
            echo "This Controller:".$this->controller."is not exist";
        }
    }

}