<?php namespace App\Controllers;
use Bcrypt\Bcrypt;
use App\Models\Mdl_production;
class Home extends BaseController
{
	public function __construct()
	{
		//Do your magic here
	}
	public function index()
	{
		$data['title'] = "Judul";
		$log_status = session()->get('logged_in');
		if ($log_status==TRUE) {
			$data['log_button'] = "<li class='nav-item'><a class='nav-link js-scroll-trigger' href='".site_url('siswa')."'>Dashboard</a></li>";
		}else{
			$data['log_button'] = "<li class='nav-item'><a class='nav-link js-scroll-trigger' href='".site_url('login')."'>Login</a></li>";
		}
		echo view('home\hompagelayout\header', $data);
	}
	public function login(){
		helper(['form']);
		echo view('home\login\login');
	}
	public function logadmin(){
		helper(['form']);
		echo view('home\login\loginadmin');
	}
	public function logguru(){
		helper(['form']);
		echo view('home\login\loginguru');
	}

	function log($user = null){
		helper(['form', 'url']);
		$model = new \App\Models\Mdl_login();
		if (!$this->validate([
			'nomor_induk' => [
				'label'  => 'nomor induk',
				'rules'  => 'required|max_length[30]'
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required|max_length[30]'
			]
			])) {
				header('HTTP/1.1 500 Internal Server Error');
				header('Content-Type: application/json; charset=UTF-8');
				die(json_encode(array('message' => 'ERROR VALIDATION', 'code' => 1337)));

			}else{
				$nomor_induk = $this->request->getPost('nomor_induk');
				$password = $this->request->getPost('password');
				if ($user == 'guru') {
					// guru
					$log_status = $model->login_guru($nomor_induk, $password);
					if ($log_status === TRUE) {
						header('HTTP/1.1 200 OK');
					}else{
						header('HTTP/1.1 500 Internal Server Error');
						header('Content-Type: application/json; charset=UTF-8');
						die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
					}
				}elseif ($user == 'admin') {
					//admin
					$log_status = $model->login_admin($nomor_induk, $password);
					if ($log_status === TRUE) {
						header('HTTP/1.1 200 OK');
					}else{
						header('HTTP/1.1 500 Internal Server Error');
						header('Content-Type: application/json; charset=UTF-8');
						die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
					}
				}else{
					//siswa
					$log_status = $model->login_siswa($nomor_induk, $password);
					if ($log_status === TRUE) {
						header('HTTP/1.1 200 OK');
					}else{
						header('HTTP/1.1 500 Internal Server Error');
						header('Content-Type: application/json; charset=UTF-8');
						die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
					}
				}
			}
		}
		//----------SISWA---------------------------------
		public function siswa(){
			$data['title'] = "Siswa";
			$data['content'] = view('siswa/content/dashboard');
			echo view('siswa/page/dashboard', $data);
			return $this->_make_sure_is_siswa();
		}
		function _make_sure_is_siswa(){
			$is_user = session()->get('nomor_induk');
			$log_status = session()->get('logged_in');
			if ($log_status != TRUE) {
				session()->destroy();
				return redirect()->to(site_url());
			}
		}
		function logout($user = null){
			session()->destroy();
			if ($user == 'guru') {
				return redirect()->to(site_url('logguru'));
			}elseif ($user == 'admin') {
				return redirect()->to(site_url('logadmin'));
			}else{
				return redirect()->to(site_url());
			}
		}
		//----------SISWA END---------------------------------
	}

	//.../login
	/*
	$bcrypt = new Bcrypt();
	$plaintext = 'password';
	Set the Bcrypt Version, default is '2y'
	$bcrypt_version = '2a';

	$ciphertext = $bcrypt->encrypt($plaintext,$bcrypt_version);
	print_r("\n Plaintext:".$plaintext);
	print_r("\n Ciphertext:".$ciphertext);

	//Verify the plaintext and ciphertext
	if($bcrypt->verify($plaintext, $ciphertext)){
	print_r("\n Password verified!");
}else{
print_r("\n Password not match!");
}
*/
// public function hh(){
// 	$bcrypt = new Bcrypt();
// 	$plaintext = 'password';
// 	$id = '123';
// 	// Set the Bcrypt Version, default is '2y'
// 	$bcrypt_version = '2y';
//
// 	$ciphertext = $bcrypt->encrypt($plaintext,$bcrypt_version);
// 	$query = 'insert into login_siswa (nomor_induk, password) values("'.$id.'","'.$ciphertext.'")';
// 	$this->db = db_connect();
// 	$this->db->query($query);
// 	if($bcrypt->verify($plaintext, $ciphertext)){
// 		print_r("\n Password verified!");
// 	}else{
// 		print_r("\n Password not match!");
// 	}
// }
// public function check_session(){
// 	echo session()->get('nomor_induk');
// 	echo session()->get('logged_in');
// }
