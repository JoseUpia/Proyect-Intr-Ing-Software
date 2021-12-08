<?php
include_once('../../include/session_start.php');
if (!isset($_SESSION['Usuario'])) {
    header('location: ../../index.php');
    session_destroy();
    exit;
}

include('../../Controller/mostrar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('../../include/bootstrapHeader.php');
    include('../../include/navEmpleados.php');
    ?>
    <title>Empleado ITLA</title>
</head>

<body>

    <p class="mx-5 mt-5 p-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum quas, amet voluptas praesentium enim esse impedit, laudantium nihil temporibus quo architecto reiciendis rerum id blanditiis aliquam dolorem, animi laboriosam eligendi?</p>
    <p class="mx-5 p-2">Cum vitae qui commodi exercitationem quia doloribus dolore, impedit molestiae earum quidem assumenda architecto culpa in! Praesentium, saepe consequuntur. Ut sequi inventore recusandae doloribus laborum dolore minus itaque corrupti ea.</p>
    <p class="mx-5 p-2">Facilis esse eos accusantium amet quas sunt harum quibusdam, voluptatum exercitationem, id atque libero at ea ipsam voluptate accusamus quo provident! Sequi, magnam voluptatem eos alias dolor ullam eveniet pariatur.</p>
    <p class="mx-5 p-2">Omnis odio laboriosam repellat excepturi molestiae soluta, ratione illo nisi atque maxime nobis cumque enim nihil consectetur vero reprehenderit, quidem tempora voluptates magnam esse quisquam sunt? Assumenda laborum dolores consequuntur.</p>
    <p class="mx-5 p-2">Omnis laborum vero illum, repudiandae, animi harum reprehenderit, totam autem cupiditate officiis fugit consequuntur! Soluta blanditiis assumenda eos ipsam delectus, fuga atque voluptate ut dolores, enim possimus qui, placeat sint.</p>


    <?php include('../../include/bootstrapFooter.php'); ?>
</body>

</html>