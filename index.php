<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="resources/favicon.ico">

    <link rel="stylesheet" href="style/login.css">
    <?php
    include('include/bootstrapHeader.php');


?>
    <title>Document</title>
</head>

<body>
    <div class="row mx-auto">
        <div class="mt-5 pt-5 mx-auto" style="width: 700px;">
            <div class="card">
                <div class="">
                    <h1 class="card-header text-center"><img src="https://plataformavirtual.itla.edu.do/pluginfile.php/1/core_admin/logo/0x200/1636632894/ITLA-logo-fondo-blanco.png" title="Logo del ITLA"></h1>
                    <div class="card-body">
                        <div class="row justify-content-md-center">
  
                            <?php session_start(); if(isset($_SESSION['Mensaje'])){ echo $_SESSION['Mensaje']; session_destroy(); }?>
                            <div class="col-md-5">
                                <form class="mt-3 text-center" action="Controller/login.php" method="post" id="login">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary btn-block mt-3" id="loginbtn">Iniciar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/bootstrapFooter.php') ?>
</body>

</html>