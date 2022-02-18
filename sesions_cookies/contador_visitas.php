<?php
// para tener acceso una sesion
session_start();

/* session_id() contiene el identificador de sesion
 para el usuario y la guarda en una cookie en el navegador
 */
// crear una variable de sesion
$_SESSION['n_visitas'] = $_SESSION['n_visitas'] ?? 1;
$_SESSION['n_visitas']++;

if($_SESSION['n_visitas']>10){
    echo "Ya has visto demasiadas veces, descansa";
    session_unset();    // elimina las variables de sesion
    session_destroy();
}
var_dump($_SESSION);


?>