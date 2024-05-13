<?php

namespace App\Controllers;

use App\Models\UsersModel;
// use App\Models\RolesModel;
use App\Models\ProjectModel;
use App\Models\ProsesProjectModel;
use App\Models\WorkerModel; 
use App\Models\QCModel;
use App\Models\MaintenanceModel;

class Home extends BaseController
{
    protected $usersModel;
    // protected $rolesModel;
    protected $projectModel;
    protected $prosesprojectModel;
    protected $workerModel;
    protected $qcModel;
    protected $maintenanceModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        // $this->rolesModel = new RolesModel();
        $this->projectModel = new ProjectModel();
        $this->prosesprojectModel = new ProsesProjectModel();
        $this->workerModel = new WorkerModel();
        $this->qcModel = new QCModel();
        $this->maintenanceModel = new MaintenanceModel();
    }

    public function index(): string
    {
        $session = session();

        if (!$session->username){
            
            return view('member');
        };

        $where_superuser = ['id_role' => 1];
        $data['superuser'] = $this->usersModel->getCount($where_superuser);
        
        $where_user = ['id_role' => 2];
        $data['user'] = $this->usersModel->getCount($where_user);
        
        $data['projects'] = $this->projectModel->getData();
        $data['allorder'] = $this->projectModel->getCount();

        $data['proses_projects'] = $this->prosesprojectModel->getData();

        $where_onprogress = ['status' => 'On-progres'];
        $data['onprogress'] = $this->projectModel->getCount( $where_onprogress);
        
        $where_done = ['status' => 'Done'];
        $data['done'] = $this->projectModel->getCount($where_done);

        $where_delay = ['status' => 'Delay'];
        $data['delay'] = $this->projectModel->getCount($where_delay);

        $where_hold = ['status' => 'Hold'];
        $data['hold'] = $this->projectModel->getCount($where_hold);

        $where_cancel = ['status' => 'Cancel'];
        $data['cancel'] = $this->projectModel->getCount($where_cancel);

        $data['workers'] = $this->workerModel->getData();
        $data['qcs'] = $this->qcModel->getData();
        $data['maintenance'] = $this->maintenanceModel->getData();

        $where_superadmin = ['id_role' => 1];
        $data['superadmins'] = $this->usersModel->getData($where_superadmin);

        $where_admin = ['id_role' => 2];
        $data['admins'] = $this->usersModel->getData($where_admin);
        


        // dd($data);

        return view('index', $data);
    }
}
