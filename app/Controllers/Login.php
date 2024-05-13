<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\RolesModel;

class Login extends BaseController
{
    protected $usersModel;
    protected $rolesModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->rolesModel = new RolesModel();
    }

    public function index(): string
    {
        return view('member');
    }
    
    public function admin(): string
    {
        
        return view('admin');
    }

    public function auth()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $where = [
            'username' => $username,
        ];

        $data = $this->usersModel->getData($where);

        if($data){
            $data = $data[0];

            $access = 'SuperAdmin';

            $pass = $data->password;
            $role = $data->role;
            $verify = ($password == $pass AND $role == $access);

            if($verify){
                $ses_data = [
                    'id_user'   => $data->id_user,
                    'username'  => $data->username,
                    'password'  => $data->password,
                    'role'      => $data->role
                    //'logged_in' => TRUE
                ];
                $session->set($ses_data);

                $feedback = "<script>
                                Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.value) {
                                        window.location = '".base_url('/')."';
                                    }
                            })</script>";

            }else{
                $feedback = "<script>
                				Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                				}).then((result) => {
                					if (result.value) {
                						location = 'admin';
                				    }
                			})</script>";
            }
        }else{
            $feedback = "<script>
                				Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                				}).then((result) => {
                					if (result.value) {
                						location = 'admin';
                				    }
                			})</script>";
        }
        $ses_data = [
            'flash_massage'   => $feedback
        ];
        $session->set($ses_data);

        return redirect()->to(base_url('login/admin'))->withInput();
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('member');
    }
}
