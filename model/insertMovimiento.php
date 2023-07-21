<?php

include('db.php');
if (isset($_POST['guardar_movimiento'])) {
  $numero = $_POST['no_empleado'];
  $mes = $_POST['mes'];
  $entregas = $_POST['entregas'];
  $query = "call sp_insertar_movimiento2($numero,'2023-05-01','$entregas');";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Employee Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location:../view/index.php');

}

?>