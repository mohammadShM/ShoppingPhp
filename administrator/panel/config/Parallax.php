<?php /** @noinspection OneTimeUseVariablesInspection */
/** @noinspection PhpUnnecessaryLocalVariableInspection */
/** @noinspection PdoApiUsageInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpMissingReturnTypeInspection */
/** @noinspection SqlNoDataSourceInspection */
/** @noinspection SqlDialectInspection */
/** @noinspection PhpMissingFieldTypeInspection */
declare(strict_types=1);
include_once "DB.php";
include_once "config.php";
include_once "Image.php";
// checkSession();

class Parallax extends Image
{

    private $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($title, $description, $image, $alt)
    {
        $sql = $this->con->prepare("INSERT INTO parallax (title,description,image,alt) values (?,?,?,?)");
        $sql->bindParam(1, $title);
        $sql->bindParam(2, $description);
        $sql->bindParam(3, $image);
        $sql->bindParam(4, $alt);
        $sql->execute();
    }

    public function select()
    {
        $sql = $this->con->prepare("select * from parallax");
        $sql->execute();
        $query = $sql->fetchAll();
        return $query;
    }

    public function selectImage($id)
    {
        $sql = $this->con->prepare("select image from parallax where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
        $query = $sql->fetch();
        return $query;
    }

    public function delete($id)
    {
        $sql = $this->con->prepare("delete from parallax where id=?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function selectLatestId()
    {
        $sql = $this->con->prepare("SELECT * From parallax order by id desc limit 1 offset 0 ");
        $sql->execute();
        $query = $sql->fetch();
        return $query;
    }

}
