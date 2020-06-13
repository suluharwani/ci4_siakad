<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('admin/admin');
	}
	public function hh(){
		echo "bisa";
	}

	//--------------------------------------------------------------------

}
