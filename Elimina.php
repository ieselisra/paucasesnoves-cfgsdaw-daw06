<?php

class Elimina {
    // Metodo para mostrar el formulario
    public function mostrarFormularioEliminar() {
        // Imprime la estructura HTML
        echo '<!DOCTYPE html>
            <html lang="ca">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Eliminar producte</title>
                <!-- Bootstrap-->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            </head>
            <body>
                <div class="container mt-5" style="margin-bottom: 200px">
                    <h1>Eliminar producte</h1>
                    <h2>Tria un producte per eliminar-lo de la BBDD</h2>
                    <hr>
                    <form action="Eliminar.php" method="POST">
                        <!-- Campo select para elegir el producto -->
                        <div class="mb-3">
                            <label for="producto" class="form-label">Selecciona el producte a eliminar:</label>
                            <select name="id" class="form-select" required>
                                <option value="" selected>Selecciona un producte</option>
                                <option value="1">Producte 1</option>
                                <option value="2">Producte 2</option>
                        </select>
                        </div>
                        <hr>
                        <!-- Botons confirmar i cancel·lar -->
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                        <a href="Principal.php" class="btn btn-secondary">Cancel·lar</a>
                    </form>
                </div>
            </body>
            </html>';

        // Incluye el pie de página
        require_once('Footer.php');
    }

    // Método para eliminar un producto
    public function eliminarProducto() {
        // Obtiene el ID del producto a eliminar
        $idProducto = $_POST['id'];

        // Realiza la consulta para eliminar el producto
        $consulta = "DELETE FROM productes WHERE id = $idProducto";

        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();
        $resultado = $conexion->query($consulta);

        // Verifica si la eliminación fue exitosa
        if ($resultado) {
            // Muestra un mensaje de alerta
            echo '<script>alert("S\'ha eliminat el producte correctament.");</script>';
        } else {
            // Muestra un mensaje de error
            echo '<script>alert("S\'ha produït un error en eliminar el producte.");</script>';
        }
    }
}

// Crea una instancia de la clase Elimina
$eliminarProducto = new Elimina();

// Verifica si se ha enviado el formulario para eliminación (POST) o se carga la página (GET)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarProducto->eliminarProducto();
} else {
    $eliminarProducto->mostrarFormularioEliminar();
}

?>