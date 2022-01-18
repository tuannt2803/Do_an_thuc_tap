<?php

namespace App\Models;

use CodeIgniter\Model;

class ordersModel extends Model
{
    // protected $DBGroup = 'gear16';
    protected $table      = 'orders';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
     protected $allowedFields = ['id', 'user_id', 'fullname', 'phone', 'email', 'paid_status', 'note', 'create_on', 'status', 'shipping_status', 'bill_address', 'payments'];
    // protected $createField = '';
    // protected $updatedField = '';
    public function getAll()
    {
        return $this->findAll();
    }
}
