<?php namespace App\Models;

use CodeIgniter\Model;

class invoiceModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
   protected $allowedFields = ['id','user_id','fullname','phone','paid_status','note','create_on', 'status', 'shipping_status','bill_address', 'payments'];
   public function getInvoiceById(int $id)
    {
        return $this->find($id);
    }
}