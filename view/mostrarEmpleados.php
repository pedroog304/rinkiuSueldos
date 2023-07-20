
<?php include('header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-12">
    <div class="col-md-6">
      <a id="btn-inicio" href="index.php" class="btn btn-success btn-block" value="Volver a la pagina principal">Volver a movimientos</a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Editar / Eliminar</th>
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
            <td></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
</main>
<?php include('footer.php'); ?>