<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\News;
use Core\Helper;
use Core\Session;

class NewController extends Auth
{
    protected $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new News();

    }

    public function create()
    {
        return $this->loadView('admin/main', [
            'title' => 'Thêm Bài viết mới',
            'template' => 'news/add'
        ]);
    }

    protected function formRequest($isCreateTime = 1)
    {
        $data = [];
        $data['title']       = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
        $data['file']      = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';
        $data['content']     = isset($_POST['content']) ? Helper::makeSafe($_POST['content']) : '';

        if ($data['title'] == '' || $data['file'] == '' || $data['content'] == '' ) {
            Session::addFlash('error', 'Tiêu đề, Ảnh đại diện & Nội dung Bài viết không được trống');
            return false;
        }
        $data['author']            = isset($_POST['author']) ? Helper::makeSafe($_POST['author']) : '';
        $data['url']            = isset($_POST['url']) ? Helper::makeSafe($_POST['url']) : '';
        $data['sort_by']        = isset($_POST['sort_by']) ? intval($_POST['sort_by']) : 0;
        $data['active']         = isset($_POST['active']) ? intval($_POST['active']) : 1;
        $data['slug']           = Helper::slug($data['title']);
        $data['updated_at']     = date("Y-m-d H:i:s");

        if ($isCreateTime == 1) {
            $data['created_at'] = date("Y-m-d H:i:s");
        }

        return $data;

    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->formRequest($isCreateTime = 1);
            // dd($data);

            if (!$data) return Helper::redirect('admin/news/add');

            $result = $this->model->create($data);

            if ($result) {
                Session::addFlash('success', 'Thêm Bài viết mới thành công');
                return Helper::redirect('/admin/news/add');
            }

            Session::addFlash('error', 'Thêm Bài viết mới LỖI');
            return Helper::redirect('/admin/news/add');
        }

        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/admin/news/add');
    }

    public function index()
    {
        $news = $this->model->get();
        return $this->loadView('admin/main',[
            'title' => 'Danh sách bài viết',
            'template' => 'news/list',
            'data' => $news
        ]);
    }

    public function edit($id = 0)
    {
        $new = $this->model->show($id);
        if (is_null($new)) {
            Session::addFlash('error', 'ID ' . $id . ' không tồn tại');
            return Helper::redirect('/admin/news/list');
        }

        $news = $this->model->get();
        return $this->loadView('admin/main', [
            'title' => 'Chỉnh Sửa Bài viết ' . $new['title'],
            'template' => 'news/edit',
            'new'  => $new,
            'data' => $news
        ]);
    }

    public function update(int $id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $new = $this->model->show($id);
            if (is_null($new)) {
                Session::addFlash('error', 'ID'. $id . ' không tồn tại');
                return Helper::redirect('/admin/news/list');
            }
            
            $data = $this->formRequest(0);

            if (!$data) return Helper::redirect('/admin/news/edit/' .$id);

            $result = $this->model->update($data, $id);

            if ($result) {
                Session::addFlash('success', 'Cập nhật bài viết thành công');
                return Helper::redirect('/admin/news/list');
            }

            Session::addFlash('error', 'Cập nhật bài viết lỗi');
            return Helper::redirect('/admin/news/edit/' . $id);

        }

        Session::addFlash('error', 'Phương thức không tồn tại');
                return Helper::redirect('/admin/news/list');
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

            $new = $this->model->show($id);
            if (is_null($new)) {
                return json([
                    'error' => true,
                    'message' => 'ID Bài viết không tồn tại'
                ]);
            }

            $result = $this->model->delete($new, $id);
            if ($result) {
                return json([
                    'error' => false,
                    'message' => 'Xóa thành công'
                ]);
            }

            return json([
                'error' => true,
                'message' => 'Không thể xóa Bài viết. Vui lòng thử lại'
            ]);
        }

        return json([
            'error' => true,
            'message' => 'Phương thức không tồn tại'
        ]);
    }
}