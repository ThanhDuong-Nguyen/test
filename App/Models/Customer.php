<?php

namespace App\Models;

use Core\Model;

class Customer extends Model
{
    protected  $table = 'customers';

    public function insert($data)
    {
        return $this->getLastId($data, $this->table);
    }


}