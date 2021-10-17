<?php

namespace App\Models;

use Core\Model;

class Album extends Model
{
    protected $table = 'product_slider';
    public function get($id = 0)
    {
        $sql ="SELECT * FROM $this->table WHERE products_id = $id";
        return $this->query($sql);
    }
}