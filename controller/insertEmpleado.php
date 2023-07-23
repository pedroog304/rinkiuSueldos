<?php

include('../model/db.php');
echo "Hola";
if (isset($_POST['guardar_empleado'])) {
  $numero = $_POST['numero_empleado'];
  $nombre = $_POST['nombre_empleado'];
  $rol = $_POST['rol'];
  $query = "call sp_insertar_empleado($numero,'$nombre','$rol');";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Employee Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location:../view/mostrarEmpleados.php');

}

?>