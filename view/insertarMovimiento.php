<?php include('header.php'); ?>

      <!-- REGISTRAR NUEVO MOVIMIENTO -->
      <div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
    <h5>REGISTRAR NUEVO MOVIMIENTO</h5>
      <div class="card card-body">
        
        <form action="" method="" class="needs-validation">
          <div class="form-group">
            <input type="number" name="numero" class="form-control" placeholder="No empleado" autofocus required>
          </div>
          <div class="form-group">
            <input type="text" name="nombre" rows="2" class="form-control" placeholder="Nombre empleado" required>
          </div>
          <div class="form-group">
            <textarea name="rol" rows="2" class="form-control" placeholder="rol del empleado" required></textarea>
          </div>
          <div>
            <label for="mes">Mes:</label>
            <input type="month" id="mes" name="mes">
          </div>
          <div>
          <div class="form-group">
            <input type="number" name="entregas" class="form-control" placeholder="Cantidad de entregas" autofocus required>
          </div>
          </div>
          <input type="submit" name="guardar_movimiento" class="btn btn-success btn-block" value="GUARDAR MOVIMIENTO" required>
        </form>
      </div>
      </div>
    </main>
<?php include('footer.php'); ?>