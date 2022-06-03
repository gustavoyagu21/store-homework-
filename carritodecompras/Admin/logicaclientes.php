
<?php
include("conexion.php");
if(isset($_POST["Enviar"])&&$_POST["Enviar"]=="insertar"){
$id=$_POST["id"];
  $nombre = $_POST["nombre"];
 $apellido = $_POST["apellido"];
 $usuario=$_POST["usr"];
 $clave=$_POST["pwd"];
 $fnacimiento = $_POST["fecha"];
 $descripcion = $_POST["descripcion"];

 if(empty($id)){
  $sql="insert into clientes(idc,nombre,apellido,usr,pwd,fnacimiento,detalle)values(null,'$nombre','$apellido','$usuario','$clave','$fnacimiento','$descripcion');";
 }else{
 $sql ="update clientes set nombre='$nombre',apellido='$apellido',usr='$usuario',pwd='$clave',fnacimiento='$fnacimiento',detalle='$descripcion' where idc='$id';";

}
 if($conn->query($sql)){
  echo"<script>alert('Datos guardados');</script>";

   header("location:clientes.php");

 }else{
echo "error al guardar";
//header("location:usuarios.php");
 }
 $conn->close();
 
}else if(isset($_POST["eliminar"]) && $_POST["eliminar"]=="eliminar"){
 $id=$_POST["id"];
 $sql="delete from usuarios where idu= $id";
 if($conn->query($sql)){
  echo"<script>alert('eliminado satisfactoriamente');</script>"; 
  header("location:listausuarios.php");
 }else{
  echo "vale v...";   
 }   
}
else{
echo"no hace nada";    
}
?>
