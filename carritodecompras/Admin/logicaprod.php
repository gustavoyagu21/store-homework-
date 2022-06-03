
<?php
include("conexion.php");
$rute="../img/productos/";
if(isset($_POST["Enviar"])&&$_POST["Enviar"]=="insertar"){
$id=$_POST["id"];
  $nombre = $_POST["nombre"];
 $marca = $_POST["marca"];
 $detalle = $_POST["detalle"];
 $precio = $_POST["precio"];
 $cantidad = $_POST["cantidad"];
 $nombrarchivo = $_FILES['foto']['name'];
 $rute=$rute.basename($_FILES['foto']['name']);
if(!(move_uploaded_file($_FILES['foto']['tmp_name'],$rute))){
echo"archivo subido";
return false;
}
 if(empty($id)){
  $sql="insert into productos(idp,nombre,marca,detalle,precio,stock,foto)values(null,'$nombre','$marca','$detalle','$precio','$cantidad','$nombrarchivo')";
 }else{
 $sql ="update productos set nombre='$nombre',marca='$marca',detalle='$detalle',precio='$precio',stock='$cantidad','foto='$nombrarchivo where idp='$id';";

}
 if($conn->query($sql)){
   echo"datos guardados";  
   header("location:regproductos.php");

 }else{
echo "error al guardar";
header("location:regproductos.php");
 }
 $conn->close();
 
}else if(isset($_POST["eliminar"]) && $_POST["eliminar"]=="eliminar"){
 $id=$_POST["id"];
 $sql="delete from productos where idp= $id";
 if($conn->query($sql)){
  echo "eliminado satisfactoriamente";   
  header("location:listaproductos.php");
 }else{
  echo "vale v...";   
 }   
}
else{
echo"no hace nada";    
}
?>
