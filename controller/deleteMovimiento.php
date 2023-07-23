<?php

include("../model/db.php");

if(isset($_GET['no_empleado'])&& isset($_GET['fecha'])) {
  $numero = $_GET['no_empleado'];
  $fecha = $_GET['fecha'];


  $query = "call sp_borrar_movimiento($numero, '$fecha');";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  header('Location: ../view/index.php');
}

?>