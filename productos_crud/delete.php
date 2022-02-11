<?php
require "./dbConfig.php";

try {
$id = $_POST['id'] ?? null;
if(!$id){
    header('location:index.php');
    die("error");
}

  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("DELETE FROM products WHERE id=:id");
  $stmt->bindValue(":id",$id);
  $stmt->execute();
  header('location:index.php');

  

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>