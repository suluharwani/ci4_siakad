<?php namespace App\Models;
use Bcrypt\Bcrypt;
use CodeIgniter\Model;

class Mdl_login extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->db = db_connect();
  }
  public function coba(){
    return $this->db->table('admin')->get();
  }
  public function login_siswa($nomor_induk, $password){
    $query = $this->db->table('login_siswa')->getWhere(['nomor_induk'=>$nomor_induk]);
    if (count($query->getResult())<1) {
      return FALSE;
    }else {
      foreach ($query->getResult() as $value) {
        $stored_hash = $value->password;
        $nomor_induk = $value->nomor_induk;
      }
      $bcrypt = new Bcrypt();
      if ($bcrypt->verify($password, $stored_hash)) {
        // session()->destroy();
        $newdata = [
          'nomor_induk'  => $nomor_induk,
          'logged_in' => TRUE
        ];
        session()->set($newdata);
        return TRUE;
      }else {
        return FALSE;
      }
    }
  }
  public function login_guru($nomor_induk, $password){
    $query = $this->db->table('guru')->getWhere(['nomor_induk'=>$nomor_induk]);
    if (count($query->getResult())<1) {
      return FALSE;
    }else {
      foreach ($query->getResult() as $value) {
        $stored_hash = $value->password;
        $nomor_induk = $value->nomor_induk;
      }
      $bcrypt = new Bcrypt();
      if ($bcrypt->verify($password, $stored_hash)) {

        $newdata = [
          'nomor_induk_guru'  => $nomor_induk,
          'logged_in_guru' => TRUE
        ];
        session()->set($newdata);
        return TRUE;
      }else {
        return FALSE;
      }
    }
  }
  public function login_admin($nomor_induk, $password){
    $query = $this->db->table('admin')->getWhere(['username'=>$nomor_induk]);
    if (count($query->getResult())<1) {
      return FALSE;
    }else {
      foreach ($query->getResult() as $value) {
        $stored_hash = $value->password;
        $nomor_induk = $value->username;
      }
      $bcrypt = new Bcrypt();
      if ($bcrypt->verify($password, $stored_hash)) {
        // session()->destroy();
        $newdata = [
          'username_admin_web'  => $nomor_induk,
          'logged_in_admin' => TRUE
        ];
        session()->set($newdata);
        return TRUE;
      }else {
        return FALSE;
      }
    }
  }



  //end
}
/*
$this->db->where('username', $username);
$query = $this->db->get('admin_login');
if ($query->num_rows() < 1) {
return false;
}else{
foreach ($query->result() as $value) {
$stored_hash = $value->password;
$id_admin = $value->id_admin;
}
$this->db->where('id', $id_admin);
$adm_data = $this->db->get('admin');
if ($this->bcrypt->check_password($password, $stored_hash)){
$this->session->set_userdata(array('data_admin_login' => $adm_data->result()));
return true;
}
else{
return false;
}
}
*/
