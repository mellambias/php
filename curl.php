<?php
/*
 Similar a FETCH de javascript
*/

$url= 'https://jsonplaceholder.typicode.com/users';

$resource = curl_init($url);


curl_setopt($resource,CURLOPT_RETURNTRANSFER,true);
$users = curl_exec($resource);
$rescode = curl_getinfo($resource,CURLINFO_HTTP_CODE);
var_dump($rescode);
echo'<hr><br>';
curl_close($resource);

var_dump($users);

/**
 * Una llamada usando POST
 */
$user= [
    'name' => 'Alexa',
    'username'=> 'echo',
    'email' => 'alexa@amazon.com'
];

$resource = curl_init($url);

curl_setopt_array($resource,[
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($user),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array('content-type: application/json')
]);

$result = curl_exec($resource);
echo "<hr><br>";
var_dump($result);

curl_close($resource);
?>