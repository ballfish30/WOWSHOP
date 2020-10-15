<?php

class PopulateController extends Controller
{
    public function admin()
    {
        $user = $this->model('User');
        $role = $this->model('Role');
        $permission = $this->model('Permissions');
        $roleUser = $this->model('RoleUser');
        $permissionRole = $this->model('PermissionRole');

        //add admin user
        $data['accountName'] = 'admin';
        $data['userName'] = 'admin';
        $data['passwd'] = password_hash('admin', PASSWORD_DEFAULT);
        $data['phone'] = '0123456789';
        $data['email'] = 'abc@efg';
        $user->add($data);
        $data = [];

        //add role
        $data['name'] = '超級管理員';
        $data['desc'] = '超級管理員';
        $role->add($data);
        $data = [];

        //add permission
        $datas = [
            ['檢視權限', '檢視權限'],
            ['給予權限', '給予權限'],
            ['新增職位', '新增職位'],
            ['修改職位', '修改職位'],
            ['新增管理', '新增管理'],
            ['修改管理', '修改管理'],
            ['刪除權限', '刪除權限'],
            ['新增商品', '新增商品'],
            ['修改商品', '修改商品'],
            ['刪除商品', '刪除商品'],
            ['檢視類別', '檢視類別'],
            ['新增類別', '新增類別'],
            ['修改類別', '修改類別'],
            ['刪除類別', '刪除類別'],
            ['檢視會員', '檢視會員'],
            ['啟用與停用會員', '啟用與停用會員'],
            ['新增類別細項', '新增類別細項'],
            ['修改類別細項', '修改類別細項'],
            ['刪除類別細項', '刪除類別細項'],
            ['檢視訂單', '檢視訂單'],
            ['修改訂單', '修改訂單'],
            ['刪除訂單', '刪除訂單'],
            ['後台權限', '後台權限']
        ];
        //create permission
        foreach ($datas as $i) {
            $data['name'] = $i[0];
            $data['desc'] = $i[1];
            var_dump($data);
            $permission->add($data);
        }
        $data = [];

        //add roleUser
        $data['userId'] = $user->selectAccountName('admin')['id'];
        $data['roleId'] = $role->selectName('超級管理員')['id'];
        $roleUser->add($data);
        $data = [];

        //add permissionRole
        $roleId = $role->selectName('超級管理員')['id'];
        $permissions = $permission->selectAll();
        foreach($permissions as $i){
            $data['perId'] = $i['id'];
            $data['roleId'] = $roleId;
            $permissionRole->add($data);
        }
    }
}
