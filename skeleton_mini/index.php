<?php 
require "./partials/header.php";
?>
    <h1> Super web </h1>

<?php require ("./partials/section.php"); // podemos escribir entre parentesis o no ?>
<?php require "./partials/footer.php";   ?> 

<?php
/*
En caso de que es fragmento contenga errores
 "require" dara error y se detendra la ejecución.
 "include" dara un aviso (warning) y continuará la ejecución

Si no queremos que se añada el fragmento mas de una vez usaremos:
require_once o include_once
*/
?>