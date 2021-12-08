<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Empleados = getEmpleados();
$NombreD = getNombreD();

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
$_SESSION['Vacaciones'] = "vacaciones.php";
$_SESSION['Nomina'] = "moduloNomina.php";

$_SESSION["NominaA"] = "";
$_SESSION["empleadoA"] = "active";
$_SESSION["encargadoA"] = "";
$_SESSION["departamentoA"] = "";
$_SESSION['VacacionesA'] = "";
include('../include/nav.php');
?>

<!-- Modal registrar departamento -->
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
                            <!--<input type="text" class="form-control" placeholder="ID del departamento" name="departamento_id" required>-->
                            <select class=" form-select" name="departamento_id">
                                <option disabled selected>...</option>
                                <?php while ($fila = $NombreD->fetch_object()) { ?>
                                    <option value="<?php echo $fila->ID; ?>"><?php echo $fila->Nombre; ?></option>
                                <?php } ?>
                            </select>
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
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
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
                    <div class="row mb-5">
                        <div class="col-6">
                            <input class="form-control" placeholder="Dirección" name="direccion" required>
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control" placeholder="Sueldo" name="sueldo" required>
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
        <table id="tblEmpleados" class="table table-hover table-striped table-fixed">
            <thead>
                <tr>
                    <th style="width: 220px;">Departamento </th>
                    <th style="width: 200px;">Nombre</th>
                    <th style="width: 220px;">Apellido</th>
                    <th style="width: 220px;">Telefono</th>
                    <th style="width: 220px;">Puesto</th>
                    <th style="width: 200px;">Email</th>
                    <th style="width: 130px;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($Empleados)) { ?>
                    <tr>
                        <td style="width: 220px;"><?php echo $fila['D_Nombre']; ?></td>
                        <td style="width: 200px;"><?php echo $fila['Nombre']; ?></td>
                        <td style="width: 220px;"><?php echo $fila['Apellido']; ?></td>
                        <td style="width: 220px;"><?php echo $fila['Telefono']; ?></td>
                        <td style="width: 190px;"><?php echo $fila['Puesto']; ?></td>
                        <td style="width: 250px;"><?php echo $fila['Email']; ?></td>
                        <td style="width: 130px;">
                            <button class="btn btn-outline-primary btn-sn" title="Editar registro"><i class="fas fa-user-edit"></i></button>
                            <a href="../Controller/eliminar.php?Entidad=empleado&ID=<?php echo $fila['ID']; ?>" class="btn btn-outline-danger btn-sn" title="Eliminar registro"><i class="fas fa-trash-alt"></i></a>
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
                                                <input type="text" name="departamento" id="departamento" class="form-control" value="<?php echo $fila['Departamento_ID']; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="">Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $fila['Nombre']; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="">Apellido</label>
                                                <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $fila['Apellido']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-4">
                                                <label for="">Fecha de Nacimiento</label>
                                                <br />
                                                <input type="date" name="Fecha_Nacimiento" id="Fecha_Nacimiento" class="form-control" value="<?php echo $fila['Fecha_Nacimiento']; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="">Telefono</label>
                                                <input type="tel" name="telefono" id="telefono" class="form-control" value="<?php echo $fila['Telefono']; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="">Puesto</label>
                                                <input type="text" name="puesto" id="puesto" class="form-control" value="<?php echo $fila['Puesto']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-4">
                                                <label for="">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $fila['Email']; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="">Fecha de Entrada</label>
                                                <br />
                                                <input type="date" name="Fecha_Entrada" id="Fecha_Entrada" class="form-control" value="<?php echo $fila['Fecha_Entrada']; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="">Sueldo</label>
                                                <br />
                                                <input type="text" name="sueldo" id="sueldo" class="form-control" value="<?php echo $fila['sueldo']; ?>">
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
            </tbody>
        </table>
    </div>
</main>

<?php include_once("../include/footer.php") ?>