<?php

include('../../Controller/mostrar.php');

include('../../include/bootstrapHeader.php');
include('../../include/navEmpleados.php');
include('../../Controller/solicitud.php');

$solicitud = getSolicitudById($UsuarioR->ID);
$DiasDisponibles = calcularDiasDisponibles($UsuarioR->ID);

?>
<div class="container">
    <h1 class="text-center mb-5">Solicitud de Vacaciones</h1>
    <div class="row">
        <div class="d-block">
            <h4 class="d-inline-block" style="margin-right: 20px;"><?php echo "Días disponibles: " . $DiasDisponibles ?></h4>

            <h4 class="d-inline-block" id="Dias">Dias seleccionados: 0</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <form action="../../Controller/solicitud.php?Usuario=<?php echo $UsuarioR->ID ?>" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label>Desde</label>
                        <br />
                        <input type="date" onchange="EditarDias()" class="form-control" id="Desde" name="Fecha_Desde" required>
                    </div>
                    <div class="col-6">
                        <label>Hasta</label>
                        <br />
                        <input type="date" onchange="EditarDias()" class="form-control" id="Hasta" name="Fecha_Hasta" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <textarea class="form-control" rows="3" placeholder="Mensaje Opcional" name="Mensaje"></textarea>
                    </div>
                </div>
                <div class="row  mt-2 w-25 mx-auto">
                    <button type="submit" name="Solicitar" id="Solicitar" class="btn btn-success">Solicitar</button>
                </div>
            </form>
        </div>
        <div class="col-7">
            <div class="table-responsive">
                <table id="tblEmpleados" class="table table-hover table-striped table-fixed">
                    <thead>
                        <tr>
                            <th class="text-center w-50px">Estado </th>
                            <th class="text-center w-50px">Inicio de vacaciones</th>
                            <th class="text-center w-50px">Fin de vacaciones</th>
                            <th class="text-center w-50px">Días Solicitados</th>
                            <th class="text-center w-50px">Mensaje</th>
                            <th class="text-center w-50px">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_array($solicitud)) { ?>
                            <!-- Modal editar Solicitud -->
                            <div class="modal fade" id="ModalEditarSolicitud<?php echo $fila['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Solicitud</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../Controller/solicitud.php?&ID=<?php echo $fila["ID"]; ?>" method="post">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label>Desde</label>
                                                        <br />
                                                        <input type="date" class="form-control" id="Desde" value="<?php echo $fila["FechaInicio"]; ?>" name="Fecha_Desde" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label>Hasta</label>
                                                        <br />
                                                        <input type="date" class="form-control" value="<?php echo $fila["FechaFinal"]; ?>" id="Hasta" name="Fecha_Hasta" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <textarea class="form-control" rows="3" placeholder="Mensaje Opcional" name="Mensaje"><?php echo $fila["Descripcion"]; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="GuardarCambios">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tr id="row-<?php echo $fila['ID'] ?>">
                                <td class="text-center w-50px"><?php
                                                                if ($fila['Estado'] == 0) {
                                                                    echo "En espera";
                                                                } else if ($fila['Estado'] == 1) {
                                                                    echo "Aceptada";
                                                                } else if ($fila['Estado'] == 2) {
                                                                    echo "Rechazada";
                                                                } else {
                                                                    echo "Fallida";
                                                                }
                                                                ?></td>
                                <td class="text-center w-50px"><?php echo $fila['FechaInicio']; ?></td>
                                <td class="text-center w-50px"><?php echo $fila['FechaFinal']; ?></td>
                                <td class="text-center w-50px">
                                    <?php
                                    $primera = new DateTime($fila['FechaInicio']);
                                    $segunda = new DateTime($fila['FechaFinal']);
                                    $dif = $primera->diff($segunda);
                                    echo $dif->d;
                                    ?>
                                </td>
                                <td class="text-center w-50px"><?php echo $fila['Descripcion']; ?></td>
                                <td class="text-center w-50px ">
                                    <button class="btn btn-outline-primary btn-sn" title="Editar registro" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditarSolicitud<?php echo $fila['ID'] ?>"><i class="fas fa-user-edit"></i></button>
                                    <a href="../../Controller/eliminar.php?Entidad=solicitudVacaciones&Ruta=Empleado&ID=<?php echo $fila['ID']; ?>" class="btn btn-outline-danger btn-sn" onclick="return confirm('Si elimina una solicitud de vacaciones tambien se eliminara para el encargado del departamento. ¿Esta seguro?')" title="Eliminar registro"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <?php if ($fila['Estado'] == 0) { ?>
                                    <script>
                                        var tr = document.getElementById("row-<?php echo $fila['ID']; ?>");
                                        tr.classList.remove('bg-success');
                                    </script>
                                <?php } elseif ($fila['Estado'] == 1) { ?>
                                    <script>
                                        var tr = document.getElementById("row-<?php echo $fila['ID']; ?>");
                                        tr.classList.add('bg-success');
                                    </script>
                                <?php } elseif ($fila['Estado'] == 2) { ?>
                                    <script>
                                        var tr = document.getElementById("row-<?php echo $fila['ID']; ?>");
                                        tr.classList.add('bg-warning');
                                    </script>
                                <?php } else {
                                    echo "Fallida";
                                } ?>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="http://momentjs.com/downloads/moment.min.js"></script>
<script>
    function EditarDias() {
        var Dias = document.getElementById("Dias");
        if (document.getElementById("Desde").value && document.getElementById("Hasta").value) {
            var Desde = moment(document.getElementById("Desde").value);
            var Hasta = moment(document.getElementById("Hasta").value);
            var DiasSelecionados = Hasta.diff(Desde, 'days');
            var Solicitar = document.getElementById("Solicitar");

            if(DiasSelecionados > <?php echo $DiasDisponibles; ?> || DiasSelecionados == 0) {
                Solicitar.classList.add("disabled");
                Dias.textContent = "Dias seleccionados: NO VALIDOS";
            }
            else {
                Dias.textContent = "Dias seleccionados: " + DiasSelecionados;
                Solicitar.classList.remove("disabled");
            }
        }else {

            Dias.textContent = "Dias seleccionados: 0";
        }

    }

</script>


<?php include('../../include/bootstrapFooter.php'); ?>