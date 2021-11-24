<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>

<body>

<?php
include_once('../Controller/insertar.php');
include('../include/nav.php');
?>

<?php include("../include/header.php") ?>

 <main class="container m-6">
    <h1>Registrar Empleado</h1>
    <br/>
    <form action="../Controller/insertar.php" method="POST">

        <input type="text" class="form-control" placeholder="ID del departamento" name="departamento_id" required>
        <br />
        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
        <br />
        <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
        <br />
        <label >Fecha de Nacimiento</label>
        <br />        
        <input type="date" name="fecha_nacimiento">
        <br />
        <br/>
        <input type="text" class="form-control" placeholder="Dirección" name="direccion" required>
        <br />
        <input type="tel"class="form-control" placeholder="Telefono" name="telefono" required>
        <br />
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <br />
        <label >Fecha de Entrada</label>
        <br />
        <input type="date" class="form-control" name="fecha_entrada" required>
        <br />
        <button name="RegistrarEmpleado" type="submit" class="btn btn-primary  btn-lg btn-block">Registrar Empleado</button>
    </form>
 </main>

</body>