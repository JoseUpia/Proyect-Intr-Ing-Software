<?php 
$_SESSION['titulo'] = 'Inicio';
include('include/header.php');

$_SESSION["inicio"] = "";
$_SESSION["departamento"] = "view/crearDepartamento.php";
$_SESSION["encargado"] = "view/crearEncargado.php";
$_SESSION["empleado"] = "view/crear.php";

include('include/nav.php');
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


<?php include_once("include/footer.php") ?>