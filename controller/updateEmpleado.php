<?php
include('../model/db.php');
if  (isset($_GET['no_empleado'])) {
  $id = $_GET['no_empleado'];
  $query = "SELECT * FROM empleados WHERE no_empleado=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $numero = $row['no_empleado'];
    $nombre = $row['nombre_empleado'];
    $rol = $row['rol_empleado'];
  }
}

if (isset($_POST['update_empleado'])) {
    $numero = $_GET['no_empleado'];
    $nombre= $_POST['nombre_empleado'];
    $rol = $_POST['rol_empleado'];
  
    $query = "UPDATE empleados set nombre_empleado = '$nombre', rol_empleado = '$rol' WHERE no_empleado=$numero";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'employee Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: ../view/mostrarEmpleados.php');
  }
?>