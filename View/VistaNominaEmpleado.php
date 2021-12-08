<?php
include_once('../Controller/mostrar.php');
include_once('../Controller/insertar.php');

$Nominas = getNomina();

$_SESSION['titulo'] = 'NominaEmpleado';
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


<main class="container p-5">
    <h1 class="text-center">Lista de Nominas de Empleados</h1>
    
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
        </table>
</main>

<?php include_once("../include/footer.php") ?>