<?php

namespace App\Helpers;

use App\Models\Product;
use Core\Helper as CoreHelper;
use Core\Model;

class Helper
{
    public static function menuShow($data, $parentId = 0, $symb = '')
    {
        $html = '';

        foreach ($data as $key => $value) {
            if ($value['parent_id'] == $parentId) { #Lần 1 sẽ lấy tất cả Menu cha
                $html .='
                    <tr>
                        <td>' . $value['id'] . '</td>
                        <td>' . $symb . $value['name'] . '</td>
                        <td>' . $value['order_by'] . '</td>
                        <td>' . self::active($value['active']) . '</td>
                        <td>' . $value['updated_at'] . '</td>
                        <td><a href="/admin/menus/edit/' . $value['id']. '"><i class="far fa-edit"></i></a></td>
                        <td><a href="#" onclick="deleteRow(' . $value['id']. ', \'/admin/menus/delete\')"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                ';

                #Xóa danh mục đã lấy ra
                unset($data[$key]);

                $html .= self::menuShow($data, $value['id'], $symb . '|----');
            }
        }

        return $html;
    }

    public static function active($active = 0)
    {
        return $active == 0 
            ? '<button type="button" class="btn btn-block bg-gradient-danger btn-xs">Không Kích Hoạt</button>' 
            : '<button type="button" class="btn btn-block bg-gradient-success btn-xs">Kích Hoạt</button>';
    }

    public static function isView($isView = 0 , $id = 0)
    {
        $notSeen = '<button type="submit" class="btn btn-block bg-gradient-danger btn-xs">Chưa xem</button>';
        $seen = '<button type="submit" class="btn btn-block bg-gradient-success btn-xs">Đã xem</button>';
        return $isView == 0 
            ? "<form action='/admin/customer/isview/$id' method='POST'><input type='hidden' name='is_view' id='is_view' value='$isView'>" . $notSeen . "</form>"
            : "<form action='/admin/customer/isview/$id' method='POST'><input type='hidden' name='is_view' id='is_view' value='$isView'>" . $seen . "</form>";
    }

    public static function isConfirm($isConfirm = 0 , $id = 0)
    {
        $no = '<button type="submit" class="btn btn-block bg-gradient-danger btn-xs">Chưa duyệt</button>';
        $yes = '<button type="submit" class="btn btn-block bg-gradient-success btn-xs">Đã duyệt</button>';
        return $isConfirm == 0 
            ? "<form action='/admin/contact/confirm/$id' method='POST'><input type='hidden' name='is_confirm' id='is_confirm' value='$isConfirm'>" . $no . "</form>"
            : "<form action='/admin/contact/confirm/$id' method='POST'><input type='hidden' name='is_confirm' id='is_confirm' value='$isConfirm'>" . $yes . "</form>";
    }


    public static function featured($featured)
    {
        if ($featured == 0) return '<center><i class="fas fa-times"></i></center>';
        if ($featured == 1) return '<center><i class="fas fa-check"></i></center>';

    }

    public static function menuAll()
    {
        $model = new Model();
        $sql   = "SELECT id, name, parent_id, slug FROM menus WHERE active = 1 ORDER BY order_by ";
        $menuPublic = $model->fetchArray($sql);
        return $menuPublic;
    }

    public static function menuPublic($data, $parentId = 0)
    {
        $html = '';
        foreach ($data as $key => $value){
            if ($value['parent_id'] == $parentId){
                $html .= '<li><a href="/danh-muc/'. $value['slug'] . '" 
                            title="' . $value['name'] . '">' . $value['name'] . ' 
                        </a>';

                if (self::isChild($data, $value['id'])) {
                    $html .= '<ul class ="sub_menu">';
                    $html .= self::menuPublic($data, $value['id']);
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }
        }
        return $html;
    }

    public static function isChild($menus, $id = 0)
    {
        foreach ($menus as $menu) {
            if ($menu['parent_id'] == $id) {
                return true;
            }
        }

        return false;
    }


    public static function price($price = 0, $priceSale = 0)
    {
        if ($price != 0 && $priceSale != 0) return number_format($priceSale, 0, ' ', '.') . ' vnđ';
        if ($price != 0) return number_format($price, 0, '', '.') . ' vnđ';
        return '<a href="/lien-he">Liên Hệ</a>';
    }

    public static function btnPrice($price)
    {
        if ($price != 0 ) return '-labelsale';
    }

    public static function getFilter($array = [], $link = '')
    {
        if ($link == '') {
        $link = explode('?', $_SERVER['REQUEST_URI']);
        $link = $link[0];
        }

        if (count($array) != 0) {
            $queryString = $_GET;
            unset($queryString['query']); //Xóa query mặc định ở htaccess

            $array = array_merge($queryString, $array);
            return $link . '?' . http_build_query($array);
        }
        return $link;
    }


    public static function cartProducts()
    {
        $model = new Product();
        $carts = isset($_SESSION['carts']) ? $_SESSION['carts'] : Null;
        
        if (is_null($carts)) {
            return false;
        }
        
        $productsId = array_keys($carts);
        $idProductString = implode(',', $productsId);
        return $model->getByCart($idProductString);
    }

    public static function randomStringGenerator($length = 6)  
    {
        $randomString = "";  
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";  

        $len = strlen($characters);  

        for ($i = 0; $i < $length; $i++)  
        {  
            $index = rand(0, $len - 1);  
            $randomString = $randomString . $characters[$index];  

        }  

        return $randomString; 

    }

    public static function countView()
    {
        $model = new Model();
        $view = $model->query("SELECT id FROM customers WHERE is_view = 0");
        return $view->num_rows;
    }


    public static function countContact()
    {
        $model = new Model();
        $view = $model->query("SELECT id FROM contacts WHERE is_confirm = 0");
        return $view->num_rows;
    }

    public static function handleRange($str ='')
    {
        if (!is_null($str)) {
        $arr = explode("-", $str);
        }
        $start = $arr[0];
        $end = $arr[1];
        if ($end == '++') $end = 1000000000;

        return $start . ' AND ' . $end;
    }

    public static function handleSearch($str='')
    {
        if (!is_null($str)) return '%' . $str . '%';
    }


}
