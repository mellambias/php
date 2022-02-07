<?php
$nombre = "Mario";
$nombreCompleto = 'Hola, soy' . $nombre. '</br>';
$nombreCompleto2 = "Hola, soy $nombre </br>";

echo $nombreCompleto;
echo $nombreCompleto2;

// Funciones de strings

strlen($nombreCompleto);        //longitud
trim($nombreCompleto);          // elimina los espacios
ltrim($nombreCompleto);         // elimina espacios por la izquierda 
rtrim($nombreCompleto);         // elimina espacios por la derecha
str_word_count($nombreCompleto); // El numero de palabras
strrev($nombre);                // invierte el orden de los caracteres
strtoupper($nombre);             // pasa a mayuscula
strtolower($nombre);            // pasa a minuscula
ucfirst($nombre);               // pasa a Mayuscula la primera letra
lcfirst($nombre);               // pasa a minuscula la primera letra 
ucwords($nombreCompleto);       // Capitaliza todas las palabras
strpos($nombreCompleto,"soy",1);    // la posicion de la primera ocurrencia.
stripos($nombreCompleto, "soy");           // como la anterior pero case insensitive.
substr($nombreCompleto,1,3);
str_replace("Hola", "Adios",$nombreCompleto);   // Sustituye una cadena por otra
str_ireplace("Hola", "Adios",$nombreCompleto);

$longText="
 Hola, soy un 
 texto largo
 multiminea
";

nl2br($longText);    // utiliza los saltos de linea en html

htmlentities($str, ENT_QUOTES);  // satiniza entradas de formulario tranforma las etiquetas html en texto.
html_entity_decode($str);            //  pasa codigo a etiqueta
htmlspecialchars($str);              //  convierte caracteres especiales en entidades html
htmlspecialchars_decode($str);       //  convierte entidades html en caracteres

