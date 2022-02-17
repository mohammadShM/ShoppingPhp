<?php /** @noinspection PhpMissingReturnTypeInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
declare(strict_types=1);

class Image
{

    public function uploadImage($image, $imageFolder = "parallax", $imageStartName = "Parallax_")
    {
        $image_name = $image['name'];
        $directory = "./../../../../assetsAdmin/images/$imageFolder/" . $imageStartName . time() . "_" . $image_name;
        move_uploaded_file($image['tmp_name'], $directory);
        return $imageStartName . time() . "_" . $image_name;
    }

}