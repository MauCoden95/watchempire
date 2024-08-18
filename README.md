# Proyecto de ecommerce de relojes

![E-commerce de Relojes](https://ibb.co/cQXcBJF.png)

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


   



   
