<?php 

namespace App\Controllers;

use App\Models\Album;
use Core\Controller;
use App\Models\Product;
use App\Models\Menu;
use Core\Helper;

class ProductController extends Controller
{
    protected $productModel;
    protected $menuModel;
    protected $albumModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->menuModel    = new Menu();
        $this->albumModel   = new Album();

    }

    public function index($slug='')
    {

        $products = $this->productModel->getProduct($slug, 1);
        if (is_null($products)) return Helper::redirect('/');

        $data = [
            'title'             => \Core\Helper::decodeSafe($products['name']),
            'template'          => 'products/detailProducts',
            'menus'             => $this->menuModel->get(),
            'detailproducts'    => $products,
            'related'           => $this->getRelated($slug),
            'album'             => $this->albumModel->get($products['id']),
        ];

        return $this->loadView('main', $data);
    }

    public function getRelated($slug='') // Lấy sản phẩm liên quan cùng danh mục
    {    
        $products = $this->productModel->getProduct($slug, 1);
        if (is_null($products)) return Helper::redirect('/');

        else return $this->productModel->getRelated($products['slug'], $products['menu_id']);
    }



}