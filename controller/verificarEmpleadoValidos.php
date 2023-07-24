<?php
include('../model/db.php');

// Consulta para obtener los empleados registrados
$sql = "SELECT no_empleado FROM empleados";
$result = mysqli_query($conn,$sql);

// Crear un array para almacenar los ID de empleados registrados en la base de datos
$empleados_registrados = array();

// Recorrer el resultado de la consulta y agregar los NO de empleados al array
while ($row = $result->fetch_assoc()) {
    $empleados_registrados[] = $row['no_empleado'];
}
$conn->close();

// Crear una lista de todos los NO de empleados posibles (supongamos que va desde el 1 al 500)
$empleados_totales = range(1, 500);

// Filtrar los NO de empleados que no están registrados
$empleados_no_registrados = array_diff($empleados_totales, $empleados_registrados);
?>




