<?php

namespace App\Models;
use CodeIgniter\Model;

class PortoModel extends Model
{
    // protected $table = 'tb_edu';

    public function getEdu()
    {
         return $this->db->table('tb_edu')
                         ->orderBy('edu_id', 'DESC')
                         ->get()->getResultArray();  
    }

    public function getExp()
    {
         return $this->db->table('tb_exp')
                         ->orderBy('exp_id', 'ASC')
                         ->get()->getResultArray();  
    }
}