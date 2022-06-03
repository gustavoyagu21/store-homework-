
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
$fnacimiento="";
$detalle="";


if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST) AND $_POST['actualizar']=="actualizar"){
$id=$_POST["id"];
$sql = "SELECT * FROM clientes WHERE idc=$id";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$id=$row['idc'];
$nombre=$row['nombre'];
$apellido=$row['apellido'];
$usuario=$row['usr'];
$clave=$row['pwd'];
$fecha=$row['fnacimiento'];
$detalle=$row['detalle'];
}
?> 
<br>
<center><label class="form-label"><h1>REGISTRO CLIENTES</h1></label></center>
<div class="container">
<div class="row">
    <div class="col-md-4">
        <form action="logicaclientes.php" method="POST" enctype="multipart/form-data">
           
       
            <br>
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <label class="form-label">Ingrese el nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" value=" <?php echo $nombre; ?>"/>
            <label class="form-label">Ingrese el apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Ingrese su apellido" value="<?php echo $apellido; ?>"/>
            <label class="form-label">Ingrese usuario</label>
            <input type="text" name="usr" class="form-control" value="<?php echo $usuario; ?>"/>
            <label class="form-label">Ingrese su contraseña</label>
            <input type="text" name="pwd" class="form-control" placeholder="Ingrese la descripcion" value="<?php echo $clave; ?>"/>
            <label class="form-label">Ingrese fecha de nacimiento</label>
            <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?>"/>
            <label class="form-label">Ingrese la descripcion </label>
            <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion" value="<?php echo $detalle; ?>"/>
            
            <br>
            <center>
            <button type="submit" class="btn btn-primary" name="Enviar" value="insertar">guardar</button>
            <button type="button"  class="btn btn-primary"  onclick="location.href='listaclientes.php'">Administrar</button>  
</center>
        </form>
             
    </div>
</div>
</div> 
<?php include("../pantillas/pie.php") ?>