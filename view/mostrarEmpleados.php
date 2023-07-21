
<?php include('header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-12">
    <div class="col-md-4">
      <a id="btn-inicio" href="index.php" class="btn btn-danger btn-block" value="Volver a la pagina principal">Volver a movimientos</a>
      <a id="btn-insertarEmpleado" href="nuevoEmpleado.php" class="btn btn-success btn-block" value="Volver a la pagina principal">Nuevo empleado</a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Editar / Eliminar</th>
            <th>Movimiento nuevo</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php
        $query = "SELECT * FROM empleados";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['no_empleado']; ?></td>
            <td><?php echo $row['nombre_empleado']; ?></td>
            <td><?php echo $row['rol_empleado']; ?></td>
            <td>
              <a href="modificarEmpleado.php?no_empleado=<?php echo $row['no_empleado']?>">Editar</a>
              <a href="../model/deleteEmpleado.php?no_empleado=<?php echo $row['no_empleado']?> ">Eliminar</a>
            </td>
            <td><a href="nuevoMovimiento.php?no_empleado=<?php echo $row['no_empleado']?> ">Seleccionar</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
</main>
<?php include('footer.php'); ?>