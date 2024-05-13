<?php

namespace App\Controllers;

class SuperAdmin extends BaseController
{
    protected $helpers = ['form'];

    public function save(): string
    {
        helper('text');

        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                    ]
                ],
            'password' => [
                'rules' => 'required',
                'errors' => [ 
                    'required' => 'Password harus diisi'
                    ]
                ]
        ])){

            return redirect()->back()->withInput();
        };

        $save = $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'id_role' => $this->request->getPost('id_role'),
        ]);

        if ($save) {
            $feedback['add_superadmin'] =  "<script>
                Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                window.location = 'index.php?page=MyApp/data_superadmin';
                }
                })</script>";
        }else{
            $feedback['add_superadmin'] = "<script>
                Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                window.location = 'index.php?page=MyApp/add_superadmin';
                }
                })</script>";
        }

        return view('?page=MyApp/data_superadmin', $feedback);
    }
}