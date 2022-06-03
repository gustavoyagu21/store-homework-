<?php include("encabezado.php");
 include("conexion.php");
 $sql="select * from productos;";
 $result=$conn->query($sql);
?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>MARCA</th>
                    <th>DETALLE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>FOTO</th>
                </tr>
                </thead>
                <tbody>
                  <?php while ($r = $result->fetch_assoc()){?>  
                    <tr>
                        <td><?php echo $r['idp'];?></td>
                        <td><?php echo $r['nombre'];?></td>
                        <td><?php echo $r['marca'];?></td>
                        <td><?php echo $r['detalle'];?></td>
                        <td><?php echo $r['precio'];?></td>
                        <td><?php echo $r['stock'];?></td>
                        <td><?php echo $r['foto'];?></td>
                        <td>
                          <form action="logicaprod.php" method="post" >
                              <input type="hidden" name="id" value="<?php echo $r['idp'];?>">
                              <button type="submit" class="btn btn-danger" name="eliminar" value="eliminar">Eliminar</button>
                              
                            </form><br>
                            <form action="regproductos.php" method="post" >
                            <input type="hidden" name="id" value="<?php echo $r['idp'];?>">
                              <button type="submit" class="btn btn-success" name="actualizar" value="actualizar">Actualizar</button>
                            </form>
                            </td>
                    </tr>
 <?php
                  }
                  $conn->close();
                
                    ?>                  
                </tbody>
        </table>
    </div></div> 
    <center>  <button type="button"  class="btn btn-primary"  onclick="location.href='regproductos.php'">Regresar</button>  
    <?php include("../pantillas/pie.php") ?>