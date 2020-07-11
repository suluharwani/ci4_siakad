<?php namespace App\Controllers;
class Admin extends BaseController{
	public function index(){
		$this->_make_sure_is_admin();
		echo base_url();
		echo date("h:i:sa");
		return view('admin/login');
	}
	public function hh(){
		$model = new \App\Models\Mdl_production();
		echo "bisa kok ";
		echo $model->coba();

	}
	public function _make_sure_is_admin(){
		$newdata = [
			'username'  => 'johndoe',
			'email'     => 'johndoe@some-site.com',
			'logged_in' => TRUE
		];
		$session->set($newdata);
		if ($_SESSION['username'] != "johndoe") {
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}
	function logout(){
		$session->sess_destroy();
		redirect('adm','refresh');
	}


	//--------------------------------------------------------------------

}
