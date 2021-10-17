<?php

namespace App\Models\Admin;

use Core\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public function get()
    {
        return $this->query("SELECT * from $this->table ORDER BY is_view ASC");
    }

    public function show($id)
    {
        return $this->fetch("SELECT * from $this->table where id = $id ");
    }

    public function delete($product, $id)
    {
        return $this->query("DELETE FROM $this->table where id = $id ");
    }

    public function update($data, $id)
    {
        return $this->updateArray($data, $this->table, $id);
    }
}