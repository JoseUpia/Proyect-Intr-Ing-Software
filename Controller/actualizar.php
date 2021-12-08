<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PROYECT-INTR-ING-SOFTWARE/db/conexion.php');
$entidad = $_REQUEST['Entidad'] ;

if($entidad == 'empleado'){
    actualizarEmpleado();
}


function actualizarEmpleado(){
    include('../db/conexion.php');

                              
    $id = $_REQUEST['ID'];
    $depart = $_REQUEST['departamento'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $Fecha_Nacimiento = $_REQUEST['Fecha_Nacimiento'];
    $telefono = $_REQUEST['telefono'];
    $puesto = $_REQUEST['puesto'];
    $email = $_REQUEST['email'];
    $Fecha_Entrada = $_REQUEST['Fecha_Entrada'];
    $sueldo = $_REQUEST['sueldo'];
                       
        
    $consulta = "UPDATE empleado  SET Departamento_ID = '$depart', Nombre = '$nombre', Apellido = '$apellido', Fecha_Nacimiento = '$Fecha_Nacimiento', Telefono = '$telefono', Puesto = '$puesto',  Email = '$email', Fecha_Entrada = '$Fecha_Entrada', sueldo = $sueldo WHERE ID = '$id' ";
    
    $resultado = mysqli_query($con, $consulta); 

    Procedimiento(); 

    if($resultado){        
        $_SESSION['message'] = '¡Actualizado Satisfactoriamente!';
        $_SESSION['text'] =  'El registro se realizado correctamente';
        $_SESSION['icon'] = 'success';
            
        header("Location: ../view/crear.php");
        }
    else{
        $_SESSION['message'] = '¡Error!';
        $_SESSION['text'] =  $consulta . "<br />" . mysqli_error($con);
        $_SESSION['icon'] = 'error';

        header("Location: ../view/crear.php");
    }
    
}


function pro(){
    include('../db/conexion.php');
    $procedimiento = $con->query("call pr_suma()");
    //return $procedimiento;
    echo "<script type='text/javascript'>
    window.location='../View/crear.php';
</script>";
            
}


function Procedimiento(){

    include('../db/conexion.php');
    $consulta_pro = ("DELETE FROM nomina_empleado WHERE YEAR(Fecha_Nomina) = YEAR(CURRENT_DATE()) AND MONTH(Fecha_Nomina) = MONTH(CURRENT_DATE()) AND TO_DAYS(Fecha_Nomina)= TO_DAYS(NOW())");
    $re = mysqli_query($con, $consulta_pro); 
    pro();
        
}