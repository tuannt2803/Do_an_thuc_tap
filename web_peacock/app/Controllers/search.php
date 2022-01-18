<?php

namespace App\Controllers;

use App\Models\productModel;

class search extends BaseController
{
    public function index()
    {
        /*$key = '';
        if (isset($_GET['key'])) {
            $key = $_GET['key'];
        }*/
        $key = $this->request->getVar('key');
        // echo $key;
        $productModel = new productModel();
        $products = $productModel->getProductByKey($key);
        $data['products'] = $products;
        echo view('category', $data);
    }
}
