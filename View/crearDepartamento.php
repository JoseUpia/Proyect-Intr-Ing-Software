<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');
#include_once('Controller/eliminar.php');

$Departamentos = getDepartamentos();
$NombreE = getNombreE();

$_SESSION['titulo'] = 'Departamento';
include('../include/header.php');

if (isset($_SESSION['message'])) { //Esta condicion alertara cuando se registre algo
?>
    <script>
        var title = '<?= $_SESSION['message'] ?>';
        var text = '<?= $_SESSION['text'] ?>';
        var ico = '<?= $_SESSION['icon'] ?>';

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
$_SESSION["empleadoA"] = "";
$_SESSION["encargadoA"] = "";
$_SESSION["departamentoA"] = "active";
$_SESSION['VacacionesA'] = "";
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
                            <!--<input type="number" class="form-control" placeholder="ID del Encargado" name="encargado_id" required> -->
                            <select class=" form-select" name="encargado_id">
                                <option disabled selected>...</option>
                                <?php while ($fila = $NombreE->fetch_object()) { ?>
                                    <option value="<?php echo $fila->ID; ?>"><?php echo $fila->Encargado; ?></option>
                                <?php } ?>
                            </select>
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
        <table id="tblDepart" class="table table-hover table-striped table-fixed">
            <thead>
                <tr>
                    <th style="width: 250px;">Encargado </th>
                    <th style="width: 300px;">Departamento</th>
                    <th style="width: 580px;">Descripcion</th>
                    <th style="width: 150px; text-align:center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $Departamentos->fetch_object()) { ?>
                    <tr>
                        <td style="width: 250px;"><?php echo $fila->Encargado; ?></td>
                        <td style="width: 300px;"> <?php echo $fila->Departamento; ?></td>
                        <td style="width: 580px;"><?php echo $fila->Descripcion; ?></td>
                        <td style="width: 150px; text-align:center">
                            <button class="btn btn-outline-primary btn-sn" title="Editar registro"><i class="fas fa-user-edit"></i></button>
                            <a href="../Controller/eliminar.php?Entidad=departamento&ID=<?php echo $fila->ID; ?>" class="btn btn-outline-danger btn-sn" title="Eliminar registro" onclick="return confirm('Eliminar un encargado puede provocar que se eliminen registros dependientes.')"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>


<?php include_once("../include/footer.php") ?>