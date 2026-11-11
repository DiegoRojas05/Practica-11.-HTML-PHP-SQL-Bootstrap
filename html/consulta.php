<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-4">Catálogo de Libros</h1>

        <div class="card shadow border-0">
            <div class="card-body p-4">

                <?php
                    $con = mysqli_connect("db", "bibliotecario", "6JH*E.Oy-VJXzJq7", "libreria");

                    if(mysqli_connect_errno()){
                        echo "<div class='alert alert-danger'>Failed to connect to MySQL: " . mysqli_connect_error() . "</div>";
                    } else {
                        
                        $sql = "SELECT titulo, autor, fecha_publicacion, portada FROM libros";
                        $resultado = mysqli_query($con, $sql);

                        if(mysqli_num_rows($resultado) > 0){
                            
                            echo '<div class="table-responsive">';
                            echo '<table class="table table-hover table-bordered align-middle text-center">';
                            echo '<thead class="table-dark">';
                            echo '<tr>';
                            echo '<th>Portada</th>';
                            echo '<th>Título</th>';
                            echo '<th>Autor</th>';
                            echo '<th>Fecha de Publicación</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo '<tr>';
                                
                                $imagen_base64 = base64_encode($fila['portada']);
                                
                                echo '<td><img src="data:image/jpeg;base64,' . $imagen_base64 . '" width="120" class="img-thumbnail" alt="Portada"></td>';
                                echo '<td class="fw-bold">' . htmlspecialchars($fila['titulo']) . '</td>';
                                echo '<td>' . htmlspecialchars($fila['autor']) . '</td>';
                                echo '<td>' . htmlspecialchars($fila['fecha_publicacion']) . '</td>';
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                            echo '</div>';

                        } else {
                            echo "<div class='alert alert-warning text-center'>No hay libros registrados todavía.</div>";
                        }

                        mysqli_close($con);
                    }
                ?>
                
                <div class="mt-4 text-center">
                    <a href="registro.php" class="btn btn-primary">Registrar nuevo libro</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>