<?php
include($_SERVER['DOCUMENT_ROOT'].'/Aprendizaje PHP/Controller/insertar.php');

$_SESSION['titulo'] = 'Encargado';
include('../include/header.php');

$_SESSION["inicio"] = "../inicio.php"; 
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";

include('../include/nav.php') 
?>

<main class="container m-10">
    <h1>Registro de Encargado</h1>
    <form action="../Controller/insertar.php" method="post">
        <input type="text" class="form-control" placeholder="Nombre" name="Enombre" required>
        <br />
        <input type="text" class="form-control" placeholder="Apellido" name="Eapellido" required>
        <br />
        <label >Fecha de Nacimiento</label>
        <br />
        <input type="date" class="form-control" name="Efecha_nacimiento" required>
        <br />
        <input type="text" class="form-control" placeholder="Dirección" name="Edireccion" required>
        <br />
        <input type="tel" class="form-control" placeholder="Telefono" name="Etelefono" required>
        <br />
        <input type="email" class="form-control" placeholder="Email" name="Eemail" required>
        <br />
        <label>Fecha de Entrada</label>
        <br />
        <input type="date" class="form-control" name="Efecha_entrada">
        <br />
        <button type="submit"  name="RegistrarEncargado" class="btn btn-primary  btn-lg btn-block">Registrar Encargado</button>
    </form>
</main>
    



<?php include_once("../include/footer.php") ?>