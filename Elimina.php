<?php

class Elimina {
    // Método para eliminar un producto
    public function eliminarProducto() {
        // Obtiene el ID del producto a eliminar
        $idProducto = $_GET['id'];

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

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Crea una instancia de la clase Elimina
$eliminarProducto = new Elimina();
$eliminarProducto->eliminarProducto();

?>