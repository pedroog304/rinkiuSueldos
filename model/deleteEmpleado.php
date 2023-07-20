<?php

include("db.php");

if(isset($_GET['no_empleado'])) {
  $numero = $_GET['no_empleado'];


  $query = "DELETE from empleados WHERE no_empleado = $numero";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  header('Location: ../view/mostrarEmpleados.php');
}

?>