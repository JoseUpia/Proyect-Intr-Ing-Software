<?php
include($_SERVER['DOCUMENT_ROOT'].'/Aprendizaje PHP/db/conexion.php');

$entidad = $_REQUEST['Entidad'] ;
$id    	 = $_REQUEST['ID']; 

$sqlDeleteProd    = ("DELETE FROM $entidad WHERE  ID='" .$id. "'");
$resultProd 	  = mysqli_query($con, $sqlDeleteProd);

if($entidad == 'empleado'){
    header("Location:../view/crear.php");
}elseif($entidad == 'encargado'){
    header("Location:../view/crearEncargado.php");
}elseif($entidad == 'departamento'){
    header("Location:../view/crearDepartamento.php");
}

exit();
?>