<?php
    $actual= basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="inicio.php">Biblioteca Pinguina</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?php echo ($actual == 'index.php') ? 'active fw-bold' : ''; ?>" href="inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($actual == 'registro.php') ? 'active fw-bold' : ''; ?>" href="registro.php">Registro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($actual == 'consulta.php') ? 'active fw-bold' : ''; ?>" href="consulta.php">Consulta</a>
        </li>
      </ul>
    </div>
  </div>
</nav>