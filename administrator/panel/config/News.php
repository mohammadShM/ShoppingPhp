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

}

