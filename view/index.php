<?php include('header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6">
      <a id="btn-ver-empleados" href="mostrarEmpleados.php" class="btn btn-success btn-block" value="Ver empleados">Visualizar lista de empleados</a>
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
            <th>sueldo bruto</th>
            <th>sueldo neto</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php
        $query = "call sp_mostrar_movimientos";
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
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>