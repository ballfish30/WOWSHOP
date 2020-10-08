<?php

class BackendController extends Controller
{
    public function index()
    {
        $smarty = $this->smarty();
        return $smarty->display('Backend/index.html');
    }

    //角色
    public function roles()
    {
        $smarty = $this->smarty();
        $roles = $this->model('Role')->selectAll();
        $permissionRole = $this->model('PermissionRole');
        $permission = $this->model('Permissions');
        $itemlist = array();
        foreach ($roles as $role) {
            $items = array();
            array_push($items, $role);
            $item = array();
            foreach ($permissionRole->selectRoleId($role['id']) as $permissionRoles) {
                foreach ($permission->selectPerId($permissionRoles['perId']) as $permissions) {
                    array_push($item, $permissions);
                }
            }
            array_push($items, $item);
            array_push($itemlist, $items);
            $items = array();
        }
        $smarty->assign('itemlist', $itemlist);
        return $smarty->display('Backend/roles.html');
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
    public function roleUpdate($roleId = null)
    {
        $smarty = $this->smarty();
        $role = $this->model('Role');
        $permissions = $this->model('Permissions');
        $permissionRole = $this->model('PermissionRole');
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $smarty->assign('role', $role->select($roleId));
            $smarty->assign('permissions', $permissions->selectAll());
            $smarty->assign('permissionRole', $permissionRole->selectRoleId($roleId));
            return $smarty->display('Backend/roleUpdate.html');
        }
        //POST
    }

    //調整角色
    public function rolechange($userRoleId)
    {

    }

    //類別列表
    public function categorys()
    {
        $smarty = $this->smarty();
        $caregory = $this->model('Category');
        $smarty->assign('categorys', $caregory->selectAll());
        return $smarty->display('Backend/categorys.html');
    }

    //新增類別
    public function categoryCreate()
    {
        $smarty = $this->smarty();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $smarty->display('Backend/categoryCreate.html');
        }
        //POST
        $image = $_FILES["fileToUpload"]["tmp_name"];
        $image = base64_encode(file_get_contents(addslashes($image)));
        $category = $this->model('Category');
        $data['name'] = $_POST['name'];
        $data['icon'] = $image;
        $category->add($data);
        return $smarty->display('Backend/index.html');
    }

    //修改類別
    public function categoryUpdate()
    {

    }

    //刪除類別
    public function categoryDelete()
    {

    }

    //類別細項列表
    public function secondCategory()
    {
        $smarty = $this->smarty();
        $categorys = $this->model('Category')->selectAll();
        $secondCategorys = $this->model('SecondCategory');
        $itemlist = array();
        $items = array();
        foreach ($categorys as $category) {
            array_push($items, $category);
            foreach ($secondCategorys->selectcategoryId($category['id']) as $secondCategory) {
                array_push($items, $secondCategory);
            }
            array_push($itemlist, $items);
            $items = array();
        }
        $smarty->assign('itemlist', $itemlist);
        return $smarty->display('Backend/secondCategorys.html');
    }

    //新增類別細項
    public function secondCategoryCreate()
    {
        $smarty = $this->smarty();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $smarty->assign('categorys', $this->model('Category')->selectAll());
            return $smarty->display('Backend/secondCategoryCreate.html');
        }
        //POST
        $secondCategory = $this->model('SecondCategory');
        $data['name'] = $_POST['name'];
        $data['categoryId'] = $_POST['category'];
        $secondCategory->add($data);
        return $smarty->display('Backend/index.html');
    }

    //回傳類別細項
    public function secondCategorys()
    {
        $secondCategorys = $this->model('SecondCategory');
        //json編碼
        echo json_encode($secondCategorys->selectcategoryId($_POST['categoryId']), JSON_UNESCAPED_UNICODE);
    }

    //修改類別細項
    public function secondCategoryUpdate()
    {

    }

    //刪除類別細項
    public function secondCategoryDelete()
    {

    }

    //商品
    public function products()
    {
        $smarty = $this->smarty();
        $product = $this->model('Product');
        $smarty->assign('products', $product->selectAll());
        return $smarty->display('Backend/products.html');
    }

    //新增商品
    public function productCreate()
    {
        $smarty = $this->smarty();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $smarty->assign('categorys', $this->model('Category')->selectAll());
            return $smarty->display('Backend/productCreate.html');
        }
        //POST
        $product = $this->model('Product');
        $image = $_FILES["fileToUpload"]["tmp_name"];
        $image = base64_encode(file_get_contents(addslashes($image)));
        $data['name'] = $_POST['name'];
        $data['introduction'] = $_POST['introduction'];
        $data['img'] = $image;
        $data['price'] = $_POST['price'];
        $data['invetory'] = $_POST['invetory'];
        $data['quality'] = $_POST['quality'];
        $data['itemLevel'] = $_POST['itemLevel'];
        $data['secondCategoryId'] = $_POST['secondCategory'];
        $product->add($data);
        return $smarty->display('Backend/index.html');
    }

}
