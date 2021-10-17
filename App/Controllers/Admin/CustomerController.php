<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Customer;
use Core\Helper;
use Core\Session;

class CustomerController extends Auth
{
    protected $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new Customer();

    }

    public function index()
    {
        $customers = $this->model->get();

        return $this->loadView('admin/main', [
            'title' => 'Danh sách Khách Hàng',
            'template' => 'customer/list',
            'customer' => $customers
        ]);
    }

    public function show(int $id = 0)
    {
        $customer = $this->model->show($id);
        if (is_null($customer)) {
            \Core\Session::addFlash('error', 'ID Sản phẩm không tồn tại');
            return \Core\Helper::redirect('/admin/customer/list');
        }
       
        return $this->loadView('admin/main', [
            'title'     => 'Chỉnh Sửa Thông tin Khách hàng : ' . $customer['name'],
            'template'  => 'customer/edit',
            'data'      => $customer,

        ]);
    }

    public function update(int $id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $customer = $this->model->show($id);
            if (is_null($customer)) {
                Session::addFlash('error', 'ID Sản phẩm không tồn tại');
                return Helper::redirect('/admin/customer/list');
            }
            $data = [];
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['phone'] = isset($_POST['phone']) ? Helper::makeSafe($_POST['phone']) : '';

            if ($data['name'] == '' || $data['phone'] == '') {
                Session::addFlash('error', 'Tên và Số điện thoại không được trống');
                return Helper::redirect('/admin/customer/edit/' . $id);
            }
            $data['email'] = isset($_POST['email']) ? \Core\Helper::makeSafe($_POST['email']) : '';
            $data['address'] = isset($_POST['address']) ? \Core\Helper::makeSafe($_POST['address']) : '';
            $data['note'] = isset($_POST['note']) ? \Core\Helper::makeSafe($_POST['note']) : '';
            $data['is_view']         = isset($_POST['is_view']) ? intval($_POST['is_view']) : 1;

            $result = $this->model->update($data, $id);
            if ($result) {
                Session::addFlash('success', 'Cập nhật thông tin khách hàng thành công');
                return Helper::redirect('/admin/customer/list');
            }

            Session::addFlash('error', 'Cập nhật thông tin khách hàng lỗi');
            return Helper::redirect('/admin/customer/edit/' . $id);
            
        }

        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/admin/customer/list');
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

            $customer = $this->model->show($id);
            if (is_null($customer)) {
                return json([
                    'error' => true,
                    'message' => 'ID Khách hàng không tồn tại'
                ]);
            }

            $result = $this->model->delete($customer, $id);
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

    public function isview(int $id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customer = $this->model->show($id);
            if (is_null($customer)) {
                Session::addFlash('error', 'ID Sản phẩm không tồn tại');
                return Helper::redirect('/admin/customer/list');
            }
            $data = [];
            $view = isset($_POST['is_view']) ? (int) $_POST['is_view'] : 0;
            $view = ($view == 1) ? 0 : 1;
            $data['is_view'] = $view;

            $result = $this->model->update($data, $id);
            if ($result) {
                return Helper::redirect('/admin/customer/list');
            }

            Session::addFlash('error', 'Cập nhật lỗi');
            return Helper::redirect('/admin/customer/list');

        }
    }
}