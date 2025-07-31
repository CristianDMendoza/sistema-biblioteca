# Sistema de Gestión de Biblioteca

Este proyecto es una aplicación web para la gestión de una biblioteca. Incluye un backend desarrollado en Laravel y un frontend en React. Permite el registro de libros, la visualización de la lista, la eliminación de registros, gestión de préstamos y visualización de estadísticas básicas.

## Características implementadas

### Backend (Laravel)
- API RESTful para el manejo de libros
- Endpoints disponibles:
  - GET /api/libros
  - POST /api/libros
  - GET /api/libros/{id}
  - PUT /api/libros/{id}
  - DELETE /api/libros/{id}
- Validaciones básicas en los formularios de creación y edición
- Base de datos MySQL configurada
- Modelo `Libro` con campos: `titulo`, `autor`, `genero`, `disponible`
- CORS habilitado para permitir conexión con el frontend

### Frontend (React)
- Formulario para crear libros con campos: título, autor, género, disponibilidad
- Lista de libros en tiempo real consumida desde la API
- Funcionalidad para eliminar libros
- Axios configurado para conexión con el backend
- Diseño funcional y básico
- Módulo de préstamos: registro de usuarios, fechas de préstamo y devolución
- Estadísticas: análisis o métricas sobre los libros o préstamos

## Funcionalidades pendientes
- Autenticación de usuarios
- Pruebas unitarias y de integración
- Diseño responsivo y mejora en experiencia de usuario
- Organización por servicios o repositorios en el backend
- Validaciones en frontend y mensajes de error visibles

## Requisitos técnicos
- PHP >= 8.1
- Node.js y npm
- MySQL
- Composer
- Laravel 12
- React + Vite

## Instalación

### Backend
1. Clonar el repositorio
2. Ingresar a la carpeta del proyecto:
    cd biblioteca-api
3.Instalar dependencias de Laravel:
    composer install
4.Copiar el archivo .env.example y renombrarlo a .env
5.Generar la clave de la aplicación:
    php artisan key:generate
6.Configurar los datos de conexión a la base de datos en el archivo .env
7.Ejecutar las migraciones para crear las tablas:
    php artisan migrate
8.Iniciar el servidor de desarrollo de Laravel:
    php artisan serve
   
Frontend
1.Ingresar a la carpeta frontend:
    cd frontend
2.Instalar dependencias:
    npm install
3.Iniciar el servidor de desarrollo de React:
    npm run dev
Una vez levantado el backend en http://localhost:8000 y el frontend en http://localhost:5173, ya se puede utilizar la aplicación.
