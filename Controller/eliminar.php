<?php
include($_SERVER['DOCUMENT_ROOT'].'/PROYECT-INTR-ING-SOFTWARE/db/conexion.php');
$idempleado    	 = $_REQUEST['ID']; 

$sqlDeleteProd    = ("DELETE FROM empleado WHERE  ID='" .$idempleado. "'");
$resultProd 	  = mysqli_query($con, $sqlDeleteProd);


header("Location:../inicio.php");
exit();

?>