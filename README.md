
# Sistema de cotizaciones  
![Captura de pantalla del software](https://parzibyte.me/blog/wp-content/uploads/2019/01/Sistema-web-para-cotizaciones-y-presupuestos.png)
  
Un sistema web con PHP y MySQL que permite crear clientes y a partir de ellos cotizaciones con el costo automático, así como el tiempo de la cotización. Más tarde, eso se puede imprimir.  
  
Aparte de eso, se cuenta con el apartado de los ajustes, en donde se personalizan algunos mensajes que se incluyen en la cotización, por ejemplo, el remitente o el mensaje de agradecimiento.  
  
Hice el sistema porque personalmente necesitaba un software para cotizaciones que a veces son requeridas por mis clientes; como me cansé de utilizar Microsoft Word y guardar los archivos en mi disco duro, decidí crear un sistema que gestionara todo eso por mí.

# Instalación
https://www.youtube.com/watch?v=3mz9_KS_rvU&feature=emb_logo


# Características del software

No es la gran cosa, pero entre sus principales características encontramos las siguientes:

*   Realizar cotizaciones o presupuestos
*   Estimar el costo requerido, el cual se configura por cada servicio
*   Calcular tiempo requerido por cada servicio
*   Describir características y/o condiciones del trabajo
*   Agregar clientes para ligarlos a las cotizaciones
*   Imprimir la cotización o guardarla como PDF (esto depende del navegador la mayoría de veces)
*   Multiusuario: cualquier usuario puede registrarse y usarlo, así de simple. Eso sí, las cotizaciones, servicios y características son separadas por usuario
*   Totalmente open source
*   Escrito con PHP, utiliza PDO para interactuar con la base de datos
*   Base de datos MySQL
*   Lado del cliente con Vue.JS y Bootstrap
*   Mensaje de agradecimiento, presentación y pie totalmente configurables

Se me ocurre que puede servir tanto como para estudiantes que tienen que entregar un **proyecto con PHP simple**, así como para personas que necesitan un software como estos. Voy a explicar cómo fue creado, en dónde se puede probar y también dónde se puede leer el código fuente.

# Una introducción técnica

Este sistema está creado con PHP utilizando PDO para conectar con MySQL. Usé lo mismo que explico en [**Introducción a PHP con PDO y MySQL**](https://parzibyte.me/blog/2018/02/12/mysql-php-pdo-crud/), o en la [**creación de un pequeño sistema de ventas**](https://parzibyte.me/blog/2018/03/13/pequeno-sistema-ventas-php/). En el lado del cliente utiliza a Bootstrap 4 y Vue.Js en su versión 2.

Para convertir los minutos a un tiempo legible por los humanos, utilizo [**lo que se vio aquí**](https://parzibyte.me/blog/2019/01/03/convertir-minutos-texto-legible-javascript/). Por otro lado, para formatear el dinero utilizo la [**función que convierte números a dinero**](https://parzibyte.me/blog/2019/01/02/numero-moneda-javascript/) que publiqué anteriormente (lo puse rápidamente como filtro gracias a la simplicidad de Vue). 

La sesión de PHP es manejada por un, valga la redundancia, [**manejador o handler propio de sesiones, el cual utiliza MySQL**](https://parzibyte.me/blog/2018/06/28/manejador-sesiones-php-mysql-pdo/) para la persistencia y que publiqué hace algún tiempo. 

Ah, olvido decir que no se utiliza ningún framework para PHP; es el lenguaje en su simplicidad absoluta. 

Hablando de las contraseñas, las cifro con _bcrypt_ (mira este [**tutorial para hashear en PHP**](https://parzibyte.me/blog/2017/11/13/cifrando-comprobando-contrasenas-en-php/)) pero antes de ello las convierto en una cadena de longitud fija con md5 (para evitar poner un [**límite en la longitud de las mismas**](https://parzibyte.me/blog/2018/11/07/cuando-descubri-que-las-contrasenas-de-una-web-no-estaban-hasheadas/)). Así, aunque MD5 es rompible por un ataque de diccionario, bcrypt no, porque usa sal. 

Sobre la seguridad puedo decir que utilizo un [**token CSRF para evitar ataques CSRF**](https://parzibyte.me/blog/2018/08/20/que-es-un-ataque-csrf/), y para comprobar el token utilizo `hash_equals` en lugar de una simple comparación; todo esto para [**mitigar ataques de temporización**](https://parzibyte.me/blog/2018/11/08/hash_equals-ataques-de-temporizacion-php/).

# Demostración y pruebas del software

Puedes probar la aplicación web **[haciendo click aquí](http://bit.ly/cotizaciones_online) o entrando en bit.ly/cotizaciones_online**. 

Funciona perfectamente; regístrate con tu correo electrónico y luego inicia sesión. El software es web, y por lo tanto **multiplataforma**. 

Puedes acceder a él desde una tableta, teléfono o computadora desde cualquier parte del mundo. Aparte de eso, gracias al diseño responsivo se adapta a cualquier pantalla. 

La siguiente captura es de mi teléfono:

![App web para cotizaciones, presupuestos y costos en un teléfono Android](https://parzibyte.me/blog/wp-content/uploads/2019/01/App-web-para-cotizaciones-presupuestos-y-costos-en-un-tel%C3%A9fono-Android.jpg) 

Un PDF que fue generado (la impresión sale casi idéntica) es [**el que se puede ver aquí**](https://drive.google.com/open?id=1fdDIt28hfiQN4yFSbVwV8jY5d3odXJiz).

# Probar app
Pruébala [aquí](http://bit.ly/cotizaciones_web).
  
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
