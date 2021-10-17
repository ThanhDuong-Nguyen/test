<?php

namespace App\Models\Admin;

use Core\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    public function create($data)
    {
        return $this->insertArray($data, $this->table);
    }

    public function get()
    {
        $sql = "SELECT * FROM $this->table ";
        return $this->query($sql);
    }

    public function show($id)
    {
        return $this->fetch("SELECT * from $this->table where id = $id ");
    }

    public function update($data, $id)
    {
        return $this->updateArray($data, $this->table, $id);
    }

    public function delete($slider, $id)
    {
        $link = _PUBLIC_PATH_ . $slider['file'];

        if (file_exists($link)) {
            unlink($link);
        }

        return $this->query("DELETE FROM $this->table where id = $id ");
    }
}