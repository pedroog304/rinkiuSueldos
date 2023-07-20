<?php include('header.php'); ?>
<?php include('../model/updateEmpleado.php')?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
    <h5>MODIFICAR EMPLEADO</h5>
      <div class="card card-body">
      <form action="modificarEmpleado.php?no_empleado=<?php echo $_GET['no_empleado']; ?>" method="POST" class="needs-validation">
        <div class="form-group">
            <p>Número de empleado</p>
          <input name="no_empleado" type="number" class="form-control" value="<?php echo $numero; ?>"  required>
        </div>
        <div class="form-group">
        <p>Nombre del empleado</p>
        <input  type="text" name="nombre_empleado" class="form-control" cols="30" rows="1" value="<?php echo $nombre;?>" required> 
        </div>
        <div class="form-group">
        <p>Rol del empleado (actualmente <?php echo $rol?> )</p>
        <input type="radio" name="rol_empleado" value="chofer">
      Chofer
    </label>
    <label>
      <input type="radio" name="rol_empleado" value="cargador">
      Cargador
    </label>
    <label>
      <input type="radio" name="rol_empleado" value="auxiliar">
      Auxiliar
    </label>
    </div>
        <button class="btn-success" name="update_empleado">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>