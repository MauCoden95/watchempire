# Proyecto de ecommerce de relojes

![E-commerce de Relojes](https://i.ibb.co/CQs5cB7/imagen-2024-08-18-174412884.png)

Este proyecto es una plataforma de comercio electrónico para la venta de relojes. 
Los usuarios pueden explorar una amplia gama de relojes, agregar productos a su carrito de compras, y realizar compras en línea. 


## Tecnologías Utilizadas

- **Frontend**: Vue.js, Vue Router
- **Backend**: Laravel, PHP
- **Base de Datos**: MySQL
- **Autenticación**: JWT
- **Estilos**: Tailwind


## Instalación

### Requisitos Previos

- Node.js (v21+)
- Composer
- MySQL
- PHP (v8.2+)



### Configuración del Proyecto

1. Clona el repositorio:
   ```bash
   git clone https://github.com/usuario/ecommerce-relojes.git
   cd ecommerce-relojes


2. Configurar el backend:
   ```bash
       git clone https://github.com/usuario/ecommerce-relojes.git
       cd ecommerce-relojes

   2.1 Instalar las dependencias de Laravel(composer install)

   2.2 Crear un archivo .env en la raíz del proyecto y configurar las variables de entorno
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=watchempire
      DB_USERNAME=root
      DB_PASSWORD=
      
      APP_URL=http://localhost:8000

   2.3 Genera la clave de la aplicación y migra la base de datos:

     php artisan key:generate
     php artisan migrate --seed


   2.4 Iniciar servidor de Laravel (php artisan serve)



3. Configurar el frontend:

   3.1 Dirigirse al directorio watchempire e instalar las dependencias de node: npm install

   3.2 Ejecutar el siguiente comando:  npm run serve

   3.3 La aplicación estará disponible en http://localhost:8080.



## Autenticación con JWT

La autenticación en este proyecto de ecommerce de relojes se implementa utilizando JSON Web Tokens (JWT), una solución segura y eficiente para manejar la autenticación de usuarios.

### ¿Cómo Funciona en Este Proyecto?

   #### Registro de Usuario:
   
   Cuando un nuevo usuario se registra, sus credenciales (como el correo electrónico y la contraseña) se almacenan de forma        segura en la base de datos después de ser encriptadas.
   
   #### Inicio de Sesión:
   
   Al iniciar sesión, el usuario envía sus credenciales (correo electrónico y contraseña).
   Si las credenciales son válidas, el servidor genera un JWT, que incluye información del usuario como el ID, y lo firma          utilizando una clave secreta.
   El token JWT se envía de vuelta al cliente (normalmente guardado en localStorage o sessionStorage).
  
   #### Cierre de Sesión:
   
   Para cerrar sesión, simplemente se elimina el JWT almacenado en el cliente, lo que revoca el acceso a los recursos              protegidos.
   

## Capturas de la página principal


![Header y banner](https://i.ibb.co/CQs5cB7/imagen-2024-08-18-174412884.png)

![Productos destacados](https://i.ibb.co/bsD26tr/imagen-2024-08-18-181507510.png)

![Productos destacados](https://i.ibb.co/wR6Dh7V/imagen-2024-08-18-183554796.png)

![Productos destacados](https://i.ibb.co/LtTWrsG/imagen-2024-08-18-183725716.png)

<br><br>
<br><br>

## Carrito de compras

![Productos destacados](https://i.ibb.co/nMfBnn7/imagen-2024-08-18-184341687.png)

![Productos destacados](https://i.ibb.co/Yf61ZX9/imagen-2024-08-18-184907184.png)






   
