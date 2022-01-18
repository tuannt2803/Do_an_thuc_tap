<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class dashboard extends BaseController
{
    public function index()
    {
        session_start();

        // if(empty($_SESSION['user'])){
        //     return redirect()->to(base_url().'/admin/login');
        // }
        // if($_SESSION['user']['role_id'] == 1){
        //     $data['message'] = 'success' ;
        // } else {
        //     $data['message'] = 'fail';
        // }
        $data['title'] = 'Trang chủ';
        echo view('admin/dashboard', $data);

        //--------------------------------------------------------------------
    }
}
