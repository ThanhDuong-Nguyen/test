<?php

namespace App\Controllers;

use Core\Controller;
use Core\Helper;
use Core\Session;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Customer;



class CartController extends Controller
{
    protected $productModel;
    protected $cartModel;
    protected $customerModel;

    public function __construct()
    {
        $this->productModel     = new Product();
        $this->menuModel        = new Menu();
        $this->cartModel        = new Cart();
        $this->customerModel    = new Customer();
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
            $qty = isset($_POST['num_product']) ? (int) $_POST['num_product'] : 1;
            if ($product_id <= 0) {
                Session::addFlash('error', 'Sản phẩm không tồn tại');
                return Helper::redirect($_SERVER['HTTP_REFERER']);
            }

            $carts = isset($_SESSION['carts']) ? $_SESSION['carts'] : NULL;
            if (is_null($carts)) {
                $_SESSION['carts'][$product_id] = $qty; 
                return Helper::redirect('/gio-hang');
                        
            }
            if (isset($_SESSION['carts'][$product_id])) {
                $_SESSION['carts'][$product_id] = (int) $_SESSION['carts'][$product_id] + $qty;
                return Helper::redirect('/gio-hang');
            }

            $_SESSION['carts'][$product_id] = $qty;
            return Helper::redirect('/gio-hang');
            
        }
        
        return Helper::redirect($_SERVER['HTTP_REFERER']);

    }


    public function index()
    {
        $discount = null;
        $code = isset($_POST['coupon_code']) ? Helper::makeSafe($_POST['coupon_code']) : null;
        if (is_null($code)) {
            $carts = isset($_SESSION['carts']) ? $_SESSION['carts'] : Null;
        
                if (is_null($carts)) {
                    unset($_SESSION['carts']);
                    return $this->loadView('main',[
                        'title'     => 'Giỏ hàng trống !',
                        'template'  => 'carts/error',
                        'menus'     => $this->menuModel->get()

                    ]);
                }
                
                $products = $this->getProductCart($carts);

                return $this->loadView('main', [
                    'title'         => 'Giỏ hàng',
                    'template'      => 'carts/listCart',
                    'cartProducts'  => $products,
                    'menus'         => $this->menuModel->get(),
                    'discount'      => $discount
                
                ]);
            }

            if (!is_null($code)) {
                $discount = $this->cartModel->getVoucher($code);
                if (is_null($discount)) {
                    Session::addFlash('error', 'Mã không chính xác!');
                    return Helper::redirect('/gio-hang');
                } else {
                    Session::addFlash('success', 'Chúc mừng! Đơn hàng của bạn được '. $discount['description']);
                    $carts = $_SESSION['carts'];
                    $products = $this->getProductCart($carts);

                    return $this->loadView('main', [
                        'title'         => 'Giỏ hàng',
                        'template'      => 'carts/listCart',
                        'cartProducts'  => $products,
                        'menus'         => $this->menuModel->get(),
                        'discount'      => $discount
                    
                    ]);
                }

            }
    }


    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $carts = isset($_SESSION['carts']) ? $_SESSION['carts'] : Null;
                if (is_null($carts)) {
                    return $this->loadView('main',[
                        'title'     => 'Giỏ hàng trống !',
                        'template'  => 'carts/error',
                        'menus'     => $this->menuModel->get()
        
                    ]);
                }

                $cartsProduct = isset($_POST['num_product']) ? $_POST['num_product'] : [''];
                foreach ($cartsProduct as $key => $value) {
                    $_SESSION['carts'][$key] = (int) $value;
                }

                return Helper::redirect('/gio-hang');
        }

        return Helper::redirect('/');
    }


    public function remove(int $id = 0)
    {
        if ((int) count($_SESSION['carts']) > 1) {
            unset($_SESSION['carts'][$id]);
            return Helper::redirect('/gio-hang');
        } else {
            unset($_SESSION['carts']);
            return Helper::redirect('/gio-hang');
        }

    }

    public function store()
    {
        $carts = isset($_SESSION['carts']) ? $_SESSION['carts'] : Null;
        
        if (is_null($carts)) {
            Session::addFlash('error', 'Giỏ không được trống !');
            return Helper::redirect('/gio-hang');
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['name'] = isset($_POST['name']) ? \Core\Helper::makeSafe($_POST['name']) : '';
            $data['phone'] = isset($_POST['phone']) ? \Core\Helper::makeSafe($_POST['phone']) : '';

            if ($data['name'] == '' || $data['phone'] == '') {
                Session::addFlash('error', 'Tên và Số điện thoại không được trống');
                return \Core\Helper::redirect('/gio-hang');
            }

            $data['email'] = isset($_POST['email']) ? \Core\Helper::makeSafe($_POST['email']) : '';
            $data['address'] = isset($_POST['address']) ? \Core\Helper::makeSafe($_POST['address']) : '';
            $data['note'] = isset($_POST['note']) ? \Core\Helper::makeSafe($_POST['note']) : '';
            $data['discount'] = isset($_POST['discount']) ? $_POST['discount'] : 0;
            $data['total'] = isset($_POST['total']) ? $_POST['total'] : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['is_view'] = 0;
            $data['code'] = \App\Helpers\Helper::randomStringGenerator();

            //Insert trả về customer_id
            $customerId = $this->customerModel->insert($data);
            
            //Xử lý Đơn hàng
            if ((int) $customerId > 0) {
                $result = $this->addCart($carts, $customerId);
                if ($result == true) {
                    Session::addFlash('success', 'Đặt hàng thành công !');
                    unset($_SESSION['carts']);
                    return Helper::redirect('/');
                }
            }
            Session::addFlash('error', 'Có lỗi xảy ra. Vui lòng chờ trong giây lát !');
            return Helper::redirect('/gio-hang');
        }

        return Helper::redirect('/gio-hang');
    }

    protected function getProductCart($carts)
    {
        $productsId = array_keys($carts);
        $idProductString = implode(',', $productsId);
        return $this->productModel->getByCart($idProductString);

    }


    protected function addCart($carts, $customerId)
    {
        $products = $this->getProductCart($carts);
        return $this->cartModel->insertCart($products, $customerId, $carts);

    }

}