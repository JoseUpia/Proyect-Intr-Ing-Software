<?php



?>

<nav class="navbar navbar-expand-lg my-0 navbar-dark" style="background: rgb(2, 56, 118);">
  <div class="container-fluid">
    <a class="navbar-brand" href='<?php echo $_SESSION["inicio"] ?>'><img src="https://itla.edu.do/wp-content/uploads/2021/03/logo-fondo-azul-preview-1.jpg" width="60px" alt="Card image cap"></a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $_SESSION['empleadoA'] ?>" aria-current="page" href='<?php echo $_SESSION["empleado"] ?>'>Empleados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $_SESSION['departamentoA'] ?>" href='<?php echo $_SESSION["departamento"] ?>'>Departamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $_SESSION['encargadoA'] ?>" href='<?php echo $_SESSION["encargado"] ?>'>Encargados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $_SESSION['VacacionesA'] ?>" href='<?php echo $_SESSION["Vacaciones"] ?>'>Vacaciones</a>
        </li>
      </ul>
    </div>
    <div class="nav-Right">
      <ul class="navbar-nav">
        <li class="nav-link"><a><i class="bi bi-person-circle"></i> <?php echo $_SESSION['Empleado'] ?></a></li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Proyect-Intr-Ing-Software/index.php">Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>