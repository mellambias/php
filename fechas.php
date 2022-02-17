<?php
/*
    https://www.php.net/manual/en/function.date 
    Fechas

    date(string $format, ?int $timestamp = null): string
*/
echo date("d/m/Y");

echo "</br>";
// Fecha del dia anterior

echo date("d/m/Y",time()-60*60*24); // restamos un dia
echo "</br>";
// cambio de formatos

echo date("F J Y, H:i:s");
echo "</br>";

echo time();    // timestamp: number of seconds that have elapsed since January 1, 1970 (midnight UTC/GMT)
echo "</br>";

$dateString="2020-02-06 12:45:35";
echo "<pre>";
print_r(date_parse($dateString));
echo "</pre></br>";

$dateString = "Februrary 8 2022 14:24";
print_r (date_parse_from_format("F j Y H:i:s", $dateString));
echo "</br>";

setlocale(LC_ALL, 'es_ES.utf-8'); // establece localizacion 
date_default_timezone_set("Europe/Madrid");

echo strftime("%A %d de %B %Y %r");
echo "</br>";
?>