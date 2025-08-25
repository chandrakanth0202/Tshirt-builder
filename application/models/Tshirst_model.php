<?php
namespace App\Models;
use CodeIgniter\Model;

class TshirtModel extends Model {
    protected $DBGroup = 'default';

    public function colors()  { return $this->db->table('tshirt_colors')->get()->getResultArray(); }
    public function designs() { return $this->db->table('tshirt_designs')->get()->getResultArray(); }
    public function fonts()   { return $this->db->table('tshirt_fonts')->get()->getResultArray(); }

    public function findColor($id){ return $this->db->table('tshirt_colors')->where('id',$id)->get()->getRowArray(); }
    public function findDesign($id){ return $this->db->table('tshirt_designs')->where('id',$id)->get()->getRowArray(); }
    public function findFont($id){ return $this->db->table('tshirt_fonts')->where('id',$id)->get()->getRowArray(); }
}
