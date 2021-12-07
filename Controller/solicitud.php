<?php 

if(isset($_POST['Solicitar'])){
    $FechaInicio = $_POST['Fecha_Desde'];
    $FechaFinal = $_POST['Fecha_Hasta'];
    $ID = $_REQUEST['Usuario'];

    if($_POST['Mensaje'] != ''){
        $Mensaje = $_POST['Mensaje'];
    }
    else{
        $Mensaje = 'N/A';
    }

    SolicitarV($ID, $FechaInicio, $FechaFinal, $Mensaje);
}



function getSolicitudById($ID){
    include("../../db/conexion.php");
    $Vacaciones = $con->query("SELECT ID, Estado, FechaInicio, FechaFinal, Descripcion FROM solicitudVacaciones WHERE Empleado_ID = $ID");

    return $Vacaciones;
}

function SolicitarV($ID, $FechaInicio, $FechaFinal, $Mensaje){
    include("../db/conexion.php");
    $consulta = "INSERT INTO solicitudvacaciones(Empleado_ID, Estado, FechaInicio, FechaFinal, DiasSelecionados, Descripcion)
    VALUES('$ID', '0', '$FechaInicio', '$FechaFinal', TIMESTAMPDIFF(DAY, '$FechaInicio', '$FechaFinal'), '$Mensaje');";
    
    echo $consulta;
    $resultado = mysqli_query($con, $consulta);
    if($resultado){
        header("Location: ../View/Empleado/vacaciones.php");
    }
}

function calcularDiasDisponibles($ID){
    include("../../db/conexion.php");
    $DiasTotal = $con->query("SELECT TIMESTAMPDIFF(YEAR, E.Fecha_Entrada, CURDATE()) AS YearsWorked FROM empleado AS E WHERE ID = $ID;");
    $DiasUsados = $con->query("SELECT SUM(DiasSelecionados) DiasSelecionados FROM solicitudvacaciones WHERE Empleado_ID = $ID;");
    $DiasTotal = $DiasTotal->fetch_object();
    $DiasUsados = $DiasUsados->fetch_object();


    if($DiasTotal->YearsWorked >= 1 & $DiasTotal->YearsWorked < 5){
        return 14 - $DiasUsados->DiasSelecionados;
    }
    else if($YearsWorked->YearsWorked > 5){
        return 18 - $DiasUsados->DiasSelecionados;
    }
}


function getSolicitudVacaciones($ID){
    include('../db/conexion.php');
    $Empleados = $con->query("SELECT sV.ID, CONCAT_WS(' ', E.Nombre, E.Apellido) Empleado, sV.Estado, sV.FechaInicio, sV.FechaFinal, sV.DiasSelecionados, sV.Descripcion 
    FROM solicitudvacaciones AS sV
    INNER JOIN empleado E ON E.ID = sV.Empleado_ID
    INNER JOIN departamento D ON D.ID = E.Departamento_ID
    WHERE D.Encargado_ID = '$ID';");

    return $Empleados;
}

function actualizarEstadoById($ID, $Estado){
    include('../db/conexion.php');
    
    $consulta = "UPDATE solicitudvacaciones SET Estado = '$Estado' WHERE ID = '$ID'";
    $Actualizar = mysqli_query($con, $consulta);

    header("Location: vacaciones.php");

}


if(isset($_REQUEST['ID'])){
    $ID = $_REQUEST['ID'];
    $FechaInicio = $_POST['Fecha_Desde'];
    $FechaFinal = $_POST['Fecha_Hasta'];
    $Mensaje = $_POST['Mensaje'];

    if($_POST['Mensaje'] != ''){
        $Mensaje = $_POST['Mensaje'];
    }
    else{
        $Mensaje = 'N/A';
    }

    actualizarSolicitudById($ID, $FechaInicio, $FechaFinal, $Mensaje);   
}

function actualizarSolicitudById($ID, $FechaInicio, $FechaFinal, $Mensaje){
    include('../db/conexion.php');

    $consulta = "UPDATE solicitudvacaciones SET FechaInicio = '$FechaInicio', FechaFinal = '$FechaFinal', 
    DiasSelecionados = TIMESTAMPDIFF(DAY, '$FechaInicio', '$FechaFinal'), Descripcion = '$Mensaje' WHERE ID = '$ID';";


    mysqli_query($con, $consulta);

    header("Location: ../View/Empleado/vacaciones.php");
}


