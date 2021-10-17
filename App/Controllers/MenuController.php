<?php 

namespace App\Controllers;

use Core\Controller;
use App\Models\Menu;
use App\Models\Product;
use Core\Helper;
use App\Models\News;

class MenuController extends Controller
{
    protected $menuModel;
    protected $productModel;
    protected $newModel;

    public function __construct()
    {
        $this->menuModel    = new Menu();
        $this->productModel = new Product();
        $this->newModel     = new News();
    }

    public function getIdMenu($slug)
    {
        $menu = $this->menuModel->show($slug);
        if (is_null($menu)) return Helper::redirect('/');

        if ($menu['parent_id'] == 0) {
            $id = $menu['id'];
            $idMenus = $this->menuModel->getIds($id);
            if ($idMenus->num_rows > 0) {
                while ($row = $idMenus->fetch_assoc()) {
                    $id .= ", " . $row['id'];
                }
            }
            return $id;
            
        } else return $menu['id']; //Là menu con

    }

    public function index($slug)
    {
        $ids = $this->getIdMenu($slug);
        $page = isset($_GET['page']) && $_GET['page'] > 1 ? (int) $_GET['page'] : 1;
        $price = isset($_GET['price']) ? $_GET['price'] : null;
        $range = isset($_GET['range']) ? $_GET['range'] : null;
        $search = isset($_GET['q']) ? $_GET['q'] : null;
        $limit = 9;
        $offset = ($page - 1) * $limit;
        
        
        $menu = $this->menuModel->show($slug);
        if (is_null($menu)) return Helper::redirect('/');

        $rangeSql = !is_null($range) ? \App\Helpers\Helper::handleRange($range) : '';
        if (is_null($search)) {
            if (!is_null($price) && is_null($range)) {
                $numRow = $this->productModel->numRows($ids);
                $option2 = 0;
                if ($price == 'newest') $option1 = 1;
                if ($price == 'oldest') $option1 = 2;
                if ($price == 'asc') $option1 = 3;
                if ($price == 'desc') $option1 = 4;
            }

            if (is_null($price) && is_null($range)) {
                $numRow = $this->productModel->numRows($ids);
                $option1 = 0;
                $option2 = 0;
            }
            if (is_null($price) && !is_null($range)) {
                $numRow = $this->productModel->countRange($ids, $rangeSql);
                $option1 = 0;
                $option2 = 1;
            }
            if (!is_null($price) && !is_null($range)) {
                $numRow = $this->productModel->countRange($ids, $rangeSql);
                $option2 = 1;
                if ($price == 'newest') $option1 = 1;
                if ($price == 'oldest') $option1 = 2;
                if ($price == 'asc') $option1 = 3;
                if ($price == 'desc') $option1 = 4;            
            }
            
            $listProducts = $this->productModel->getByMenu($ids, $limit, $offset, $option1, $option2, $rangeSql);

        } else {
            $searchSql = \App\Helpers\Helper::handleSearch($search);
            $numRow = $this->productModel->countSearch($ids, $searchSql);
            $listProducts = $this->productModel->searchProduct($ids, $searchSql, $limit, $offset);
        }
        
        $sumPage = ceil($numRow / $limit);

        return $this->loadView('main', [
            'title'         => \Core\Helper::decodeSafe($menu['name']),
            'template'      => 'products/productMenu',
            'menu'          => $menu,
            'listProducts'  => $listProducts,
            'menus'         => $this->menuModel->get(),
            'featuredPro'   => $this->productModel->getFeatured(6),
            'news'          => $this->newModel->get($limit, $offset),
            'page'          => $page,
            'sumPage'       => $sumPage
        ]);
    }

}