<?php
// include composer autoload
require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

if (extension_loaded("gd") && function_exists("gd_info")) {

// $img = Image::make($_GET['img']);
// $img->insert('images/logo.png');
// $img->resize(300, 200);

$img = Image::make($_GET['img']);
$img2 = Image::make('images/logo.png')->resize(200, 200);
$img->insert($img2);
$img->resize(300, 200);

header('Content-Type: image/png');
echo $img->encode('png');

} else {
    echo "GD no instalada. Si quieres puedes probar instalarla en Linux: https://parzibyte.me/blog/2019/06/24/instalar-libreria-gd-php-linux-ubuntu/";
}
?>