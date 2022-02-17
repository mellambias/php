<?php
/*
setcookie() define una cookie para ser enviada junto
con el resto de cabeceras HTTP. Como otros encabezados,
cookies deben ser enviadas antes de cualquier salida
en el script (este es un protocolo de restricción).
Esto requiere que hagas llamadas a esta función antes de cualquier salida,
incluyendo etiquetas <html> y <head> así como cualquier espacio en blanco.

Una vez que las cookies se han establecido, se puede acceder a ellas
en la siguiente página de carga con el array $_COOKIE. 
valores Cookie también pueden existir en $_REQUEST.

setcookie(
    string $name,
    string $value = "",
    int $expires = 0,
    string $path = "",
    string $domain = "",
    bool $secure = false,
    bool $httponly = false
): bool

setcookie(string $name, string $value = "", array $options = []): bool

*/
// establece una cookie para el cliente con clave valor duracion
setcookie('nombre', 'Miguel', time()+60);

echo '<pre>';
var_dump($_COOKIE);
echo '</pre>';

// actualiza la cookie se usa setcookie
// para eliminar usamos un tienpo negativo.
// https://diego.com.es/cookies-en-php
?>