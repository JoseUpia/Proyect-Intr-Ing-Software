<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Departamentos = getDepartamentos();

$_SESSION['titulo'] = 'Departamento';
include('../include/header.php');

$_SESSION["inicio"] = "../inicio.php";
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";

include('../include/nav.php');
?>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="../Controller/insertar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Departamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-5">
                        <div class="col-4">
                            <input type="number" class="form-control" placeholder="ID del Encargado" name="encargado_id" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="RegistrarDepartamento" class="btn btn-success">Registrar Departamento</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fin del modal-->

<main class="container">
    <h1 class="text-center">Lista de Departamentos</h1>
    <!-- Button del modal -->
    <a href="View/crearDepartamento.php" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Crear Departamento</a>
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
                        <a href="../Controller/eliminar.php?Entidad=departamento&ID=<?php echo $fila->ID; ?>" class="btn btn-outline-danger btn-sn" title="Eliminar registro" onclick="return confirm('Estás seguro que deseas eliminar el Video?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
</main>


<?php include_once("../include/footer.php") ?>