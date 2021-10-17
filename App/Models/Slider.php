<?php

namespace App\Models;

use Core\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    public function get()
    {
        $sql = "SELECT * FROM $this->table WHERE active = 1 ORDER BY sort_by DESC";
        return $this->query($sql);
    }
    
}