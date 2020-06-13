<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo base_url();
		return view('welcome_message');
	}
	public function hh(){
		echo "bisa";
	}

	//--------------------------------------------------------------------

}
