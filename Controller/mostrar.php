<?php

function getEmpleados(){
    include('../db/conexion.php');
    $Empleados = $con->query("SELECT E.ID, D.Nombre AS D_Nombre, E.Departamento_ID, E.Nombre, E.Apellido, DATE_FORMAT(Fecha_Nacimiento, '%d/%m/%Y') as 'Fecha_Nacimiento', E.Direccion, E.Telefono, E.Puesto, E.Email, DATE_FORMAT(Fecha_Entrada,'%d/%m/%Y') AS 'Fecha_Entrada' FROM empleado AS E INNER JOIN departamento AS D ON E.Departamento_ID = D.ID;");

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

function getNombreD(){
    include('../db/conexion.php');
    $NombreD = $con->query("SELECT ID, Nombre FROM departamento;");
    
    return $NombreD;
}

function getNombreE(){
    include('../db/conexion.php');
    $NombreE = $con->query("SELECT ID, CONCAT_WS(' ', Nombre, Apellido) AS Encargado FROM encargado;");

    return $NombreE;
}

function getUsuarioByEmail($Email, $db){
    include($db);
    $EmpleadoR = 0;
    $EncargadoR = 0;
    $EmpleadoR = $con->query("SELECT * FROM empleado WHERE Email = '$Email'");
    $EncargadoR = $con->query("SELECT * FROM encargado WHERE Email = '$Email'");

    if(mysqli_num_rows($EmpleadoR) > 0){
        $EmpleadoR = $EmpleadoR->fetch_object();
        return $EmpleadoR;
    }
    else if(mysqli_num_rows($EncargadoR) > 0){
        $EncargadoR = $EncargadoR->fetch_object();
        return $EncargadoR;
    }
    return "Usuario no encontrado";
}

function getNomina(){
    include('../../db/conexion.php');
    $Nomina = $con->query("SELECT N.ID, N.ID_Empleado, CONCAT_WS(' ', E.Nombre, E.Apellido) AS Empleado, N.Salario_Base, N.Comision, N.ISR, N.AFP, N.SFS, N.Salirio_Final, DATE_FORMAT(N.Fecha_Nomina, '%d/%m/%Y') as 'Fecha_Nomina' FROM nomina_empleado AS N INNER JOIN empleado AS E ON N.ID_Empleado = E.ID WHERE YEAR(Fecha_Nomina) = YEAR(CURRENT_DATE()) AND MONTH(Fecha_Nomina) = MONTH(CURRENT_DATE()) AND TO_DAYS(Fecha_Nomina)= TO_DAYS(NOW());");

    return $Nomina;
}

function getDescuento(){
    include('../db/conexion.php');
    $Descuento = $con->query("SELECT ID, SFS, ISR_Basico, ISR_Mediano, ISR_Alto, AFP FROM descuentos;");

    return $Descuento;
}
?>