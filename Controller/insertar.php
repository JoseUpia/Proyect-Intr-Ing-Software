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

    function registrarDepartamento(){
        include($_SERVER['DOCUMENT_ROOT'].'/Aprendizaje PHP/db/conexion.php');

        if(isset($_POST['encargado_id'], $_POST['nombre'], $_POST['descripcion']) 
        AND $_POST['encargado_id'] != '' AND $_POST['nombre'] != '' AND $_POST['descripcion'] != ''){
            $encargado = $_POST['encargado_id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
    
            $consulta = "INSERT INTO departamento (Encargado_ID, Nombre, Descripcion) VALUES ('$encargado', '$nombre', '$descripcion')";
            $resultado = mysqli_query($con, $consulta);
    
            if($resultado){
                $_SESSION['titulo'] = '¡Guardado!';
                $_SESSION['text'] =  'El registro se realizado correctamente';
                $_SESSION['icon'] = 'success';
                
                header("Location: ../index.php");
            }
            else{
                $_SESSION['titulo'] = '¡Error!';
                $_SESSION['text'] =  $consulta . "<br />" . mysqli_error($con);
                $_SESSION['icon'] = 'error';

                header("Location: ../index.php");
            }
        }
        else{
            $_SESSION['titulo'] = '¡Advertencia!';
            $_SESSION['text'] =  'Existen campos vacíos, intentelo otra vez';
            $_SESSION['icon'] = 'warning';

            header("Location: ../index.php");
        }
    }

    function registrarEmpleado(){
        include($_SERVER['DOCUMENT_ROOT'].'/Aprendizaje PHP/db/conexion.php');

        if(isset($_POST['departamento_id'] ,$_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['telefono'], $_POST['puesto'], $_POST['email'], $_POST['fecha_entrada']) 
        AND $_POST['departamento_id'] != '' AND $_POST['nombre'] != '' AND $_POST['apellido'] != '' AND $_POST['fecha_nacimiento'] != '' AND $_POST['direccion'] != '' AND $_POST['telefono'] != ''
        AND $_POST['puesto'] != '' AND $_POST['email'] != '' AND $_POST['fecha_entrada'] != ''){
            $departamento_id = $_POST['departamento_id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $puesto = $_POST['puesto'];
            $email = $_POST['email'];
            $fecha_entrada = $_POST['fecha_entrada'];
    
            $consulta = "INSERT INTO empleado (Departamento_ID ,Nombre, Apellido, Fecha_Nacimiento, Direccion, Telefono, Puesto, Email, Fecha_Entrada) VALUES ('$departamento_id', '$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$puesto', '$email', '$fecha_entrada')";
            $resultado = mysqli_query($con, $consulta);

            if($resultado){
                $_SESSION['message'] = '¡Guardado Correctamente!';
                $_SESSION['message_type'] =  'success';
                $_SESSION['message_ico'] = '<use xlink:href="#check-circle-fill"/>';

                header("Location: ../index.php");
            }
            else{
                $_SESSION['message'] = '¡Error!' . $consulta . "<br />" . mysqli_error($con);
                $_SESSION['message_type'] =  'danger';
                $_SESSION['message_ico'] = '<use xlink:href="#exclamation-triangle-fill"/>';

                header("Location: ../index.php");
            }
        }
        else{
            $_SESSION['message'] = '¡Existen campos vacíos, intentelo otra vez!';
            $_SESSION['message_type'] =  'warning';
            $_SESSION['message_ico'] = '<use xlink:href="#exclamation-triangle-fill"/>';

            header("Location: ../index.php");
        }
    }


    function registrarEncargado(){
        include($_SERVER['DOCUMENT_ROOT'].'/Aprendizaje PHP/db/conexion.php');

        if(isset($_POST['Enombre'], $_POST['Eapellido'], $_POST['Efecha_nacimiento'], $_POST['Edireccion'], $_POST['Etelefono'], $_POST['Eemail'], $_POST['Efecha_entrada'])
        AND $_POST['Enombre'] != '' AND $_POST['Eapellido'] != '' AND $_POST['Efecha_nacimiento'] != '' AND $_POST['Edireccion'] != '' AND $_POST['Etelefono'] != ''
        AND $_POST['Eemail'] != '' AND $_POST['Efecha_entrada'] != ''){
            $nombre = $_POST['Enombre'];
            $apellido = $_POST['Eapellido'];
            $fecha_nacimiento = $_POST['Efecha_nacimiento'];
            $direccion = $_POST['Edireccion'];
            $telefono = $_POST['Etelefono'];
            $email = $_POST['Eemail'];
            $fecha_entrada = $_POST['Efecha_entrada'];
    
            $consulta = "INSERT INTO encargado (Nombre, Apellido, Fecha_Nacimiento, Direccion, Telefono, Email, Fecha_Entrada) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$email', '$fecha_entrada')";
            $resultado = mysqli_query($con, $consulta);

            if($resultado){
                $_SESSION['message'] = '¡Guardado Correctamente!';
                $_SESSION['message_type'] =  'success';
                $_SESSION['message_ico'] = '<use xlink:href="#check-circle-fill"/>';

                header("Location: ../index.php");
            }
            else{
                $_SESSION['message'] = '¡Error!' . $consulta . "<br />" . mysqli_error($con);
                $_SESSION['message_type'] =  'danger';
                $_SESSION['message_ico'] = '<use xlink:href="#exclamation-triangle-fill"/>';

                header("Location: ../index.php");
            }
        }
        else{
            $_SESSION['message'] = '¡Existen campos vacíos, intentelo otra vez!';
            $_SESSION['message_type'] =  'warning';
            $_SESSION['message_ico'] = '<use xlink:href="#exclamation-triangle-fill"/>';

            header("Location: ../index.php");
        }
    }
?>

