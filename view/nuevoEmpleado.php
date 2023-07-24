<?php include('header.php'); include('../controller/verificarEmpleadoValidos.php');?>


      <!-- REGISTRAR NUEVO EMPLEADO -->
      <div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
    <h5>REGISTRAR NUEVO EMPLEADO</h5>
      <div class="card card-body">
        
        <form action="../controller/insertEmpleado.php" method="POST" class="needs-validation">
          <div class="form-group">
            <select type="number" name="numero_empleado" class="form-control" placeholder="No empleado" autofocus required>
            <?php
            // Generar las opciones en el input select
            foreach ($empleados_no_registrados as $no_empleado) {
                echo "<option value='$no_empleado'>$no_empleado</option>";
            }
            ?>
            </select>
          </div>
          <div class="form-group">
            <!-------CAMPO NOMBRE---------->
            <input type="text" name="nombre_empleado" rows="2" class="form-control" placeholder="Nombre empleado" required>
          </div>
          <div class="form-group">
          <label>
            <!-------CAMPO ROL---------->
      <input type="radio" required name="rol" value="chofer">
      Chofer
    </label>
    <label>
      <input type="radio" name="rol" value="cargador">
      Cargador
    </label>
    <label>
      <input type="radio" name="rol" value="auxiliar">
      Auxiliar
    </label>
          </div>
          <!-------CANCELAR--------->
          <a class="btn btn-danger" name="" href="mostrarEmpleados.php">
          Cancelar
        </a>
        <!-------GUARDAR------->
          <button type="submit" name="guardar_empleado" class="btn btn-success" value="GUARDAR EMPLEADO" required>GUARDAR EMPLEADO</button>
        </form>
      </div>
      </div>
    </main>
<?php include('footer.php'); ?>