<?php
namespace admin\app\controller;

use admin\app\controller\Controller;
use admin\app\model\Role;

class RoleController extends Controller
{
    protected $roleModel;
    public function __construct()
    {
        parent::__construct();
        $this->roleModel = new Role();
    }

    public function index()
    {
        $listRoles = $this->roleModel->getDataRoleByPaging();
        // print_r($listRoles);
        // die();
    //vao model viet ham get...lay het du lieu alldata roi do du lieu ra ngoai view
        $header = ['title' => 'role page'];
        $this->loadHeader($header);
         $this->loadView('roles/index_view',['roles' => $listRoles]);
         
         $this->loadFooter();
    }

    public function create()
    {
        $header = ['title' => 'create role page'];
        $this->loadHeader($header);
        $this->loadView('roles/create_view');
        $this->loadFooter();
    }

    public function store()
    {
        if(isset($_POST['save'])){
            $nameRole    = trim(strip_tags($_POST['name'] ?? ''));
            $description = trim(strip_tags($_POST['description'] ?? ''));
            if(empty($nameRole)){
                $_SESSION['errNameRole'] = 'Vui long nhap ten vai tro';
                return redirect('dashboard','index');
            } else {
                if(isset($_SESSION['errNameRole'])){
                    unset($_SESSION['errNameRole']);
                }
                // luu vao db
                // kiem tra xem du lieu can luu da ton tai trong db chua?
                // neu chua thi luu
                // neu co thi ko cho luu va thong bao loi
                if($this->roleModel->checkExistNameRole($nameRole)){
                    // nguoi dung nhap ten vai tro da co roi
                    return redirect('role','create');
                } else {
                    // chua co ten vai tro trong db
                    $insert = $this->roleModel->insertRole(
                        $nameRole,
                        $description
                    );
                    if($insert){
                        return redirect('role','index');
                    } else{
                    return redirect('role','create');
                    }
                }
            }
        }
    }
    public function edit(){
        $id = $_GET['id'] ?? null;
        $id = is_numeric($id) ? $id : 0;
        $info  = $this->roleModel->getDataRoleById($id);
        // print_r($info);
        // load view edit
        //view edit giong nhu view create
        //thuc hien update
    }
    public function update(){
        
    }
}