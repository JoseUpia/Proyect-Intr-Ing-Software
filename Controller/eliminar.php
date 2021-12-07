<?php
session_start();

include('../db/conexion.php');

$entidad = $_REQUEST['Entidad'] ;
$id    	 = $_REQUEST['ID']; 
$ruta    = $_REQUEST['Ruta'];

$sqlDeleteProd    = ("DELETE FROM $entidad WHERE  ID='" .$id. "'");
$resultProd 	  = mysqli_query($con, $sqlDeleteProd);

if($resultProd){
    if($entidad == 'empleado'){   
        $_SESSION['eliminar'] = 'Empleado';

        header("Location:../view/crear.php");
    }elseif($entidad == 'encargado'){
        $_SESSION['eliminar'] = 'Encargado';

        header("Location:../view/crearEncargado.php");
    }elseif($entidad == 'departamento'){
        $_SESSION['eliminar'] = 'Departamento';

        header("Location:../view/crearDepartamento.php");
    }
    elseif($entidad == "solicitudVacaciones" && $ruta == "Encargado"){
        $_SESSION['eliminar'] = 'vacaciones';

        header("Location:../view/vacaciones.php");
    }
    elseif($entidad == "solicitudVacaciones" && $ruta == "Empleado"){
        $_SESSION['eliminar'] = 'vacaciones';

        header("Location:../view/Empleado/vacaciones.php");
    }
}

exit();
?>