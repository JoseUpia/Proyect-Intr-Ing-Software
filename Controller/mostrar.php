<?php

include_once('db/getEmpleados.php');


function getEmpleados(){
    include('db/conexion.php');
    $Empleados = $con->query("SELECT * FROM empleado");

    return $Empleados;
}


function getDepartamentos(){
    include('db/conexion.php');
    $Empleados = $con->query("SELECT * FROM departamento");

    return $Empleados;
}


function getEncargados(){
    include('db/conexion.php');
    $Empleados = $con->query("SELECT * FROM encargado");

    return $Empleados;
}

?>