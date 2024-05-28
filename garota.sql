-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2023 a las 20:50:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `garota`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `cantidad`, `id_producto`, `id_cliente`) VALUES
(1, 2, 5, 36),
(2, 1, 7, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagen`, `estado`) VALUES
(5, 'Bikini', 'assets/img/categorias20231205183030.jpg', 1),
(6, 'Trikini', 'assets/img/categorias20231205183108.jpg', 1),
(7, 'Enteros', 'assets/img/categorias20231205183115.jpg', 1),
(8, 'Tiro Alto', 'assets/img/categorias20231205183136.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL DEFAULT 'default.png',
  `token` varchar(100) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `correo`, `clave`, `perfil`, `token`, `verify`) VALUES
(31, 'pache', 'AH', 'prueba@aasda', '$2y$10$uSS5kgQ.KfN/jaPM4vF.dOuKgzxmtM07V5T3/4.kQSh52Tn8NpGi6', 'default.png', '6847b0b69de74c82436b2f82d5b66500', 1),
(33, 'lewis', 'hernandez', 'lewisht2018@gmail.com', '$2y$10$B.9HXDoL14E0SoYMj3.Ocu1d8djW7yx5IK7L9LIulUvgGkLSbxeVm', 'default.png', '94038f7d0001add1528c62796b2d7ac8', 1),
(34, 'Luis', 'gdfg', 'ada@asfsaf.ocm', '$2y$10$lBJUSQZeF.0oNFWs6PMvTeFro2NZ2g.BcsQT4.fc16mmdbhtg4UWq', 'default.png', 'd2f50da11c8bfa17aacd740b166a2e40', 0),
(36, 'juan', 'david', 'juanjd4321@gmail.com', '$2y$10$XXYh6jyTV2gtCni.IbyNpuwwvt/g3mCs2gYKbDffD2QLojHi9ew2K', 'default.png', '', 1),
(37, 'uua', 'xd', 'xd@gmail.com', '$2y$10$2VgpKdcRXc4N7cfcfBsJpe/DPHH5QYxPV6aZbV7YxRFWQQ4IlTl8y', 'default.png', '852175a80d27cd9c1ac9ffe6d9624f66', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `producto`, `precio`, `cantidad`, `id_pedido`, `id_producto`) VALUES
(14, 'Bikini azul', 12.00, 1, 9, 7),
(15, 'Bikini sexy', 15.00, 1, 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(80) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `email` varchar(80) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `proceso` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_transaccion`, `monto`, `estado`, `fecha`, `email`, `nombre`, `apellido`, `direccion`, `ciudad`, `id_cliente`, `proceso`) VALUES
(9, '90U27919RB594253F', 12.00, 'COMPLETED', '2023-11-23 05:53:25', 'sb-4k243p27785671@personal.example.com', 'luifer', 'marron', 'Free Trade Zone', 'Bogota', 36, '1'),
(10, '8R934802YH185852D', 15.00, 'COMPLETED', '2023-11-23 06:28:31', 'sb-4k243p27785671@personal.example.com', 'luifer', 'marron', 'Free Trade Zone', 'Bogota', 36, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` longtext NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `estado`, `id_categoria`) VALUES
(11, 'Bikini geometric color', 'Este bikini de corte clásico es ideal para quienes buscan un estilo atemporal con un toque moderno, Los diseños geométricos agregan un toque contemporáneo y ordenado, mientras que la combinación de azul y blanco evoca una sensación de frescura y elegancia. ', 50.00, 1, 'assets/img/productos/20231205183327.jpg', 1, 5),
(12, 'Bikini rainbow', 'Este bikini de corte clásico resalta la diversidad de tonalidades, brindando un toque fresco y alegre. Perfecto para quienes desean expresar su amor por la vida y la diversidad mientras disfrutan del sol y la playa.', 41.00, 1, 'assets/img/productos/20231205183400.jpg', 1, 5),
(13, 'Trikini animal print', 'Explora tu lado más salvaje con este enterizo lila adornado con un estampado animal, Este traje es la combinación perfecta entre la elegancia femenina y la fuerza animal, creando un look único y llamativo.', 41.00, 1, 'assets/img/productos/20231205192617.jpg', 1, 6),
(14, 'Trikini dye ring', 'Dale vida a tu look playero con este enterizo blanco salpicado de manchas de colores que evocan la alegría de una paleta de pintura, perfecto para quienes desean destacar con una estética única y moderna en la playa o la piscina.', 31.00, 1, 'assets/img/productos/20231205192643.jpg', 1, 6),
(15, 'Trikini flora vanguard', 'Cada flor es una pincelada de color que ilumina la prenda, creando una fusión armoniosa entre lo exuberante y lo sutil. Este enterizo no solo te envuelve en belleza, sino que también te ofrece comodidad y estilo para disfrutar de los días soleados con gracia y frescura.', 30.00, 1, 'assets/img/productos/20231205192712.jpg', 1, 6),
(16, 'Trikini fluid wave', 'Sumérgete en un sueño de verano con este enterizo adornado con olas de colores que pintan un cuadro de alegría y vitalidad,  Este traje es una explosión de frescura y diversión, perfecto para aquellos que buscan destacar con un toque vibrante y alegre.', 35.00, 1, 'assets/img/productos/20231205192736.jpg', 1, 6),
(17, 'Trikini lineal color', 'Añade un toque de energía y movimiento a tu atuendo playero con este enterizo adornado con líneas de colores, Deja que las líneas de colores dibujen un panorama de diversión y estilo mientras disfrutas del sol y las olas.', 44.00, 1, 'assets/img/productos/20231205193128.jpg', 1, 6),
(18, 'Trikini pink wave', 'Sumérgete en un océano de alegría con este enterizo rosado, donde las olas psicodélicas añaden un toque de encanto y diversión ideal para quienes buscan destacar con un toque de originalidad y diversión en la playa. ¡Deja que las olas psicodélicas te lleven a un viaje de color y felicidad!.', 39.00, 1, 'assets/img/productos/20231205193313.jpg', 1, 6),
(19, 'Trikini ring multicolor', 'Desata tu energía y vive la diversidad con este enterizo multicolor, Cada tono brillante y audaz se entrelaza en un juego de colores, creando una explosión visual que refleja tu espíritu alegre, perfecta para aquellos que buscan irradiar felicidad y originalidad en la playa o la piscina. ', 33.00, 1, 'assets/img/productos/20231205193349.jpg', 1, 6),
(20, 'Trikini striped blue', 'Sumérgete en la frescura del océano con este enterizo blanco adornado con líneas azules y negras, evocando el encanto atemporal del estilo náutico. Las líneas dinámicas y contrastantes añaden un toque moderno a la pureza del blanco, creando una estética elegante y fresca, para quienes buscan la combinación perfecta entre simplicidad y sofisticación.', 46.00, 1, 'assets/img/productos/20231205193419.jpg', 1, 6),
(21, 'Trikini wave cut', 'Haz una declaración audaz en la playa con este enterizo de olas psicodélicas que captura la esencia del surf en un mundo de fantasía. Los patrones ondulados y colores vibrantes dan vida a un océano de creatividad, fusionando la energía del surf con la magia psicodélica.', 47.00, 1, 'assets/img/productos/20231205193503.jpg', 1, 6),
(22, 'Enterizo abstrasct', 'Sumérgete en el arte con este enterizo abstracto que desafía las convenciones, Perfecto para quienes buscan destacar en la playa con un estilo único y abstracto que celebra la individualidad y la originalidad.', 50.00, 1, 'assets/img/productos/20231205193745.jpg', 1, 7),
(23, 'Enterizo alpha blue', 'Sumérgete en el futuro de la moda playera con este enterizo azul de patrones futuristas. Inspirado en la fusión entre lo cósmico y lo marino, este traje te envuelve en un estilo único, para aquellos que buscan brillar bajo el sol con un estilo cósmico y chic.', 41.00, 1, 'assets/img/productos/20231205193812.jpg', 1, 7),
(24, 'Enterizo black backless', 'Perfecto para las noches en la playa, este enterizo negro fusiona la simplicidad con la sofisticación, garantizando que te destaques con un encanto eternamente elegante.', 61.00, 1, 'assets/img/productos/20231205193842.jpg', 1, 7),
(25, 'Enterizo blue high leg', 'Explora la fusión de moda y funcionalidad con este enterizo azul que presenta un cierre frontal, Este traje es perfecto para quienes buscan comodidad sin sacrificar el estilo en la playa o la piscina.', 37.00, 1, 'assets/img/productos/20231205193909.jpg', 1, 7),
(26, 'Enterizo floral blue', 'Sumérgete en la serenidad del océano con este encantador enterizo azul adornado con delicadas flores blancas, Ya sea tomando el sol en la playa o dando un paseo junto al mar, este enterizo te envuelve en un aura de belleza atemporal y serena.', 30.00, 1, 'assets/img/productos/20231205194214.jpg', 1, 7),
(27, 'Enterizo marble twist front', 'Deslúmbrate con este enterizo morado que encarna la elegancia en su máxima expresión,Ya sea en la piscina o en la playa, este enterizo morado te destacará con su estilo único y atemporal.', 36.00, 1, 'assets/img/productos/20231205194248.jpg', 1, 7),
(28, 'Enterizo rib belted', 'Abraza la calidez de la tierra con este sofisticado enterizo realzado con un cinturón que acentúa tu cintura con estilo, Este traje es la elección perfecta para quienes buscan combinar comodidad con elegancia, creando un look sutilmente chic que destaca tu belleza natural con un toque de detalle.', 25.00, 1, 'assets/img/productos/20231205194312.jpg', 1, 7),
(29, 'Enterizo solid coffee', 'Disfruta de la elegancia atemporal con este enterizo café, Perfecto para ocasiones en las que buscas un look distinguido y a la moda, este enterizo café combina la simplicidad con la sofisticación para asegurar que te destaques con estilo en cualquier entorno.', 29.00, 1, 'assets/img/productos/20231205194343.jpg', 1, 7),
(30, 'Tiro alto bandeau', 'Celebra la diversidad cromática con este bikini de tiro alto que presenta una vibrante explosión de colores, este bikini tiro alto de colores es una elección audaz y alegre para disfrutar del sol con elegancia y vitalidad.', 65.00, 1, 'assets/img/productos/20231205200341.jpg', 1, 8),
(31, 'Tiro alto drawstring', 'Este bikini es la elección ideal para aquellas que desean destacar con una paleta de colores refrescante y femenina, perfecta para disfrutar de días soleados con estilo y encanto.', 66.00, 1, 'assets/img/productos/20231205200408.jpg', 1, 8),
(32, 'Tiro alto floral blue', 'Sumérgete en la feminidad y frescura con este encantador bikini de tiro alto, donde el azul del mar se encuentra con flores rosas, Este bikini es la elección perfecta para resaltar tu estilo con una mezcla armoniosa de tonos y motivos florales, creando un look distintivo y elegante en la playa o la piscina. ', 63.00, 1, 'assets/img/productos/20231205200437.jpg', 1, 8),
(33, 'Tiro alto green texture', 'Deslúmbrate con este bikini de tiro alto en un vibrante tono verde, realzado por una cautivadora textura que evoca la frescura de la naturaleza.', 63.00, 1, 'assets/img/productos/20231205201701.jpg', 1, 8),
(34, 'Tiro alto lineal', 'Este bikini es la elección perfecta para quienes buscan un look juguetón y colorido en la playa o la piscina. Deja que las líneas de colores te envuelvan en un arco iris de estilo mientras disfrutas del sol y las olas con este vibrante bikini tiro alto.', 65.00, 1, 'assets/img/productos/20231205204134.jpg', 1, 8),
(35, 'Tiro alto pink floral', 'Eleva tu estilo en la playa con este encantador bikini de tiro alto en tono rosado, adornado con detalles que añaden un toque de elegancia, Perfecto para aquellas que buscan un bikini que combine feminidad con detalles chic.', 63.00, 1, 'assets/img/productos/20231205204435.jpg', 1, 8),
(36, 'Tiro alto tropical blue', 'Este bikini de estilo tropical azul con tiro alto es la elección perfecta para quienes buscan una fusión de moda, frescura y un toque tropical en su look veraniego.', 68.00, 1, 'assets/img/productos/20231205204458.jpg', 1, 8),
(37, 'Tiro alto two tone halter', 'Este bikini no solo es una expresión de estilo, sino también un símbolo de equilibrio entre lo fresco y lo refinado. Ideal para quienes desean destacar con una moda playera que fusiona la naturaleza y la elegancia con un toque de textura cautivadora.', 70.00, 1, 'assets/img/productos/20231205204531.jpg', 1, 8),
(38, 'Tiro alto waist tie', 'Embárcate en un viaje visual con este bikini de tiro alto, donde los patrones psicodélicos crean una explosión de colores y formas, este bikini psicodélico es la elección ideal para un verano lleno de diversión y originalidad.', 65.00, 1, 'assets/img/productos/20231205204558.jpg', 1, 8),
(39, 'Tiro alto zebra stripe', 'Deja que la combinación única de colores y patrones zebrados multicolores lleve tu estilo al siguiente nivel.', 69.00, 1, 'assets/img/productos/20231205204622.jpg', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `clave`, `perfil`, `estado`) VALUES
(12, 'lewis', 'zepetto', 'lewisht2018@gmail.com', '$2y$10$bijcB3LPbb1OFLrMWXU.COKyQAvWMmyI/2adRaqnPph31LCRMnoO6', NULL, 1),
(13, 'darlys', 'passo', 'lewisht201@gmail.com', '$2y$10$/3V7yIDLvCFTC/OCA2XOouvQmwgKmPmFkbdxVTJHslu5GPg8DzUya', NULL, 0),
(14, 'lewis jose', 'alcantarillado', 'lewit20a18@gmail.com', '$2y$10$vp/PXJ4wcsNszQs6PQCeQ.kL49B4G9cGAvEOVS6wr8MzUgYx7pm/G', NULL, 1),
(15, 'nuevo', 'nuevo modif', 'lewi20a18@gmail.com', '$2y$10$mkFBpOJTzuH0VpLx/A02VOEPBkGQNYaacjeSPtiTS9xW0xh3AoPha', NULL, 1),
(16, 'Juan', 'Pacheco', 'juanjd4321@gmail.com', '$2y$10$W.qA7AGtb76QiyNC6GQExesV.9teQOkC9gOxvXpCrxo0wvESVNsJW', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
