<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Slider;
use Core\Session;
use Core\Helper;

class SliderController extends Auth
{
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Slider();
    }

    public function create()
    {
        return $this->loadView('admin/main', [
            'title' => 'Thêm Slider Mới',
            'template' => 'slider/add'
        ]);
    }

    protected function formRequest($isCreateTime = 1)
    {
        $data = [];
        $data['title']       = isset($_POST['title']) ? Helper::makeSafe($_POST['title']) : '';
        $data['file']       = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';

        if ($data['title'] == '' || $data['file'] == '') {
            Session::addFlash('error', 'Tiêu đề và File Ảnh không để trống');
            return false;
        }

        $data['url']            = isset($_POST['url']) ? Helper::makeSafe($_POST['url']) : '';
        $data['sort_by']        = isset($_POST['sort_by']) ? intval($_POST['sort_by']) : 0;
        $data['active']         = isset($_POST['active']) ? intval($_POST['active']) : 1;
        $data['updated_at']     = date("Y-m-d H:i:s");

        if ($isCreateTime == 1) {
            $data['created_at'] = date("Y-m-d H:i:s");
        }

        return $data;
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data = $this->formRequest();
            if (!$data) return Helper::redirect('/admin/sliders/add');

            $result = $this->model->create($data);
            if ($result) {
                Session::addFlash('success', 'Thêm Slider mới thành công');
                return Helper::redirect('/admin/sliders/add');
            }

            Session::addFlash('error', 'Thêm Slider mới LỖI');
            return Helper::redirect('/admin/sliders/add');
        }

        Session::addFlash('error', 'Phương thức không hổ trợ');
        return Helper::redirect('/admin/sliders/add');
    }

    public function index()
    {
        $sliders = $this->model->get();

        return $this->loadView('admin/main',[
            'title'     => 'Danh Sách Slide',
            'template'  => 'slider/list',
            'sliders'   => $sliders
        ]);
    }

    public function edit($id = 0)
    {
        $slider = $this->model->show($id);
        $sliders = $this->model->get();
        if (is_null($slider)) {
            Session::addFlash('error', 'ID'. $id . ' không tồn tại');
            return Helper::redirect('/admin/sliders/list');
        }

        return $this->loadView('admin/main', [
            'title'     => 'Chỉnh sửa Slide ' . $slider['title'],
            'template'  => 'slider/edit',
            'data'      => $slider,
            'sliders'   => $sliders
        ]);
    }


    public function update($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slider = $this->model->show($id);
            if (is_null($slider)) {
                Session::addFlash('error', 'ID'. $id . ' không tồn tại');
                return Helper::redirect('/admin/sliders/list');
            }
            
            $data = $this->formRequest(0);

            if (!$data) return Helper::redirect('/admin/sliders/edit/' .$id);

            $result = $this->model->update($data, $id);

            if ($result) {
                Session::addFlash('success', 'Cập nhật slide thành công');
                return Helper::redirect('/admin/sliders/list');
            }

            Session::addFlash('error', 'Cập nhật slide lỗi');
            return Helper::redirect('/admin/sliders/edit/' . $id);

        }

        Session::addFlash('error', 'Phương thức không tồn tại');
                return Helper::redirect('/admin/sliders/list');
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

            $slider = $this->model->show($id);
            if (is_null($slider)) {
                return json([
                    'error' => true,
                    'message' => 'ID Slide không tồn tại'
                ]);
            }

            $result = $this->model->delete($slider, $id);
            if ($result) {
                return json([
                    'error' => false,
                    'message' => 'Xóa thành công'
                ]);
            }

            return json([
                'error' => true,
                'message' => 'Không thể xóa Slide. Vui lòng thử lại'
            ]);
        }

        return json([
            'error' => true,
            'message' => 'Phương thức không tồn tại'
        ]);
    }
}