# DomyX – Sistema de Gestión de Domicilios

**DomyX** es una aplicación web desarrollada como proyecto académico durante la formación en Tecnología en Análisis y Desarrollo de Software del SENA.

Su propósito es facilitar la gestión de domicilios mediante una plataforma que conecta clientes, comercios y domiciliarios, permitiendo organizar los procesos relacionados con productos y pedidos.

## 🎯 Objetivo del proyecto

Desarrollar una solución web que facilite la administración de pedidos y la interacción entre los diferentes usuarios involucrados en un servicio de domicilios.

## 🛠️ Tecnologías utilizadas

- **PHP:** desarrollo de la lógica del servidor.
- **MySQL:** gestión de bases de datos.
- **HTML5:** estructura de las interfaces.
- **CSS3:** diseño y estilos.
- **JavaScript:** funcionalidades e interactividad.
- **Bootstrap:** diseño de interfaces adaptables.

## 🏗️ Arquitectura del proyecto

La aplicación está organizada siguiendo el patrón arquitectónico **Modelo-Vista-Controlador (MVC)**, que permite separar las responsabilidades del sistema y mantener una estructura organizada.

- **Models:** contienen la lógica relacionada con los datos.
- **Views:** gestionan la presentación y las interfaces de usuario.
- **Controllers:** coordinan las solicitudes y la comunicación entre modelos y vistas.

## 📂 Estructura del proyecto

```text
DomyX/
│
├── bd/             # Archivos de base de datos
├── controllers/    # Controladores
├── css/            # Hojas de estilo
├── image/          # Recursos gráficos
├── js/             # Archivos JavaScript
├── models/         # Modelos
├── views/          # Vistas
│
├── home.php
└── index.php       # Punto de entrada
```

## ⚙️ Instalación y ejecución

Para ejecutar el proyecto localmente:

1. Instalar [XAMPP](https://www.apachefriends.org/es/index.html).
2. Iniciar los servicios Apache y MySQL.
3. Clonar o descargar este repositorio.
4. Ubicar la carpeta del proyecto dentro del directorio `htdocs` de XAMPP.
5. Crear una base de datos en phpMyAdmin e importar el archivo SQL disponible en la carpeta `bd`.
6. Configurar los parámetros de conexión a la base de datos según el entorno local.
7. Abrir el navegador y acceder a:

```text
http://localhost/DomyX/
```

## 📚 Contexto académico

Proyecto desarrollado como parte del proceso de formación en el programa **Tecnología en Análisis y Desarrollo de Software del SENA**.

Este proyecto permitió aplicar conocimientos de programación, desarrollo web, gestión de bases de datos y organización de aplicaciones mediante el patrón MVC.

---

**Desarrollado por:** Valery Macías Díaz

**Proyecto académico – SENA**
