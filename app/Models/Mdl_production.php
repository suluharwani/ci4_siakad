<?php namespace App\Models;

use CodeIgniter\Model;

class Mdl_production extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->db = db_connect();
  }
  public function coba(){
    return $this->db->table('admin')->get();
  }
}
