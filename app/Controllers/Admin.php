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
	//----------ADMIN---------------------
	public function admin(){
		$data['title'] = "Siswa";
		$data['content'] = view('siswa/content/dashboard');
		echo view('siswa/page/dashboard', $data);
		return $this->_make_sure_is_admin();
	}
	function _make_sure_is_admin(){
		$is_user = session()->get('username_admin_web');
		$log_status = session()->get('logged_in_admin');
		if ($log_status != TRUE) {
			session()->destroy();
			return redirect()->to(site_url('logadmin'));
		}
	}
	//----------ADMIN END---------------------
	//----------GURU---------------------
	public function guru(){
		$data['title'] = "Siswa";
		$data['content'] = view('siswa/content/dashboard');
		echo view('siswa/page/dashboard', $data);
		return $this->_make_sure_is_guru();
	}
	function _make_sure_is_guru(){
		$is_user = session()->get('nomor_induk_guru');
		$log_status = session()->get('logged_in_guru');
		if ($log_status != TRUE) {
			session()->destroy();
			return redirect()->to(site_url('logguru'));
		}
	}
	//----------GURU END---------------------


	//--------------------------------------------------------------------

}
