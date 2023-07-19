<?php include('header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6">
      <a id="btn-ver-empleados" href="" class="btn btn-success btn-block" value="Ver empleados">Visualizar lista de empleados</a>
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
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>