<?php

require_once __DIR__."vendor/autoload.php";

use app\Email;
use app\User;

use Cowsayphp\Farm;

$cow = Farm::create(\Cowsayphp\Farm\Cow::class);
echo '<pre>'.$cow->say("Ohmg I'm a cow!").'</pre>';

?>