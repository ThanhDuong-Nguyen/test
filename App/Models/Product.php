<?php

namespace App\Models;

use Core\Model;
use App\Helpers\Helper;

class Product extends Model
{
    protected $table = 'products';

    public function getNewProducts($limit = 12)
    {
        $time = 300; // Số ngày 
        $now = date("Y-m-d H:i:s");
        $timeLine = date("Y-m-d H:i:s",strtotime($now) - ($time * 86400));
        
        
        $sql = "SELECT id, name, price, price_sale, slug, file FROM $this->table WHERE active = 1 && updated_at BETWEEN '$timeLine' AND '$now'
        ORDER BY id DESC LIMIT $limit";
        return $this->query($sql);
    }

    public function getAllProducts()
    {
        $sql = "SELECT id, name, price, price_sale, slug, file FROM $this->table WHERE active = 1 ORDER BY id DESC LIMIT 12";
        return $this->query($sql);
    }

    public function getFeatured($limit = 12)
    {
        $sql = "SELECT id, name, price, price_sale, slug, file FROM $this->table WHERE active = 1 && featured = 1 ORDER BY id DESC LIMIT $limit";
        return $this->query($sql);
    }

    public function getSale($limit = 12)
    {
        $sql = "SELECT id, name, price, price_sale, slug, file FROM $this->table WHERE active = 1 && price_sale != 0 ORDER BY id DESC LIMIT $limit";
        return $this->query($sql);
    }

    public function getProduct($slug, $join = 0)
    {
        $slug = "'$slug'";
        $sql = "SELECT * FROM $this->table WHERE active = 1 && slug = $slug";
        if ($join == 1) {
            $sql = "SELECT $this->table.*, menus.name as menuName, menus.slug as menuSlug FROM $this->table JOIN menus ON $this->table.menu_id = menus.id WHERE $this->table.active = 1 && $this->table.slug = $slug";
        }
        return $this->fetch($sql);
    }

    public function getRelated($slug, $id)
    {
        $slug = "'$slug'";
        $sql = "SELECT id, name, price, price_sale, slug, file FROM $this->table WHERE active = 1 && menu_id = $id && slug != $slug";
        return $this->query($sql);
    }

    public function getByCart($idProductString)
    {
        $sql = "SELECT id, name, price, price_sale, file FROM $this->table WHERE active = 1 && id IN ($idProductString)";
        return $this->query($sql);
    }
    public function numRows($ids)
    {
        $result = $this->query("SELECT id FROM $this->table WHERE active = 1 && menu_id IN ($ids) ORDER BY id ");
        return $result->num_rows;
    }

    public function countSearch($ids, $searchSql)
    {
        $result = $this->query("SELECT id FROM $this->table WHERE active = 1 && menu_id IN ($ids) && name LIKE '$searchSql'");
        return $result->num_rows;
    }

    public function countRange($ids, $rangeSql)
    {
        $result = $this->query("SELECT id FROM $this->table WHERE active = 1 && menu_id IN ($ids) && price BETWEEN $rangeSql");
        return $result->num_rows;
    }

    //------------------//
    public function getByMenu($ids, $limit, $offset, $option1, $option2, $rangeSql='')
    {
        $sql ="SELECT id, name, price, price_sale, slug, file, updated_at FROM $this->table WHERE active = 1 && menu_id IN ($ids) ";
        if ($option1 == 0 && $option2 == 0) $sql .= "ORDER BY id DESC LIMIT $limit OFFSET $offset";
        if ($option1 == 1 && $option2 == 0) $sql .= "ORDER BY updated_at DESC LIMIT $limit OFFSET $offset";
        if ($option1 == 2 && $option2 == 0) $sql .= "ORDER BY updated_at ASC LIMIT $limit OFFSET $offset";
        if ($option1 == 3 && $option2 == 0) $sql .= "ORDER BY price ASC LIMIT $limit OFFSET $offset";
        if ($option1 == 4 && $option2 == 0) $sql .= "ORDER BY price DESC LIMIT $limit OFFSET $offset";
        if ($option1 == 0 && $option2 == 1) $sql .= "&& price BETWEEN $rangeSql ORDER BY id DESC LIMIT $limit OFFSET $offset";
        if ($option1 == 1 && $option2 == 1) $sql .= "&& price BETWEEN $rangeSql ORDER BY updated_at ASC LIMIT $limit OFFSET $offset";
        if ($option1 == 2 && $option2 == 1) $sql .= "&& price BETWEEN $rangeSql ORDER BY updated_at DESC LIMIT $limit OFFSET $offset";
        if ($option1 == 3 && $option2 == 1) $sql .= "&& price BETWEEN $rangeSql ORDER BY price ASC LIMIT $limit OFFSET $offset";
        if ($option1 == 4 && $option2 == 1) $sql .= "&& price BETWEEN $rangeSql ORDER BY price DESC LIMIT $limit OFFSET $offset";
        
        return $this->query($sql);
    }

    public function searchProduct($ids, $searchSql, $limit, $offset)
    {
        $sql = "SELECT id, name, price, price_sale, slug, file FROM $this->table WHERE active = 1 && menu_id IN ($ids) && name LIKE '$searchSql' LIMIT $limit OFFSET $offset";
        return $this->query($sql);
    }


}