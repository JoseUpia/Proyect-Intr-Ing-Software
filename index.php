<?php
include_once('Controller/mostrar.php');
include_once('Controller/insertar.php');

$Empleados = getEmpleados();
$Departamentos = getDepartamentos();
$Encargados = getEncargados();

?>


<?php include('include/header.php') ?>

<br />
    <H2>Departamentos</H2>
    <table>
        <tr>
            <th>ID </th>
            <th>Encargado </th>
            <th>Departamento</th>
            <th>Descripcion</th>
        </tr>
        <?php while ($fila = $Departamentos->fetch_object()) { ?>
            <tr>
                <td><?php echo $fila->ID; ?></td>
                <td><?php echo $fila->Encargado; ?></td>
                <td><?php echo $fila->Departamento; ?></td>
                <td><?php echo $fila->Descripcion; ?></td>
            </tr>
        <?php } ?>
    </table>
    <form action="Controller/insertar.php" method="post">
        <input type="number" placeholder="ID del Encargado" name="encargado_id">
        <br />
        <input type="text" placeholder="Nombre" name="nombre">
        <br />
        <input type="text" placeholder="Descripcion" name="descripcion">
        <br />
        <button name="RegistrarDepartamento">Registrar Departamento</button>
    </form>


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
                <td><?php echo $fila->D_Nombre; ?></td>
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
    <form action="Controller/insertar.php" method="post">
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
        <input type="tel" placeholder="Telefono" name="telefono">
        <br />
        <input type="email" placeholder="Email" name="email">
        <br />
        <label >Fecha de Entrada</label>
        <br />
        <input type="date" name="fecha_entrada">
        <br />
        <button name="RegistrarEmpleado">Registrar Empleado</button>
    </form>


<?php include('include/footer.php') ?>