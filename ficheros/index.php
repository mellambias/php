
// constantes magicas
https://www.php.net/manual/en/language.constants.magic.php;

echo '__FILE__ = '.__FILE__.'<br>';
echo '__DIR__ = '.__DIR__.'<br>';
echo '__LINE__ = '.__LINE__.'<br>';




cambiar los permisos de un fichero
chmod("./ficheros", 755);

*crear un directorio

mkdir(
    string $pathname,
    int $mode = 0777,
    bool $recursive = false,
    resource $context = ?
): bool

mkdir('test');

*varios directorios
$old = umask(0);
mkdir('test/subTest/test',0777,true);
umask($old);
rmdir('test');

*Eliminacion recursiva de directorios

function rrmdir($src) {
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                rrmdir($full);
            }
            else {
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}


*Renombrar
    rename(string $oldname, string $newname, resource $context = ?): bool

*leer archivos y directorios
    scandir(string $directory, int $sorting_order = SCANDIR_SORT_ASCENDING, resource $context = ?): array


*Escribir datos en un fichero
file_put_contents(
    string $filename,
    mixed $data,
    int $flags = 0,
    resource $context = ?
): int

*Abre un fichero o un URL
fopen(
    string $filename,
    string $mode,
    bool $use_include_path = false,
    resource $context = ?
): resource

*Escribe Escritura de un archivo en modo binario seguro

fwrite(resource $handle, string $string, int $length = ?): int

* Cierra un puntero a un archivo abierto
fclose(resource $handle): bool

*\n equivale a PHP_EOL

*Lee un fichero o URL completo a una string
file_get_contents(
    string $filename,
    bool $use_include_path = false,
    resource $context = ?,
    int $offset = 0,
    int $maxlen = ?
): string

*Decodifica un string de JSON en array asociativo
json_decode(
    string $json,
    ?bool $associative = null,
    int $depth = 512,
    int $flags = 0
): mixed
*Retorna la representación JSON del valor dado
json_encode(mixed $value, int $flags = 0, int $depth = 512): string|false

*La existencia
Comprueba si existe un fichero o directorio
file_exists(string $filename): bool

*Borra un fichero
unlink(string $filename, resource $context = ?): bool

*Obtiene el tamaño de un fichero
filesize(string $filename): int
