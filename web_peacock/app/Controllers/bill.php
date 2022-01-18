<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\invoiceModel;
use App\Models\productModel;
use App\Models\invoiceDetailModel;

class bill extends BaseController
{
    public function index()
    {
        // $data['title'] = 'invoice';
        session_start();
        if (empty($_SESSION['customer'])) {
            return redirect()->to(base_url() . '/login');
        }
       
        $db = db_connect();
        $id = $_SESSION['customer']['id'];
        $model = new invoiceModel();
        $sql = 'select * from orders where user_id='.$id;
        $detail = $db->query($sql)->getResult('array');
        $data['orders'] = $detail;
        echo view('bill', $data);
        //--------------------------------------------------------------------
    }
    public function detail($id=null)
    {
        session_start();
        if (empty($_SESSION['customer'])) {
            return redirect()->to(base_url() . '/login');
        }
        $db = db_connect();
        // $id = $_GET['id'];
        $id = str_replace("id=","",$id);
        $model = new invoiceModel();
        $user = $model->find($id);
        $data['user_detail'] = $user;
        $sql = 'select product.name, product.price, order_detail.total_price, order_detail.product_amount 
                from product, order_detail
                where product.product_id = order_detail.product_id and order_id=' . $id;
        $detail = $db->query($sql)->getResult('array');
        $data['detail'] = $detail;
        return view('detail_bill', $data);
    }

    public function edit($id=null)
    {
        session_start();
        if (empty($_SESSION['customer'])) {
            return redirect()->to(base_url() . '/login');
        }
        // $id = $_GET['id'];
        $product_model = new ProductModel();
        $data['product'] = $product_model->findAll();
        $model = new invoiceModel();
        $model_detail = new invoiceDetailModel();
        $test = $model->find($id);
        // var_dump($id);
        // die();
        $product_order = $model_detail->where('order_id', $id)->findAll();
        $data['product_order'] = $product_order;
        $data['id']= $id;
        if ($this->request->getMethod() == 'post') {
            $id_hidden = $this->request->getVar('id_hidden');
            $name = $this->request->getVar('client_name');
            $phone = $this->request->getVar('phone');
            $address = $this->request->getVar('address');
            $note = $this->request->getVar('note');
            $payments = $this->request->getVar('status');
            $product_var = $this->request->getVar('name');
            $product_amount = $this->request->getVar('value');
           
            $product_amount_new = []; 
           for ($i = 0; $i < count($product_var); $i++) {
                $bef_amount = $product_model->getProdcutbyId((int) $product_var[$i]);
                $bef_amount_inv = $model_detail->getproduct_amount ($bef_amount['product_id'], $id_hidden);
                $data_pro =  [
                    'quantity' => $bef_amount['quantity'] + $bef_amount_inv[0]['product_amount'],
                    ];
                $product_model->update($bef_amount['product_id'],$data_pro);
                // var_dump($bef_amount_inv[0]['product_amount']);

                $bef_amount = $product_model->getProdcutbyId((int) $product_var[$i]);
                if($bef_amount['quantity'] >= $product_amount[$i]){
                    $product_amount_new[$i] = $product_amount[$i];
                }
                else{
                    $product_amount_new[$i] = $bef_amount_inv[0]['product_amount'];
                }

            }
            // var_dump($product_amount_new);
            // die();
            $data_insert = [
                        'id' => (int) $id_hidden,
                        'fullname' => $name,
                        'phone' => $phone,
                        'payments' => (int)$payments, 
                        'note' => $note,
                        'create_on' => date("Y-m-d"),
                        // 'shipping_status' => 0,
                        'bill_address' => $address

                    ];
            $check = $model->save($data_insert);
            $model_detail->where('order_id', $id_hidden)->delete();
            for ($i = 0; $i < count($product_var); $i++) {
                $price = str_replace(".", "", $product_model->find($product_var[$i])['price']);
                $total = (int)$price * (int) $product_amount_new[$i];
                $data_order_insert = [
                    'order_id' => $id_hidden,
                    'product_id' => (int) $product_var[$i],
                    'total_price' => (int) $total,
                    'product_amount' => (int) $product_amount_new[$i]
                ];

                $model_detail->insert($data_order_insert);
            }
            return redirect()->to(base_url() . '/bill');
            // var_dump($product_amount_new);
            // die();
        }

        $data['info'] = $test;
        $data['title'] = 'bill';
        return view('edit_bill', $data);
        //--------------------------------------------------------------------
    }


     public function delete($id=null)
    {
        session_start();
        if (empty($_SESSION['customer'])) {
            return redirect()->to(base_url() . '/login');
        }
        $db = db_connect();
        // $id = $_GET['id'];
        $model = new invoiceModel();
        $invoiceDetailModel = new invoiceDetailModel();
        $productModel = new ProductModel();

        $invoiceDetail = $invoiceDetailModel->where('order_id', $id)->findAll();
        $invoice = $model->getInvoiceById($id);
        // var_dump($invoiceDetail);
        // die();
        foreach($invoiceDetail as $pro){
            $product_i4 = $productModel->getProdcutbyId($pro['product_id']);
            $data_product=[
                'quantity' => (int)$product_i4['quantity'] + (int)$pro['product_amount'],
            ];
        $productModel->update($pro['product_id'],$data_product);
            // var_dump($data_product);
        }
        
        // die();
        $user = $model->find($id);
        $data['user_detail'] = $user;
        $data_insert = [
                            'status' => 0,
                            'shipping_status' => 3
            ];
        
        $model->update($id,$data_insert);
        $sql1 = 'select * from orders where user_id='.$_SESSION['customer']['id'];
        $detail = $db->query($sql1)->getResult('array');
        $data['orders'] = $detail;
        echo view('bill', $data);
    }
}
?>