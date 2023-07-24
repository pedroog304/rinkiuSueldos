<?php include('header.php'); ?>
<?php include('../controller/updateMovimiento.php')?>
      <!-- ACTUALIZAR UN MOVIMIENTO -->
      <div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
    <h5>MODIFICAR MOVIMIENTO</h5>
      <div class="card card-body">
        <form action="../controller/updateMovimiento.php?no_empleado=<?php echo $_GET['no_empleado']; ?>" method="POST" class="needs-validation">
          <!--CAMPO NUMERO DE EMPLEADO ------->
          <div class="form-group" method="">
            <label>Número de empleado</label>
            <input type="number" name="no_empleado" class="form-control" placeholder="No empleado" autofocus required value="<?php echo $numero; ?>" readonly>
    <!-------NOMBRE EMPLEADO-------- -->
          </div>
          <div class="form-group">
          <label>Nombre de empleado</label>
            <input type="text" name="nombre" rows="2" class="form-control" placeholder="Nombre empleado" required value="<?php echo $nombre; ?>" readonly>
          </div>
          <!------ROL DEL EMPLEADO---------->
          <div class="form-group">
            <input name="rol" rows="2" class="form-control" placeholder="rol del empleado" value="<?php echo $rol;?>" required readonly></input>
          </div>
          <!------MES ACTUAL DEL MOVIMIENTO---------->
          <div>
            <label for="mes">Mes actual del movimiento: </label>
            <input name="mes_actual" readonly value="<?php echo $fecha ?>"></input>
            <!------MES A SELECCIONAR--------->
            <input type="month" id="mes" name="mes" value="<?php echo $fecha; ?>" required>
          </div>
          <div>
            <!-------CAMPO ENTREGAS---------->
          <div class="form-group">
            <input type="number" name="entregas" class="form-control" placeholder="Cantidad de entregas" autofocus required value="<?php echo $entregas; ?>">
          </div>
          </div>
          <!-------CANCELAR ACTUALIZACION---------->
          <a class="btn btn-danger" name="" href="index.php">
          Cancelar
        </a>
        <!-------ACTUALIZAR MOVIMIENTO--------->
          <button type="submit" name="actualizar_movimiento" class="btn btn-success" value="ACTUALIZAR MOVIMIENTO" required>ACTUALIZAR MOVIMIENTO</button>
        </form>
      </div>
      </div>
    </main>
<?php include('footer.php'); ?>