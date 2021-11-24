<?php
include($_SERVER['DOCUMENT_ROOT'].'/PROYECT-INTR-ING-SOFTWARE/Controller/insertar.php');
?>

<?php include('../include/header.php') ?>

<?php 
$_SESSION["incio"] = "../inicio.php"; 
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";
include('../include/nav.php');

?>

<main class="container m-10">
    <h1>Registro de Departamentos</h1>

    <form action="../Controller/insertar.php" method="post">
        <input type="number" class="form-control" placeholder="ID del Encargado" name="encargado_id" required>
        <br />
        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
        <br />
        <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" required>
        <br />
        <button type="submit" name="RegistrarDepartamento" class="btn btn-primary  btn-lg btn-block">Registrar Departamento</button>
    </form>
    
</main>


<?php include_once("../include/footer.php") ?>