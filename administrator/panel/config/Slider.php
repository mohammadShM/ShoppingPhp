<?php /** @noinspection PdoApiUsageInspection */
/** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlDialectInspection */
declare(strict_types=1);

include_once "Image.php";
include_once "DB.php";

class Slider extends Image
{

    private PDO $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($image, $alt, $title, $description): void
    {
        $sql = $this->con->prepare("INSERT INTO slider (image,alt,title,description) VALUES (?,?,?,?)");
        $sql->bindParam(1, $image);
        $sql->bindParam(2, $alt);
        $sql->bindParam(3, $title);
        $sql->bindParam(4, $description);
        $sql->execute();
    }

    public function select()
    {
        $sql = $this->con->prepare("select * from slider");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function delete($id): void
    {
        $sql = $this->con->prepare("delete from slider where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function selectImage($id)
    {
        $sql = $this->con->prepare("select image from slider where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
        return $sql->fetch();
    }

}