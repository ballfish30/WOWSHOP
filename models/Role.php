<?php

class Role extends Model
{
    protected $_model;
    protected $_table;
    public function __construct()
    {
        // 連線資料庫
        $this->connect("localhost", "root", "root", "WOWShop");
        // 獲取模型名稱
        $this->_model = get_class($this);
        $this->_model = rtrim($this->_model, 'Model');
        // 資料庫表名與類名一致
        $this->_table = strtolower($this->_model);
    }

    public function __destruct()
    {
    }
}
