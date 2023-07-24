<?php

include('../model/db.php');

//SE ATIENDE AL BOTON "GUARDAR EMPLEADO" RECIBIENDO NO, ROL Y NOMBRE
if (isset($_POST['guardar_empleado'])) {
  $numero = $_POST['numero_empleado'];
  $nombre = $_POST['nombre_empleado'];
  $rol = $_POST['rol'];
  //
  $query = "call sp_insertar_empleado($numero,'$nombre','$rol');";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location:../view/mostrarEmpleados.php');

}

?>