<?php

class BackendController extends Controller
{
    public function index()
    {
        $smarty = $this->smarty();
        return $smarty->display('Backend/index.html');
    }

    //新增角色同時賦予權限
    public function roleCreate()
    {
        $smarty = $this->smarty();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $smarty->assign('permissions', $this->model('Permissions')->selectAll());
            return $smarty->display('Backend/roleCreate.html');
        }
        //POST
        $permissions = $_POST['permissions'];
        $role = $this->model('Role');
        $permissionRole = $this->model('permissionRole');
        $data['name'] = $_POST['name'];
        $data['desc'] = $_POST['desc'];
        $role->add($data);
        $roleId = $role->selectName($_POST['name'])['id'];
        $data = [];
        foreach ($permissions as $i) {
            $data['perId'] = $i;
            $data['roleId'] = $roleId;
            $permissionRole->add($data);
        }
        return $smarty->display('Backend/index.html');
    }

    //修改角色並調整權限
    public function roleUpdate($roleId)
    {
        $smarty = $this->smarty();
        $role = $this->model('Role');
        $permissions = $this->model('Permissions');
        $permissionRole = $this->model('PermissionRole');
        var_dump($permissionRole->selectRoleId($roleId));
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $smarty->assign('role', $role->select($roleId));
            $smarty->assign('permissions', $permissions->selectAll());
            $smarty->assign('permissionRole', $permissionRole->selectRoleId($roleId));
            return $smarty->display('Backend/roleUpdate.html');
        }
        //POST
    }

    //調整角色
    public function rolechange()
    {

    }

}
