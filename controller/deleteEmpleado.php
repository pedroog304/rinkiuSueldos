<?php

include("../model/db.php");
//SE ATIENDE AL BOTON "ELIMINAR EMPLEADO" RECIBIENDO EL NUMERO DEL EMPLEADO A ELIMINAR 
if(isset($_GET['no_empleado'])) {
  $numero = $_GET['no_empleado'];
  //
  $query = "call sp_borrar_empleado($numero);";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  header('Location: ../view/mostrarEmpleados.php');
}

?>