DROP DATABASE IF EXISTS domyx;
CREATE DATABASE IF NOT EXISTS domyx;
USE domyx; 

CREATE TABLE `rol` (
`idrol` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nomrol` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuario`(
`idusu` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nomusu` VARCHAR(100) NOT NULL,
`conusu` VARCHAR(255) NOT NULL,
`mailusu` VARCHAR(100) NOT NULL UNIQUE,
`imgusu` VARCHAR(400) NOT NULL,
`telusu` BIGINT(10) NOT NULL UNIQUE,
`tipdoc` BIGINT(11) NOT NULL,
`docusu` BIGINT(11) NOT NULL UNIQUE,
`estusu` BIGINT(11) DEFAULT 1,
`fsolusu` datetime DEFAULT NULL,
`clvusu` VARCHAR(250) DEFAULT NULL,
`ecmusu` TINYINT(1) DEFAULT 0,
`idrol` BIGINT(11)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `direccion`(
`iddir` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`dirusu` VARCHAR(100) NOT NULL,
`idusu` BIGINT(11) NOT NULL,
`idubi` BIGINT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `perfil` (
`idpef` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nompef` VARCHAR(50) NOT NULL UNIQUE,
`pgprin` BIGINT(11) DEFAULT NULL,
`idmod` BIGINT(11)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rolxpef`(
`idrol` BIGINT(11) NOT NULL,
`idpef` BIGINT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `resena`(
`idres` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`idusu` BIGINT(11) NOT NULL,
`comres` TEXT DEFAULT NULL,
`calres` INT(1) NOT NULL,
`idprd` BIGINT(11) NOT NULL,
`fecres` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 

CREATE TABLE `dominio`(
`iddom` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nomdom` VARCHAR(100) NOT NULL UNIQUE,
`estdom` BIGINT(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pedido`(
`idped` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`idcli` BIGINT(11) NOT NULL,
`idrep` BIGINT(11) DEFAULT NULL,
`fecped` DATE,
`estped` BIGINT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `valor`(
`idval` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nomval` VARCHAR(100) NOT NULL UNIQUE,
`iddom` BIGINT(11) NOT NULL,
`estval` BIGINT(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pagina`(
`idpag` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nompag` VARCHAR(100) NOT NULL UNIQUE,
`titpag` VARCHAR(150) NOT NULL DEFAULT '',
`arcpag` VARCHAR(100) NOT NULL,
`mospag` INT(3) DEFAULT NULL,
`ordpag` INT(3) DEFAULT NULL,
`idmod` BIGINT(11) NOT NULL,
`icopag` VARCHAR(255) DEFAULT NULL,
`despag` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `ayuda`(
`idayu` BIGINT(11) AUTO_INCREMENT PRIMARY KEY,
`idpag` BIGINT(11) NOT NULL,
`titulo` VARCHAR(150) NOT NULL,
`descripcion` TEXT,
`video` VARCHAR(255),
`manual` VARCHAR(255),
`estado` TINYINT DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `modulo`(
`idmod` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nommod` VARCHAR(100) NOT NULL UNIQUE,
`desmod` VARCHAR(255) DEFAULT NULL,
`icomod` VARCHAR(200) DEFAULT NULL,
`actmod` BIGINT(11) DEFAULT 1,
`ordmod` INT(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pagxpef`(
`idpag` BIGINT(11) NOT NULL,
`idpef` BIGINT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `ubicacion`(
`idubi` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nomubi` VARCHAR(50) NOT NULL UNIQUE,
`depubi` BIGINT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `producto`(
`idprd` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`canprd` INT(3) DEFAULT NULL,
`imgprd` VARCHAR(400) NOT NULL,
`nomprd` VARCHAR(50) NOT NULL,
`vlrprd` BIGINT(11) NOT NULL,
`desprd` TEXT DEFAULT NULL,
`estprd` BIGINT(11) DEFAULT 1,
`idcom` BIGINT(11) NOT NULL,
`idcat` BIGINT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categoria`(
`idcat` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`nomcat` VARCHAR(50) NOT NULL UNIQUE,
`estcat` BIGINT(11) DEFAULT 1,
`icocat`VARCHAR(200) DEFAULT NULL, 
`depcat` BIGINT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `detpedido` (
`iddetp` BIGINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
`idped` BIGINT(11) NOT NULL,
`idprd` BIGINT(11) NOT NULL,
`candtp` INT(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `configuracion` (
  `nocnf` BIGINT(20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nomcnf` VARCHAR(255) NOT NULL,
  `telcnf` VARCHAR(255) NOT NULL,
  `logocnf` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Relaciones para la tabla `valor`
--
ALTER TABLE `valor`
    ADD KEY `fkvaldom` (`iddom`),
    ADD CONSTRAINT `fkvaldom` FOREIGN KEY (`iddom`) REFERENCES `dominio` (`iddom`);

--
-- Relaciones para la tabla `modulo`
--
ALTER TABLE `modulo`
    ADD KEY `fkmodact` (`actmod`),
    ADD CONSTRAINT `fkmodact` FOREIGN KEY (`actmod`) REFERENCES `valor` (`idval`);


--
-- Relaciones para la tabla `pagina`
--
ALTER TABLE `pagina`
    ADD KEY `fkpagmod` (`idmod`),
    ADD CONSTRAINT `fkpagmod` FOREIGN KEY (`idmod`) REFERENCES `modulo` (`idmod`);


--
-- Relaciones para la tabla `ayuda`
--
ALTER TABLE `ayuda`
    ADD KEY `fkayupag` (`idpag`),
    ADD CONSTRAINT `fkayupag` FOREIGN KEY (`idpag`) REFERENCES `pagina` (`idpag`);




--
-- Relaciones para la tabla `perfil`
--
ALTER TABLE `perfil`
    ADD KEY `fkpermod` (`idmod`),
    ADD CONSTRAINT `fkpermod` FOREIGN KEY (`idmod`) REFERENCES `modulo` (`idmod`);

--
-- Relaciones para la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD KEY `fkusudoc` (`tipdoc`),
    ADD KEY `fkusuest` (`estusu`),
    ADD CONSTRAINT `fkusudoc` FOREIGN KEY (`tipdoc`) REFERENCES `valor` (`idval`),
    ADD CONSTRAINT `fkusuest` FOREIGN KEY (`estusu`) REFERENCES `valor` (`idval`);

ALTER TABLE `usuario` ADD KEY `fkrolxus` (`idrol`);
ALTER TABLE `usuario` ADD CONSTRAINT `fkrolxus` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);

--
-- Relaciones para la tabla `resena`
--
ALTER TABLE `resena`
    ADD KEY `fkresusu` (`idusu`),
    ADD KEY `fkresprd` (`idprd`),
    ADD CONSTRAINT `fkresusu` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`),
    ADD CONSTRAINT `fkresprd` FOREIGN KEY (`idprd`) REFERENCES `producto` (`idprd`);

--
-- Relaciones para la tabla `direccion`
--
ALTER TABLE `direccion`
    ADD KEY `fkdirusu` (`idusu`),
    ADD KEY `fkdirubi` (`idubi`),
    ADD CONSTRAINT `fkdirusu` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`),
    ADD CONSTRAINT `fkdirubi` FOREIGN KEY (`idubi`) REFERENCES `ubicacion` (`idubi`);
--
-- Relaciones para la tabla `rolxpef`
--
ALTER TABLE `rolxpef`
    ADD KEY `fkrolxpef` (`idrol`),
    ADD KEY `fkuxppef` (`idpef`),
    ADD CONSTRAINT `fkuxpusu` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`),
    ADD CONSTRAINT `fkuxppef` FOREIGN KEY (`idpef`) REFERENCES `perfil` (`idpef`);

--
-- Relaciones para la tabla `pedido`
--
ALTER TABLE `pedido`
    ADD KEY `fkpedcli` (`idcli`),
    ADD KEY `fkpedrep` (`idrep`),
    ADD CONSTRAINT `fkpedcli` FOREIGN KEY (`idcli`) REFERENCES `usuario` (`idusu`),
    ADD CONSTRAINT `fkpedrep` FOREIGN KEY (`idrep`) REFERENCES `usuario` (`idusu`);


--
-- Relaciones para la tabla `pagxpef`
--
ALTER TABLE `pagxpef`
    ADD KEY `fkpxppag` (`idpag`),
    ADD KEY `fkpxppef` (`idpef`),
    ADD CONSTRAINT `fkpxppag` FOREIGN KEY (`idpag`) REFERENCES `pagina` (`idpag`),
    ADD CONSTRAINT `fkpxppef` FOREIGN KEY (`idpef`) REFERENCES `perfil` (`idpef`);

--
-- Relaciones para la tabla `producto`
--
ALTER TABLE `producto`
    ADD KEY `fkprdcom` (`idcom`),
    ADD KEY `fkprdcat` (`idcat`),
    ADD KEY `fkprdest` (`estprd`),
    ADD CONSTRAINT `fkprdcom` FOREIGN KEY (`idcom`) REFERENCES `usuario` (`idusu`),
    ADD CONSTRAINT `fkprdcat` FOREIGN KEY (`idcat`) REFERENCES `categoria` (`idcat`),
    ADD CONSTRAINT `fkprdest` FOREIGN KEY (`estprd`) REFERENCES `valor` (`idval`);

--
-- Relaciones para la tabla `detpedido`
--
ALTER TABLE `detpedido`
    ADD KEY `fkdtpped` (`idped`),
    ADD KEY `fkdtpprd` (`idprd`),
    ADD CONSTRAINT `fkdtpped` FOREIGN KEY (`idped`) REFERENCES `pedido` (`idped`),
    ADD CONSTRAINT `fkdtpprd` FOREIGN KEY (`idprd`) REFERENCES `producto` (`idprd`);

--
-- Relaciones para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
    ADD KEY `fkdepubi` (`depubi`);

--
-- Relaciones para la tabla `categoria`
--
ALTER TABLE `categoria`
    ADD KEY `fkdepcat` (`depcat`),
    ADD KEY `fkcatest` (`estcat`),
    ADD CONSTRAINT `fkcatest` FOREIGN KEY (`estcat`) REFERENCES `valor` (`idval`);


-- 1. tabla: Rol para pobrar roles 
INSERT INTO rol (idrol, nomrol) VALUES
(1,' Administrador'),
(2,'Cliente'),
(3,'Domiciliario'),
(4,'Comercio');


-- 1. Tabla: dominio (No tiene dependencias)
INSERT INTO `dominio` (`iddom`, `nomdom`) VALUES
(1, 'Tipo de Documento'),
(2, 'Estado'),
(3, 'Rol');

-- 2. Tabla: valor (Depende de dominio)
INSERT INTO `valor` (`idval`, `nomval`, `iddom`, `estval`) VALUES
(1, 'C. C.', 1, 1),
(2, 'Pasaporte', 1, 1),
(3, 'T.I.', 1, 1),
(4, 'Cedula Extranjeria', 1, 1),
(5, 'NIT', 1, 1),
(11, 'Activo', 2, 1),
(12, 'Inactivo', 2, 1),
-- AGREGADO por Santiago (Módulo Pedidos): estados del pedido
(13, 'Pendiente', 2, 1),
(14, 'En preparación', 2, 1),
(15, 'En camino', 2, 1),
(16, 'Entregado', 2, 1),
(17, 'Cancelado', 2, 1);

-- 3. Tabla: usuario (Depende de valor para tipdoc y estusu)
INSERT INTO `usuario` (`idusu`, `nomusu`, `conusu`, `mailusu`, `imgusu`, `telusu`, `tipdoc`, `docusu`, `estusu`, `fsolusu`, `clvusu`, `ecmusu`, `idrol`) VALUES
(1, 'Carlos Mendoza', 'cf63bdaa4f05b70fd3fc247c7650b749d059bc4c', 'carlos@gmail.com', 'https://cdn.crafteai.com/images/crafteai-web/examples/effects-filters/cartoon-3d/cartoon-3d_2-2.png', 3101234567, 1, 101420745, 11, '2026-06-15 10:00:00', NULL, 0, 1),
(2, 'Ana Martínez', 'cf63bdaa4f05b70fd3fc247c7650b749d059bc4c', 'ana@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4XeOyeegwwOttNzXClJwsAaBnypwbeAexP5OVkT1HQUP4iOdV42F_74o&s=10', 3159876544, 1, 10204048966, 11, '2026-06-15 11:30:00', NULL, 1, 2),
(3, 'Empanadas la cima', 'cf63bdaa4f05b70fd3fc247c7650b749d059bc4c', 'empanada@gmail.com', 'https://img.magnific.com/vector-premium/vector-alimentos_961307-46763.jpg?semt=ais_hybrid&w=740&q=80', 3159876534, 5, 1020407532, 11, '2026-06-15 11:30:00', NULL, 1, 4),
(4, 'TecnoSport', 'cf63bdaa4f05b70fd3fc247c7650b749d059bc4c', 'tecnosport@gmail.com', 'https://img.magnific.com/vector-gratis/cartel-linea-tecnologia-inteligente_1284-34719.jpg?semt=ais_hybrid&w=740&q=80', 3159876789, 5, 1027896325, 11, '2026-06-15 11:30:00', NULL, 1, 4);

-- 4. Tabla: ubicacion (Autoreferenciada, el primer registro apunta a sí mismo o usa 0 provisionalmente)
-- 1. Registro principal del municipio de Chía
INSERT INTO `ubicacion` (`idubi`, `nomubi`, `depubi`) VALUES
(1, 'Chía (Principal)', 0),
(2, 'Vereda Bojacá', 1),
(3, 'Vereda Fonquetá', 1),
(4, 'Vereda Fagua', 1),
(5, 'Vereda Tíquiza', 1),
(6, 'Vereda Cerca de Piedra', 1),
(7, 'Vereda Yerbabuena', 1),
(8, 'Vereda Samaria', 1),
(9, 'Vereda La Balsa', 1),
(10, 'Barrio Centro', 1),
(11, 'Barrio El Rosario', 1),
(12, 'Barrio Delicias', 1),
(13, 'Barrio Mercedes Calahorra', 1),
(14, 'Barrio Santa Lucía', 1);

-- 5. Tabla: direccion (Depende de usuario y ubicacion)
INSERT INTO `direccion` (`iddir`, `dirusu`, `idusu`, `idubi`) VALUES
(1, 'Calle 45 # 12-34', 1, 1),
(2, 'Carrera 80 # 45-10', 2, 2);

-- 6. Tabla: modulo (No tiene dependencias)
INSERT INTO `modulo` (`idmod`, `nommod`, `desmod`, `icomod`, `actmod`, `ordmod`) VALUES
(1, 'Modulo Externo', 'Módulo general de acceso externo al sistema', 'fa-solid fa-globe', 1, 1),
(2, 'Modulo de Usuarios', 'Módulo para la administración y gestión de usuarios del sistema', 'fa-solid fa-users', 1, 2),
(3, 'Modulo de Comercios', 'Módulo para la gestión y administración de comercios registrados', 'fa-solid fa-store', 1, 3),
(4, 'Modulo de Productos', 'Módulo para la gestión y control de productos disponibles', 'fa-solid fa-box-open', 1, 4),
(5, 'Modulo de Pedidos', 'Módulo para la gestión, seguimiento y control de pedidos realizados', 'fa-solid fa-cart-shopping', 1, 5),
(6, 'Modulo de Reseñas', 'Módulo para la administración y consulta de reseñas de usuarios', 'fa-solid fa-star', 1, 6),
(99, 'Módulo Configuración', 'Módulo para la configuración general del sistema', 'fa-solid fa-gears', 1, 7);
-- 7. Tabla: perfil (No tiene dependencias externas obligatorias)
INSERT INTO `perfil` (`idpef`, `nompef`, `pgprin`, `idmod`) VALUES
(1, 'Acceso Configuración', 1, 99),
(2, 'Acceso Módulo Externo', 1, 1),
(3, 'Acceso Usuarios', 2, 2),
(4, 'Acceso Comercios', 3, 3),
(5, 'Acceso Productos', 4, 4),
(6, 'Acceso Pedidos', 5, 5),
(7, 'Acceso Reseñas', 6, 6);


-- 9. Tabla: pedido (Depende de usuario)
INSERT INTO `pedido` (`idped`, `idcli`, `idrep`, `estped`, `fecped`) VALUES
(1, 2, 1, 1, '2026-06-12'),
(2, 1, NULL, 2, '2025-12-01'),
-- AGREGADO por Santiago (Módulo Pedidos): datos de prueba
(15, 2, 3, 17, '2024-11-12'),
(16, 1, 3, 16, '2025-10-11'),
(17, 2, 3, 13, '2026-06-12');



-- 10. tabla: rolxpef
INSERT INTO rolxpef (idrol, idpef) VALUES

-- Administrador
(1,1),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),

-- Cliente
(2,5),
(2,6),
(2,7),

-- Domiciliario
(3,6),

-- Comercio
(4,4),
(4,5),
(4,6),
(4,7);


-- 11. Tabla: pagina (tiene relacion con modulos)
INSERT INTO `pagina` (`idpag`, `idmod`, `nompag`, `titpag`, `arcpag`, `mospag`, `ordpag`, `icopag`, `despag`) VALUES

(1,1,'Home','Home','views/vhome.php',1,1,'fa-solid fa-house','Página principal del sistema'),
(2,1,'Inicio Sesión','Inicio Sesión','views/vlogin.php',1,2,'fa-solid fa-right-to-bracket','Ingreso al sistema'),
(3,1,'Registro','Registro','views/vregister.php',1,3,'fa-solid fa-user-plus','Registro de nuevos usuarios'),
(4,1,'Olvidó Contraseña','Olvidó Contraseña','views/vforgot.php',1,4,'fa-solid fa-key','Recuperación de contraseña'),

(5,99,'Dominio','Dominio','views/vdomain.php',1,5,'fa-solid fa-layer-group','Administración de dominios'),
(6,99,'Valor','Valor','views/vvalue.php',1,6,'fa-solid fa-list-check','Administración de valores'),
(7,99,'Módulos','Módulos','views/vmod.php',1,7,'fa-solid fa-cubes','Administración de módulos'),
(8,99,'Páginas','Páginas','views/vpage.php',1,8,'fa-solid fa-file-lines','Administración de páginas'),
(9,99,'Ubicación','Ubicación','views/vubica.php',1,9,'fa-solid fa-location-dot','Administración de ubicaciones'),
(10,99,'Perfil','Perfil','views/vgperfil.php',1,10,'fa-solid fa-user-shield','Administración de perfiles'),
(29,99,'Ayuda','Ayuda','views/vayuda.php',1,29,'fa-solid fa-circle-question','Centro de ayuda del sistema'),

(11,2,'Gestionar Usuarios','Gestionar Usuarios','views/vgus.php',1,11,'fa-solid fa-users','Administración de usuarios'),
(12,2,'Dirección Usuarios','Dirección Usuarios','views/vdirus.php',1,12,'fa-solid fa-address-book','Gestión de direcciones de usuarios'),
(13,2,'Reporte Usuarios','Reporte Usuarios','views/vrepus.php',1,13,'fa-solid fa-chart-column','Reportes de usuarios'),
(14,2,'Actualizar Datos','Actualizar Datos','views/vusupd.php',1,14,'fa-solid fa-user-pen','Actualización de información personal'),

(15,3,'Gestionar Comercios','Gestionar Comercios','views/vgcomm.php',1,15,'fa-solid fa-store','Administración de comercios'),

(16,4,'Gestionar Productos','Gestionar Productos','views/vgprd.php',1,16,'fa-solid fa-box-open','Administración de productos'),
(17,4,'Lista Productos','Lista Productos','views/vprdlist.php',1,17,'fa-solid fa-boxes-stacked','Listado de productos'),
(18,4,'Gestionar Categorías','Gestionar Categorías','views/vgcat.php',1,18,'fa-solid fa-tags','Administración de categorías'),

(19,5,'Gestionar Pedidos','Gestionar Pedidos','views/vgped.php',1,19,'fa-solid fa-cart-shopping','Administración de pedidos'),
(20,5,'Lista Pedidos','Lista Pedidos','views/vpedlist.php',1,20,'fa-solid fa-clipboard-list','Listado de pedidos'),
(21,5,'Detalle Pedido','Detalle Pedido','views/vdetped.php',1,21,'fa-solid fa-receipt','Detalle del pedido'),
(22,5,'Estados Pedido','Estados Pedido','views/vgestp.php',1,22,'fa-solid fa-bars-progress','Estados del pedido'),
(23,5,'Confirmar Entrega','Confirmar Entrega','views/vcofent.php',1,23,'fa-solid fa-truck-fast','Confirmación de entrega'),
(24,5,'Reporte Pedidos','Reporte Pedidos','views/vpedreport.php',1,24,'fa-solid fa-chart-line','Reportes de pedidos'),
(25,5,'Pago','Pago','views/vpaid.php',1,25,'fa-solid fa-credit-card','Gestión de pagos'),

(26,6,'Gestionar Reseñas','Gestionar Reseñas','views/vgres.php',1,26,'fa-solid fa-star','Administración de reseñas'),
(27,6,'Lista Reseñas','Lista Reseñas','views/vreslist.php',1,27,'fa-solid fa-comments','Listado de reseñas'),
(28,6,'Reporte Reseñas','Reporte Reseñas','views/vresrep.php',1,28,'fa-solid fa-chart-pie','Reportes de reseñas');

-- 13. Tabla: pagxpef (Relación perfiles con páginas)

-- Perfil Configuración (idpef = 1)
INSERT INTO pagxpef(idpag,idpef)
SELECT idpag,1
FROM pagina
WHERE idmod = 99;


-- Perfil Módulo Externo (idpef = 2)
INSERT INTO pagxpef(idpag,idpef)
SELECT idpag,2
FROM pagina
WHERE idmod = 1;


-- Perfil Usuarios (idpef = 3)
INSERT INTO pagxpef(idpag,idpef)
SELECT idpag,3
FROM pagina
WHERE idmod = 2;


-- Perfil Comercios (idpef = 4)
INSERT INTO pagxpef(idpag,idpef)
SELECT idpag,4
FROM pagina
WHERE idmod = 3;


-- Perfil Productos (idpef = 5)
INSERT INTO pagxpef(idpag,idpef)
SELECT idpag,5
FROM pagina
WHERE idmod = 4;


-- Perfil Pedidos (idpef = 6)
INSERT INTO pagxpef(idpag,idpef)
SELECT idpag,6
FROM pagina
WHERE idmod = 5;


-- Perfil Reseñas (idpef = 7)
INSERT INTO pagxpef(idpag,idpef)
SELECT idpag,7
FROM pagina
WHERE idmod = 6;

-- 14. Tabla: categoria (Autoreferenciada)
INSERT INTO `categoria` (`idcat`, `nomcat`, `estcat`, `depcat`, `icocat`) VALUES
-- Categorías Principales (depcat = 0)
(1, 'Tecnología', 11, 0, 'fa-solid fa-laptop'),
(2, 'Alimentos', 11, 0, 'fa-solid fa-cheese'),
(3, 'Hogar y Muebles', 12, 0, 'fa-solid fa-house'),
(4, 'Moda y Ropa', 11, 0, 'fa-solid fa-shirt'),
(5, 'Deportes', 12, 0, 'fa-solid fa-basketball'),

-- Subcategorías (dependientes de las principales)
(6, 'Celulares y Accesorio', 11, 1, 'fa-solid fa-mobile-screen-button'),
(7, 'Lácteos y Quesos', 11, 2, 'fa-solid fa-cow'),                     
(8, 'Electrodomésticos', 12, 3, 'fa-solid fa-tv'),                      
(9, 'Calzado Deportivo', 11, 5, 'fa-solid fa-shoe-prints');             

-- 15. Tabla: producto (Depende de usuario e idcat)
INSERT INTO `producto` (`idprd`, `canprd`, `imgprd`, `nomprd`, `vlrprd`, `desprd`, `estprd`, `idcom`, `idcat`) VALUES
(1, 50, 'https://m.media-amazon.com/images/I/61syjAkUUiL._AC_UF894,1000_QL80_.jpg', 'Teléfono Inteligente', 1200000, 'Pantalla 6.5 pulgadas, 128GB', 12, 4, 1),
(2, 100, 'https://exitocol.vtexassets.com/arquivos/ids/28955929/Arroz-Integral-1244239_a.jpg?v=638864002548900000', 'Arroz Integral 1kg', 4500, 'Arroz rico en fibra', 11, 3, 2),
(3, 30, 'https://www.alkomprar.com/medias/6942103112225-001-750Wx750H?context=bWFzdGVyfGltYWdlc3wxODkzOHxpbWFnZS93ZWJwfGFHSmhMMmhqTlM4eE5ETTJOamt6TnprM01qYzJOaTgyT1RReU1UQXpNVEV5TWpJMVh6QXdNVjgzTlRCWGVEYzFNRWd8NTM2MGJiMzJlODgwZDI5NDFmYzlmOTIxODA0MTZhNjRiOTM4YTQ5ZGUzZjA1NWIxN2EyNjgxNGNkMGRkMWQ2Mg', 'Audífonos Bluetooth', 150000, 'Cancelación de ruido activa, 20h batería', 11, 4, 1),
(4, 80, 'https://exitocol.vtexassets.com/arquivos/ids/31754256/ACEITE-DE-OLIVA-VIRGEN-EXTRA-1563826_b.jpg?v=638986378794700000', 'Aceite de Oliva 500ml', 28000, 'Aceite de oliva virgen extra', 12, 3, 2),
(5, 15, '', 'Computador Portátil', 2500000, 'Procesador de última generación, 16GB RAM', 2, 4, 1),
(6, 120, 'https://cnutresa.vtexassets.com/arquivos/ids/165537/1001442-7702085012123_Pasta%20Doria%20Concha.png?v=638876005652900000', 'Pasta Spaguetti 500g', 3800, 'Pasta de sémola de trigo duro', 11, 3, 2),
(7, 45, '', 'Reloj Inteligente', 320000, 'Monitoreo de ritmo cardíaco y GPS integrado', 12, 4, 1);

-- 16. Tabla: detpedido (Depende de pedido y producto)
INSERT INTO `detpedido` (`iddetp`, `idped`, `idprd`, `candtp`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
-- AGREGADO por Santiago (Módulo Pedidos): detalles de prueba
(14, 15, 3, 888),
(15, 16, 4, 888),
(16, 17, 6, 7);

-- 17. Tabla: configuracion (No tiene dependencias)
INSERT INTO `configuracion` (`nocnf`, `nomcnf`, `telcnf`, `logocnf`) VALUES
(1, 'Domyx Colombia S.A.S.', '+57 300 000 0000', 'logo_domyx.png');