<?php
require "./dbConfig.php";
$title="";
$description = "";
$price = "";
$error=array();

//echo '<pre>';print_r($_SERVER['REQUEST_METHOD']);echo '<pre>';
if($_SERVER['REQUEST_METHOD']=='GET'){
  if(!$_GET['id']){
    header('location:index.php');
    exit;
  };

  try{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, title, image, description, price, date FROM products WHERE id=:id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC); // uso :: por ser una constante
    if(!$producto){
      header('location:index.php');
    exit;
    }
    extract($producto); // crea y asigna variables

  }catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
};

if($_SERVER['REQUEST_METHOD']=='POST'){
try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $stmt = $conn->prepare("UPDATE products 
 SET title = :title, 
 image = :image, 
 description = :description, 
 price = :price
 WHERE id= :id
  ");
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':image', $image);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':price', $price);
  //$stmt->bindParam(':date', $date);
  $stmt->bindParam(':id', $id);

  $id=$_POST['id'];
  $title = isset($_POST['title'])?htmlentities($_POST['title']):"Sin titulo";
  $image = $_POST['image'];
  $imageObj = ($_FILES['newImage']['tmp_name']!="")?$_FILES['newImage']:null;
  if($imageObj){
    
    if(!is_dir('images')){
      try{
        mkdir('images',0777, true);
      }catch(Error $e){
        die($e);
      }
      
    }
    $imagePath = 'images/'.randomString(8);
    try{
       mkdir($imagePath,0777,true);
       //print_r($imageObj);
       //echo $imagePath.'/'.$imageObj['name'];
        if(!(move_uploaded_file($imageObj['tmp_name'],$imagePath.'/'.$imageObj['name']))){
          echo 'Error al mover archivos'. $imageObj['tmp_name'].' a '.$imagePath.'/'.$imageObj['name'];
        };
      
      }catch(Error $e){
      die($e.' '.$image);
    }
   // eliminar imagen y directorio anterior
   if(file_exists($image)){
     unlink($image);
     rmdir(dirname($image));
   }
    $image=$imagePath.'/'.$imageObj['name'];
  }

  $description = isset($_POST['description'])?htmlentities($_POST['description']):"Sin descripcion";
  $price =  isset($_POST['price'])?htmlentities($_POST['price']):"000.00";
  //$date = date("Y/m/d");
  $stmt->execute();
  header("Location: index.php");

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
}

function randomString($n,$file=null){
  //$caracteres = md5_file($file);
  $caracteres = '1234rtgfr4563251';
  $str="";
  for($i=0; $i<$n; $i++){

    $index = rand(0,strlen($caracteres)-1);
    $str .= $caracteres[$index];
  }
  return $str;
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
    <h1>Modificar producto</h1>
<form method="post" enctype="multipart/form-data">
  <?php 
  if($image!=""){
    echo '<img src="'.$image .'" alt="" height="100px" style="border:5px red">';
  }
  ?>
  <div class="mb-3">
    <label for="newImage" class="form-label">imagen</label>
    <input type="file" class="form-control" id="image" aria-describedby="imagen" name="newImage">
    <input type="hidden" name="image" value="<?php echo $image ?>">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title?>">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">descripcion</label>
    <textarea class="form-control" id="description" name="description"><?php echo $description?></textarea>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Precio</label>
    <input type="number" step='.01' class="form-control" id="price" name="price" value="<?php echo $price?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $id?>">
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
