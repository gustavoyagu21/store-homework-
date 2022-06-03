
<?php
include("conexion.php");
if(isset($_POST["Enviar"])&&$_POST["Enviar"]=="insertar"){
$id=$_POST["id"];
  $nombre = $_POST["nombre"];
 $apellido = $_POST["apellido"];
 $usuario = $_POST["usuario"];
 $clave = $_POST["clave"];
 if(empty($id)){
  $sql="insert into usuarios(idu,nombres,apellidos,usuario,clave)values(null,'$nombre','$apellido','$usuario','$clave')";
 }else{
 $sql ="update usuarios set nombres='$nombre',apellidos='$apellido',usuario='$usuario',clave='$clave' where idu='$id';";

}
 if($conn->query($sql)){
   echo"datos guardados";  
   header("location:usuarios.php");

 }else{
echo "error al guardar";
//header("location:usuarios.php");
 }
 $conn->close();
 
}else if(isset($_POST["eliminar"]) && $_POST["eliminar"]=="eliminar"){
 $id=$_POST["id"];
 $sql="delete from usuarios where idu= $id";
 if($conn->query($sql)){
  echo "eliminado satisfactoriamente";   
  header("location:listausuarios.php");
 }else{
  echo "vale v...";   
 }   
}
else{
echo"no hace nada";    
}
?>
