<?php

namespace App\Models\Admin;

use Core\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    public function get()
    {
        return $this->query("SELECT * from $this->table ORDER BY is_confirm ASC");
    }

    public function insert($data)
    {
        return $this->insertArray($data, $this->table);
    }

    public function update($data, $id)
    {
        return $this->updateArray($data, $this->table, $id);
    }

    public function show($id)
    {
        return $this->fetch("SELECT * from $this->table where id = $id ");
    }

    public function delete($product, $id)
    {
        return $this->query("DELETE FROM $this->table where id = $id ");
    }
}