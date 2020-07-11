<?php namespace App\Controllers;
use App\Models\Mdl_production;
class Home extends BaseController
{
	public function __construct()
	{
		//Do your magic here
	}
	public function index()
	{
		echo view('home\hompagelayout\header');
	}
	public function login(){
		echo view('home\login\login');
	}
	public function hh(){
		$model = new Mdl_production();
		print_r($model->coba()->getResult());
		echo "bisa";
	}

	//--------------------------------------------------------------------

}
