<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Contact;
use Core\Helper;
use Core\Session;

class ContactController extends Auth
{
    protected $model;
    public function __construct()
    {
        
        parent::__construct();
        $this->model = new Contact();
    }

    public function index()
    {
        $contacts = $this->model->get();
        
        return $this->loadView('admin/main', [
            'title' => 'Danh sách Người Liên Hệ',
            'template' => 'contacts/list',
            'contacts' => $contacts
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [];
            $data['name']  = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['phone'] = isset($_POST['phone']) ? Helper::makeSafe($_POST['phone']) : '';

            if ($data['name'] == '' || $data['phone'] == '') {
                Session::addFlash('error', 'Tên và Số điện thoại không được trống');
                return Helper::redirect('/admin/lien-he');
            }
            $data['email']          = isset($_POST['email']) ? \Core\Helper::makeSafe($_POST['email']) : '';
            $data['message']        = isset($_POST['message']) ? \Core\Helper::makeSafe($_POST['message']) : '';
            $data['is_confirm']     = isset($_POST['is_confirm']) ? intval($_POST['is_confirm']) : 0;
            $data['updated_at']     = date("Y-m-d H:i:s");
            $data['created_at']     = date("Y-m-d H:i:s");

            $result = $this->model->insert($data);
            if ($result) {
                Session::addFlash('success', 'Chúng tôi sẽ liên hệ bạn sớm thôi, hãy chú ý điện thoại nhé !');
                return Helper::redirect('/');
            }

            Session::addFlash('error', 'Liên Hệ thất bại, thử lại sau');
            return Helper::redirect('/admin/lien-he');
        }
        Session::addFlash('error', 'Method not Exit');
        return Helper::redirect('/admin/lien-he');
    }


    public function confirm(int $id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [];
            $confirm = isset($_POST['is_confirm']) ? (int) $_POST['is_confirm'] : 0;
            $confirm = ($confirm == 1) ? 0 : 1;
            $data['is_confirm'] = $confirm;

            $result = $this->model->update($data, $id);
            if ($result) {
                return Helper::redirect('/admin/contact/list');
            }

            Session::addFlash('error', 'Cập nhật lỗi');
            return Helper::redirect('/admin/contact/list');
            
        }

        Session::addFlash('error', 'Method not Exit');
        return Helper::redirect('/admin/contact/list');
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

            $customer = $this->model->show($id);
            if (is_null($customer)) {
                return json([
                    'error' => true,
                    'message' => 'ID Người Liên Hệ không tồn tại'
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
}