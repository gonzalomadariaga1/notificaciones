<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## Sobre este proyecto

Este proyecto está basado en Laravel 10 por lo que la versión de PHP que utiliza es la 8.1 como mínimo. Además, cuenta con los siguientes paquetes:


- **Bootstrap 5**: Bootstrap es una biblioteca multiplataforma creada por Twitter. Contiene plantillas de diseño con tipografía, formularios, botones, cuadros, menús de navegación y otros elementos de diseño basado en HTML y CSS, así como extensiones de JavaScript adicionales.
- **Laravel UI 4**: Es un paquete oficial desarrollado por Laravel y permite crear un sistema de autentificación diseñado bajo Bootstrap.
- **Laraveles Spanish**: Paquete que permite traducir al idioma español los mensajes que muestra por defecto Laravel.
- **Realrashid Sweetalert**: paquete que proporciona una manera fácil de mostrar mensajes de alerta utilizando la biblioteca de sweetalert2. 
- **Spatie Laravel Permission**: paquete que permite asociar usuarios a roles con permisos y administrarlos con una base de datos. 
- **JQuery**: software libre y de código abierto. Cuenta con un diseño que facilita la navegación por un documento y seleccionar elementos DOM proporcionando a los desarrolladores de aplicaciones web agilizar el desarrollo de proyectos.
- **DataTables**: es un complemento basado en jQuery. Es una herramienta altamente flexible, construida sobre los cimientos de la mejora progresiva, que agrega características avanzadas a cualquier tabla HTML.
- **Bootstrap Icons**: biblioteca de iconos gratuita, de alta calidad y de código abierto con más de 2.000 iconos.
- **BS Stepper**: es un complemento de JavaScript diseñado con Bootstrap que facilita la creación de formularios step-by-step (paso a paso).
- **Bootstrap Select**: complemento que permite crear dropdowns de selección mucho mas intuitivos.


## Instalación

1. Clonación de repositorio

En la carpeta donde se desee instalar este proyecto, abrir un Git Bash (o terminal de comandos) y copie el siguiente comando:

`git clone https://github.com/gonzalomadariaga1/proyecto-base.git`

2. Instalación de paquetes 

Luego de clonar el repositorio, es necesario instalar los paquetes. Para ello, en una Git bash y dentro de la carpeta del proyecto, ingrese el siguiente comando:

`npm install`

3. Iniciar el gestor de dependencias para PHP

Tras la instalación de los paquetes, es necesario descargar e instalar las librerias y paquetes de este proyecto vía composer. Ingrese el siguiente comando en la misma ventana de Git bash: 

`composer install`

4. Crear archivo .env y generar key

Ingrese los siguientes comandos para generar un archivo .env y luego, genere una key: 

`cp .env.example .env`

`php artisan key:generate`


5. Iniciación del proyecto en modo desarrollo

Tras la instalación de los paquetes, es necesario iniciar el proyecto en modo desarrollo. Ingrese el siguiente comando en la misma ventana de Git bash: 

`npm run dev`


6. Creación, configuración y migración de base de datos

Cree una base de datos localmente, luego configure el archivo .env del proyecto e ingrese el nombre de la base de datos recién creada junto con el usuario y contraseña si es necesario. Tras esto, ingrese el siguiente comando:

`php artisan migrate`

Este comando, creará las tablas necesarias para el correcto funcionamiento del proyecto base, entre las cuales destacan: 

- Tabla para Usuarios
- Tabla de permisos
- Tabla de roles 
- Tabla de asociación de roles y usuarios
- Tabla de asociación de permisos y usuarios

7. Registro de usuario

Como último paso, diríjase a la página de registro de usuarios y registre el primer usuario del sistema. Al crearlo, el sistema le asignará automáticamente el rol de Superadmin al primer usuario registrado. El rol de Superadmin tiene asignados todos los permisos necesarios para controlar completamente el sistema. Una vez completado el registro, ya se encontrará logueado y podrá acceder al panel de administración tanto de usuarios como de roles.


