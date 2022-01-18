<?php namespace App\Models;

use CodeIgniter\Model;

class invoiceDetailModel extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','order_id','product_id','total_price','product_amount'];
     public function getInvoiceDetailByID(int $id)
    {
        return $this->findAll($id);
    }
    public function getproduct_amount(int $product_id, int $order_id)
    {
        return $this->where('product_id', $product_id)->where('order_id', $order_id)->findAll();
    }
}