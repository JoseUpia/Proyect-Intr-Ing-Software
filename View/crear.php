<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Empleados = getEmpleados();

$_SESSION['titulo'] = 'Empleados';
include('../include/header.php');

if (isset($_SESSION['message'])) {
?>
    <script>
        var title = '<?= $_SESSION['message'] ?>'
        var text = '<?= $_SESSION['text'] ?>'
        var ico = '<?= $_SESSION['icon'] ?>'

        alertaRegistro(title, text, ico);
    </script>
<?php
    session_unset();
}

$_SESSION["inicio"] = "../inicio.php";
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";
$_SESSION["empleadoA"] = "active";
$_SESSION["encargadoA"] = "";
$_SESSION["departamentoA"] = "";
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
                            <input type="tel" class="form-control" placeholder="Telefono" name="telefono" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onpaste="return false" autocomplete="off" maxlength="12" onkeypress="return validarkey(event);" onkeyup="this.value = mascara(this.value)" title="El formato de telefono es: 000-000-0000">
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
                    <th>ID Departamento </th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Telefono</th>
                    <th>Puesto</th>
                    <th>Email</th>
                    <th>Fecha de Entrada</th>                                        
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($Empleados)) { ?>
                    <tr>
                        <td><?php echo $fila['ID']; ?></td>
                        <td><?php echo $fila['D_Nombre']; ?></td>
                        <td><?php echo $fila['Departamento_ID']; ?></td>
                        <td><?php echo $fila['Nombre']; ?></td>
                        <td><?php echo $fila['Apellido']; ?></td>
                        <td><?php echo $fila['Fecha_Nacimiento']; ?></td>
                        <td style="width: 120px;"><?php echo $fila['Telefono']; ?></td>
                        <td><?php echo $fila['Puesto']; ?></td>
                        <td><?php echo $fila['Email']; ?></td>
                        <td><?php echo $fila['Fecha_Entrada']; ?></td>
                        
                        <td style="width: 150px;">
                            <button class="btn btn-outline-primary btn-sn" type="button" title="Editar registro" data-bs-toggle="modal" data-bs-target="#empleado<?php echo $fila['ID']; ?>"><i class="fas fa-user-edit"></i></button>                      
                            <a href="../Controller/eliminar.php?Entidad=empleado&ID=<?php echo $fila['ID']; ?>" class="btn btn-outline-danger btn-sn" onclick="return confirm('Estás seguro que deseas eliminar el Registro?');" title="Eliminar registro"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                        <!-- Modal Editar-->
                        <div class="modal fade" id="empleado<?php echo $fila['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Empleados</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">                             
                                    <form action="../Controller/actualizar.php?Entidad=empleado" method="POST">
                                        <input type="hidden" name="ID" id="ID" value="<?php echo $fila['ID']; ?>">
                                        <div class="row mb-5">
                                        <div class="col-4">
                                            <label for="">ID Departamento</label>
                                            <input type="text" name="departamento" id="departamento" class="form-control" value="<?php echo $fila['Departamento_ID']; ?>" >
                                        </div>
                                        
                                        <div class="col-4">
                                            <label for="">Nombre</label>
                                            <input type="text" name="nombre"  id="nombre" class="form-control" value="<?php echo $fila['Nombre']; ?>" >
                                        </div>
                                        <div class="col-4">
                                            <label for="">Apellido</label>
                                            <input type="text" name="apellido"  id="apellido" class="form-control" value="<?php echo $fila['Apellido']; ?>" >
                                        </div>
                                        </div>
                                        <div class="row mb-5">
                                        <div class="col-4">
                                            <label for="">Fecha de Nacimiento</label>
                                            <br />
                                            <input type="date" name="Fecha_Nacimiento"  id="Fecha_Nacimiento" class="form-control" value="<?php echo $fila['Fecha_Nacimiento']; ?>" >
                                        </div>
                                        <div class="col-4">
                                            <label for="">Telefono</label>
                                            <input type="tel" name="telefono"  id="telefono" class="form-control" value="<?php echo $fila['Telefono']; ?>" >
                                        </div>
                                        <div class="col-4">
                                            <label for="">Puesto</label>
                                            <input type="text" name="puesto"  id="puesto" class="form-control" value="<?php echo $fila['Puesto']; ?>" >
                                        </div>                                         
                                        </div>
                                        <div class="row mb-5">
                                        <div class="col-4">
                                            <label for="">Email</label>
                                            <input type="email" name="email"  id="email" class="form-control" value="<?php echo $fila['Email']; ?>" >
                                        </div>
                                        
                                        <div class="col-4">
                                            <label for="">Fecha de Entrada</label>
                                            <br />
                                            <input type="date" name="Fecha_Entrada"  id="Fecha_Entrada" class="form-control" value="<?php echo $fila['Fecha_Entrada']; ?>" >
                                        </div>                                         

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </form>
                        
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>
                <?php } ?>
        </table>
</main>

<?php include_once("../include/footer.php") ?>