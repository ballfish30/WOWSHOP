<?php

class Controller
{
    public $dbhost = 'localhost';
    public $dbuser = 'root';
    public $dbpass = 'root';
    public $dbname = 'WOWShop';
    private $key = '123456789';
    private $en_method = 'AES-256-ECB';

    public function __construct()
    {
        require_once 'class/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = 'views';
        $smarty->compile_dir = 'views/';
        $smarty->config_dir = 'demo/configs/';
        $smarty->cache_dir = 'demo/cache/';
        $smarty->error_reporting = "E_ERROR || E_WARNING";
        //判斷是否有登入
        // if (!isset($_COOKIE['userId'])) {
        //     return $smarty->display('user/login.html');
        // } else {
        //     //驗證登入
        //     if (!password_verify($passwd, $user['passwd'])) {

        //     }

        // }
        if (isset($_COOKIE['userId']) and empty($this->model('Order')->selectOrder($_COOKIE['userId']))) {
            $order = $this->model('Order');
            $accountName = $_COOKIE['accountName'];
            $user = $this->model('User')->selectAccountName($accountName);
            if (empty($order->selectOrder($user['id'])) === true) {
                $data['userId'] = $user['id'];
                $data['orderStatus'] = '未處理';
                $data['paymentStatus'] = '未付款';
                $data['paymentType'] = '信用卡';
                $order->add($data);
                $this->setCookie('orderId', $order->selectOrder($user['id'])['0']['id']);
            } else {
                $this->setCookie('orderId', $order->selectOrder($user['id'])['0']['id']);
            }
        }
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function model($model)
    {
        require_once "models/$model.php";
        return new $model();
    }

    public function smarty()
    {
        require_once 'class/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = 'views';
        $smarty->compile_dir = 'views/';
        $smarty->config_dir = 'demo/configs/';
        $smarty->cache_dir = 'demo/cache/';
        $smarty->error_reporting = "E_ERROR || E_WARNING";
        return $smarty;
    }

    public function getCookie($name)
    {
        return openssl_decrypt($_COOKIE["$name"], $this->en_method, $this->key);
    }

    public function setCookie($name, $data)
    {
        setcookie("$name", "$data", time() + 60 * 60 * 24 * 7, '/');
    }

    public function delCookie($name)
    {
        setcookie("$name", "", time() - 60 * 60 * 24 * 7, '/');
    }

    public function hashSSID($UserId)
    {
        return hash('sha256', "$UserId");
    }

    public function loginStatus()
    {
        if (isset($_COOKIE['userId'])) {
            return true;
        } else {
            return false;
        }
    }

    //判斷權限
    public function permissionCheck($permission=null){
        $user = $this->model('User');
        $accountName = $_COOKIE['accountName'];
        $permissions = array_column($user->selectPermissionUserId($user->selectAccountName($accountName)['id']), 'name');

        if (in_array('後台權限', $permissions) and in_array($permission, $permissions)){
            return true;
        }
        return false;
    }

}
