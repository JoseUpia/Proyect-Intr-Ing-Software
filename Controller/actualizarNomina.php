<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PROYECT-INTR-ING-SOFTWARE/db/conexion.php');
$entidad = $_REQUEST['Entidad'] ;

if($entidad == 'descuentos'){
    actualizarDescuento();
}elseif($entidad == 'nomina_emp'){
    actualizarNomina();
}elseif($entidad == 'generar'){
    pro(); 
}


function pro(){
    include('../db/conexion.php');
    $procedimiento = $con->query("call pr_suma()");
    //return $procedimiento;
    echo "<script type='text/javascript'>
    window.location='../View/moduloNomina.php';
</script>";   
            
}


function Procedimiento(){

    include('../db/conexion.php');
    $consulta_pro = ("DELETE FROM nomina_empleado WHERE YEAR(Fecha_Nomina) = YEAR(CURRENT_DATE()) AND MONTH(Fecha_Nomina) = MONTH(CURRENT_DATE()) AND TO_DAYS(Fecha_Nomina)= TO_DAYS(NOW())");
    $re = mysqli_query($con, $consulta_pro); 
    pro();
    
}


function actualizarDescuento(){
    include('../db/conexion.php');

                              
    $id = $_REQUEST['ID'];
    $sfs = $_REQUEST['SFS'];
    $isr_basico = $_REQUEST['ISR_Basico'];
    $isr_mediano = $_REQUEST['ISR_Mediano'];
    $isr_alto = $_REQUEST['ISR_Alto'];
    $afp = $_REQUEST['AFP'];
                    
        
    $consulta = "UPDATE descuentos  SET SFS = '$sfs', ISR_Basico = '$isr_basico', ISR_Mediano = '$isr_mediano', ISR_Alto = '$isr_alto', AFP = '$afp' WHERE ID = '$id' ";
                
    $resultado = mysqli_query($con, $consulta); 
    
    Procedimiento();  
    
}

function actualizarNomina(){
    include('../db/conexion.php');
                              
    $id_n = $_REQUEST['ID'];   
    $comision = $_REQUEST['Comision'];                        
       
    $consultas = "UPDATE nomina_empleado SET Comision = '$comision' WHERE ID_Empleado = '$id_n' AND YEAR(Fecha_Nomina) = YEAR(CURRENT_DATE()) AND MONTH(Fecha_Nomina) = MONTH(CURRENT_DATE()) AND TO_DAYS(Fecha_Nomina)= TO_DAYS(NOW())";
                
    $resultado_n = mysqli_query($con, $consultas); 
    Procedimiento(); 
         
    if($resultado_n){        
        $_SESSION['message'] = '¡Actualizado Satisfactoriamente!';
        $_SESSION['text'] =  'El registro se realizado correctamente';
        $_SESSION['icon'] = 'success';
            
        header("Location: ../view/moduloNomina.php");
        }
    else{
        $_SESSION['message'] = '¡Error!';
        $_SESSION['text'] =  $consulta . "<br />" . mysqli_error($con);
        $_SESSION['icon'] = 'error';

        header("Location: ../view/moduloNomina.php");
    }
    
        
}

?>