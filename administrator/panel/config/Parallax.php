<?php /** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpMissingReturnTypeInspection */
/** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlDialectInspection */
/** @noinspection PhpMissingFieldTypeInspection */
declare(strict_types=1);
include_once "DB.php";
include_once "config.php";
include_once "Image.php";
checkSession();

class Parallax extends Image
{

    private $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($title, $description, $image)
    {
        $sql = $this->con->prepare("INSERT INTO parallax (title,description,image) values (?,?,?)");
        $sql->bindParam(1, $title);
        $sql->bindParam(2, $description);
        $sql->bindParam(3, $image);
        $sql->execute();
    }

}
