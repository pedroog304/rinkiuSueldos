<?php

include('db.php');
if (isset($_POST['guardar_movimiento'])) {
  $numero = $_POST['no_empleado'];
  $mes = $_POST['mes'];
  $entregas = $_POST['entregas'];

  $fecha = $mes . '-01';
  $query = "call sp_insertar_movimiento2($numero,'$fecha','$entregas');";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Employee Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location:../view/index.php');

}

?>