<?php
// los indices de arrays son 0..n
// decrarar array

$fruit = ['Manzana', 'pera', 'limon'];
echo "<pre>";
var_dump($fruit);
print_r($fruit);
echo "</pre>";


/*
Acceso a elemento por posición 
    $array[n];
*/
/*
Asignar valor 
    $array[n] = valor;
*/

/* 
Añadir elementos al principio
    array_unshift(array &$array, mixed $... = ?): int
*/

/*
Quitar elementos al principio
    array_shift(array &$array): mixed
*/
/*
Quita elemento al final
    array_pop(array &$array): mixed
*/

/*
 Inserta uno o más elementos al final de un array
    array_push(array &$array, mixed $value1, mixed $... = ?): int
 */

 /*
  Array a String
    Une elementos de un array en un string
    implode(<string $glue,> array $pieces): string
 */
/*
 Divide un string en un array de string
    explode(string $delimiter, string $string, int $limit = PHP_INT_MAX): array
*/

/*
version 7.4 podemos usar el operador ...
[...$array1, ...$array2]; el resultado es la concatenación de arrays
array_merge($array1, $array2);
*/

/*
En PHP los arrays son siempre asociativos, es una pareja clave => valor.
Si no indicamos la clave, PHP le asignara un numero.
*/

$persona = [
    'nombre' => 'Mario',
    'apellido' => 'Bross',
    'edad' => '30',
    'hobbies' => ['Tenis', 'Comer']
];


print_r($persona);
// añadir una clave valor
$persona["estado civil"] = "soltero";

// Operador de fusion de null php 7
// si el $valor no esta definido entonces usa el valor por defecto

$campo = $valor ?? $default;

// obtener  las claves de una array
array_keys($array); // array indexado con las claves
array_values($array); // array indexado con los datos

// ordenar
//ksort(&$array,$flags):bool; Ordena un array por clave
//asort(array &$array, int $sort_flags = SORT_REGULAR): bool; Ordena un array y mantiene la asociación de índices

//sort(array &$array, int $sort_flags = SORT_REGULAR): bool;  Ordena un array
/*
    Ordena un array según sus valores usando una función de comparación definida por el usuario
    
    usort(array &$array, callable $value_compare_func): bool
    
    La función de comparación debe devolver un entero menor, igual o mayor que cero si el primer argumento se considera que sea respectivamente menor, igual o mayor que el segundo. 
    Observe que antes de PHP 7.0.0 este entero debía estar en el rango de -2147483648 a 2147483647.
    callback(mixed $a, mixed $b): int
*/

/*
Extraer a variables un array:
https://www.php.net/manual/es/function.extract.php

https://www.php.net/manual/es/function.list.php
list() solo funciona con arrays numéricos y supone que los índices numéricos empiezan en 0.
*/
?>