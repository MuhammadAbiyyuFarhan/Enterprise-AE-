<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkerModel extends Model
{
    protected $table = 'worker';
    protected $primaryKey = 'worker_id';
    protected $allowedFields = ['nama','salary','jumlah_project'];

    function getData($where = false)
    {
        // $relTable1 = 'product';
        // $relTable2 = 'worker';
        
        $builder = $this->db->table($this->table);

        if ($where) $builder = $builder->where($where);

        // $builder->join($relTable1, $relTable1.'.product_id = '.$this->table.'.product_id');
        // $builder->join($relTable2, $relTable2.'.worker_id = '.$this->table.'.worker_id');
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
}