<?php

namespace Core;

use Core\Route;


class App extends Route
{
    public function __construct()
    {
        parent::__construct(); #Chạy cái funtion khởi tạo Route

        
        #Khởi tạo Controller
        $this->controller = new $this->controller;

        # Function chạy controller
        call_user_func_array([$this->controller, $this->method], $this->paramrs);       
    }
}