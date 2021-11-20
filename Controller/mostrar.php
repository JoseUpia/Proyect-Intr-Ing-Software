<?php

$incl = include("conexion.php");
if($incl){
    $consulta = "SELECT * FROM encargado";
    $resultado = mysqli_query($conexion, $consulta);
    if($resultado){
        while($row = $resultado->fetch_array()){
            $ID = $row['ID'];
            $Nombre = $row['Nombre'];
            $Apellido = $row['Apellido'];
            ?>
            <div>
                <h2><?php echo $Nombre; ?></h2>
                <div>
                    <p>
                        <b>ID: </b> <?PHP echo $ID; ?> <br />
                        <b>ID: </b> <?PHP echo $Nombre; ?> <br />
                        <b>ID: </b> <?PHP echo $Apellido; ?> 
                    </p>
                </div>
            </div>
            <?php
        }
    }
}

?>