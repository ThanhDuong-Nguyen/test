<?php

namespace App\Models;

use Core\Model;

class Cart extends Model
{
    protected  $table = 'carts';

    public function insertCart($products, $customerId, $carts)
    {

        $sql = "INSERT into $this->table (customer_id, product_id, price, qty, product_name, product_thumb) values ";

        while ($product = $products->fetch_assoc()) {
            $price = $product['price_sale'] != 0 ? $product['price_sale'] : $product['price'];
            $sql .= " ($customerId, " . $product['id'] . ", $price, " . $carts[$product['id']] . ", '" . $product['name'] . "', '" . $product['file'] . "'),";
        }

        $sql = substr($sql, 0, -1);


        return $this->query($sql);
    }

    public function getVoucher($code)
    {
        return $this->fetch("SELECT * FROM vouchers WHERE active = 1 && code = '$code'");
    }
}