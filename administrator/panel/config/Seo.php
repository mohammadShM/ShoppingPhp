<?php
include_once 'DB.php';

class Seo
{

    private $con;

    public function __construct()
    {
        $connect = new DB();
        $this->con = $connect->getDB();
    }

    public function insert($title, $keywords, $description, $author)
    {
        $sql = $this->con->prepare("INSERT INTO seo(title,keywords,description,author)values(?,?,?,?)");
        $sql->bindParam(1, $title);
        $sql->bindParam(2, $keywords);
        $sql->bindParam(3, $description);
        $sql->bindParam(4, $author);
        $sql->execute();
    }

}