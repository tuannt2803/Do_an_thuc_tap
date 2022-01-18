<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\productModel;

class report extends BaseController
{
	public function index()
	{
		session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }
        $db = db_connect();
        $sql = 'select a.id, a.fullname, a.phone ,a.email,a.bill_address ,a.create_on, c.name, b.product_amount, b.total_price from orders a, order_detail b, product c where a.paid_status = 1 and a.id = b.order_id and b.product_id = c.product_id';
        $detail = $db->query($sql)->getResult('array');
        $data['revenue'] = $detail;
        // var_dump($data);
        // die();
        if($_SESSION['user']['role_id'] == 1){
            $data['message'] = 'success' ;
        } else {
            $data['message'] = 'fail';
        }
        $data['title'] = 'Doanh thu';
        echo view('admin/report/revenue', $data);
		
	}

	public function selling()
	{
		session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }
        $db = db_connect();
        $sql = 'SELECT c.name, SUM(b.product_amount) as product_amount, c.price  from orders a, order_detail b, product c WHERE a.paid_status = 1 AND a.id = b.order_id and b.product_id = c.product_id GROUP BY c.name ORDER BY product_amount DESC ';
        $detail = $db->query($sql)->getResult('array');
        $data['selling'] = $detail;
        // var_dump($data);
        // die();
        if($_SESSION['user']['role_id'] == 1){
            $data['message'] = 'success' ;
        } else {
            $data['message'] = 'fail';
        }
        $data['title'] = 'Doanh thu';
        echo view('admin/report/selling', $data);
	}
	
	public function inventory()
	{

		session_start();
        if (empty($_SESSION['user'])) {
            return redirect()->to(base_url() . '/admin/login');
        }

        $db = db_connect();
        $sql = 'SELECT product_id, category_id, name, price, quantity,supplier_id, totalView  FROM product WHERE quantity > 0';
        $detail = $db->query($sql)->getResult('array');
        $data['inventory'] = $detail;
        // var_dump($data);
        // die();
        if($_SESSION['user']['role_id'] == 1){
            $data['message'] = 'success' ;
        } else {
            $data['message'] = 'fail';
        }
        $data['title'] = 'Doanh thu';
        echo view('admin/report/inventory', $data);
	}
	
}
