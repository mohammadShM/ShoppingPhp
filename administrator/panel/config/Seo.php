<?php /** @noinspection PdoApiUsageInspection */
/** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlDialectInspection */
/** @noinspection PhpMissingFieldTypeInspection */
declare(strict_types=1);
include_once 'DB.php';

class Seo
{

    private $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($title, $keywords, $description, $author): void
    {
        $sql = $this->con->prepare("INSERT INTO seo(title,keywords,description,author)values(?,?,?,?)");
        $sql->bindParam(1, $title);
        $sql->bindParam(2, $keywords);
        $sql->bindParam(3, $description);
        $sql->bindParam(4, $author);
        $sql->execute();
    }

    public function selectSeo()
    {
        $sql = $this->con->prepare("SELECT * from seo");
        $allData = $sql;
        $sql->execute();
        return $allData->fetchAll();
    }

    public function deleteSeo($id): void
    {
        $sql = $this->con->prepare("DELETE FROM seo where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function selectLatestSeo()
    {
        // for get last item in seo table
        $sql = $this->con->prepare("SELECT * From seo order by id desc limit 1 offset 0 ");
        $sql->execute();
        return $sql->fetch();
    }

}