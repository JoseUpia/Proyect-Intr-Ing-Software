<?php
    session_start();

    if(isset($_POST['RegistrarDepartamento'])){
        registrarDepartamento();
    }
    elseif(isset($_POST['RegistrarEmpleado'])){
        registrarEmpleado();
    }
    elseif(isset($_POST['RegistrarEncargado'])){
        registrarEncargado();
    }
    elseif(isset($_POST['RegistrarNomina'])){
        registrarNomina();
    }

    function registrarDepartamento(){
        include('../db/conexion.php');

        if(isset($_POST['encargado_id'], $_POST['nombre'], $_POST['descripcion']) 
        AND $_POST['encargado_id'] != '' AND $_POST['nombre'] != '' AND $_POST['descripcion'] != ''){
            $encargado = $_POST['encargado_id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
    
            $consulta = "INSERT INTO departamento (Encargado_ID, Nombre, Descripcion) VALUES ('$encargado', '$nombre', '$descripcion')";
            $resultado = mysqli_query($con, $consulta);
    
            if($resultado){
                $_SESSION['message'] = '¡Guardado Satisfactoriamente!';
                $_SESSION['text'] =  'El registro se realizado correctamente';
                $_SESSION['icon'] = 'success';
                
                header("Location: ../view/crearDepartamento.php");
            }
            else{
                $_SESSION['message'] = '¡Error!';
                $_SESSION['text'] =  $consulta . "<br />" . mysqli_error($con);
                $_SESSION['icon'] = 'error';

                header("Location: ../view/crearDepartamento.php");
            }
        }
        else{
            $_SESSION['message'] = '¡Advertencia!';
            $_SESSION['text'] =  'Existen campos vacíos, intentelo otra vez';
            $_SESSION['icon'] = 'warning';

            header("Location: ../view/crearDepartamento.php");
        }
    }

    function registrarEmpleado(){
        include('../db/conexion.php');
       
        if(isset($_POST['departamento_id'] ,$_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['telefono'], $_POST['email'], $_POST['password'], $_POST['fecha_entrada'], $_POST['sueldo'])){
            $departamento_id = $_POST['departamento_id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $puesto = $_POST['puesto'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fecha_entrada = $_POST['fecha_entrada'];
            $sueldo = $_POST['sueldo'];
    
            $consulta = "INSERT INTO empleado (Departamento_ID ,Nombre, Apellido, Fecha_Nacimiento, Direccion, Telefono, Puesto, Email, Contr, Fecha_Entrada, sueldo) VALUES ('$departamento_id', '$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$puesto', '$email', '$password', '$fecha_entrada', '$sueldo')";
            $resultado = mysqli_query($con, $consulta);

            if($resultado){
                $_SESSION['message'] = '¡Guardado Satisfactoriamente!';
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
        else{
            $_SESSION['message'] = '¡Advertencia!';
            $_SESSION['text'] =  'Existen campos vacíos, intentelo otra vez';
            $_SESSION['icon'] = 'warning';

            header("Location: ../view/crear.php");
        }
    }


    function registrarEncargado(){
        include('../db/conexion.php');

        if(isset($_POST['Enombre'], $_POST['Eapellido'], $_POST['Efecha_nacimiento'], $_POST['Edireccion'], $_POST['Etelefono'], $_POST['Eemail'], $_POST['Epassword'], $_POST['Efecha_entrada'])
        AND $_POST['Enombre'] != '' AND $_POST['Eapellido'] != '' AND $_POST['Efecha_nacimiento'] != '' AND $_POST['Edireccion'] != '' AND $_POST['Etelefono'] != ''
        AND $_POST['Eemail'] != '' AND $_POST['Efecha_entrada'] != ''){
            $nombre = $_POST['Enombre'];
            $apellido = $_POST['Eapellido'];
            $fecha_nacimiento = $_POST['Efecha_nacimiento'];
            $direccion = $_POST['Edireccion'];
            $telefono = $_POST['Etelefono'];
            $email = $_POST['Eemail'];
            $fecha_entrada = $_POST['Efecha_entrada'];
            $password = $_POST['password'];
    
            $consulta = "INSERT INTO encargado (Nombre, Apellido, Fecha_Nacimiento, Direccion, Telefono, Email, Contr, Fecha_Entrada) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$email', '$password', '$fecha_entrada')";
            $resultado = mysqli_query($con, $consulta);

            if($resultado){
                $_SESSION['message'] = '¡Guardado Satisfactoriamente!';
                $_SESSION['text'] =  'El registro se realizado correctamente';
                $_SESSION['icon'] = 'success';

                header("Location: ../view/crearEncargado.php");
            }
            else{
                $_SESSION['message'] = '¡Error!';
                $_SESSION['text'] =  $consulta . "<br />" . mysqli_error($con);
                $_SESSION['icon'] = 'error';

                header("Location: ../view/crearEncargado.php");
            }
        }
        else{
            $_SESSION['message'] = '¡Advertencia!';
            $_SESSION['text'] =  'Existen campos vacíos, intentelo otra vez';
            $_SESSION['icon'] = 'warning';

            header("Location: ../view/crearEncargado.php");
        }
    }

    function registrarNomina(){
        include('../db/conexion.php');
       
        if(isset($_POST['ID_Empleado'], $_POST['Salario_Base'], $_POST['Comision'])
        AND $_POST['ID_Empleado'] != '' AND $_POST['Salario_Base'] != '' AND $_POST['Comision'] != ''){
            $id = $_POST['ID_Empleado'];
            $salario_Base = $_POST['Salario_Base'];
            $comision = $_POST['Comision'];
                
            $consulta = "INSERT INTO nomina_empleado (ID_Empleado, Salario_Base, Comision) VALUES ('$id', '$salario_Base', '$comision')";
            $resultado = mysqli_query($con, $consulta);

            if($resultado){
                $_SESSION['message'] = '¡Guardado Satisfactoriamente!';
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
        else{
            $_SESSION['message'] = '¡Advertencia!';
            $_SESSION['text'] =  'Existen campos vacíos, intentelo otra vez';
            $_SESSION['icon'] = 'warning';

            header("Location: ../view/moduloNomina.php");
        }
    }
?>

