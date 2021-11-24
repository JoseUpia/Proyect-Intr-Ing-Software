<?php
include_once('Controller/mostrar.php');
include_once('Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Empleados = getEmpleados();

?>

<?php include('include/header.php') ?>
<?php
$_SESSION["incio"] = "inicio.php"; 
$_SESSION["departamento"] = "Departamento.php";
$_SESSION["encargado"] = "Encargado.php";
$_SESSION["empleado"] = "inicio.php";
include('include/nav.php'); 
?>


<main class="container">
    <h1 class="text-center">Lista de Empleados</h1>
    <a href="View/crear.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear Empeado</a>
    <div class="table-responsive">
    <table id="tblEmpleados" class="table table-hover table-striped">
      <thead>
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
            <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
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
                <td>
                    <button class="btn btn-outline-primary btn-sn" title="Editar registro"><i class="fas fa-user-edit"></i></button>
                </td>   
                <td>   
                <a href="Controller/eliminar.php?ID=<?php echo $fila->ID;?>" class="btn btn-outline-danger btn-sn" title="Eliminar registro" onclick="return confirm('Estás seguro que deseas eliminar el Video?');" ><i class="fas fa-trash-alt"></i></a> 
               </td>
                
            </tr>
        <?php } ?>
    </table>
</main>


<?php include_once("include/footer.php") ?>