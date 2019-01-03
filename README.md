# Sistema de cotizaciones

Un sistema web con PHP y MySQL que permite crear clientes y a partir de ellos cotizaciones con el costo automático, así como el tiempo de la cotización. Más tarde, eso se puede imprimir.

Aparte de eso, se cuenta con el apartado de los ajustes, en donde se personalizan algunos mensajes que se incluyen en la cotización, por ejemplo, el remitente o el mensaje de agradecimiento.

Hice el sistema porque personalmente necesitaba un software para cotizaciones que a veces son requeridas por mis clientes; como me cansé de utilizar Microsoft Word y guardar los archivos en mi disco duro, decidí crear un sistema que gestionara todo eso por mí.

# Tecnologías que usa
Es un sistema para cotizaciones que utiliza _PHP_, el framework _Bootstrap 4_ para los estilos y sólo un poco de _JavaScript_ con _Vue.js_ para mejorar la experiencia de usuario y renderizar algunas cosas

# Montar sistema
Aquí los requisitos para probar/montar el sistema:


Necesita un servidor con *PHP y Apache*. La versión mínima
de PHP es la *7*, esto es debido a que se usa el operador _??_, la notación corta del arreglo _[]_
y otras cosas.
Claramente se podría crear una versión compatible con versiones anteriores, pero *no deseo que sea así*.
## Extensiones
* PDO
## Base de datos
Base de datos de MySQL o MariaDB. El esquema está en _esquema.sql_

## Credenciales
Configurar las credenciales en el archivo _env.php_; tomar como referencia _env.ejemplo.php_ y crear uno nuevo dependiendo del servidor.


# Licencia
Código fuente disponible bajo la licencia MIT. Te pido (pero no fuerzo) a que mantengas la página de *Acerca de* y el pie de página intactos, así como la posible publicidad que agregue.

# Bugs y recomendaciones
Puedes reportar un bug o recomendar cosas que se agreguen al sistema (que beneficien a todos, no solamente a ti. Y que no sean descabelladas) y en mi tiempo libre las agregaré. No te garantizo nada, pues no estoy cobrando nada por el sistema.