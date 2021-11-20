<?php

/** @noinspection SqlNoDataSourceInspection
 * @noinspection SqlDialectInspection
 */

include_once "DB.php";

class Admin
{

    private $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insertAdmin($username, $password)
    {
        $sql = $this->con->prepare("insert into admin(username,password)values(?,?)");
        $sql->bindParam(1, $username);
        $sql->bindParam(2, $password);
        $sql->execute();
    }

    public function selectAdmin()
    {
        $sql = $this->con->prepare("select * from admin");
        $sql->execute();
        return $sql->fetchAll();
    }

}
