<?php
include('../../Controller/mostrar.php');
include('../../include/bootstrapHeader.php');
include('../../include/navEmpleados.php');

$Nominas = getNomina();
?>

<main class="container p-5">
    <h1 class="text-center">Nominas de Empleados</h1>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include_once("../../include/footer.php") ?>