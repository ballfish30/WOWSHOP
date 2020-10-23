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
            echo '連線錯誤';
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

    //查詢未完成訂單
    public function selectOrderFalse(){
        $sql = sprintf("select *, o.id from orders as o inner join user as u on o.userId = u.id where o.done = false", $this->_table);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // 根據條件 (orderId, productId) 查詢
    public function selectCart($orderId, $productId)
    {
        $sql = sprintf("select * from `%s` where `orderId` = '%s' and `productId` = '%s'", $this->_table, $orderId, $productId);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // 根據條件 (id) 查詢
    public function select($id)
    {
        $sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // 根據條件 (roleId) 查詢
    public function selectRoleId($id)
    {
        $sql = sprintf("select * from `%s` where `roleId` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // 根據條件 (orderId) 查詢
    public function selectCarts($id)
    {
        // select *, c.id cartId from cart as c inner join product as p on c.productId = p.id and c.orderId = $_SESSION[orderId];
        $sql = sprintf("select *, c.id cartId from %s as c inner join product as p on c.productId = p.id and c.orderId = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // 根據條件 (userId, done=false) 查詢
    public function selectOrder($id)
    {
        $sql = sprintf("select * from `%s` where `userId` = '%s' and `done` = 'false'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // 根據條件 (userId, done=true) 查詢
    public function selectOrderDone($id)
    {
        $sql = sprintf("select * from `%s` where `userId` = '%s' and `done` = '1'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // 根據條件 (perId) 查詢
    public function selectPerId($id)
    {
        $sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // 根據條件 (categoryId) 查詢
    public function selectcategoryId($id)
    {
        $sql = sprintf("select * from `%s` where `categoryId` = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // roleUser 查詢
    public function selectroleUser()
    {
        $sql = sprintf("select * from User as u join RoleUser as r on u.id = r.userId join Role as ro on ro.id = r.roleId");
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    // userId 查詢 roleUser
    public function selectroleUserId($id)
    {
        $sql = sprintf("select * from User as u join RoleUser as r on u.id = r.userId join Role as ro on ro.id = r.roleId where u.id = '%s'", $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // userId 查詢 permission
    public function selectPermissionUserId($id, $permission)
    {
        $sql = sprintf("select p.name from User as u join RoleUser as ru on u.id = ru.userId join Role as r on r.id = ru.roleId join PermissionsRole as pr on r.id = pr.roleId join Permissions as p on p.id = pr.perId where u.id = '%s' and p.name = '%s'", $id, $permission);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // 根據條件 (accountName) 查詢
    public function selectAccountName($accountName)
    {
        $sql = sprintf("select * from `%s` where `accountName` = '%s' and isActive = 1", $this->_table, $accountName);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // 根據條件 (name) 查詢
    public function selectName($name)
    {
        $sql = sprintf("select * from `%s` where `name` = '%s'", $this->_table, $name);
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

    // 根據條件 (perId, roleId) 刪除
    public function permissionRoleDelete($perId, $roleId)
    {
        $sql = sprintf("delete from `%s` where `perId` = '%s' and `roleId` = '%s'", $this->_table, $perId, $roleId);
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
