<?php /** @noinspection PhpMissingReturnTypeInspection */

/** @noinspection PhpMissingFieldTypeInspection */

class DB
{

    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "shoppingphp";
    private $con;

    public function __construct()
    {
        try {
            $connect = new PDO("mysql:dbname=$this->database;host=$this->localhost", $this->username, $this->password);
            // echo "connect";
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->exec("SET NAMES 'utf8'");
            $this->con = $connect;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getDB()
    {
        return $this->con;
    }
}

// for test
// $db = new DB();
// var_dump($db->getDB());
