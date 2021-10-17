<?php

namespace App\Core;

use Core\Controller;
use Core\Helper;
use App\Models\User;

class Auth extends Controller
{
    public $user = NULL;

    public function __construct()
    {
        if (isset($_COOKIE['username'])) {
            $model = new User();

            $this->user = $model->get($_COOKIE['username']);
            if (is_null($this->user)) { 
                return Helper::redirect('/admin/login');
            }

            if ($this->user['password'] != $_COOKIE['password']) {
                return Helper::redirect('/admin/login');
            }
            
            return $this->user;
        }

        return Helper::redirect('/admin/login');
    }
}