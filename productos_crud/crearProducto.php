<?php
require "./dbConfig.php";
$title="";
$description = "";
$price = "";
$error=array();

if(isset($_POST)){
try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, title, image, description, price, date FROM products");
  $stmt->execute();

 $stmt = $conn->prepare("INSERT INTO products (title, image, description, price, date)
  VALUES (:title, :image, :description, :price, :date)");
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':image', $image);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':date', $date);

   // insert a row
  $title = isset($_POST['title'])?htmlentities($_POST['title']):"Sin titulo";
  $imageObj = isset($_FILES['image'])?$_FILES['image']:null;
  if($imageObj){
    
    if(!is_dir('images')){
      mkdir('images',0775);
    }
    $image = "images/random/".$image['name'];
    mkdir(dirname($image),0775);
    move_uploaded_file($imageObj['temp_name'],$image);
  }else{
    $image=$imageObj;
  }

  $description = isset($_POST['description'])?htmlentities($_POST['description']):"Sin descripcion";
  $price =  isset($_POST['price'])?htmlentities($_POST['price']):"000.00";
  $date = date("Y/m/d");

  $stmt->execute();
  header("Location: index.php");

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;

}


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <title>Productos</title>
  </head>
  <body>
    <h1>crear un nuevo producto</h1>
<form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="image" class="form-label">imagen</label>
    <input type="file" class="form-control" id="image" aria-describedby="imagen" name="image">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title?>">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">descripcion</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Precio</label>
    <input type="number" step='.01' class="form-control" id="price" name="price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
      </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
