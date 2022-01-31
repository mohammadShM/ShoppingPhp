<?php /** @noinspection ALL */
/** @noinspection PhpUnnecessaryLocalVariableInspection */
/** @noinspection PdoApiUsageInspection */
/** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlDialectInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpPropertyOnlyWrittenInspection */
/** @noinspection PhpMissingFieldTypeInspection */
declare(strict_types=1);
include_once "DB.php";

class News
{

    private $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($title, $keywords, $description, $bodyNews)
    {
        $sql = $this->con->prepare("insert into news (title,keywords,description,bodyNews) 
                values (?,?,?,?)");
        $sql->bindParam(1, $title);
        $sql->bindParam(2, $keywords);
        $sql->bindParam(3, $description);
        $sql->bindParam(4, $bodyNews);
        $sql->execute();
    }

    public function select()
    {
        $sql = $this->con->prepare("select * from news");
        $sql->execute();
        $query = $sql->fetchAll();
        return $query;
    }

    public function delete(int $id)
    {
        $sql = $this->con->prepare("delete from news where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function selectId($id)
    {
        $sql = $this->con->prepare("select * from news where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
        $query = $sql->fetch();
        return $query;
    }

    public function searchTitle($title)
    {
        $sql = $this->con->prepare("select * from news where title=?");
        $sql->bindParam(1, $title);
        $sql->execute();
        $query = $sql->fetch();
        return $query;
    }

    public function update($id, $title, $keywords, $description, $bodyNews)
    {
        $sql = $this->con->prepare("update news set title=?,description=?,keywords=?,bodyNews=? where id=?");
        $sql->bindParam(1, $title);
        $sql->bindParam(2, $keywords);
        $sql->bindParam(3, $description);
        $sql->bindParam(4, $bodyNews);
        $sql->bindParam(5, $id);
        $sql->execute();
    }

    public function selectLimit($limit, $offset)
    {
        $sql = $this->con->prepare("select * from news order by id desc limit $limit offset $offset");
        $sql->execute();
        $query = $sql->fetchAll();
        return $query;
    }

}

