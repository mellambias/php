<?php
// include composer autoload
require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

if (extension_loaded("gd") && function_exists("gd_info")) {

    if (!isset($_GET['img']) OR $_GET['img']==""){
        $img = Image::make('images/logo.png');
        header('Content-Type: image/png');
        echo $img->encode('png');
    }else{
        try{
            $img = Image::make($_GET['img']);   
        }catch(Error $e){
            die( "GD driver is only able to decode JPG, PNG, GIF, BMP or WebP files");
        }
        
        $mime = $img->mime();
        $img2 = Image::make('images/logo.png')->resize(200, 200);
        $img->insert($img2);
        $img->resize(100, 100);
        header('Content-Type: '.$mime);
        switch ($mime){
            case "image/png":
                echo $img->encode('png');
                break;
            case 'image/jpeg':
                echo $img->encode('jpg');
                break;
            default:
                echo $img->encode('jpg');
        }
         
    }

    

} else {
    echo "GD no instalada. Si quieres puedes probar instalarla en Linux: https://parzibyte.me/blog/2019/06/24/instalar-libreria-gd-php-linux-ubuntu/";
}
?>