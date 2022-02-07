<?php
$a = 5;
$b = 4;
$c = 12;

// Operaciones aritmeticas

echo $a + $b . '<br>';  // suma
echo $a - $b . '<br>';  // resta
echo $a * $b . '<br>';  // multiplicación
echo $a / $b . '<br>';  // division
echo $a % $b . '<br>';  // modulo

// asignacion

echo $a = $a + $b . '<br>';
echo $a += $b . '<br>';
echo $a -= $b . '<br>';
echo $a *= $b . '<br>';
echo $a /= $b . '<br>';
echo $a %= $b . '<br>';

// incremento

echo $a++ . '<br>'; // $a, $a+1;
echo ++$a . '<br>'; // $a+1, $a;

// decremento

echo $a-- . '<br>';
echo --$a . '<br>';

// comprobaciones

is_float($a);
is_integer($b);
is_numeric("3.45"); // true
is_numeric("hola"); // false

// Conversion

$strToNumber = '12.44';
$num = (float) $strToNumber; // convertira el string en float.

//Funciones de numeros
abs($a); // Valor absoluto de $a
pow(2,3); // Potencia 2 elevado a 3
sqrt(20);   // raiz cuadrada
min(2,4,5); // valor minimo

// formatear numeros
$numero = 123456.543;
echo number_format($numero, 2, '.',',');