<?php

class Model
{
    protected $_dbHandle;
    protected $_result;

    // 連線資料庫
    public function connect($host, $user, $pass, $dbname)
    {
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);
            $this->_dbHandle = new PDO($dsn, $user, $pass, array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            exit('錯誤: ' . $e->getMessage());
        }
    }

    // 查詢所有
    public function selectAll()
    {
        $sql = sprintf("select * from `%s`", $this->_table);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // 根據條件 (id) 查詢
    public function select($id)
    {
        $sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // 根據條件 (name) 查詢
    public function selectAccountName($accountName)
    {
        $sql = sprintf("select * from `%s` where `accountName` = '%s'", $this->_table, $accountName);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // 根據條件 (id) 刪除
    public function delete($id)
    {
        $sql = sprintf("delete from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

    // 自定義SQL查詢，返回影響的行數
    public function query($sql)
    {
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

    // 新增資料
    public function add($data)
    {
        $sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));
        echo $sql;
        return $this->query($sql);
    }

    // 修改資料
    public function update($id, $data)
    {
        $sql = sprintf("update `%s` set %s where `id` = '%s'", $this->_table, $this->formatUpdate($data), $id);
        return $this->query($sql);
    }

    // 將陣列轉換成插入格式的sql語句
    private function formatInsert($data)
    {
        $fields = array();
        $values = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $values[] = sprintf("'%s'", $value);
        }
        $field = implode(',', $fields);
        $value = implode(',', $values);
        return sprintf("(%s) values (%s)", $field, $value);
    }

    // 將陣列轉換成更新格式的sql語句
    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s` = '%s'", $key, $value);
        }
        return implode(',', $fields);
    }
}
