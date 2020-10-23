<?php

class UserController extends Controller
{

    public function index()
    {
        $smarty = $this->smarty();
        $smarty->assign('login', $this->loginStatus());
        return $smarty->display('user/login.html');
    }

    // 登入
    public function login()
    {
        $smarty = $this->smarty();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $smarty->display('user/login.html');
        }
        // POST
        $accountName = $_POST['accountName'];
        $passwd = $_POST['passwd'];
        $user = $this->model('User')->selectAccountName($accountName);
        // 判斷使用者
        $a = $user->add();
        if ($user === null) {
            $smarty->assign('message', '無使用者');
            return $smarty->display('user/login.html');
        }
        elseif (!$user){
            $smarty->assign('message', '帳號已停用');
            return $smarty->display('user/login.html');
        }
        // 判斷密碼
        elseif (!password_verify($passwd, $user['passwd'])) {
            $smarty->assign('message', '密碼錯誤或帳號已停用');
            return $smarty->display('user/login.html');
        }
        $smarty->assign('userName', $user['userName']);
        $this->setCookie('accountName', $user['accountName']);
        $this->setCookie('username', $user['userName']);
        $this->setCookie('userId', password_hash($user['id'], PASSWORD_DEFAULT));
        $smarty->assign('login', true);
        require_once('BackendController.php');
        $backend = new BackendController();
        return $backend->index();
    }

    // 登出
    public function logout()
    {
        //smarty
        $smarty = $this->smarty();
        $this->delCookie('username');
        $this->delCookie('userId');
        $smarty->assign('message', '已登出');
        $smarty->assign('login', $this->loginStatus());
        return $this->login();
    }

    // 註冊
    public function register()
    {
        //smarty
        $smarty = $this->smarty();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $smarty->display('user/register.html');
        }
        // POST
        if (!preg_match("/^[A-Za-z0-9]+$/", $_POST['accountName'], $matches) or !preg_match("/^[A-Za-z0-9]+$/", $_POST['passwd'], $matches)or !preg_match("/^[A-Za-z0-9]+$/", $_POST['userName'], $matches)){
            $smarty->assign('message', '帳號或密碼與暱稱只可有英文或數字');
            $smarty->assign('login', $this->loginStatus());
            return $smarty->display('user/register.html');
        }
        if (!preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/", $_POST['email'], $matches)){
            $smarty->assign('message', '信箱格式錯誤');
            $smarty->assign('login', $this->loginStatus());
            return $smarty->display('user/register.html');
        }
        if (!preg_match("/^((\+?[0-9]{2,4}\-[0-9]{3,4}\-)|([0-9]{3,4}\-))?( [0-9]{7,8})(\-[0-9]+)?$/", $_POST['phone'], $matches)){
            $smarty->assign('message', '電話格式錯誤');
            $smarty->assign('login', $this->loginStatus());
            return $smarty->display('user/register.html');
        }
        $data['accountName'] = $_POST['accountName'];
        $data['passwd'] = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        $data['userName'] = $_POST['userName'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $user = $this->model('User');
        // 判斷使用者‘
        if ($user->selectAccountName($data['accountName']) != null) {
            $smarty->assign('userName', $data['userName']);
            $smarty->assign('email', $data['email']);
            $smarty->assign('message', '此帳號已註冊');
            $smarty->assign('login', $this->loginStatus());
            return $smarty->display('user/register.html');
        }
        if ($user->add($data)) {
            $smarty->assign('message', '註冊成功，請登入');
            $smarty->assign('login', $this->loginStatus());
            return $this->login();
        } else {
            $smarty->assign('message', '註冊失敗');
            $smarty->assign('login', $this->loginStatus());
            return $smarty->display('user/register.html');
        }
    }
}
