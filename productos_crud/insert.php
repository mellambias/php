<?php

$servername = "localhost";
$username = "root";
$password = "daw123";
$database="products_bd";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// insertar un elemento
  $sql = "INSERT INTO `products`(`title`, `image`, `description`, `price`, `date`) 
  VALUES ('producto1',null,'descripcion',100,now())";

  $conn->exec($sql);

  $last_id = $conn->lastInsertId();

  echo "New record created successfully. Last inserted ID is: " . $last_id."<br>";
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn=null;
?>