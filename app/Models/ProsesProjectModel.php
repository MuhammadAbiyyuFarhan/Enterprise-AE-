<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesProjectModel extends Model
{
    protected $table = 'proses_project';
    protected $primaryKey = 'proses_project_id';
    protected $allowedFields = [
        'project_id',
        'nama_proses',
        'waktu',
        'status',
        'progress',
        'Konsep_Design',
        'Material_Preparation',
        'Machining',
        'Assy',
        'TrialImprove',
        'Delivery',
        'Keuangan'
    ];

    function getData($where = false)
    {
        $relTable1 = 'project';
        
        $builder = $this->db->table($this->table);

        if ($where) $builder = $builder->where($where);

        $builder->join($relTable1, $relTable1.'.project_id = '.$this->table.'.project_id');
        
        $query = $builder->get()->getResult();

        return $query;
    }

    public function getCount($where = false)
    {
        $builder = $this->db->table($this->table);

        if ($where) $builder = $builder->where($where);
        
        $query = $builder->countAllResults();

        return $query;
    }

    public function updateProsesProject($project_id, $data)
    {
        return $this->where('project_id', $project_id)->set($data)->update();
    }
}
