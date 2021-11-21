<?php
include_once('db/conexion.php');
include_once('Controller/mostrar.php');

$Empleados = getEmpleados();
$Departamentos = getDepartamentos();
$Encargados = getEncargados();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br />
    <h2>Encargados</h2>
    <table>
        <tr>
            <th>ID </th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Fecha de Entrada</th>
        </tr>
        <?php while ($fila = $Encargados->fetch_object()) { ?>
            <tr>
                <td><?php echo $fila->ID; ?></td>
                <td><?php echo $fila->Nombre; ?></td>
                <td><?php echo $fila->Apellido; ?></td>
                <td><?php echo $fila->Fecha_Nacimiento; ?></td>
                <td><?php echo $fila->Direccion; ?></td>
                <td><?php echo $fila->Telefono; ?></td>
                <td><?php echo $fila->Email; ?></td>
                <td><?php echo $fila->Fecha_Entrada; ?></td>
            </tr>
        <?php } ?>
    </table>
    <form action="insertar.php" method="post">
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
        <input type="text" placeholder="Telefono" name="Etelefono">
        <br />
        <input type="text"placeholder="Email" name="Eemail">
        <br />
        <label>Fecha de Entrada</label>
        <br />
        <input type="date" name="Efecha_entrada">
        <br />
        <button>Registrar Encargado</button>
    </form>

    <br />
    <H2>Departamentos</H2>
    <table>
        <tr>
            <th>ID </th>
            <th>Encargado_ID </th>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>
        <?php while ($fila = $Departamentos->fetch_object()) { ?>
            <tr>
                <td><?php echo $fila->ID; ?></td>
                <td><?php echo $fila->Encargado_ID; ?></td>
                <td><?php echo $fila->Nombre; ?></td>
                <td><?php echo $fila->Descripcion; ?></td>
            </tr>
        <?php } ?>
    </table>
    <form action="insertar.php" method="post">
        <input type="text" placeholder="ID del Encargado" name="encargado_id">
        <br />
        <input type="text" placeholder="Nombre" name="nombre">
        <br />
        <input type="text" placeholder="Descripcion" name="descripcion">
        <br />
        <button>Registrar Departamento</button>
    </form>


    <br />
    <h2>Empleados</h2>
    <table>
        <tr>
            <th>ID </th>
            <th>Departamento </th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Puesto</th>
            <th>Email</th>
            <th>Fecha de Entrada</th>
        </tr>
        <?php while ($fila = $Empleados->fetch_object()) { ?>
            <tr>
                <td><?php echo $fila->ID; ?></td>
                <td><?php echo $fila->Departamento_ID; ?></td>
                <td><?php echo $fila->Nombre; ?></td>
                <td><?php echo $fila->Apellido; ?></td>
                <td><?php echo $fila->Fecha_Nacimiento; ?></td>
                <td><?php echo $fila->Direccion; ?></td>
                <td><?php echo $fila->Telefono; ?></td>
                <td><?php echo $fila->Puesto; ?></td>
                <td><?php echo $fila->Email; ?></td>
                <td><?php echo $fila->Fecha_Entrada; ?></td>
            </tr>
        <?php } ?>
    </table>
    <form action="insertar.php" method="post">
        <input type="text" placeholder="ID del departamento" name="departamento_id" id="">
        <br />
        <input type="text" placeholder="Nombre" name="nombre">
        <br />
        <input type="text" placeholder="Apellido" name="apellido">
        <br />
        <label >Fecha de Nacimiento</label>
        <br />
        <input type="date" name="fecha_nacimiento">
        <br />
        <input type="text" placeholder="Dirección" name="direccion">
        <br />
        <input type="text" placeholder="Telefono" name="telefono">
        <br />
        <input type="text" placeholder="Email" name="email">
        <br />
        <label >Fecha de Entrada</label>
        <br />
        <input type="date" name="fecha_entrada">
        <br />
        <button>Registrar Empleado</button>
    </form>


</body>

</html>