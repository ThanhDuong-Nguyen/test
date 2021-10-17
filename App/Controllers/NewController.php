<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\News;
use App\Models\Menu;
use App\Models\Product;
use Core\Helper;

class NewController extends Controller
{
    protected $newModel;
    protected $productModel;
    protected $menuModel;

    public function __construct()
    {
        $this->newModel     = new News();
        $this->productModel = new Product();
        $this->menuModel    = new Menu();
    }

    public function index()
    {
        $page = isset($_GET['page']) && $_GET['page'] > 1 ? (int) $_GET['page'] : 1;
        $search = isset($_GET['q']) ? $_GET['q'] : null;

        $limit = 3;
        $offset = ($page - 1) * $limit;

        if (is_null($search)) {
            $news = $this->newModel->get($limit, $offset);
            $numRow = $this->newModel->numRows();
            
        } else {
            $searchSql = \App\Helpers\Helper::handleSearch($search);
            $news = $this->newModel->searchNews($limit, $offset, $searchSql);
            $numRow = $this->newModel->countSearch($searchSql);
        }

        $sumPage = ceil($numRow / $limit);

        return $this->loadView('main', [
            'title'         => 'News',
            'template'      => 'news/list',
            'menus'         => $this->menuModel->get(),
            'featuredPro'   => $this->productModel->getFeatured(6),
            'news'          => $news,
            'page'          => $page,
            'sumPage'       => $sumPage
        ]);
    }

    public function detail($slug='')
    {
        $news = $this->newModel->getNew($slug);
        if (is_null($news)) return Helper::redirect('/');

        return $this->loadView('main', [
            'title'         => \Core\Helper::decodeSafe($news['title']),
            'template'      => 'news/detail',
            'menus'         => $this->menuModel->get(),
            'featuredPro'   => $this->productModel->getFeatured(5),
            'news'          => $news

        ]);
    }
}