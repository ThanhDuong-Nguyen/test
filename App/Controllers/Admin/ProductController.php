<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Menu;
use App\Models\Admin\Product;
use Core\Helper;
use Core\Session;

class ProductController extends Auth
{
    protected $model;
    protected $menuModel;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Product();
        $this->menuModel = new Menu();
    }

    public function create()
    {
        return $this->loadView('admin/main', [
            'title' => 'Thêm Sản Phẩm Mới',
            'template' => 'product/add',
            'menus'  => $this->menuModel->getActive()
        ]);
    }

    protected function formRequest($isCreateTime = 1)
    {
        $data = [];
        $data['name']       = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
        $data['content']    = isset($_POST['content']) ? Helper::makeSafe($_POST['content']) : '';
        $data['file']       = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';

        if ($data['name'] == '' || $data['content'] == '' || $data['file'] == '') {
            Session::addFlash('error', 'Tên, Nội Dung và File Ảnh không để trống');
            return false;
        }

        $data['menu_id']        = isset($_POST['menu_id']) ? intval($_POST['menu_id']) : 0;
        $data['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
        $data['price']          = isset($_POST['price']) ? intval($_POST['price']) : 0;
        $data['price_sale']     = isset($_POST['price_sale']) ? intval($_POST['price_sale']) : 0;
        $data['active']         = isset($_POST['active']) ? intval($_POST['active']) : 1;
        $data['featured']       = isset($_POST['featured']) ? intval($_POST['featured']) : 1;
        $data['slug']           = Helper::slug($data['name']);
        $data['updated_at']     = date("Y-m-d H:i:s");

        if ($isCreateTime == 1) {
            $data['created_at'] = date("Y-m-d H:i:s");
        }
      
        #Kiểm tra giá tiền
        $isPrice = $this->checkPrice($data['price'], $data['price_sale']);
        if ($isPrice === false) {
            return false;
        }
        
        return $data;
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            #Load data và validate từ form
            $data = $this->formRequest();

            if (!$data) return Helper::redirect('/admin/products/add');

            $result = $this->model->insert($data);
            if ($result) {
                Session::addFlash('success', 'Thêm sản phẩm mới thành công');
                return Helper::redirect('/admin/products/add');
            }

            Session::addFlash('error', 'Thêm sản phẩm mới LỖI');
            return Helper::redirect('/admin/products/add');
        }

        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/admin/products/add');
    }

    protected function checkPrice($price = 0, $price_sale = 0)
    {
        if ($price != 0 && $price_sale != 0 && $price_sale >= $price) {
            Session::addFlash('error', 'Giá giảm không được lớn hơn hoặc bằng giá gốc');
            return false;
        }

        if ($price == 0 && $price_sale != 0) {
            Session::addFlash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    } 
    
    public function index()
    {
        $page = isset($_GET['page']) && $_GET['page'] > 1 ? (int) $_GET['page'] : 1;
        $limit = 10;

        $offset = ($page - 1) * $limit;
        $numRow = $this->model->numRows();
        $sumPage = ceil($numRow / $limit); #Tính ra số trang và làm tròn

        return $this->loadView('admin/main', [
            'title'     => 'Danh Sách Sản Phẩm',
            'template'  => 'product/list',
            'products'  => $this->model->get($limit, $offset),
            'sumPage'   => $sumPage,
            'page'      => $page
        ]);
    }


    public function show(int $id = 0)
    {
        $product = $this->model->show($id);
        if (is_null($product)) {
            Session::addFlash('error', 'ID Sản phẩm không tồn tại');
            return Helper::redirect('/admin/products/list');
        }
       
        return $this->loadView('admin/main', [
            'title'     => 'Chỉnh Sửa Sản Phẩm : ' . $product['name'],
            'template'  => 'product/edit',
            'data'      => $product,
            'menus'     => $this->menuModel->getActive()
        ]);
    }

    public function update(int $id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $product = $this->model->show($id);
            if (is_null($product)) {
                Session::addFlash('error', 'ID Sản phẩm không tồn tại');
                return Helper::redirect('/admin/products/list');
            }
            
            #Load data và validate từ form
            $data = $this->formRequest(0);

            if (!$data) return Helper::redirect('/admin/products/edit/' . $id);

            $result = $this->model->update($data, $id);
            if ($result) {
                Session::addFlash('success', 'Cập nhật sản phẩm thành công');
                return Helper::redirect('/admin/products/list');
            }

            Session::addFlash('error', 'Cập nhật sản phẩm lỗi');
            return Helper::redirect('/admin/products/edit/' . $id);
        }

        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/admin/products/list');
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

            $product = $this->model->show($id);
            if (is_null($product)) {
                return json([
                    'error' => true,
                    'message' => 'ID Sản phẩm không tồn tại'
                ]);
            }

            $result = $this->model->delete($product, $id);
            if ($result) {
                return json([
                    'error' => false,
                    'message' => 'Xóa thành công'
                ]);
            }

            return json([
                'error' => true,
                'message' => 'Không thể xóa Sản phẩm. Vui lòng thử lại'
            ]);
        }

        return json([
            'error' => true,
            'message' => 'Phương thức không tồn tại'
        ]);
    }


    public function add(int $id = 0)
    {
        $product = $this->model->show($id);
        
        if (is_null($product)) {
            Session::addFlash('error', 'ID Sản phẩm không tồn tại');
            return Helper::redirect('/admin/products/list');
        }

        return $this->loadView('admin/main', [
            'title'     => 'Cập nhật Sản Phẩm : ' . $product['name'],
            'template'  => 'product/album',
            'data'      => $product,

        ]);

    }


    public function updateAlbum(int $id = 0)
    {
        $thumb = $this->model->getThumb($id);
        
        $getPath = getFolder();
        $productId = isset($id) ? intval($id) : 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_FILES)) {
                $total = count($_FILES['file']['name']);
                    for( $i=0 ; $i < $total ; $i++ ) {
                        $tmpFilePath = $_FILES['file']['tmp_name'][$i];

                        if ($tmpFilePath != ""){
                            $pathFull = $getPath . '/' . $_FILES['file']['name'][$i];
                            move_uploaded_file($tmpFilePath, $pathFull);
                        }
                        $file[] = '/' . $pathFull;
                        
                    }
            }
            $file[] .= $thumb['file'];
            $result = $this->model->insertAlbum('product_slider', $productId, $file);
            if ($result) {
                Session::addFlash('success', 'Cập nhật sản phẩm thành công');
                return Helper::redirect('/admin/products/list');
            }

            Session::addFlash('error', 'Cập nhật sản phẩm lỗi');
            return Helper::redirect('/admin/products/album/' . $productId);
            
        }
        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/admin/products/album/'. $id);
        
    }


}