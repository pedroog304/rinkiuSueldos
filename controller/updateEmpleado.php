<?php
include('../model/db.php');

//SE ATIENDE AL BOTON "ACTUALIZAR EMPLEADO" RECIBIENDO EL NUMERO DEL EMPLEADO PARA MOSTRAR EN PANTALLA EL RESTO DE LA INFROMACION EN CASA DE NO QUERER EDITAR TODO

if  (isset($_GET['no_empleado'])) {
  $id = $_GET['no_empleado'];
  //
  $query = "SELECT * FROM empleados WHERE no_empleado=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $numero = $row['no_empleado'];
    $nombre = $row['nombre_empleado'];
    $rol = $row['rol_empleado'];
  }
}

//SE ATIENDE A LA ACCION "GUARDAR EMPLEADO ACTUALIZADO" RECIBIENDO SU INFORMACION Y GUARDANDOLA EN LA BD

if (isset($_POST['update_empleado'])) {
    $numero = $_GET['no_empleado'];
    $nombre= $_POST['nombre_empleado'];
    $rol = $_POST['rol_empleado'];
  
    $query = "UPDATE empleados set nombre_empleado = '$nombre', rol_empleado = '$rol' WHERE no_empleado=$numero";
    mysqli_query($conn, $query);
    header('Location: ../view/mostrarEmpleados.php');
  }
?>