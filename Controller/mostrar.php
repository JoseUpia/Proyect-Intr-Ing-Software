<?php

function getEmpleados(){
    include('../db/conexion.php');
    $Empleados = $con->query("SELECT E.ID, D.Nombre AS D_Nombre, E.Nombre, E.Apellido, DATE_FORMAT(Fecha_Nacimiento, '%d/%m/%Y') as 'Fecha_Nacimiento', E.Direccion, E.Telefono, E.Puesto, E.Email, DATE_FORMAT(Fecha_Entrada,'%d/%m/%Y') AS 'Fecha_Entrada' FROM empleado AS E INNER JOIN departamento AS D ON E.Departamento_ID = D.ID;");

    return $Empleados;
}
function getOneEmpleado($empleadoId){
    include('../db/conexion.php');
    $Empleado = $con->query("SELECT id, Nombre, Apellido, DATE_FORMAT(Fecha_Entrada, '%d/%m/%Y') as 'Fecha_Entrada' FROM empleado WHERE id = " . $empleadoId);
    return $Empleado;
}

function getDepartamentos(){
    include('../db/conexion.php');
    $Departamento = $con->query("SELECT D.ID, CONCAT_WS(' ', E.Nombre, E.Apellido) AS Encargado, D.Nombre as Departamento, D.Descripcion FROM departamento AS D INNER JOIN encargado AS E ON D.Encargado_ID = E.ID;");
    
    return $Departamento;
}


function getEncargados(){
    include('../db/conexion.php');
    $Encargado = $con->query("SELECT ID, Nombre, Apellido, DATE_FORMAT(Fecha_Nacimiento, '%d/%m/%Y') as 'Fecha_Nacimiento', Direccion, Telefono, Email, DATE_FORMAT(Fecha_Entrada, '%d/%m/%Y') AS 'Fecha_Entrada' FROM encargado;");

    return $Encargado;
}

?>