<?php

namespace App\Models\Admin;

use Core\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function show($id)
    {
        return $this->query("SELECT $this->table.*, customers.name from $this->table JOIN customers ON $this->table.customer_id = customers.id WHERE $this->table.customer_id = $id ");
    }

}