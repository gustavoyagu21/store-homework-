<?php
include("pantillas/encabezado.php");
session_start();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">PRECIO</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">IMPORTE</th>
      <th scope="col"> </th>
      
    </tr>
  </thead>
  <tbody>
   <?php foreach ($_SESSION["Carrito"] as $prod) { ?> 
    <tr>
     <td><?php echo $prod['id']; ?> </td>
     <td><?php echo $prod['nombre']; ?> </td>
     <td><?php echo $prod['precio']; ?> </td>
     <td><input type="number" onchange="actualizar(<?php echo $prod['id']?>,this.value);"  value="<?php echo $prod['cantidad']?>"/> </td>
     <td><?php echo $prod['importe']; ?> </td>
     <td> <form action="carritologica.php" method="POST"> 
   <input type="hidden" value="<?php echo $prod["id"]?>" name="id"/>
   <button type="submit" class="btn btn-danger" name="Action" value="Delete">ELIMINAR</button>
    </form>
     </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
   <tr><th colspan="4"></th><th>sUBTOTAL: <?php echo $_SESSION['VALORES']['SUBTOTAL'] ?></th></tr> 
   <tr><th colspan="4"></th><th>IVA:<?php echo  $_SESSION['VALORES']['IVA'] ?></th><tr>
   <tr><th colspan="4"></th><th>TOTAL A PAGAR: <?php echo  $_SESSION['VALORES']['APAGAR'] ?></th><tr>
    
  </tfoot>
</table>
<center><button type="button"  class="btn btn-primary"  onclick="location.href='pagar.php'">PAGAR</button>
<button type="button"  class="btn btn-primary"  onclick="location.href='index.php'">regresar</button> </center>
<script>
  function actualizar(id,cantidad) {
    //solicitudes sincornas true
    //solicitudes asincronas false
  let xhr = new XMLHttpRequest();
  xhr.open('GET',"carritologica.php?id="+id+"&Action=Actualizar&cantidad="+cantidad,false);
  xhr.send();
  location.reload(); 
 /* xhr.onreadystatechange = (e)=>{
alert("datos del servidor"+xhr.responseText);
  }*/
  }
</script>  
<?php
include("pantillas/pie.php");

?>