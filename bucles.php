<?php

// while
/*
while (<condicion>){
    // ejecutar
}
*/
// do while
/*
$i = 0;
do {
    echo $i;
} while ($i > 0);
*/


// iterar sobre arrays

/*
foreach (expresión_array as $valor)
    sentencias

foreach (expresión_array as $clave => $valor)
    sentencias
*/
$frutas = ['Manzana', 'pera', 'limon'];
foreach($frutas as $i => $fruta) {
    echo $i.' = '. $fruta . '<br>';
}

?>