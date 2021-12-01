<?php
include_once('../Controller/mostrar.php');

$Empleado = getOneEmpleado(2);

$_SESSION['titulo'] = 'Modulo vacaciones';
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

include('../include/nav.php');
?>
<main class="container">
    <h1 class="text-center">Modulo vacaciones</h1>
    <!-- Button del modal -->
    <div class="table-responsive">
        <table id="tblEmpleados" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Entrada</th>
                    <th>Dias de salario ordinario</th>
                    <th>Pago de vacaciones(basado en quincena)</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $Empleado->fetch_object()) { ?>
                    <tr>
                        <td><?php echo $fila->id; ?></td>
                        <td><?php echo $fila->Nombre; ?></td>
                        <td><?php echo $fila->Apellido; ?></td>
                        <td><?php echo $fila->Fecha_Entrada; ?></td>
                        <td><?php echo  DiasSalarioOrdinario($fila->Fecha_Entrada)?></td>
                        <td><?php echo  pagoVacaciones(24750)?></td>
                        <td style="width: 150px;">
                            <button class="btn btn-outline-primary btn-sn" title="Editar registro"><i class="fas fa-user-edit"></i></button>
                        </td>
                    </tr>
                <?php } ?>
        </table>
</main>
<?php 
    function DiasSalarioOrdinario($fecha_entrada){
        $date1 = DateTime::createFromFormat('d/m/Y',$fecha_entrada);
        $date2 = date_create(date("m/d/Y"));
        $diff = date_diff($date1, $date2);
        if($diff->y >5){
            return 18;
        }elseif($diff->y > 1){
            return 14;
        }else {
            return 0;
        }
    }
    function pagoVacaciones($salario){
        return $salario/11.1;
    }
?>

<?php include_once("../include/footer.php") ?>
