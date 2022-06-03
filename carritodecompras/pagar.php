<?php
include("Admin/conexion.php");
include("pantillas/encabezado.php");
session_start();
$validar=true; 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usr = $_POST["usr"];
    $pwd = $_POST["pwd"];
  
    $sql = "select * from clientes where usr = '$usr' and pwd = '$pwd'; ";
  
    $result = $conn->query($sql);
  
    if($result->num_rows == 1){
      $row = $result->fetch_assoc();
      $subtotal = $_SESSION['VALORES']['SUBTOTAL'];
      $IVA = $_SESSION['VALORES']['IVA'];
      $aPagar = $_SESSION['VALORES']['APAGAR'];
      $id=$row['idc'];

      $sql = "insert into facturas values (null,CURDATE(),$subtotal,$IVA,$aPagar,$id)";
      if($conn->query($sql)){
      $idf=$conn->insert_id;  
      } else {
$validar=false;      
      } 
      foreach($_SESSION["Carrito"] as $elemento){
$idp=$elemento['id'];
$precio=$elemento['precio'];
$cantidad=$elemento['cantidad'];
$importe=$elemento['importe'];

$sql = "insert into detalles values (null,$cantidad,$precio,$importe,$idp,$idf);";
}
if(!$conn->query($sql)){
 $validar=false; 
}


      if($validar){
       // session_destroy();
        echo "<script>
        alert('Bienvenido,Compra realizada');
        window.location.href= 'factura.php';
        </script>";
      }else{
        echo"<script>alert('Intente nuevamente');</script>";
      }
    }
  }
  ?>
  
  <div class="container">
    <div class="row">
        <div class="container">
          <form method="post">
          <fieldset class="form-group row">
               <legend class="col-form-legend col-sm-1-12">Bienvenido, ingrese sus datos para poder continuar</legend>
          </fieldset>
              <div class="form-group row">
                <label for="inputName" class="col-sm-1-12 col-form-label">Ingrese su usuario</label>
                <div class="col-md-3">
                  <input type="text" class="form-control" name="usr" id="usr" placeholder="">
                </div>
              </div>
              <fieldset class="form-group row">
                <legend for="inputName" class="col-sm-1-12 col-form-label">Ingrese su clave</legend>
                <div class="col-md-3">
                  <input type="text" class="form-control" name="pwd" id="pwd" placeholder="">
                </div>
              </fieldset>
              <br>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Continuar</button>
                  <button type="button"  class="btn btn-primary"  onclick="location.href='index.php'">REGRESAR</button>
                </div>
              </div>  
              </form>        
        </div>
        </div>
    </div>
  </div>
  <?php
include("pantillas/pie.php");

?>  