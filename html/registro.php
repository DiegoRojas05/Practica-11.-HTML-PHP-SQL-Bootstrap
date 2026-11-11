<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h1 class="h4 mb-0">Registro de Libros</h1>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Aquí está la corrección: action apunta a llenado.php -->
                        <form action="llenado.php" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="titulo" class="form-label fw-bold">Título:</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="autor" class="form-label fw-bold">Autor:</label>
                                <input type="text" name="autor" id="autor" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="fecha_publicacion" class="form-label fw-bold">Fecha de publicación:</label>
                                <input type="date" name="fecha_publicacion" id="fecha_publicacion" class="form-control" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="imagen_portada" class="form-label fw-bold">Imagen de portada:</label>
                                <input type="file" name="imagen_portada" id="imagen_portada" class="form-control" accept="image/*" required>
                            </div>
                            
                            <div class="d-grid">
                                <input type="submit" value="Registrar" class="btn btn-success btn-lg">
                            </div>
                            
                        </form>
                        
                        <div class="mt-4 text-center">
                            <p><a href="consulta.php" class="text-decoration-none">Ver los libros registrados</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>