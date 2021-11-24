<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Empleados = getEmpleados();

$_SESSION['titulo'] = 'Empleados';
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
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-5">
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="ID del departamento" name="departamento_id" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-4">
                            <input type="tel" class="form-control" placeholder="Telefono" name="telefono" required 
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onpaste="return false" autocomplete="off" maxlength="12" 
                            onkeypress="return validarkey(event);" onkeyup="this.value = mascara(this.value)" 
                            title="El formato de telefono es: 000-000-0000">
                        </div>
                        <div class="col-4">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Dirección" name="direccion" required>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-4">
                            <label></label>
                            <br />
                            <input type="text" class="form-control" placeholder="Puesto/Cargo" name="puesto" required>
                        </div>
                        <div class="col-4">
                            <label>Fecha de Nacimiento</label>
                            <br />
                            <input type="date" class="form-control" name="fecha_nacimiento">
                        </div>
                        <div class="col-4">
                            <label>Fecha de Entrada</label>
                            <br />
                            <input type="date" class="form-control" name="fecha_entrada" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="RegistrarEmpleado">Registrar Empleado</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fin del modal -->

<main class="container">
    <h1 class="text-center">Lista de Empleados</h1>

    <!-- Button del modal -->
    <a href="View/crear.php" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Crear Empeado</a>
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
                            <a href="../Controller/eliminar.php?Entidad=empleado&ID=<?php echo $fila->ID; ?>" class="btn btn-outline-danger btn-sn" title="Eliminar registro" onclick="return confirm('Estás seguro que deseas eliminar el Video?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
        </table>
</main>

<?php include_once("../include/footer.php") ?>