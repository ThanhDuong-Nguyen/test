<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Cart;

class CartController extends Auth
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Cart();
    }

    public function show(int $id = 0)
    {
        $cart = $this->model->show($id);

        if (is_null($cart)) {
            \Core\Session::addFlash('error', 'ID Giỏ hàng không tồn tại');
            return \Core\Helper::redirect('/admin/customer/list');
        }
       
        return $this->loadView('admin/main', [
            'title'     => 'Thông tin Giỏ hàng',
            'template'  => 'cart/list',
            'cart'      => $cart,

        ]);
    }
}