<?php 
include("pantillas/encabezado.php");
include("Admin/conexion.php");
$sql="Select* from productos where stock > 3;";
$result=$conn->query($sql);
?>
<div class="container">
    <div class="row"><!--12 columnas-->
    <?php while ($row = $result->fetch_assoc()){?>
    <div class="col-md-3">   
    <div class="card text-left">
    
  <img class="card-img-top" src="img/productos/<?php echo $row['foto']?>" alt="foto">
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['nombre']?></h4>
    <p class="card-text">Detalle:<?php echo $row['detalle']?></p>
    <h4 class="card-header"><?php echo $row['precio']?></h4>
    <form action="carritologica.php" method="POST" >
   <input type="hidden" name="id" value="<?php echo $row['idp']?>"/>
   <button type="submit" class="btn btn-outline-dark mt-auto agregar" name="Action" value="add">Comprar</button>
    </form>
  </div>
  </div>
  </div>
  <br>
  <?php 
  }
  $conn->close();
  ?>
  <br>
  </div>
    </div><br>
    <?php
    include("pantillas/pie.php");
    ?>