<?php
include_once('../../include/session_start.php');
if(!isset($_SESSION['Usuario'])){
    header('location: ../../index.php');
    session_destroy();
    exit;
}

include('../../Controller/mostrar.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    include('../../include/bootstrapHeader.php');
    include('../../include/navEmpleados.php');
    ?>
    <title>Empleado ITLA</title>
</head>
<body>



    <?php include('../../include/bootstrapFooter.php');?>
</body>
</html>