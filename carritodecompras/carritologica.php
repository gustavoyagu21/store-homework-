<?php
include("Admin/conexion.php");
session_start();
$validar = true;
$apagar=0;
$IVA=0.12;
$subtotal=0;
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST) and $_POST["Action"] == "add") {
  $id = $_POST['id'];
  $sql = "select * from productos where idp = $id;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if (!isset($_SESSION["Carrito"])) {

    $ProductosArray = array(
      'id' => $row['idp'],
      'nombre' => $row['nombre'],
      'precio' => $row['precio'],
      'cantidad' => 1,
      'importe' => $row['precio'],
    );

    $_SESSION["Carrito"][$row['idp']] = $ProductosArray;
  } else {

    foreach ($_SESSION["Carrito"] as $cont) {

      if ($cont["id"] == $id) {
        $_SESSION["Carrito"][$id]["cantidad"]++;
        $_SESSION["Carrito"][$id]["importe"] = $_SESSION["Carrito"][$id]["cantidad"] * $_SESSION["Carrito"][$id]["importe"];
        $validar = false;
      }
    }

    if ($validar) {
      $totalElementos = count($_SESSION["Carrito"]);
      $ProductosArray = array(
        'id' => $row['idp'],
        'nombre' => $row['nombre'],
        'precio' => $row['precio'],
        'cantidad' => 1,
        'importe' => $row['precio'],
      );
      $_SESSION["Carrito"][$id] = $ProductosArray;
    }
  }

  header("Location:carrito.php");
} else if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST) and $_POST["Action"] == "Delete") {
  echo "solicitaste la eliminacion del elemento" . $_POST["id"];
  $id = $_POST["id"];
  unset($_SESSION["Carrito"]["$id"]);
  header("Location:carrito.php");
} else if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET) and $_GET["Action"] == "Actualizar") {
  $id = $_GET["id"];
  $cantidad = $_GET["cantidad"];
  $_SESSION["Carrito"][$id]["cantidad"] = $cantidad;
  $_SESSION["Carrito"][$id]["importe"] = $_SESSION["Carrito"][$id]["cantidad"] * $_SESSION["Carrito"][$id]["precio"];
//echo "datos".$id."-".$cantidad;
}
if(isset($_SESSION["Carrito"])){
foreach($_SESSION["Carrito"] as $elemento){
$subtotal+=$elemento["importe"];
 
} 
$IVA=$subtotal*0.12;
$apagar=$subtotal+$IVA;
$_SESSION["VALORES"]["SUBTOTAL"]=$subtotal;
$_SESSION["VALORES"]["IVA"]=$IVA;
$_SESSION["VALORES"]["APAGAR"]=$apagar;
}
