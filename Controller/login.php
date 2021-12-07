<?php

session_start();
if (isset($_POST['username'], $_POST['password'])) {
    include('../db/conexion.php');
    $Email = $_POST['username'];
    $Contr = $_POST['password'];
?><script>
        alert('Holaaaaaa');
    </script>
<?php
    $Empleado = $con->query("SELECT * FROM empleado WHERE Email = '$Email' AND Contr = '$Contr'");
    $Encargado = $con->query("SELECT * FROM encargado WHERE Email = '$Email' AND Contr = '$Contr'");

    if (mysqli_num_rows($Empleado) > 0) {

        $_SESSION['Usuario'] = $Email;
        header("Location: ../view/Empleado/vistaEmpleado.php");
        exit;
    }

    if (mysqli_num_rows($Encargado) > 0) {
        $_SESSION['Usuario'] = $Email;
        header("Location: ../inicio.php");
        exit;
    }
    $_SESSION['Mensaje'] = '<div class="alert alert-danger" role="alert">
                                Credenciales Incorrectas!
                            </div>';
    header('location: ../index.php');
    exit;
}
