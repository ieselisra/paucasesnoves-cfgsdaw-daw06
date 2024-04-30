# Desplegament-web
Aquesta és una petita aplicació web feta amb PHP.

>Notas: 
>* Ejercicio realizado para la asignatura DAW.
>* Para la realzación del ejercicio no se proporcionó la BBDD, por lo que las nuevas clases (Nou / Elimina) se crearon 
>tomando como referencia las queries ya presentes. 
>  * El código debería ser revisado y adaptado a las tablas reales, en caso de ser difierentes a lo reflejado en el código.
>* Documentaremos superficialmente la aplicación, ya que el objetivo principal es el hecho de publicar
>una publicación básica en Github.
 
>Fork del repositorio original: https://github.com/CarlesCanals/Desplegament-web


##  Clases

### Principal
Clase principal de la aplicación.

Será utilizada como lanzador, proporcionando además una parte HTML en la que se mostrará una tabla con los productos actuales.  
La tabla tendrá también 2 enlaces, a modificar y eliminar.



### Elimina
Esta clase será la encargada de eliminar productos.

Obtendrá el id del elemento a eliminar a través de un parámetro en la URL.

### Connexio
Proporciona conectividad con la BBDD, que peude ser configurada a traavés de 4 parámetros.

Utiliza mysqlcli.


### Modificar
Esta clase será la encargada de proporcionar al usuario la posibilidad de actualizar productos.

Obtendrá el id del elemento a modificar a través de un parámetro en la URL.


### Actualitzar
Esta clase será la encargada de gestionar las actualizaciones de productos en BBDD.

Obtendrá los datos a modificar a través de un formulario (POST).

### Nou
Esta clase será la encargada de proporcionar al usuario la posibilidad de crear productos.

Además, es capaz de gestionar una llamada POST a ella misma desde la parte HTML para persistir el producto.

### Footer
Añadirá un footer común al HTML generado.

### Header
Añadirá un header al HTML generado.