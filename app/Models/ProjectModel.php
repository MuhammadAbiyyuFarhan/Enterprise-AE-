<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'project_id';
    protected $allowedFields = ['pemesanan','no_order','product_id','worker_id','deadline','status'];

    function getData($where = false)
    {
        $relTable1 = 'product';
        $relTable2 = 'worker';
        
        $builder = $this->db->table($this->table);

        if ($where) $builder = $builder->where($where);

        $builder->join($relTable1, $relTable1.'.product_id = '.$this->table.'.product_id');
        $builder->join($relTable2, $relTable2.'.worker_id = '.$this->table.'.worker_id');
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
    // public function preview($id)
	// {
	// 	$builder = $this->db->table($this->table);
	// 	$data['project'] = $builder->where('project_id', $id)->first();
		
	// 	if(!$data['project']){
	// 		throw PageNotFoundException::forPageNotFound();
	// 	}
	// 	echo view('more_project', $data);
    // }

    //--------------------------------------------------------------------------
    
    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['pemesan' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $builder = $this->db->table($this->table);
            $builder->insert([
                "pemesan" => $this->request->getPost('pemesan'),
                "no_order" => $this->request->getPost('no_order'),
                "product_id" => $this->request->getPost('product_id'),
                "worker_id" => $this->request->getPost('worker_id'),
                "deadline" => $this->request->getPost('deadline'),
                "status" => url_title($this->request->getPost('status'), '-', TRUE)
            ]);
        }
    }

    //--------------------------------------------------------------------------

    // public function edit($id)
    // {
    //     // ambil artikel yang akan diedit
    //     $news = new NewsModel();
    //     $data['news'] = $news->where('id', $id)->first();
        
    //     // lakukan validasi data artikel
    //     $validation =  \Config\Services::validation();
    //     $validation->setRules([
    //         'id' => 'required',
    //         'title' => 'required'
    //     ]);
    //     $isDataValid = $validation->withRequest($this->request)->run();
    //     // jika data vlid, maka simpan ke database
    //     if($isDataValid){
    //         $news->update($id, [
    //             "title" => $this->request->getPost('title'),
    //             "content" => $this->request->getPost('content'),
    //             "status" => $this->request->getPost('status')
    //         ]);
    //         return redirect('admin/news');
    //     }

    //     // tampilkan form edit
    //     echo view('admin_edit_news', $data);
    // }

    // //--------------------------------------------------------------------------

	// public function delete($id){
    //     $news = new NewsModel();
    //     $news->delete($id);
    //     return redirect('admin/news');
    // }
}
