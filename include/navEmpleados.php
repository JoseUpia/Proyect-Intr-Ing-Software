<?php
include_once('../../include/session_start.php');
$UsuarioR = getUsuarioByEmail($_SESSION['Usuario'], "../../db/conexion.php");

$_SESSION['Empleado'] = $UsuarioR->Nombre;

?>
<nav class="navbar navbar-expand-lg my-0 navbar-dark" style="background: rgb(2, 56, 118);">
    <div class="container-fluid">
        <div class="navLeft">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="nav-item">
                    <a class="nav-link" href='vistaEmpleado.php'><img src="https://itla.edu.do/wp-content/uploads/2021/03/logo-fondo-azul-preview-1.jpg" width="60px" alt="Card image cap"></a>
                </div>
                <li class="nav-item btn">
                    <a class="nav-link" href="vacaciones.php">Solicitar Vacaciones</a>
                </li>
                <li class="nav-item btn">
                    <a class="nav-link" href="VistaNominaEmpleado.php">Ver nomina</a>
                </li>
            </ul>
        </div>
        <div class="navRight">
            <ul class="navbar-nav">
                <li class="nav-item btn">
                    <a class="nav-link"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['Empleado']; ?></a>
                </li>
                <li class="nav-item btn">
                    <a class="nav-link" href="../../index.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>