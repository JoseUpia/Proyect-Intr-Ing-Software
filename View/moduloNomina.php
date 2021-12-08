<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');

$Nominas = getNomina();
$Descuentos = getDescuento();

$_SESSION['titulo'] = 'Nomina';
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

// Direcciones de la navegacion
$_SESSION["inicio"] = "../inicio.php";
$_SESSION["departamento"] = "crearDepartamento.php";
$_SESSION["encargado"] = "crearEncargado.php";
$_SESSION["empleado"] = "crear.php";
$_SESSION['Vacaciones'] = "vacaciones.php";
$_SESSION['Nomina'] = "moduloNomina.php";


$_SESSION["NominaA"] = "active";
$_SESSION["VacacionesA"] = "";
$_SESSION["empleadoA"] = "";
$_SESSION["encargadoA"] = "";
$_SESSION["departamentoA"] = "";
include('../include/nav.php');
?>


<main class="container p-5">
    <h1 class="text-center">Nominas de Empleados</h1>
    <!-- Button del modal -->
    <a href="../Controller/actualizarNomina.php?Entidad=generar" class="btn btn-success"><i class="fas fa-plus-circle"></i> Generar Nomina</a>
    <div class="table-responsive">
        <table id="tblNomina" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Salario Base</th>
                    <th>Comision</th>
                    <th>ISR</th>
                    <th>AFP</th>
                    <th>SFS</th>
                    <th>Salario Final</th>
                    <th>Fecha de Generación</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($Nominas)) { ?>
                    <tr>
                        <td><?php echo $fila['ID_Empleado']; ?></td>
                        <td><?php echo $fila['Empleado']; ?></td>
                        <td><?php echo $fila['Salario_Base']; ?></td>
                        <td><?php echo $fila['Comision']; ?></td>
                        <td><?php echo $fila['ISR']; ?></td>
                        <td><?php echo $fila['AFP']; ?></td>
                        <td><?php echo $fila['SFS']; ?></td>
                        <td><?php echo $fila['Salirio_Final']; ?></td>
                        <td><?php echo $fila['Fecha_Nomina']; ?></td>
                        <td style="width: 150px;"><button class="btn btn-outline-primary btn-sn" type="button" title="Editar registro" data-bs-toggle="modal" data-bs-target="#nomina<?php echo $fila['ID']; ?>"><i class="fas fa-user-edit"></i></button>
                            <a href="../Controller/eliminar.php?Entidad=nomina_empleado&ID=<?php echo $fila['ID']; ?>" class="btn btn-outline-danger btn-sn" onclick="return confirm('Estás seguro que deseas eliminar el Registro?');" title="Eliminar registro"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <!-- Modal Editar-->
                    <div class="modal fade" id="nomina<?php echo $fila['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Nomina de Empleados</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../Controller/actualizarNomina.php?Entidad=nomina_emp" method="POST">
                                        <input type="hidden" name="ID" id="ID" value="<?php echo $fila['ID_Empleado']; ?>">
                                        <div class="row mb-5">
                                            <div class="form-group col-4">
                                                <label for="">Comision</label>
                                                <input type="text" name="Comision" id="Comision" class="form-control" value="<?php echo $fila['Comision']; ?>">
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


<main class="container p-5">
    <h1 class="text-center">Monto de Descuentos</h1>

    <!-- Button del modal -->
    <div class="table-responsive">
        <table id="tblNomina" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>SFS </th>
                    <th>ISR Basico</th>
                    <th>ISR Medio</th>
                    <th>ISR Alto</th>
                    <th>AFP</th>
                </tr>
            </thead>
            <?php
            while ($filas = mysqli_fetch_array($Descuentos)) { ?>
                <tr>
                    <td><?php echo $filas['ID']; ?></td>
                    <td><?php echo $filas['SFS']; ?></td>
                    <td><?php echo $filas['ISR_Basico']; ?></td>
                    <td><?php echo $filas['ISR_Mediano']; ?></td>
                    <td><?php echo $filas['ISR_Alto']; ?></td>
                    <td><?php echo $filas['AFP']; ?></td>
                    <td style="width: 150px;"><button class="btn btn-outline-primary btn-sn" type="button" title="Editar registro" data-bs-toggle="modal" data-bs-target="#descuento<?php echo $filas['ID']; ?>"><i class="fas fa-user-edit"></i></button>
                    </td>
                </tr>

                <!-- Modal Editar-->
                <div class="modal fade" id="descuento<?php echo $filas['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Porcentajes de Descuentos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../Controller/actualizarNomina.php?Entidad=descuentos" method="POST">
                                    <input type="hidden" name="ID" id="ID" value="<?php echo $filas['ID']; ?>">
                                    <div class="row mb-5">
                                        <div class="form-group col-4">
                                            <label for="">SFS</label>
                                            <input type="text" name="SFS" id="SFS" class="form-control" value="<?php echo $filas['SFS']; ?>">
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="">ISR Basico</label>
                                            <input type="text" name="ISR_Basico" id="ISR_Basico" class="form-control" value="<?php echo $filas['ISR_Basico']; ?>">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">ISR Medio</label>
                                            <input type="text" name="ISR_Mediano" id="ISR_Mediano" class="form-control" value="<?php echo $filas['ISR_Mediano']; ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="form-group col-4">
                                            <label for="">ISR Alto</label>
                                            <input type="text" name="ISR_Alto" id="ISR_Alto" class="form-control" value="<?php echo $filas['ISR_Alto']; ?>">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">AFP</label>
                                            <input type="text" name="AFP" id="AFP" class="form-control" value="<?php echo $filas['AFP']; ?>">
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