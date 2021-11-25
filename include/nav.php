
<nav class="navbar navbar-expand-lg my-0 navbar-dark" style="background: rgb(2, 56, 118);">
  <div class="container-fluid">
    <a class="navbar-brand" href='<?php echo $_SESSION["inicio"]?>'><img src="https://itla.edu.do/wp-content/uploads/2021/03/logo-fondo-azul-preview-1.jpg" width="60px"  alt="Card image cap"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=$_SESSION['empleadoA']?>" aria-current="page" href='<?php echo $_SESSION["empleado"]?>'>Empleados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$_SESSION['departamentoA']?>" href= '<?php echo $_SESSION["departamento"]?>'>Departamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$_SESSION['encargadoA']?>" href='<?php echo $_SESSION["encargado"]?>'>Encargados</a>
        </li>

    </div>
  </div>
</nav>

