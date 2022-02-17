<?php
/* 
    funciones, case insensitive
    podemos llamar a las funciones antes de su definicion
*/
$a = "hola";

function test(){
    global $a; // hace referencia a la variable exterior
    echo 'hola';
}

// si no devuelve nada (RETURN) la funcion devuelve "NULL", en JS devuelve "undefined"

// funcion con parametros

function saludo($nombre){
    echo "hola $nombre";
}

// valor por defecto
function saluda ($nombre = "pepe"){
    echo "hola $nombre";
}

// Listas de argumentos de longitud variable ...$números
function sum(...$numeros) {
    $acc = 0;
    foreach ($numeros as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);


// desestructuracion en array

?>