<?php

namespace App\Models;

use Core\Model;

class News extends Model
{
    protected $table = 'news';

    public function getinHome($limit = 3)
    {
        $sql = "SELECT id, title, author, file, content, slug, DATE(created_at) as time_create 
                FROM $this->table WHERE active = 1 ORDER BY id DESC LIMIT $limit" ;

        return $this->query($sql);
    }

    public function get($limit, $offset)
    {
        $sql = "SELECT id, title, author, file, content, slug, DATE(created_at) as time_create 
                FROM $this->table WHERE active = 1 ORDER BY id DESC LIMIT $limit OFFSET $offset ";

        return $this->query($sql);
    }

    public function getNew($slug)
    {
        $slug = "'$slug'";
        $sql = "SELECT id, title, author, file, content, slug, DATE(created_at) as time_create FROM $this->table WHERE active = 1 && slug = $slug";
        return $this->fetch($sql);
        
    }

    public function numRows()
    {
        $result = $this->query("SELECT id FROM $this->table WHERE active = 1");
        return $result->num_rows;
    }

    public function countSearch($searchSql)
    {
        $result = $this->query("SELECT id FROM $this->table WHERE active = 1 && title LIKE '$searchSql'");
        return $result->num_rows;
    }


    public function searchNews($limit, $offset, $searchSql)
    {
        $sql = "SELECT id, title, author, file, content, slug, DATE(created_at) as time_create 
                FROM $this->table WHERE active = 1 && title LIKE '$searchSql' ORDER BY id DESC LIMIT $limit OFFSET $offset" ;
        
        return $this->query($sql);
    }


}