<?php

namespace App\Controllers;

use App\Models\orderDetailModel;
use App\Models\ordersModel;
use App\Models\productModel;
require_once('mail/PHPMailerAutoload.php');
use PHPMailer;
class Checkout extends BaseController
{
    public function index()
    {
        // session_start();
        session_start();
        if (empty($_SESSION['customer'])) {
            return redirect()->to(base_url() . '/login');
        }
        $user_id= $_SESSION['customer']["id"];
        if ($this->request->getMethod() == 'post') {
            //phần cấu hình gửi mail
            $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'cobetenlinh@gmail.com';                 // SMTP username
            $mail->Password = 'hruvgkvuuaxjwbcz';                           // SMTP password
            // $mail->Username = 'caohuy010203@gmail.com';                 // SMTP username
            // $mail->Password = 'dktoelcsbhfhvaob';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
            $mail->CharSet = "UTF-8";              
            $content='';


            $cPay= $this->request->getVar('cPay');
            $cName = $this->request->getVar('cName');
            $cPhone = $this->request->getVar('cPhone');
            $cEmail = $this->request->getVar('cEmail');
            $notes = $this->request->getVar('notes');

            $address = $this->request->getVar('cAddress');
            $subtotal = $this->request->getVar('subtotal');
            $productIds = $this->request->getVar('productIds');
            $productQuantities = $this->request->getVar('productQuantities');
            $productPrices = $this->request->getVar('productPrices');
            $productsCheckout = [];
            foreach ($productIds as $key => $value) {
                $products = [];
                array_push($products, $productIds[$key], $productQuantities[$key], $productPrices[$key]);
                array_push($productsCheckout, $products);
            }
            // var_dump($productsCheckout);
            $orderModel = new OrdersModel();
            $order_detailModel = new OrderDetailModel();

            $product_model= new productModel();
            foreach ($productsCheckout as $item) {
                $bef_amount = $product_model->getProdcutbyId($item[0]);
                if($item[1]> $bef_amount['quantity']){
                     $data['message'] = 'fail';
                     echo view("checkout", $data);
                }
                else{
                     $data_insert = [
                    'user_id' => $user_id,
                    'fullname' => $cName,
                    'phone' => $cPhone,
                    'email' => $cEmail,
                    'note' => $notes,
                    'paid_status' => 0,
                    'status' => 1,
                    'payments' => $cPay,
                    'create_on' => date("Y-m-d H:i:s"),
                    'shipping_status' => 0,
                    'bill_address' => $address
                                    ];
                    $newOrder = $orderModel->insert($data_insert);

                    foreach ($productsCheckout as $item) {
                        $total +=intval($item[1]) * intval($item[2]);
                        
                        $data_insert = [
                            'order_id' => $newOrder,
                            'product_id' => $item[0],
                            'product_amount' => $item[1],
                            'total_price' => intval($item[1]) * intval($item[2])
                                    ];
                        // var_dump($item,$data_insert);
                        // die();
                        $newOrderDetail = $order_detailModel->insert($data_insert);
                    }
                if ($newOrderDetail > 0) {
                $mail->setFrom('caohuy010203@gmail.com', 'QUẢN TRỊ VIÊN ');
                $mail->addAddress($cEmail,'First Name');     // Add a recipient
                $mail->Subject = $cName;
                // $content.= 'br /> '. $total.'<br />';
                // $mail->Body 
                if ($cPay == 0){
                    $payments = 'Online';
                }
                else $payments = 'Khi nhận hàng';
                $content.= '
                <br>Cảm ơn anh/chị: '.$cName.' đã đặt hàng tại của hàng Shop Peacock </br>
                <h4> Thông tin đơn hàng: </h4>
                <p>Mã đơn hàng: '.$newOrder.'<br> Tên người đặt: '.$cName.'</br><br>Số điện thoại: '.$cPhone.'</br><br>Email: '.$cEmail.'</br><br>Địa chỉ: '.$address.'</br><br>Ghi chú: '.$notes.'</br><br>Hình thức thanh toán: '.$payments.'</br><br><b style="color:red;" >Tổng tiền:'. number_format($total).'VNĐ </b></br></p>

                <b>Trân trọng!</b>';

                $mail->MsgHTML($content); 
                $mail->send();
                         $data['message'] = 'success';
                        return view("checkout", $data);
                    }
                    else {
                        $data['message'] = 'fail';
                        echo view("checkout", $data);
                    }
                }

            }
                
        }
        else{echo view("checkout");}
    }
}
