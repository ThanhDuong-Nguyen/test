<?php

namespace Core;

class Controller
{    
    public function loadView($main = '', $data = [])
    {
        if (file_exists(_VIEW_ .'/'. $main .'.php')) {
       
            extract($data); 

            include _VIEW_ .'/'. $main .'.php';
            return ;
        }

        die($main .' Not Found');
    }
}