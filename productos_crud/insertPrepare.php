<?php
require("./dbConfig.php");

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// insertar un elemento usando 
// prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO products (title, image, description, price, date)
  VALUES (:title, :image, :description, :price, :date)");
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':image', $image);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':date', $date);

   // insert a row
  $title = "Lampara de pie";
  $image = null;
  $description = "elemento decorativo";
  $price = 500;
  $date = date("Y/m/d");

  $stmt->execute();

  $last_id = $conn->lastInsertId();

  echo "New record created successfully. Last inserted ID is: " . $last_id."<br>";
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>