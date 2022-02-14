<?php
/** @noinspection OneTimeUseVariablesInspection */
/** @noinspection PhpUnnecessaryLocalVariableInspection */
/** @noinspection PdoApiUsageInspection */
/** @noinspection PhpUndefinedMethodInspection */
/** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlDialectInspection */
declare(strict_types=1);

include_once "DB.php";

class Contact
{

    private PDO $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($fullName, $email, $comment): void
    {
        $sql = $this->con->prepare("INSERT INTO contact(fullname,email,comment) VALUES(?,?,?)");
        $sql->bindParam(1, $fullName);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $comment);
        $sql->execute();
    }

    public function select()
    {
        $sql = $this->con->prepare("select * from contact");
        $sql->execute();
        $query = $sql->fetchAll();
        return $query;
    }

    public function deleteContact($id): void
    {
        $sql = $this->con->prepare("DELETE FROM contact WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

}