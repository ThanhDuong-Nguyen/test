<?php

namespace App\Controllers;

use App\Models\Main;
use App\Models\News;
use Core\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Menu;

class MainController extends Controller
{
    protected $model;
    protected $sliderModel;
    protected $productModel;
    protected $newModel;
    protected $menuModel;


    public function __construct()
    {
        $this->model = new Main(); #Khởi tạo Model
        $this->sliderModel  = new Slider();
        $this->productModel = new Product();
        $this->newModel     = new News();
        $this->menuModel    = new Menu();
    }

    public function index()
    {
        $users = $this->model->get();

        $data = [
            'title'         => 'L2H Store',
            'template'      => 'home',
            'sliders'       => $this->sliderModel->get(),
            'newPro'        => $this->productModel->getNewProducts(),
            'newProducts'   => $this->productModel->getNewProducts(),
            'featuredPro'   => $this->productModel->getFeatured(),
            'salePro'       => $this->productModel->getSale(),
            'news'          => $this->newModel->getinHome(),
            'menus'         => $this->menuModel->get()

        ];
        
        return $this->loadView('main', $data);
    }

    public function introduce()
    {
        $data = [
            'title'     => 'Giới thiệu',
            'template'  => 'introduce',
            'menus'     => $this->menuModel->get()
        ];

        return $this->loadView('main', $data);
    }


    public function contact()
    {
        $data = [
            'title'         => 'Liên Hệ',
            'template'      => 'contact',
            'menus'         => $this->menuModel->get(),
        ];

        return $this->loadView('main', $data);
    }


}