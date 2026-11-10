<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class= "bg-light">

    <?php include 'navbar.php'; ?>
    
    <header class="container-fluid text-center p-5 bg-dark text-white mb-5">
        <h1 class="display-4 fw-bold">Bienvenido a la Librería</h1>
        <p class="lead mb-0;">Selecciona una opción en el menú superior.</p>
    </header>
    
    <div class="container mt-5">
        <div class="row justify-content-center g-4">

            <div class="col-md-5">
                <div class="card h-100 shadow-sm border-0 bg-dark">
                    <div class="card-body text-center p-4">
                        <h3 class="card-title text-light mb-3">Registro </h3>
                        <p class="card-text text-light mb-4">Ingresa para registrar un libro</p>
                        <a href="registro.php" class="btn btn-success text-light w-100">Ir a registro</a>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="card h-100 shadow-sm border-0 bg-dark">
                    <div class="card-body text-center p-4">
                        <h3 class="card-title text-light mb-3">Consulta </h3>
                        <p class="card-text text-light mb-4">Revisa todos los libros que tenemos</p>
                        <a href="consulta.php" class="btn btn-success text-light w-100">Ir a consulta</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>