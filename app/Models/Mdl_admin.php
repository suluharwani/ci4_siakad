<?php namespace App\Models;

use CodeIgniter\Model;

class Mdl_admin extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->db = db_connect();
  }
  public function get_nama(){
    $adm = session()->get('username_admin_web');
    $data = $this->db->table('admin')->getWhere(['username'=>$adm],1)->getRow();
    if (isset($data)) {
      return $data->nama;
    }else {
      return null;
    }
  }
}
