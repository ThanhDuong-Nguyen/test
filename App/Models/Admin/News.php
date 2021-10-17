<?php

namespace App\Models\Admin;

use Core\Model;

class News extends Model
{
    protected $table = 'news';
    public function create($data)
    {
        return $this->insertArray($data, $this->table);
    }

    public function get()
    {
        return $this->query("SELECT * FROM $this->table ORDER BY sort_by DESC");
    }

    public function show($id = 0)
    {
        return $this->fetch("SELECT * from $this->table where id = $id ");
    }

    public function update($data, $id)
    {
        return $this->updateArray($data, $this->table, $id);
    }

    public function delete($new, $id)
    {
        $link = _PUBLIC_PATH_ . $new['file'];

        if (file_exists($link)) {
            unlink($link);
        }

        return $this->query("DELETE FROM $this->table where id = $id ");
    }
}