<?php
    /*
    tipado dinamico, caseSensitive

    String
    Integer
    Float
    Bolean
    NULL
    Array
    Object
    */

    /*
    Declarar una variable con el simbolo $
    */

    $nombre = "jorge";
    $edad = 34;
    $isActive = true;
    $altura = 1.75;
    $salario = null;

    // concatenar texto se usa punto(.)
    echo $nombre." ".$edad;
    echo $isActive; // imprime texto "0" o "1"
    echo $salario; // null imprime un caracter vacio " "


    // Uso de comillas simples
    /* Uso de comillas dobles permite
    el uso de variables
    */

    /* tipo de dato de una variable 
        getType($variable);
    */

    print_r( getType($edad));

    // muestra el tipo y contenido del campo

    var_dump($nombre, $edad, $isActive);

    // verificar el tipo de dato

    is_string($nombre);
    is_int($edad);
    is_bool($isActive);
    is_double($altura);

    // verificar si esta definida o no

    isset($nombre);

    /* 
        Las Constantes se definen usando la función define(nombre, valor);
    */
    define('PI', 3.14);
    defined('PI'); // para saber si esta definida una constante.

    // constantes build-in
    //https://www.php.net/manual/es/reserved.variables.php
    /*
    Superglobals — Superglobals son variables internas que están disponibles siempre en todos los ámbitos
    $GLOBALS — Hace referencia a todas las variables disponibles en el ámbito global
    $_SERVER — Información del entorno del servidor y de ejecución
    $_GET — Variables HTTP GET
    $_POST — Variables POST de HTTP
    $_FILES — Variables de subida de ficheros HTTP
    $_REQUEST — Variables HTTP Request
    $_SESSION — Variables de sesión
    $_ENV — Variables de entorno
    $_COOKIE — Cookies HTTP
    $php_errormsg — El mensaje de error anterior
    $http_response_header — Encabezados de respuesta HTTP
    $argc — El número de argumentos pasados a un script
    $argv — Array de argumentos pasados a un script
*/

/*
https://www.php.net/manual/es/language.constants.predefined.php
https://www.php.net/manual/es/reserved.constants.php
__LINE__	    El número de línea actual en el fichero.
__FILE__	    Ruta completa y nombre del fichero con enlaces simbólicos resueltos. Si se usa dentro de un include, devolverá el nombre del fichero incluido.
__DIR__	        Directorio del fichero. Si se utiliza dentro de un include, devolverá el directorio del fichero incluído. Esta constante es igual que dirname(__FILE__). El nombre del directorio no lleva la barra final a no ser que esté en el directorio root.
__FUNCTION__	Nombre de la función.
__CLASS__	    Nombre de la clase. El nombre de la clase incluye el namespace declarado en (p.e.j. Foo\Bar). Tenga en cuenta que a partir de PHP 5.4 __CLASS__ también funciona con traits. Cuando es usado en un método trait, __CLASS__ es el nombre de la clase del trait que está siendo utilizado.
__TRAIT__	    El nombre del trait. El nombre del trait incluye el espacio de nombres en el que fue declarado (p.e.j. Foo\Bar).
__METHOD__	    Nombre del método de la clase.
__NAMESPACE__	Nombre del espacio de nombres actual.
ClassName::class	El nombre de clase completamente cualificado. Véase también ::class.
*/

?>