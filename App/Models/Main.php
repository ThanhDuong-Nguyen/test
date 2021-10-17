<?php

namespace App\Models;

use Core\Model;

class Main extends Model
{
    public function get()
    {
        $sql = "select * from users ";

        return $this->fetchArray($sql);
    }
}