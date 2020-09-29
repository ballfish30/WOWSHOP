<?php

class Controller
{
    public $dbhost = 'localhost';
    public $dbuser = 'root';
    public $dbpass = 'root';
    public $dbname = 'WOWShop';

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

    public function view($view, $data = array())
    {
        require_once "views/$view.php";
    }

    public function sql_connect()
    {
        return mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname, 8443);
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

    public function pdo()
    {
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", "localhost", "WOWShop");
            $this->_dbHandle = new PDO($dsn, "root", "root", array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            exit('錯誤: ' . $e->getMessage());
        }
    }

}
