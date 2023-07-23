<?php

include("../model/db.php");

if(isset($_GET['no_empleado'])&& isset($_GET['fecha'])) {
  $numero = $_GET['no_empleado'];
  $fecha = $_GET['fecha'];


  $query = "DELETE from movimientos WHERE no_empleado = $numero and fecha = '$fecha';";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  header('Location: ../view/index.php');
}

?>