<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Encargados = getEncargados();

$_SESSION['titulo'] = 'Encargado';
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

$_SESSION["empleadoA"] = "";
$_SESSION["encargadoA"] = "active";
$_SESSION["departamentoA"] = "";
$_SESSION['VacacionesA'] = "";
include('../include/nav.php')
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="../Controller/insertar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Encargado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-5">
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Nombre" name="Enombre" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Apellido" name="Eapellido" required>
                        </div>
                        <div class="col-4">
                            <input type="tel" class="form-control" placeholder="Telefono" name="Etelefono" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onpaste="return false" autocomplete="off" maxlength="12" onkeypress="return validarkey(event);" onkeyup="this.value = mascara(this.value)" title="El formato de telefono es: 000-000-0000">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <input type="email" class="form-control" placeholder="Email" name="Eemail" required>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Dirección" name="Edireccion" required>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <label>Fecha de Nacimiento</label>
                            <br />
                            <input type="date" class="form-control" name="Efecha_nacimiento" required>
                        </div>
                        <div class="col-6">
                            <label>Fecha de Entrada</label>
                            <br />
                            <input type="date" class="form-control" name="Efecha_entrada">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="RegistrarEncargado" class="btn btn-success">Registrar Encargado</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Fin del modal -->

<main class="container">
    <h1 class="text-center">Lista de Encargados</h1>
    <!-- Button del modal -->
    <a href="View/crearEncargado.php" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Crear Encargado</a>
    <div class="table-responsive">
        <table id="tblEcarg" class="table table-hover table-striped table-fixed">
            <thead>
                <tr>
                    <th style="width: 300px;">Nombre</th>
                    <th style="width: 300px;">Apellido</th>
                    <th style="width: 300px;">Telefono</th>
                    <th style="width: 350px;">Email</th>
                    <th style="width: 150px;">Opciones</th>
            </thead>
            </tr>
            <?php while ($fila = $Encargados->fetch_object()) { ?>
                <tr>
                    <td style="width: 300px;"><?php echo $fila->Nombre; ?></td>
                    <td style="width: 300px;"><?php echo $fila->Apellido; ?></td>
                    <td style="width: 300px;" style="width: 120px;"><?php echo $fila->Telefono; ?></td>
                    <td style="width: 350px;"><?php echo $fila->Email; ?></td>
                    <td style="width: 150px;">
                        <button class="btn btn-outline-primary btn-sn" title="Editar registro"><i class="fas fa-user-edit"></i></button>
                        <a class="btn btn-outline-danger btn-sn" href="../Controller/eliminar.php?Entidad=encargado&ID=<?php echo $fila->ID; ?>" title="Eliminar registro" onclick="return confirm('Eliminar un encargado puede provocar que se eliminen registros dependientes.')"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
            <?php } ?>
        </table>
</main>




<?php include_once("../include/footer.php") ?>