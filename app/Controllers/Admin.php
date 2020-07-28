<?php namespace App\Controllers;
class Admin extends BaseController{
	public function index(){

	}
	public function hh(){
		$model = new \App\Models\Mdl_production();
		echo "bisa kok ";
		echo $model->coba();

	}
	//----------ADMIN---------------------
	public function admin(){
		$data['title'] = "Admin";
		$data['page_name'] = "DASHBOARD";
		$model = new \App\Models\Mdl_admin();
		$data['nama'] = $model->get_nama();
		$data['content'] = view('admin/content/dashboard', $data);
		echo view('admin/page/dashboard', $data);
		return $this->_make_sure_is_admin();
	}
	public function staff(){
		$data['title'] = "Admin - STAFF";
		$data['page_name'] = "STAFF";
		$model = new \App\Models\Mdl_admin();
		$data['nama'] = $model->get_nama();
		//code di sini

		//code end
		$data['content'] = view('admin/content/staff',$data);
		echo view('admin/page/dashboard', $data);
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
		$data['content'] = view('guru/content/dashboard');
		echo view('guru/page/dashboard', $data);
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
