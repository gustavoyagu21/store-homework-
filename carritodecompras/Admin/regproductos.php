
<?php include("encabezado.php");
include("conexion.php");
$id="";

/*if($_SESSION['permiso']){
header("Location:login.php");
}*/
$nombre="";
$marca="";
$detalle="";
$precio="";
$cantidad="";
$foto="";

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST) AND $_POST['actualizar']=="actualizar"){
$id=$_POST["id"];
$sql = "SELECT * FROM productos WHERE idp=$id";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$id=$row['idp'];
$nombre=$row['nombre'];
$marca=$row['marca'];
$detalle=$row['detalle'];
$precio=$row['precio'];
$cantidad=$row['stock'];
$foto=$row['foto'];
}
?> 
<br>
<div class="container">
<div class="row">
    <div class="col-md-4">
        <form action="logicaprod.php" method="POST" enctype="multipart/form-data">
            <label class="form-label"><h1>REGISTRO PRODUCTOS</h1></label>
            <br>
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <label class="form-label">Ingrese el nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su Usuario" value=" <?php echo $nombre; ?>"/>
            <label class="form-label">Ingrese la marca</label>
            <input type="text" name="marca" class="form-control" placeholder="Ingrese su apellido" value="<?php echo $marca; ?>"/>
            <label class="form-label">Ingrese detalle</label>
            <input type="text" name="detalle" class="form-control" value="<?php echo $detalle; ?>"/>
            <label class="form-label">Ingrese precio</label>
            <input type="text" name="precio" class="form-control" placeholder="Ingrese la descripcion" value="<?php echo $precio; ?>"/>
            <label class="form-label">Ingrese la cantidad</label>
            <input type="text" name="cantidad" class="form-control" placeholder="Ingrese su Usuario"value=" <?php echo $cantidad; ?>"/>
            <label class="form-label">Ingrese una foto</label>
            <input type="file" name="foto" class="form-control" <?php foto:$foto; ?> />
            <br>
            <button type="submit" class="btn btn-primary" name="Enviar" value="insertar">guardar</button>
            <button type="button"  class="btn btn-primary"  onclick="location.href='listaproductos.php'">Administrar</button>  
        </form>
             
    </div>
</div>
</div> 
<?php include("../pantillas/pie.php") ?>