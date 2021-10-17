<?php

namespace App\Models;

use Core\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public function get()
    {
        $sql = "SELECT id, name, slug FROM $this->table WHERE active = 1 && parent_id = 0 ";

        return $this->query($sql);
    }

    public function show($slug)
    {
        $slug = "'$slug'";
        $sql = "SELECT * FROM $this->table WHERE active = 1 && slug = $slug ";
        return $this->fetch($sql);
    }


    public function getIds($id)
    {
        $sql = "SELECT id FROM $this->table WHERE active = 1 && parent_id = $id";
        return $this->query($sql);
    }

    public function getParentId($id)
    {
        $sql = "SELECT id, name, slug, parent_id FROM $this->table WHERE active = 1 && id = $id";
        return $this->query($sql);
    }


}