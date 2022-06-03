
<?php include("encabezado.php");
include("conexion.php");
$id="";

/*if($_SESSION['permiso']){
header("Location:login.php");
}*/
$nombre="";
$apellido="";
$usuario="";
$clave="";


if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST) AND $_POST['actualizar']=="actualizar"){
$id=$_POST["id"];
$sql = "SELECT * FROM usuarios WHERE idu=$id";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$id=$row['idu'];
$nombre=$row['nombres'];
$apellido=$row['apellidos'];
$usuario=$row['usuario'];
$clave=$row['clave'];
}
?> 
<br>
<center><label class="form-label"><h1>REGISTRO USUARIOS</h1></label></center>
<div class="container">
<div class="row">
    <div class="col-md-4">
        <form action="logicausuarios.php" method="POST" enctype="multipart/form-data">
           
       
            <br>
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <label class="form-label">Ingrese el nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" value=" <?php echo $nombre; ?>"/>
            <label class="form-label">Ingrese el apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Ingrese su apellido" value="<?php echo $apellido; ?>"/>
            <label class="form-label">Ingrese usuario</label>
            <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>"/>
            <label class="form-label">Ingrese su contraseña</label>
            <input type="text" name="clave" class="form-control" placeholder="Ingrese la descripcion" value="<?php echo $clave; ?>"/>
            <br>
            <center>
            <button type="submit" class="btn btn-primary" name="Enviar" value="insertar">guardar</button>
            <button type="button"  class="btn btn-primary"  onclick="location.href='listausuarios.php'">Administrar</button>  
</center>
        </form>
             
    </div>
</div>
</div> 
<?php include("../pantillas/pie.php") ?>