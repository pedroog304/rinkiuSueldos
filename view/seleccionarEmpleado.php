<?php include('header.php'); ?>

      <!-- REGISTRAR NUEVO MOVIMIENTO -->
      <div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
    <h5>REGISTRAR NUEVO MOVIMIENTO</h5>
      <div class="card card-body">
        
        <form action="insertMovimiento.php" method="GET" class="needs-validation">
          <!--CAMPO NUMERO DE EMPLEADO ------------------------------------->
          <div class="form-group">
          <a id="" name="seleccionar_empleado" href="nuevoMovimiento.php?" class="btn btn-success btn-block" value="Ver empleados">Seleccionar empleado</a>
            <label>Número de empleado</label>
            <select type="number" name="no_empleado" class="form-control" placeholder="No empleado" autofocus required>
            <?php
        $query = "SELECT no_empleado FROM empleados";
          $result_tasks = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
            <option value="" ><?php echo $row['no_empleado']; ?> </option> 
            <?php }?>
            </div>
      </div>
    </main>
<?php include('footer.php'); ?>