<?php
    include_once('conexion.php');


    if(isset($_POST['encargado_id'], $_POST['nombre'], $_POST['descripcion'])){
        $encargado = $_POST['encargado_id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        
        $consulta = "INSERT INTO departamento (Encargado_ID, Nombre, Descripcion) VALUES ('$encargado', '$nombre', '$descripcion')";
        
        if(mysqli_query($con, $consulta)){
            header("Location: index.php");
        }
        else{
            echo 'Error al insertar datos';
            echo "ERROR: " . $consulta . "<br />" . mysqli_error($con);
        }
    }
    else{
        echo "Error Probando else";
    }

    if(isset($_POST['Enombre'], $_POST['Eapellido'], $_POST['Efecha_nacimiento'], $_POST['Edireccion'], $_POST['Etelefono'], $_POST['Eemail'], $_POST['Efecha_entrada'])){
        $nombre = $_POST['Enombre'];
        $apellido = $_POST['Eapellido'];
        $fecha_nacimiento = $_POST['Efecha_nacimiento'];
        $direccion = $_POST['Edireccion'];
        $telefono = $_POST['Etelefono'];
        $email = $_POST['Eemail'];
        $fecha_entrada = $_POST['Efecha_entrada'];

        $consulta = "INSERT INTO encargado (Nombre, Apellido, Fecha_Nacimiento, Direccion, Telefono, Email, Fecha_Entrada) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$email', '$fecha_entrada')";
        
        if(mysqli_query($con, $consulta)){
            header("Location: index.php");
        }
        else{
            echo 'Error al insertar datos';
            echo "ERROR: " . $consulta . "<br />" . mysqli_error($con);
        }
    }
    else{
        echo "Error Probando else";
    }

    if(isset($_POST['departamento_id'] ,$_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['telefono'], $_POST['email'], $_POST['fecha_entrada'])){
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

        if(mysqli_query($con, $consulta)){
            header("Location: index.php");
        }
        else{
            echo 'Error al insertar datos';
            echo "ERROR: " . $consulta . "<br />" . mysqli_error($con);
        }
    }
    else{
        echo "Error Probando else";
    }
?>