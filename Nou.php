<?php

//Imports
require_once('Connexio.php');
require_once('Header.php');

class Nou {

    // Método para mostrar el formulario
    public function mostrarFormulari() {
        // Imprime la estructura HTML del formulario de creación
        echo '<!DOCTYPE html>
              <html lang="ca">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Nou producte</title>
                <!-- Bootstrap-->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
              </head>
              <body>
                <div class="container mt-5" style="margin-bottom: 200px">
                    <h2>Nou producte</h2>
                    <hr>
                    <form action="Crear.php" method="POST">
                        <!-- Campos del formulario -->
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nombre:</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcio" class="form-label">Descripción:</label>
                            <input type="text" name="descripcio" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="preu" class="form-label">Precio:</label>
                            <input type="number" name="preu" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría:</label>
                            <select name="categoria" class="form-select" required>
                                <!-- Opciones simuladas del selector de categorías -->
                                <option value="1">Electrónicos</option>
                                <option value="2">Roba</option>
                            </select>
                        </div>
                        <hr>
                        <!-- Botones guardar y cancelar -->
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <a href="Principal.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>';

        // Incluye el pie de página
        require_once('Footer.php');
    }

    // Método para crear un nuevo producto
    public function crearProducto() {
        // Obtiene los valores ingresados en el formulario
        $nombre = $_POST['nom'];
        $descripcion = $_POST['descripcio'];
        $precio = $_POST['preu'];
        $categoria = $_POST['categoria'];

        // Realiza la consulta para crear el producto
        $consulta = "INSERT INTO productes (nombre, descripcion, precio, categoria_id) VALUES ('$nombre', '$descripcion', $precio, $categoria)";

        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();
        $resultado = $conexion->query($consulta);

        // Verifica si la introfducción fue bien
        if ($resultado) {
            // Muestra un mensaje de alerta
            echo '<script>alert("Producto creado exitosamente.");</script>';
        } else {
            // Muestra un mensaje de error
            echo '<script>alert("Error al crear el producto.");</script>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Crea una instancia de la clase Nou
$nuevoProducto = new Nou();

// Verifica si se ha enviado el formulario para creación (POST) o se carga la página (GET)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevoProducto->crearProducto();
} else {
    $nuevoProducto->mostrarFormulari();
}

?>