<?php
include('../model/db.php');

if  (isset($_GET['no_empleado']) && isset($_GET['fecha'])) {
  $id = $_GET['no_empleado'];
  $fecha =$_GET['fecha'];
  $query = "SELECT e.no_empleado, e.nombre_empleado,e.rol_empleado, m.fecha, (m.pagoxentregas)*.2 as entregas FROM movimientos m inner join empleados e on e.no_empleado = m.no_empleado 
  WHERE m.fecha='$fecha'
  group by m.no_empleado";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $numero = $row['no_empleado'];
    $nombre = $row['nombre_empleado'];
    $rol = $row['rol_empleado'];
    $entregas=$row['entregas'];
    $fecha= substr($fecha, 0, -3);
  }
}

if (isset($_POST['actualizar_movimiento'])) {
    $numero = $_GET['no_empleado'];
    $mesactual =$_POST['mes_actual'];
    $fechaactual = $mesactual . '-01';
    $nombre= $_POST['nombre'];
    $rol = $_POST['rol'];
    $mes=$_POST['mes'];
    $mesnuevo = $mes . '-01';
    $entregas=$_POST['entregas'];
  
    $query = "UPDATE movimientos m set m.pagoxentregas = ($entregas*5), m.fecha='$mesnuevo' WHERE m.no_empleado=$numero and m.fecha = '$fechaactual';";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'employee Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: ../view/index.php');
  }
  ?>