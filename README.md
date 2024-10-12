# Consulta números de la secuencia de Fibonacci para fechas
## Instrucciones de uso
Ejecuta el programa desde un terminal en la carpeta con el comando: `php main.php`<br />
El programa te dará un menú que te guiará en el proceso.<br />
Para introducir fechas personalizadas __estas han ir en formato "Y-m-d H:i:s" UTC__
### Razonamiento de diseño
Atendiendo a los principios de SOLID cada clase solo gestiona una única responsabilidad, por ejemplo, main.php tan solo ejecuta la aplicación, Fibonacci.php solo genera la secuencia y menu.php gestiona los menús.
Los archivos de clases van organizados dentro de un directorio en el que hay una clase abstracta Date de las heredan las clases que permiten gestionar las fechas para el mes, año y rango de fechas. Se gestionan las
excepciones para evitar que el programa se detenga redirigiendo el flujo siempre hacia introducir los valores de nuevo y mostrando mensajes de error.
### Posibles mejoras
La gestión de errores es muy básica y se podría pulir más para que por ejemplo no pregunte siempre que haya un error si se quiere realizar otra acción y redirija al menú principal. Por ejemplo si se introducen fechas
no validas cuando pide los rangos personalizados.
