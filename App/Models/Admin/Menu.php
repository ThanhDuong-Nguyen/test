<?php

namespace App\Models\Admin;

use Core\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public function insert(array $data)
    {
        return $this->insertArray($data, $this->table);
    }

    public function getParent(int $parent_id = 0)
    {
        return $this->query("SELECT id, name from $this->table where parent_id = $parent_id");
    }

    public function get()
    {
        return $this->fetchArray("SELECT * from $this->table ");
    }

    public function show($id = 0)
    {
        return $this->fetch("SELECT * from $this->table where id = $id ");
    }

    public function update($data, $id)
    {
        return $this->updateArray($data, $this->table, $id);
    }

    public function delete($id)
    {
        return $this->query("DELETE from $this->table where id = $id or parent_id = $id ");
    }

    public function getActive()
    {
        return $this->query("SELECT * from $this->table where active = 1");
    }
}