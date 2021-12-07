<?php
include_once('../Controller/solicitud.php');
include('../Controller/mostrar.php');
include_once('../include/session_start.php');

$UsuarioR = getUsuarioByEmail($_SESSION['Usuario'], "../db/conexion.php");
$_SESSION['Empleado'] = $UsuarioR->Nombre;

$_SESSION['titulo'] = 'Vacaciones';

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
include('../include/bootstrapHeader.php');

$_SESSION["inicio"] = "../inicio.php";
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";
$_SESSION['Vacaciones'] = "vacaciones.php";

$_SESSION["empleadoA"] = "";
$_SESSION["encargadoA"] = "";
$_SESSION["departamentoA"] = "";
$_SESSION['VacacionesA'] = "active";
require('../include/nav.php');

$vacaciones = getSolicitudVacaciones($UsuarioR->ID);



if (isset($_GET["id"]) && isset($_GET["estado"])) {
    actualizarEstadoById($_GET['id'], $_GET['estado']);
}

?>

<main class="container">
    <h1 class="text-center my-5">Solicitudes de Vacaciones</h1>
    <div class="table-responsive">
        <table id="tblEmpleados" class="table table-hover table-striped table-fixed">
            <thead>
                <tr>
                    <th class="text-center" style="width: 200px;">Empleado ID </th>
                    <th class="text-center" style="width: 200px;">Estado</th>
                    <th class="text-center" style="width: 200px;">Fecha Inicio</th>
                    <th class="text-center" style="width: 200px;">Fecha Final</th>
                    <th class="text-center" style="width: 200px;">Dias Selecionados</th>
                    <th class="text-center" style="width: 200px;">Mensaje</th>
                    <th class="text-center" style="width: 200px;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($vacaciones)) { ?>
                    <tr id="row-<?php echo $fila['ID'] ?>">
                        <td class="text-center" style="width: 200px;"><?php echo $fila['Empleado']; ?></td>
                        <td class="text-center" style="width: 200px;"><?php
                            if ($fila['Estado'] == 0) {
                                echo "En espera";
                            } else if ($fila['Estado'] == 1) {
                                echo "Aceptada";
                            } else if ($fila['Estado'] == 2) {
                                echo "Rechazada";
                            } else {
                                echo "Fallida";
                            }
                            ?>
                        </td>
                        <td class="text-center" style="width: 200px;"><?php echo $fila['FechaInicio']; ?></td>
                        <td class="text-center" style="width: 200px;"><?php echo $fila['FechaFinal']; ?></td>
                        <td class="text-center" style="width: 200px;"><?php echo $fila['DiasSelecionados']; ?></td>
                        <td class="text-center" style="width: 200px;"><?php echo $fila['Descripcion']; ?></td>
                        <td class="text-center" style="width: 200px;">
                            <button class="btn btn-outline-success btn-sn bi bi-check-circle" id="img-check-<?php echo $fila['ID'] ?>" title="Aceptar Solicitud" onclick="aceptar(<?php echo $fila['ID'] ?>)"></button>

                            <button class="btn btn-outline-primary btn-sn bi bi-x-circle" id="img-x-<?php echo $fila['ID'] ?>" title="Rechazar Solicitud" onclick="rechazar(<?php echo $fila['ID'] ?>)"></button>

                            <a href="../Controller/eliminar.php?Entidad=solicitudVacaciones&Ruta=Encargado&ID=<?php echo $fila['ID']; ?>" onclick="return confirm('Si elimina una solicitud de vacaciones se borrara para el empleado de igual forma. ¿Esta seguro?')" class="btn btn-outline-danger btn-sn" title="Eliminar solicitud"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <?php if ($fila['Estado'] == 0) { ?>
                            <script>
                                var tr = document.getElementById("row-<?php echo $fila['ID']; ?>");
                                var btn = document.getElementById("img-check-<?php echo $fila['ID']; ?>");
                                tr.classList.remove('bg-success');
                                btn.classList.remove('btn-light');
                            </script>
                        <?php }elseif ($fila['Estado'] == 1) { ?>
                            <script>
                                var tr = document.getElementById("row-<?php echo $fila['ID']; ?>");
                                var btn = document.getElementById("img-check-<?php echo $fila['ID']; ?>");
                                tr.classList.add('bg-success');
                                btn.classList.add('btn-light');
                            </script>
                        <?php }elseif ($fila['Estado'] == 2) { ?>
                            <script>
                                var tr = document.getElementById("row-<?php echo $fila['ID']; ?>");
                                var btn = document.getElementById("img-x-<?php echo $fila['ID']; ?>");
                                tr.classList.add('bg-warning');
                                btn.classList.add('btn-light');
                            </script>
                        <?php }else { echo "Fallida"; } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<script>
    function aceptar(id) {
        let tr = document.querySelector(`#row-${id}`);
        let btnCheck = document.querySelector(`#img-check-${id}`);
        let btnX = document.querySelector(`#img-x-${id}`);

        if (tr && btnCheck) {
            if (btnX.classList.contains('btn-light')) {
                btnX.classList.remove('btn-light')
                btnX.classList.add('btn-outline-primary')
            }

            if (tr.classList.contains('bg-success')) {
                tr.classList.remove('bg-success');
                window.location.href = window.location.href + "?id=" + id + "&estado=0";
            } else {
                tr.classList.add('bg-success');
                window.location.href = window.location.href + "?id=" + id + "&estado=1";
            }

            if (tr.classList.contains('bg-warning')) tr.classList.remove('bg-warning');


            if (btnCheck.classList.contains('btn-outline-success')) {
                btnCheck.classList.remove('btn-outline-success');
                btnCheck.classList.add('btn-light');

            } else {
                btnCheck.classList.add('btn-outline-success');
                btnCheck.classList.remove('btn-light');
            }
        } else {
            alert('¡Oh no!, ');
        }
    }

    function rechazar(id) {
        let tr = document.querySelector(`#row-${id}`);
        let btnCheck = document.querySelector(`#img-check-${id}`);
        let btnX = document.querySelector(`#img-x-${id}`);

        if (tr && btnX) {
            if (btnCheck.classList.contains('btn-light')) {
                btnCheck.classList.remove('btn-light')
                btnCheck.classList.add('btn-outline-success')
            }

            if (tr.classList.contains('bg-warning')) {
                tr.classList.remove('bg-warning');
                window.location.href = window.location.href + "?id=" + id + "&estado=0";
            }
            else {
                tr.classList.add('bg-warning');
                window.location.href = window.location.href + "?id=" + id + "&estado=2";
            }

            if (tr.classList.contains('bg-success')) tr.classList.remove('bg-success');


            if (btnX.classList.contains('btn-outline-primary')) {
                btnX.classList.remove('btn-outline-primary');
                btnX.classList.add('btn-light');


            } else {
                btnX.classList.add('btn-outline-primary');
                btnX.classList.remove('btn-light');
            }
        } else {
            alert('¡Oh no!, ');
        }
    }
</script>

<?php include_once("../include/footer.php") ?>