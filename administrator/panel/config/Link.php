<?php /** @noinspection PdoApiUsageInspection */
/** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlDialectInspection */
declare(strict_types=1);

include_once "DB.php";

class Link
{

    private PDO $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($url, $name): void
    {
        $sql = $this->con->prepare("INSERT INTO link(url,name) VALUES (?,?)");
        $sql->bindParam(1, $url);
        $sql->bindParam(2, $name);
        $sql->execute();
    }

    public function select()
    {
        $sql = $this->con->prepare("SELECT * FROM link");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function deleteContact(int $id): void
    {
        $sql = $this->con->prepare("DELETE FROM link WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function selectLimit($limit, $offset)
    {
        $sql = $this->con->prepare("SELECT * FROM link order by id desc limit $limit offset $offset");
        $sql->execute();
        return $sql->fetchAll();
    }

}