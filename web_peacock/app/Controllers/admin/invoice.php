<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\invoiceModel;
use App\Models\productModel;
use App\Models\invoiceDetailModel;

class invoice extends BaseController
{
    public function index()
    {
        $data['title'] = 'invoice';
        session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }
        $model = new invoiceModel();
        $all_orders = $model->findAll();
        $data['orders'] = $all_orders;
        echo view('admin/invoice/index', $data);
        //--------------------------------------------------------------------
    }
    public function add()
    {
        session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }
        $model = new invoiceModel();
        $product_model = new productModel();
        $orderDetail_model = new invoiceDetailModel();
        if ($this->request->getMethod() == 'post') {
            $name = $this->request->getVar('client_name');
            $phone = $this->request->getVar('phone');
            $address = $this->request->getVar('address');
            $paid_status = $this->request->getVar('paid_status');
            $payment = $this->request->getVar('payment');
            $shipping_status= $this->request->getVar('shipping_status');
            $note = $this->request->getVar('note');
            $data_insert = [
                'user_id' => $_SESSION['user']["id"],
                'fullname' => $name,
                'phone' => $phone,
                'bill_address' => $address,
                'paid_status' => (int)$paid_status,
                'payments' => (int)$payment,
                'shipping_status' => (int)$shipping_status,
                'create_on' => date("Y-m-d"),
                'note' => $note,
                'status' => 1
            ];
            // var_dump($data_insert);
            $product_var = $this->request->getVar('name');
            $product_amount = $this->request->getVar('value');
            $id = $model->insert($data_insert);
            echo $id;
            for ($i = 0; $i < count($product_var); $i++) {
                // echo $product_var[$i].'  ';
                // echo $product_amount[$i].'\n';
                $price = str_replace(".", "", $product_model->find($product_var[$i])['price']);
                $total = (int)$price * (int) $product_amount[$i];
                // echo $total;
                $data_order_insert = [
                    'order_id' => $id,
                    'product_id' => (int) $product_var[$i],
                    'total_price' => (int) $total,
                    'product_amount' => (int) $product_amount[$i]
                ];
                var_dump($data_order_insert);
                $orderDetail_model->insert($data_order_insert);
            }
            return redirect()->to(base_url() . '/admin/invoice');
        }
        $data['title'] = 'invoice';
        $data['product'] = $product_model->findAll();
        echo view('admin/invoice/add', $data);
        //--------------------------------------------------------------------
    }
    public function edit($id=null)
    {
        session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }
        /*$id = $_GET['id'];*/
        $product_model = new productModel();
        $data['product'] = $product_model->findAll();
        $model = new invoiceModel();
        $model_detail = new invoiceDetailModel();
        $test = $model->find($id);
        $product_order = $model_detail->where('order_id', $id)->findAll();
        $data['product_order'] = $product_order;
        if ($this->request->getMethod() == 'post') {
            $name = $this->request->getVar('client_name');
            $phone = $this->request->getVar('phone');
            $address = $this->request->getVar('address');
            $paid_status = $this->request->getVar('paid_status');
            $payment = $this->request->getVar('payment');
            $shipping_status= $this->request->getVar('shipping_status');
            $note = $this->request->getVar('note');
            $status = $this->request->getVar('status');

            $data_insert = [
                'fullname' => $name,
                'phone' => $phone,
                'bill_address' => $address,
                'paid_status' => (int)$paid_status,
                'payments' => (int)$payment,
                'shipping_status' => (int)$shipping_status,
                'create_on' => date("Y-m-d"),
                'note' => $note,
                'status' => $status
                

            ];
            // var_dump($id);
            // die();
            $check = $model->update($id,$data_insert);
            // $model_detail->where('order_id', $id)->delete();
            // $product_var = $this->request->getVar('name');
            // $product_amount = $this->request->getVar('value');
            // for ($i = 0; $i < count($product_var); $i++) {
            //     // echo $product_var[$i].'  ';
            //     // echo $product_amount[$i].'\n';
            //     $price = str_replace(".", "", $product_model->find($product_var[$i])['price']);
            //     $total = (int)$price * (int) $product_amount[$i];
            //     // echo $total;
            //     $data_order_insert = [
            //         'order_id' => $id,
            //         'product_id' => (int) $product_var[$i],
            //         'total_price' => (int) $total,
            //         'product_amount' => (int) $product_amount[$i]
            //     ];
            //     var_dump($data_order_insert);
            //     $model_detail->insert($data_order_insert);
            // }
            return redirect()->to(base_url() . '/admin/invoice');
        }

        $data['info'] = $test;
        $data['title'] = 'invoice';
        return view('admin/invoice/edit', $data);
        //--------------------------------------------------------------------
    }
    public function delete($id=null)
    {
        session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }
       /* $id = $_GET['id'];*/
        $model = new invoiceModel();
        $model_detail = new invoiceDetailModel();
        $model_detail->delete('order_id', (int)$id);
        $model->delete($id);
        return redirect()->to(base_url() . '/admin/invoice');
    }
    public function detail($id=null)
    {
        session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }
        $db = db_connect();
        /*$id = $_GET['id'];*/
        $model = new invoiceModel();
        $user = $model->find($id);
        $data['user_detail'] = $user;
        $sql = 'select product.name, product.price, order_detail.total_price, order_detail.product_amount 
                from product, order_detail
                where product.product_id = order_detail.product_id and order_id=' . $id;
        $detail = $db->query($sql)->getResult('array');
        $data['detail'] = $detail;
        return view('admin/invoice/detail', $data);
    }
}
