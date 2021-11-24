<?php
include($_SERVER['DOCUMENT_ROOT'].'/Aprendizaje PHP/Controller/insertar.php');

$_SESSION['titulo'] = 'Departamento';
include('../include/header.php');

$_SESSION["inicio"] = "../inicio.php"; 
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";

include('../include/nav.php');
?>

<main class="container">

    <form action="Controller/insertar.php" method="post">
        <input type="number" placeholder="ID del Encargado" name="encargado_id">
        <br />
        <input type="text" placeholder="Nombre" name="nombre">
        <br />
        <input type="text" placeholder="Descripcion" name="descripcion">
        <br />
        <button type="submit" name="RegistrarDepartamento">Registrar Departamento</button>
    </form>
    
</main>


<?php include_once("../include/footer.php") ?>