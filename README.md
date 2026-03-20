# Procedimientos

## 1. Clonar el repositorio
```
git clone https://github.com/tasaycodiego76-hue/TAREA_02-ci4.git
```

## 2. Configurar el archivo .env
```
database.default.hostname = localhost
database.default.database = senati
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

## 3. Instalar dependencias y migrar la BD
```
composer install
```
```
php spark migrate
```
```
php spark db:seed ClientesSeeder
php spark db:seed ProductosSeeder
php spark db:seed ProveedoresSeeder
```

## 4. Iniciar el servidor
```
php spark serve
```

## 5. Abrir en el navegador
```
http://localhost:8080
```

## 📁 Estructura del Proyecto
```
app/
├── Config/
│   └── Routes.php
├── Controllers/
│   ├── Cliente.php
│   ├── Producto.php
│   ├── Proveedor.php
│   └── Reporte.php
├── Database/
│   ├── Migrations/
│   │   ├── CreateTableClientes.php
│   │   ├── CreateTableProductos.php
│   │   └── CreateTableProveedores.php
│   └── Seeds/
│       ├── ClienteSeeder.php
│       ├── ProductoSeeder.php
│       └── ProveedorSeeder.php
├── Models/
│   ├── ClienteModel.php
│   ├── ProductoModel.php
│   └── ProveedorModel.php
├── Views/
│   ├── Modulos/
│   │   ├── clientes/
│   │   │   ├── index.php
│   │   │   ├── registrar.php
│   │   │   └── actualizar.php
│   │   ├── productos/
│   │   │   ├── index.php
│   │   │   ├── registrar.php
│   │   │   └── actualizar.php
│   │   └── proveedores/
│   │       ├── index.php
│   │       └── registrar.php
│   └── Partials/
│       ├── header.php
│       └── footer.php
└── .env
```

## 🔄 Comandos útiles
```
php spark migrate              → solo crea las tablas
php spark db:seed NombreSeeder → solo inserta datos
php spark migrate:rollback     → deshace las migraciones
php spark migrate:fresh --seed → resetea todo de cero + semillas
```

## 🛠️ Tecnologías
```
PHP 8+        - Lenguaje de programación
CodeIgniter 4 - Framework MVC
MySQL         - Motor de base de datos
Bootstrap 5   - Estilos y componentes UI
```