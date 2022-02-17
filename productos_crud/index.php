<?php
require "./dbConfig.php";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, title, image, description, price, date 
  FROM products
  where title LIKE :filtro OR description LIKE :filtro
  ");
  $stmt->bindParam(':filtro', $filtro);
  $filtro = isset($_GET['s']) ? '%'.$_GET['s'].'%' : '%';
  $filtro=preg_replace('/\s+/', '%', $filtro);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
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
    <h1>Mis Productos</h1>
      <form class="d-flex col-3">
        <input id="filtro" name='s' onkeyup="this.form.submit();" value="<?php echo $_GET['s'] ?>" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Producto</th>
          <th scope="col">Titulo</th>
          <th scope="col">Imagen</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Precio</th>
          <th scope="col">Fecha entrada</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=1;
          foreach(($stmt->fetchAll()) as $k=>$v){
            echo "<tr>";
            foreach($v as $clave => $el){
              switch ($clave) {
                case "image":
                  if($el){
                    //echo "<td><img src='$el' alt='' width='100px' title='$el'></td>";
                    echo "<td><img src='./image.php?img=$el' alt='' width='100px' title='$el'></td>";
                  }else{
                    echo "<td></td>";
                  }
                  
                  break;
                case "id":
                  echo '<td>'.($i++).'</td>';
                  break;
                default:
                  echo "<td>$el</td>";
              }
            }
            echo '<td>
            <form action="delete.php" method="POST">
              <a href="update.php?id='.$v['id'].'" class="btn btn-outline-primary">Editar</a>
              <input type="hidden" name="id" value="'.$v['id'].'">
              <input type="submit" class="btn btn-outline-danger" value="Borrar" />
            </form>
          </td>
            </tr>';
          }

        ?>
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
    <script>
      let filtro=document.getElementById("filtro");
      filtro.selectionStart = filtro.value.length;
      filtro.focus();
    </script>
  </body>
</html>
