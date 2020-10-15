<?php

class App
{

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $url = $this->parseUrl();
        $controllerName = "{$url[0]}Controller";
        if (!file_exists("controllers/$controllerName.php"))
            return;
        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        $methodName = isset($url[1]) ? $url[1] : "index";
        //smarty
        if (!method_exists($controller, $methodName))
            return;
        unset($url[0]);
        unset($url[1]);
        $params = $url ? array_values($url) : array();
        require_once 'class/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = 'views';
        $smarty->compile_dir = 'views/';
        $smarty->config_dir = 'demo/configs/';
        $smarty->cache_dir = 'demo/cache/';
        $smarty->error_reporting = "E_ERROR || E_WARNING";
        if ($methodName != 'login' and $methodName != 'register' and $methodName != 'admin' and $methodName != 'test') {
            //判斷是否登入
            if (!isset($_COOKIE['userId'])){
                $smarty->assign('message', '請登入帳號');
                return $smarty->display('user/login.html');
            }else{
                //驗證登入資訊
                $userId = $_COOKIE['userId'];
                $accountName = $_COOKIE['accountName'];
                $user = $this->model('User');
                if (!password_verify($user->selectAccountName($accountName)['id'], $userId)){
                    return $smarty->display('user/login.html');
                }
                // var_dump($user->selectPermissionUserId($user->selectAccountName($accountName)['id']));
            }
        }
        call_user_func_array(array($controller, $methodName), $params);
    }

    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        }
    }

    public function model($model)
    {
        require_once "models/$model.php";
        return new $model();
    }
}
