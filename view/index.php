<?php include('header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-3">
      <a id="btn-ver-empleados" href="mostrarEmpleados.php" class="btn btn-success btn-block" value="">Visualizar lista de empleados</a>
      </div>
     <!----BARRA DE BUSQUEDA POR MES------>
      <div class="barrabusqueda">
        <form action="" method ="GET" class="">
             <input class="form-control" name="busqueda" type="month" placeholder="" style="width:30%; display:inline-block;"> 
             <button name="consultar_mes" id="" type="submit" class="btn btn-primary" href="#" role="button">Buscar</button>
         </form>
        </div>
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>horas trabajadas</th>
            <th>pago total por entragas</th>
            <th>pago por bonos</th>
            <th>retenciones</th>
            <th>vales</th>
            <th>sueldo base</th>
            <th>sueldo neto</th>
            <th>Fecha</th>
            <th>Editar/Eliminar</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php
        $busqueda ="";
        if(isset($_GET['consultar_mes'])){
          $busqueda = $_GET['busqueda'];
          $mes= $busqueda.'-01';
          $query = "call sp_mostrar_movimientos2('$mes')";
        }else{
        $query = "call sp_mostrar_movimientos";
        }
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['no_empleado']; ?></td>
            <td><?php echo $row['nombre_empleado']; ?></td>
            <td><?php echo $row['rol_empleado']; ?></td>
            <td><?php echo $row['horas_trabajadas']; ?></td>
            <td><?php echo $row['pagoxentregas']; ?></td>
            <td><?php echo $row['pagoxbonos']; ?></td>
            <td><?php echo $row['retenciones']; ?></td>
            <td><?php echo $row['vales']; ?></td>
            <td><?php echo $row['sueldobruto']; ?></td>
            <td><?php echo $row['sueldoneto']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><a href="modificarMovimiento.php?no_empleado=<?php echo $row['no_empleado']?>&fecha=<?php echo $row['fecha']?>" class="btn btn-warning" style="width:40%">
            <i class="fas fa-marker"></i>
          </a>
            <a href="../controller/deleteMovimiento.php?no_empleado=<?php echo $row['no_empleado']?>&fecha=<?php echo $row['fecha']?>" class="btn btn-danger" style="width:40%">
            <i class="far fa-trash-alt"></i>
          </a>
          
          </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>