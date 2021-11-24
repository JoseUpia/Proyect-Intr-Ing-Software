<?php
include_once('Controller/mostrar.php');
include_once('Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Departamentos = getDepartamentos();

?>

<?php include('include/header.php') ?>
<?php include('include/nav.php') ?>

<main class="container">
    <h1 class="text-center">Lista de Departamentos</h1>
    <a href="View/crearDepartamento.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear Departamento</a>
    <div class="table-responsive">
    <table id="tblDepart" class="table table-hover table-striped">
      <thead>
        <tr>
            <th>ID </th>
            <th>Encargado </th>
            <th>Departamento</th>
            <th>Descripcion</th>
            <th>Opciones</th>
        </tr>
</thead>
        <?php while ($fila = $Departamentos->fetch_object()) { ?>
            <tr>
                <td><?php echo $fila->ID; ?></td>
                <td><?php echo $fila->Encargado; ?></td>
                <td><?php echo $fila->Departamento; ?></td>
                <td><?php echo $fila->Descripcion; ?></td>
                <td>
                <button class="btn btn-outline-primary btn-sn" title="Editar registro"><i class="fas fa-user-edit"></i></button>                
                <a href="Controller/eliminar.php?ID=<?php echo $fila->ID;?>" class="btn btn-outline-danger btn-sn" title="Eliminar registro" onclick="return confirm('Estás seguro que deseas eliminar el Video?');" ><i class="fas fa-trash-alt"></i></a> 
               </td>                
            </tr>
        <?php } ?>
    </table>
</main>


<?php include_once("include/footer.php") ?>