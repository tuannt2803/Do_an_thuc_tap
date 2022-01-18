<?php 
namespace App\Controllers;

class Guide extends BaseController
{
	public function index()
	{
		 echo view("guide");
	}
}
?>