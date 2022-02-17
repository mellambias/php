<?php
$edad = 20;
$salario = 30000;

if($edad < 20){
    echo "La edad menor 20";
} elseif($edad > 20){
    echo "La edad mayor 20";
}else{
  echo "La edad es igual a 20";
}

// == igualdad valor === igual valor y tipo

"20" == 20; // true
"20" === 20; // false

// ternario
$edad < 20 ? 'Jove' : 'Mo tan joven';

$var = isset($nombre) ? $nombre : "luigi"; // isset Determina si una variable está definida y no es null
// equivale a
$var = $nombre ?? "luigi";

// switch

$rol = 'admin';

switch ( $rol){
    case 'admin':
        break;
    case 'user':
        break;
    default:
}

?>