<?php namespace App\Controllers;

class Coba extends BaseController
{
	public function index()
	{
		echo base_url();
		echo date("h:i:sa");
		return view('welcome_message');
	}
	public function hh(){
		$model = new \App\Models\Mdl_production();
		echo "bisa kok ";
		echo $model->coba();

	}


	//--------------------------------------------------------------------

}
