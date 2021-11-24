<?php
include_once('Controller/mostrar.php');


$Empleados = getEmpleados();
$Departamentos = getDepartamentos();
$Encargados = getEncargados();

$_SESSION['titulo'] = 'Inicio';

?>


<?php 
include('include/header.php'); 
include_once('Controller/insertar.php');

if($_SESSION['titulo']){
?>
    <script>
        alertaRegistro($_SESSION['icon'], $_SESSION['titulo'], $_SESSION['text']);
    </script>
<?php
session_unset();
}
?>

<br />
<H2>Departamentos</H2>



<table>
    <thead>
        <tr>
            <th>ID </th>
            <th>Encargado </th>
            <th>Departamento</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($fila = $Departamentos->fetch_object()) { ?>
            <tr>
                <th><?php echo $fila->ID; ?></th>
                <td><?php echo $fila->Encargado; ?></td>
                <td><?php echo $fila->Departamento; ?></td>
                <td><?php echo $fila->Descripcion; ?></td>
            </tr>
        <?php } ?>
    </tbody>
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
    <input type="text" placeholder="Nombre" name="Enombre">
    <br />
    <input type="text" placeholder="Apellido" name="Eapellido">
    <br />
    <label>Fecha de Nacimiento</label>
    <br />
    <input type="date" name="Efecha_nacimiento">
    <br />
    <input type="text" placeholder="Dirección" name="Edireccion">
    <br />
    <input type="tel" name="Etelefono" onpaste="return false" autocomplete="off" maxlength="12"  
    onkeypress="return validarkey(event);" onkeyup="this.value = mascara(this.value)" placeholder="Telefono"
    required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="El formato de telefono es: 000-000-0000">
    <br />
    <input type="email" placeholder="Email" name="Eemail">
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
    <label>Fecha de Nacimiento</label>
    <br />
    <input type="date" name="fecha_nacimiento">
    <br />
    <input type="text" placeholder="Dirección" name="direccion">
    <br />
    <input type="tel" name="telefono" onpaste="return false" autocomplete="off" maxlength="12"  
    onkeypress="return validarkey(event);" onkeyup="this.value = mascara(this.value)" placeholder="Telefono"
    required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="El formato de telefono es: 000-000-0000">
    <br />
    <input type="email" placeholder="Email" name="email">
    <br />
    <label>Fecha de Entrada</label>
    <br />
    <input type="date" name="fecha_entrada">
    <br />
    <button name="RegistrarEmpleado">Registrar Empleado</button>
</form>


<?php include('include/footer.php') ?>