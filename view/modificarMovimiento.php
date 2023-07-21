<?php include('header.php'); ?>
<?php include('../model/updateMovimiento.php')?>
      <!-- REGISTRAR NUEVO MOVIMIENTO -->
      <div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
    <h5>REGISTRAR NUEVO MOVIMIENTO</h5>
      <div class="card card-body">
        <form action="../model/updateMovimiento.php?no_empleado=<?php echo $_GET['no_empleado']; ?>" method="POST" class="needs-validation">
          <!--CAMPO NUMERO DE EMPLEADO ------------------------------------->
          <div class="form-group" method="">
            <label>Número de empleado</label>
            <input type="number" name="no_empleado" class="form-control" placeholder="No empleado" autofocus required value="<?php echo $numero; ?>" readonly>
    <!-----------------------NOMBRE EMPLEADO--------------------------------------- -->
          </div>
          <div class="form-group">
          <label>Nombre de empleado</label>
            <input type="text" name="nombre" rows="2" class="form-control" placeholder="Nombre empleado" required value="<?php echo $nombre; ?>" readonly>
          </div>
          <!--------------------------ROL DEL EMPLEADO------------------------>
          <div class="form-group">
            <input name="rol" rows="2" class="form-control" placeholder="rol del empleado" value="<?php echo $rol;?>" required readonly></input>
          </div>
          <div>
            <label for="mes">Mes actual del movimiento: </label>
            <input name="mes_actual" onlyread value="<?php echo $fecha ?>"></input>
            <input type="month" id="mes" name="mes" value="<?php echo $fecha; ?>">
          </div>
          <div>
          <div class="form-group">
            <input type="number" name="entregas" class="form-control" placeholder="Cantidad de entregas" autofocus required value="<?php echo $entregas; ?>">
          </div>
          </div>
          <input type="submit" name="actualizar_movimiento" class="btn btn-success btn-block" value="ACTUALIZAR MOVIMIENTO" required>
        </form>
      </div>
      </div>
    </main>
<?php include('footer.php'); ?>