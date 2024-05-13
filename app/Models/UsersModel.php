<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username','password','id_role'];

    function getData($where = false)
    {
        $relTable = 'roles';
        
        $builder = $this->db->table($this->table);

        foreach ($where as $key => $value){
            $builder->where($this->table.'.'.$key, $value);
        }
        $builder->join($relTable, $relTable.'.id_role = '.$this->table.'.id_role');
        $query = $builder->get()->getResult();

        return $query;
    }

    public function getCount($where)
    {
        $builder = $this->db->table($this->table);
        $builder = $builder->where($where);
        $query = $builder->countAllResults();

        return $query;
    }
}