<?php
    
    function M_Empleados(){
        include('conexion.php');
        $Empleados = $con->query("SELECT * FROM empleado");
        return $Empleados;
    }
?>