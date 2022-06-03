<?php include("encabezado.php");
 include("conexion.php");
 $sql="select * from usuarios;";
 $result=$conn->query($sql);
?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>NOMBRES</th>
                    <th>USUARIO</th>
                    <th>CONTRASEÑA</th>
                </tr>
                </thead>
                <tbody>
                  <?php while ($r = $result->fetch_assoc()){?>  
                    <tr>
                        <td><?php echo $r['idu'];?></td>
                        <td><?php echo $r['nombres']." ".$r['apellidos'];?></td>
                        <td><?php echo $r['usuario'];?></td>
                        <td><?php echo $r['clave'];?></td>
                        <td>
                          <form action="logicausuarios.php" method="post" >
                              <input type="hidden" name="id" value="<?php echo $r['idu'];?>">
                              <button type="submit" class="btn btn-danger" name="eliminar" value="eliminar">Eliminar</button>
                              
                            </form>
                            <form action="usuarios.php" method="post" >
                            <input type="hidden" name="id" value="<?php echo $r['idu'];?>">
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
    <center>  <button type="button"  class="btn btn-primary"  onclick="location.href='usuarios.php'">Regresar</button>  
    <?php include("../pantillas/pie.php") ?>