<?php /** @noinspection PhpMissingReturnTypeInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
declare(strict_types=1);

class Image
{

    public function uploadImage($image)
    {
        $image_name = $image['name'];
        $directory = "./../../../../assetsAdmin/images/parallax/" . "Parallax_" . time() . "_" . $image_name;
        move_uploaded_file($image['tmp_name'], $directory);
        return "Parallax_" . time() . "_" . $image_name;
    }

}