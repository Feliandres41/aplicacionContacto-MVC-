# usersApp

Aplicación de gestión de usuarios desarrollada en PHP siguiendo el patrón MVC.

## Estructura del proyecto

- `app/` - Lógica principal de la aplicación
  - `Config/` - Configuración (por ejemplo, base de datos)
  - `Controllers/` - Controladores
  - `Models/` - Modelos
  - `Views/` - Vistas
- `public/` - Punto de entrada público (index.php)
- `vendor/` - Dependencias gestionadas por Composer
- `composer.json` - Dependencias y configuración de Composer
- `database.sql` - Script de base de datos

## Instalación

1. Clona el repositorio `https://github.com/HBE-Quantumisp/usersApp.git`.
2. Ejecuta `composer install` para instalar las dependencias.
3. Configura la base de datos en `app/Config/Database.php`.
4. Importa el archivo `database.sql` en tu gestor de base de datos.
5. Apunta tu servidor web al directorio `public/`.

## Uso

- Accede a la aplicación desde tu navegador para gestionar usuarios.

## Autor

- !NG. LUIS T😎NCEL
