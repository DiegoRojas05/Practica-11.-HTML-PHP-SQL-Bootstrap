<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro completo</title>
    <!-- CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 text-center">
                    <div class="card-header bg-dark text-white py-3">
                        <h1 class="h4 mb-0">Registro completado</h1>
                    </div>
                    <div class="card-body p-4">

                        <?php
                            $con = mysqli_connect("db", "bibliotecario", "6JH*E.Oy-VJXzJq7", "libreria");

                            if(mysqli_connect_errno()){
                                echo "<div class='alert alert-danger'>Failed to connect to MySQL: " . mysqli_connect_errno() . "</div>";
                            }

                            $titulo = mysqli_real_escape_string($con, $_POST["titulo"]);
                            $autor = mysqli_real_escape_string($con, $_POST["autor"]);
                            $fecha_publicacion = mysqli_real_escape_string($con, $_POST["fecha_publicacion"]);
                            
                            // Leemos el archivo y usamos addslashes para poder insertarlo en la consulta de texto
                            $imagen_portada = addslashes(file_get_contents($_FILES["imagen_portada"]["tmp_name"]));

                            $sql = "INSERT INTO libros(titulo, autor, fecha_publicacion, portada) VALUES ('$titulo', '$autor', '$fecha_publicacion', '$imagen_portada');";

                            if(!mysqli_query($con, $sql)){
                                die("<div class='alert alert-danger'>Error: ".mysqli_error($con)."</div>");
                            }else{
                                echo "<div class='alert alert-success fw-bold'><p class='mb-0'>Se ha registrado correctamente el libro.</p></div>";
                            }
                            
                            mysqli_close($con);
                        ?>

                        <div class="mt-4 d-flex justify-content-center gap-2">
                            <a href="registro.php" class="btn btn-primary">Regresar al formulario</a>
                            <a href="consulta.php" class="btn btn-outline-success">Ver los libros registrados</a>
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