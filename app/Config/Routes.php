<?php

namespace App\Controllers;

use App\Models\ProsesProjectModel;
use CodeIgniter\Controller;

class FormController extends Controller
{
    public function submitForm()
    {
        // Ambil nilai dari permintaan POST
        $project_id = $this->request->getPost('project_id');
        $data = [
            'Konsep_Design' => $this->request->getPost('Konsep_Design') ? 1 : 0,
            'Material_Preparation' => $this->request->getPost('Material_Preparation') ? 1 : 0,
            'Machining' => $this->request->getPost('Machining') ? 1 : 0,
            'Assy' => $this->request->getPost('Assy') ? 1 : 0,
            'TrialImprove' => $this->request->getPost('TrialImprove') ? 1 : 0,
            'Delivery' => $this->request->getPost('Delivery') ? 1 : 0,
            'Keuangan' => $this->request->getPost('Keuangan') ? 1 : 0
        ];

        // Debugging: Tampilkan data yang diterima
        log_message('info', 'Data yang diterima: ' . json_encode($data));

        // Inisialisasi model
        $prosesProjectModel = new ProsesProjectModel();

        // Lakukan operasi UPDATE ke database
        if ($prosesProjectModel->updateProsesProject($project_id, $data)) {
            log_message('info', 'Update berhasil');
            return redirect()->to('/?page=MyApp/more_project&kode=' . $project_id);
        }
        else {
            log_message('error', 'Update gagal');
            return redirect()->back()->with('status', 'Update gagal');
        }
    }
}


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/login/admin', 'Login::admin');
$routes->post('/login/admin', 'Login::admin');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->post('/save_superadmin', 'SuperAdmin::save');

$routes->post('/', 'FormController::submitForm');

