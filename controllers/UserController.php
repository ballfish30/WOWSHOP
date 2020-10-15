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
        if ($user === null) {
            $smarty->assign('message', '無使用者');
            return $smarty->display('user/login.html');
        }
        // 判斷密碼
        elseif (!password_verify($passwd, $user['passwd'])) {
            $smarty->assign('message', '密碼錯誤');
            return $smarty->display('user/login.html');
        }
        $smarty->assign('userName', $user['userName']);
        $this->setCookie('accountName', $user['accountName']);
        $this->setCookie('username', $user['userName']);
        $this->setCookie('userId', password_hash($user['id'], PASSWORD_DEFAULT));
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
