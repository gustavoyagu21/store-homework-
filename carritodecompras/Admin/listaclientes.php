<?php include("encabezado.php");
 include("conexion.php");
 $sql="select * from clientes;";
 $result=$conn->query($sql);
?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>NOMBRES</th>
                    <th>FECHA NACIMIENTO</th>
                    <th>DESCRIPCION</th>
                </tr>
                </thead>
                <tbody>
                  <?php while ($r = $result->fetch_assoc()){?>  
                    <tr>
                        <td><?php echo $r['idc'];?></td>
                        <td><?php echo $r['nombre']." ".$r['apellido'];?></td>
                        <td><?php echo $r['fnacimiento'];?></td>
                        <td><?php echo $r['detalle'];?></td>
                        <td>
                          <form action="logicaclientes.php" method="post" >
                              <input type="hidden" name="id" value="<?php echo $r['idc'];?>">
                              <button type="submit" class="btn btn-danger" name="eliminar" value="eliminar">Eliminar</button>
                              
                            </form> 
                            <form action="clientes.php" method="post"  >
                            <input type="hidden" name="id" value="<?php echo $r['idc'];?>">
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
    <center>  <button type="button"  class="btn btn-primary"  onclick="location.href='clientes.php'">Regresar</button>  
    <?php include("../pantillas/pie.php") ?>