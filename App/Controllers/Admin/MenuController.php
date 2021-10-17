<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Menu;
use Core\Helper;
use Core\Session;


class MenuController extends Auth
{
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Menu();
    }

    public function create()
    {
        $menus = $this->model->getParent();

        return $this->loadView('admin/main', [
            'title' => 'Thêm Danh Mục',
            'template' => 'menu/add',
            'menus' => $menus
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            if ($data['name'] == '') {
                Session::addFlash('error', 'Vui lòng nhập tên Danh Mục');
                return Helper::redirect('/admin/menus/add');
            }

            $data['parent_id']      = isset($_POST['parent_id']) ? (int) $_POST['parent_id'] : 0;
            $data['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['order_by']       = isset($_POST['order_by']) ? (int) $_POST['order_by'] : 0;
            $data['active']         = isset($_POST['active']) ? (int) $_POST['active'] : 0;
            $data['slug']           = Helper::slug($data['name']);
            $data['created_at']    = Helper::timeStamp();
            $data['updated_at']    = Helper::timeStamp();

            $this->model->insert($data);

            Session::addFlash('success', 'Thêm Danh Mục Thành Công');
            return Helper::redirect('/admin/menus/add');
        }

        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/admin/menus/add');
    }

    public function index()
    {
        $menus = $this->model->get();

        return $this->loadView('admin/main', [
            'title' => 'Danh Sách Danh Mục',
            'template' => 'menu/list',
            'menus' => $menus
        ]);
    }

    public function edit($id = 0)
    {
        $menu = $this->model->show($id);
        
        #Kiểm tra nếu menu trả về Null => Lỗi
        if (is_null($menu)) {
            Session::addFlash('error', 'ID ' . $id . ' không tồn tại');
            return Helper::redirect('/admin/menus/list');
        }

   
        #Nếu $menu không null thì truyền data và thông tin qua view để Edit
        $menus = $this->model->getParent();

        return $this->loadView('admin/main', [
            'title' => 'Chỉnh Sửa Danh Mục ' . $menu['name'],
            'template' => 'menu/edit',
            'data'  => $menu,
            'menus' => $menus
        ]);
    }

    public function update($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            #Truy vấn lấy ID
            $menu = $this->model->show($id);
        
            #Kiểm tra nếu menu trả về Null => Lỗi
            if (is_null($menu)) {
                Session::addFlash('error', 'ID ' . $id . ' không tồn tại');
                return Helper::redirect('/admin/menus/list');
            }


            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            if ($data['name'] == '') {
                Session::addFlash('error', 'Vui lòng nhập tên Danh Mục');
                return Helper::redirect('/admin/menus/edit/' . $id);
            }

            $data['parent_id']      = isset($_POST['parent_id']) ? (int) $_POST['parent_id'] : 0;
            $data['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['order_by']       = isset($_POST['order_by']) ? (int) $_POST['order_by'] : 0;
            $data['active']         = isset($_POST['active']) ? (int) $_POST['active'] : 0;
            $data['slug']           = Helper::slug($data['name']);
            $data['updated_at']     = Helper::timeStamp();

            $this->model->update($data, $id);

            Session::addFlash('success', 'Cập Nhật Danh Mục Thành Công');
            return Helper::redirect('/admin/menus/list');
        }

        Session::addFlash('error', 'Phương thức không chính xác');
        return Helper::redirect('/admin/menus/list');
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = intval($_POST['id']);
            $menu = $this->model->show($id);
        
            #Kiểm tra nếu menu trả về Null => Lỗi
            if (is_null($menu)) {
                return json([
                    'error' => true,
                    'message' => 'ID không tồn tại'
                ]);
            }


            $result = $this->model->delete($id);
            if ($result) {
                return json([
                    'error' => false,
                    'message' => 'Xóa thành công'
                ]);
            }

            return json([
                'error' => true,
                'message' => 'Xóa lỗi vui lòng thử lại sau'
            ]);
        }

        Session::addFlash('error', 'Phương thức không chính xác');
        return Helper::redirect('/admin/menus/list');
    }
}