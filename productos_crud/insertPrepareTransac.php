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

  $conn->beginTransaction();
   // insert a row
  $title = "mesita redonda";
  $image = null;
  $description = "mobiliario";
  $price = 400;
  $date = date("Y/m/d");

  $stmt->execute();

  $title = "mesa comedor";
  $image = null;
  $description = "mobiliario";
  $price = 2500.3;
  $date = date("Y/m/d");

  $stmt->execute();

  $conn->commit();


  echo "Se han insertado correctamete <br>";
  
} catch(PDOException $e) {
  $conn->rollback(); //vuelve
  echo "Connection failed: " . $e->getMessage();
  echo "";
}
$conn=null;
?>