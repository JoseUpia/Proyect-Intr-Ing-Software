<?php
include($_SERVER['DOCUMENT_ROOT'].'/Aprendizaje PHP/Controller/insertar.php');



?>

<?php include('../include/header.php') ?>
<?php 
$_SESSION["incio"] = "inicio.php"; 
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";
include('../include/nav.php') 
?>


    <form action="Controller/insertar.php" method="post">
        <input type="text"placeholder="Nombre" name="Enombre">
        <br />
        <input type="text"placeholder="Apellido" name="Eapellido">
        <br />
        <label >Fecha de Nacimiento</label>
        <br />
        <input type="date" name="Efecha_nacimiento">
        <br />
        <input type="text" placeholder="Dirección" name="Edireccion">
        <br />
        <input type="tel" placeholder="Telefono" name="Etelefono">
        <br />
        <input type="email"placeholder="Email" name="Eemail">
        <br />
        <label>Fecha de Entrada</label>
        <br />
        <input type="date" name="Efecha_entrada">
        <br />
        <button name="RegistrarEncargado">Registrar Encargado</button>
    </form>
    



<?php include_once("../include/footer.php") ?>