<?php

namespace Core;

use Core\DB;

class Model extends DB
{
    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function query($sql = '') 
    {
        $query = $this->conn->query($sql);

        if ($query) return $query;

        die($this->conn->error);
    }

    public function fetch($sql = '')
    {
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return NULL;
    }

    public function fetchArray($sql = '')
    {
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->data[] = $row;
            }
        }

        return $this->data;
    }

    public function insertArray($data = [], $table = '')
    {
        if ($table == '') die('Table not exit');

        $field = '';
        $val = '';
        
        foreach ($data as $key => $value) {
            $field .= $key . ', ';
            $val .= "'" . $value . "', ";
        }
        
        $field = substr(trim($field), 0, -1);
        $val = substr(trim($val), 0, -1);
    
        $sql = "INSERT into $table (" . $field . ") values (" . $val . ")";

        return $this->query($sql);
    }

    public function updateArray($data = [], $table = '', $id = 0)
    {
        if ($table == '') die('Table not exit');

        $sqlUpdate = '';
        foreach ($data as $key => $value) {
            $sqlUpdate .= " $key = '" . $value . "', ";
        }
    

        $sqlUpdate = substr(trim($sqlUpdate), 0, -1);
    
        /* UPDATE $table set name = 'abc', description = 'xxx' where id = 1 */
        
        return $this->query("UPDATE $table set $sqlUpdate where id = $id ");
    }

    public function insertAlbum($table, $productId, $file)
    {
        $val = '';
        foreach ($file as $value ) {
            $val .= "($productId, '$value'), ";
        }
        $val = substr($val, 0, -2);
        $sql = "INSERT INTO $table (products_id, file)
                VALUES $val;";
        
        return $this->query($sql);
        
    }

    public function getLastId($data = [], $table = '')
    {
        $this->insertArray($data, $table);

        return (int) $this->conn->insert_id;
    }


}