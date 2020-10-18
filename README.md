# laravel-vue
Proyecto desarrollado en  Laravel 6.0.4 y Vue js 2
** Instalación:**

1.	El repositorio está en: https://github.com/juliocesarjcrs/laravel-vue
2.	Puede clonarlo o descargarlo como zip
 
3.	Para clonarlo en una terminal de git puede ejecutar:
git clone 'https://github.com/juliocesarjcrs/laravel-vue.git'
4.	Ingresar en la terminal a la carpeta: laravel-vue y ejecutar 
`composer install `y  luego `npm install`
5.	En PhpMyadmin crear una base de datos llamada: `laravel ` y configurar credenciales de la base de datos en el archivo `.env`
6.	En la consola ejecutar  `php artisan migrate` para crear las tablas en la base de datos.
7.  Asegurarse de tener en el php.ini el `memory_limit = 2048M` o superior, para que no de error al ejecutar un seeder de productos.
8.	Ejecutar php artisan db:seed para ingresar  usuarios por defecto con rol administrador y vendedor . 
Ejecutar` php artisan serve` y `npm run dev`
9.	Abrir en el navegador http://127.0.0.1:8000/
10.	Dar click en Iniciar sesión e ingresar con los datos generados por el seeder que se muestran a continuación:

**usuario Administrador:**
*correo:*   admin@correo.com
*Contraseña*: 123456

**usuario vendedor:**
*correo:* vendedor@correo.com
*Contraseña:* 123456


