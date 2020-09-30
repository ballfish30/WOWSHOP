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
        require 'class/Smarty.class.php';
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
        $data = openssl_encrypt($data, $this->en_method, $this->key);
        setcookie("$name", $data, 60 * 60 * 24 * 7, '/');
    }

    public function delCookie($name)
    {
        setcookie("$name", "", -60 * 60 * 24 * 7, '/');
    }

    public function hashSSID($UserId)
    {
        return hash('sha256', "$UserId");
    }

}
