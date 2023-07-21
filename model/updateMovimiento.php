<?php
include('db.php');
if  (isset($_GET['no_empleado']) && isset($_GET['fecha'])) {
  $id = $_GET['no_empleado'];
  $fecha =$_GET['fecha'];
  $query = "SELECT e.no_empleado, e.nombre_empleado,e.rol_empleado, m.fecha, (m.pagoxentregas) as entregas FROM movimientos m inner join empleados e on e.no_empleado = m.no_empleado 
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
