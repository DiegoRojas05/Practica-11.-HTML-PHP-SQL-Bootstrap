<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h3 class="card-title mb-0">Registrar Nuevo Libro</h3>
                    </div>
                    <div class="card-body p-4">

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $autor = trim($_POST['autor'] ?? '');
                            $titulo = trim($_POST['titulo'] ?? '');
                            $fecha_publicacion = $_POST['fecha_publicacion'] ?? '';
                            
                            if (isset($_FILES['imagen_portada']) && $_FILES['imagen_portada']['error'] === UPLOAD_ERR_OK) {
                                $ruta_temporal = $_FILES['imagen_portada']['tmp_name'];
                                $contenido_imagen = file_get_contents($ruta_temporal);

                                $con = new mysqli('db', 'bibliotecario', '6JH*E.Oy-VJXzJq7', 'libreria');

                                if ($con->connect_error) {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Error de conexión: ' . $conexion->connect_error . '
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                          </div>';
                                } else {
                                    $sql = "INSERT INTO libros (autor, titulo, fecha_publicacion, imagen_portada) VALUES (?, ?, ?, ?)";
                                    $stmt = $conexion->prepare($sql);

                                    if ($stmt) {
                                        $stmt->bind_param("sssb", $autor, $titulo, $fecha_publicacion, $null);
                                        $stmt->send_long_data(3, $contenido_imagen);

                                        if ($stmt->execute()) {
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    ¡El libro <strong>' . htmlspecialchars($titulo) . '</strong> fue registrado con éxito!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                  </div>';
                                        } else {
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Error al guardar: ' . $stmt->error . '
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                  </div>';
                                        }
                                        $stmt->close();
                                    }
                                    $conexion->close();
                                }
                            } else {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        Por favor, selecciona una imagen de portada válida.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                      </div>';
                            }
                        }
                        ?>

                        <form action="registro.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="titulo" class="form-label fw-bold">Título del libro</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej. El Principito" required>
                            </div>

                            <div class="mb-3">
                                <label for="autor" class="form-label fw-bold">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" placeholder="Ej. Antoine de Saint-Exupéry" required>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_publicacion" class="form-label fw-bold">Fecha de publicación</label>
                                <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" required>
                            </div>

                            <div class="mb-4">
                                <label for="imagen_portada" class="form-label fw-bold">Imagen de portada</label>
                                <input type="file" class="form-control" id="imagen_portada" name="imagen_portada" accept="image/*" required>
                                <div class="form-text">Formatos aceptados: JPG, PNG, WEBP.</div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">Guardar Libro</button>
                                <a href="inicio.php" class="btn btn-outline-secondary">Cancelar</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>