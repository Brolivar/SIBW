-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2018 a las 16:24:31
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sibw_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colecciones`
--

CREATE TABLE `colecciones` (
  `id` int(11) NOT NULL,
  `nombre_coleccion` text NOT NULL,
  `obra_asociada` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colecciones`
--

INSERT INTO `colecciones` (`id`, `nombre_coleccion`, `obra_asociada`) VALUES
(1, 'Prehistórica', 1),
(2, 'Prehistórica', 7),
(3, 'Preclásica', 2),
(4, 'Preclásica', 6),
(5, 'Preclásica', 8),
(6, 'Preclásica', 9),
(7, 'Romana', 3),
(8, 'Romana', 4),
(9, 'Romana', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Direccion_IP` text NOT NULL,
  `Nombre` text NOT NULL,
  `Email` text NOT NULL,
  `Comentario` text NOT NULL,
  `FechaYHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Direccion_IP`, `Nombre`, `Email`, `Comentario`, `FechaYHora`) VALUES
('<p>Dirección IP: 192.20.58.50</p>\r\n', '<p><strong>Autor: Jose</strong></p>\r\n', '<p>Email: brolivars@gmail.com</p>\r\n', '<p>Comentario: Me encanta esta obra.</p>\r\n', '2018-03-21 18:32:19'),
('<p>Dirección IP: 192.85.83.28</p>\r\n', '<p><strong>Autor: Lidia</strong></p>\r\n', '<p>Email: lidiasm96@correo.ugr.es</p>\r\n', '<p>Comentario: Qué interesante!!</p>', '2018-03-30 08:50:29'),
('<p>Dirección IP: ::1</p>', '<p><strong>Autor: Sara</strong></p>', '<p>E-mail: sara@jeje.es</p>', '<p>Comentario: a</p>', '2018-04-19 14:13:43'),
('<p>Dirección IP: ::1</p>', '<p><strong>Autor: Alex</strong></p>', '<p>E-mail: alesito@e.es</p>', '<p>Comentario: Heeeyyy</p>', '2018-04-19 14:22:39'),
('<p>Dirección IP: ::1</p>', '<p><strong>Autor: Nati</strong></p>', '<p>E-mail: nati@jeje.es</p>', '<p>Comentario: Qué obras tan bonitas!!!!!!!!</p>', '2018-04-19 22:22:04'),
('<p>Dirección IP: ::1</p>', '<p><strong>Autor: eladio</strong></p>', '<p>E-mail: a@a.es</p>', '<p>Comentario: **** aaaa ****</p>', '2018-04-23 11:34:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id` int(11) NOT NULL,
  `ruta_imagen` text NOT NULL,
  `obra_asociada` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galerias`
--

INSERT INTO `galerias` (`id`, `ruta_imagen`, `obra_asociada`) VALUES
(1, 'obra1.jpg\r\n', 1),
(2, 'obra1_2.jpg', 1),
(3, 'obra1_3.jpg', 1),
(4, 'obra1_4.jpg', 1),
(5, 'obra1_5.jpg', 1),
(6, 'obra1_6.jpg', 1),
(7, 'obra1_7.jpg', 1),
(8, 'obra1_8.png', 1),
(9, 'obra1.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infogeneral`
--

CREATE TABLE `infogeneral` (
  `Contacto` text NOT NULL,
  `Localizacion` text NOT NULL,
  `Horario` text NOT NULL,
  `Entradas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `infogeneral`
--

INSERT INTO `infogeneral` (`Contacto`, `Localizacion`, `Horario`, `Entradas`) VALUES
('<div class=\"contacto\">\r\n\r\n<p>Para cualquier tipo de duda o consulta no duden en contactarnos a través de las siguientes direcciones de correo:</p>\r\n<p><strong>lidiasm96@correo.ugr.es y brolivars@gmail.com</strong></p>\r\n<p>Intentaremos responderles en la mayor brevedad posible.</p>\r\n\r\n</div>', '<div class=\"localizacion\">\r\n\r\n<p>El museo de Arqueología Subacuática se encuentra ubicado en el Parque de las Ciencias situado en la provincia de <strong>Granada</strong>.</p>\r\n<p>La dirección concreta es la siguiente: <strong>Av. de la Ciencia, s/n, 18006 Granada.</strong></p>\r\n<div class = \"imagen_localizacion\">\r\n	<img src=\"../Imagenes/localizacion.png\" alt=\"imagen_localizacion\">\r\n</div>\r\n\r\n</div>', '<div class=\"horario\">\r\n\r\n<p>El horario de apertura se puede comprobar a continuación:</p>\r\n<p><strong>Lunes y Viernes de 9:30h a 13:30h</strong></p>\r\n<p><strong>Martes a Jueves de 9:30h a 13:30h y de 17:00h a 20:00h</strong></p>\r\n<p><strong>Sábados de 10:00h a 13:00h</strong></p>\r\n\r\n</div>', '<div class=\"entradas\">\r\n\r\n<p>El precio de las entradas varía según las siguientes condiciones que se explican:</p>\r\n<p><strong>Niños y estudiantes: 5€ de Lunes a Viernes.</strong></p>\r\n<p><strong>Adultos: 8€ de Lunes a Viernes.</strong></p>\r\n<p><strong>Mayores de 65 años: 6€ de Lunes a Viernes.</strong></p>\r\n\r\n<p><strong>Tarifas especiales</strong> para grupos a partir de 5 miembros con hasta un 10% de descuento.</p>\r\n\r\n</div>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(3) NOT NULL,
  `Opciones` varchar(30) NOT NULL,
  `URL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `Opciones`, `URL`) VALUES
(1, 'Inicio', '?portada'),
(2, 'Horario', '?horario'),
(3, 'Entradas', '?entradas'),
(4, 'Localización', '?localizacion'),
(5, 'Contacto', '?contacto'),
(6, 'Colecciones', '?colecciones'),
(7, 'Registrarse', '?login');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `ID` int(3) NOT NULL,
  `miniatura` text NOT NULL,
  `descripcion` text NOT NULL,
  `Titulo` text NOT NULL,
  `Imagen` text NOT NULL,
  `Fecha_Publicacion` text NOT NULL,
  `Fecha_Modificacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`ID`, `miniatura`, `descripcion`, `Titulo`, `Imagen`, `Fecha_Publicacion`, `Fecha_Modificacion`) VALUES
(1, '<div class=\"obras\"> \r\n<a href=\"?obra=1\">\r\n <img src=\"../Imagenes/obra1.jpg\" alt=\"Obra \r\n   1\">\r\n <div class=\"pie_foto\">Restos prehispánicos \r\n    en el Cenote San Manuel</div>\r\n</a>\r\n</div>\r\n', '<div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra1.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">Restos prehispánicos en el Cenote San Manuel. Foto del \"Proyecto Hoyo Negro\".</div>\r\n                </div>\r\n\r\n\r\n<div class = \"Descripcion\">			<!-- Descripcion (texto plano) de la obra -->\r\n\r\n                    <h2> Encuentran restos prehispánicos en el Cenote San Manuel </h2>\r\n                    <h4>Datación: más de 13 mil años de antigüedad</h4>\r\n                    <p>MÉRIDA, Yuc.- El trabajo de investigación subacuático ha permitido encontrar elementos importantes para la arqueología, confirmando en algunos casos la influencia e intercambio de conocimientos que existieron entre las antiguas culturas mayas, señaló la investigadora Helena Barba Meinecke, del departamento de arqueología subacuática del Instituto Nacional de Antropología e Historia (INAH).</p>\r\n\r\n                    <p>La especialista presentó la ponencia “Cenote San Manuel, evidencia del cerámica preclásica”, en el marco del Segundo Simposio de Cultura Maya Ichkaantijoo que organizó el Instituto Nacional de Antropología e Historia (INAH) en Yucatán.</p>\r\n\r\n                    <p>Explicó la forma del cenote, sus variedades, y comentó que en la Península existen unos siete mil cuerpos de agua, algunos de ellos con gran cantidad de cuevas inundadas. En algunos casos durante los trabajos de exploración que se han realizado se han hallado vestigios arqueológicos importantes.</p>\r\n\r\n                    <p>Como en el caso de “Hoyo negro” en Quintana Roo, donde se encontraron restos con más de 13 mil años de antigüedad. </p>\r\n\r\n                    <p>En el cenote San Manuel, ubicado en el municipio de Tizimín, Yucatán, se han detectado restos óseos y materiales prehispánicos. Por los hallazgos encontrados en este sitio se considera uno de los más importantes registrados por la Subdirección de Arqueología Subacuática del INAH. </p>\r\n\r\n                    <p> Ahí hallaron una jarra con cuerpo de calabaza, rostro en su parte frontal y asa trenzada, así como una pieza es parecida a las vertederas o “chocolareras” que los mayas utilizaban para bebidas fermentadas o guardar la miel, con algunas variaciones, estas piezas se han identificado en diferentes regiones desde Honduras, El Salvador, Edzná, Chiapa de Corzo, Kabah y Tikal, entre otros. También hallaron un cráneo y vasijas bícromas.</p>\r\n\r\n                    <p><a href=\"https://sipse.com/milenio/dan-conocer-hallazgos-arqueologicos-importantes-cenotes-yucatan-182889.html\" target=\"_blank\">Más información sobre este artículo aquí.</a></p>\r\n\r\n                </div>', 'Restos prehispánicos en el Cenote San Manuel', 'obra1.jpg', '<p>Fecha de publicación: 20/03/2018 17:15:50.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(2, '<div class=\"obras\">\r\n <a href=\"?obra=2\">\r\n  <img src=\"../Imagenes/obra2.jpg\" \r\n    alt=\"Obra 2\">\r\n  <div class=\"pie_foto\">La Ciudad de \r\n    Samabaj</div>\r\n  </a>\r\n</div>\r\n', '<!-- Imagen de la obra y su pie de foto-->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra2.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">La Ciudad de Samabaj. Foto de National Geographic.</div>\r\n                </div>\r\n\r\n                <!-- Descripcion de la obra -->\r\n                <div class = \"Descripcion\">     \r\n\r\n                    <!-- Título de la obra -->\r\n                    <h2>Samabaj, la Atlántida Maya en Atitlán </h2>\r\n                    <!-- Datación de la obra -->\r\n                    <h4>Fecha de construcción: 200 a.C.</h4>\r\n                    <!-- Información de la obra -->\r\n                    <p>Es un área arqueológica situada en el lago de Atitlán en Sololá, Guatemala.</p>\r\n\r\n                    <p>Hace unos 2.000 años aproximadamente, al sur del lago había una pequeña isla, donde estaba situado el sitio de Samabaj, una pequeña aldea maya que se sumergió misteriosamente.</p>\r\n\r\n                    <p>Hasta la fecha se manejan tres posibles teorías que causaron su desparación: una repentina inundación que pudo haber sido provocada por una tormenta, una erupción volcánica que hizo que el agua subiera o un deslave o terremoto gigantesco que pudo haber subido la marea.</p>\r\n\r\n                    <p>Sus habitantes pertenecían al período Preclásico Tardío, que abarcó desde 400 a.C. a 100 d.C. Específicamente, vivieron entre el 200 a.C. y 200 d.C. en la isla. Además desarrollaron un sistema donde ya se daban divisiones de clases sociales y diferenciación del trabajo.</p>\r\n\r\n                    <p>La ciudad estuvo conformada por 3 grupos principales:</p>\r\n\r\n                    <p> · Grupo 1: Muros bien tallados, parece haber sido un área ocupacional.</p>\r\n                    <p> · Grupo 2: Formada por 8 estructuras, de las cuales dos son paralelas, y al este de la primera estructura, se encuentra una estela bien pulida.</p>\r\n                    <p> · Grupo 3: Es la más grande, posee una escalinata, y está a las afueras del grupo habitacional.</p>\r\n\r\n                    <!-- Enlace para mayor información acerca de la obra -->\r\n                    <a href=\"http://arquehistoria.com/historiassamabaj-ciudad-sumergida-en-el-lago-de-atitl-n-503\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n                </div>		<!-- Descripcion -->\r\n', 'La Ciudad de Samabaj', 'obra2.jpg', '<p>Fecha de publicación: 22/03/2018 22:20:04.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(3, '<div class=\"obras\">        \r\n <a href=\"?obra=3\">\r\n  <img src=\"../Imagenes/obra3.jpg\" \r\n    alt=\"Obra 3\">\r\n   <div class=\"pie_foto\">Un barco bizantino \r\n    en el Mar Negro</div>\r\n </a>\r\n</div>', '<!-- Imagen de la obra -->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra3-2.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">Un barco bizantino en el Mar Negro. Foto de rostovdive.ru</div>\r\n                </div>\r\n\r\n                <div class = \"Descripcion\">			<!-- Descripcion (texto plano) de la obra -->\r\n\r\n                        <h2> Hallan un antiguo barco lleno de tesoros en el fondo del Mar Negro </h2>\r\n                        <h4>Datación: siglo IX-XI </h4>\r\n                        <p>El barco descubierto en el fondo del Mar Negro, cerca de Sebastopol, ya ha sido bautizado por varios arqueólogos como “el hallazgo del siglo”. La nave de más de 100 metros de eslora se conserva en perfectas condiciones y según se ha dicho pertenece a la época bizantina. El director del club submarino encargado de la búsqueda, Román Dunáev, cuenta cómo avanza la investigación.</p>\r\n\r\n                        <p><strong>Solamente se ha llevado a cabo la primera etapa de las investigaciones y los miembros de la expedición hablan sobre su hallazgo con mucha cautela.</strong></p>\r\n\r\n                        <p>Solamente podemos decir que se encontró una barco antiguo, bizantino. Es muy grande, diría que inusualmente grande para esta época – hasta ahora los investigadores trataban con naves de unos  20-30 metros. Por eso surgió otra hipótesis. Lo que descubrimos probablemente sea el lugar de un accidente y en el fondo hay varios barcos que chocaron. El hecho de que los escombros estén en perpendicular, el uno contra el otro, hace que nos inclinemos por esta versión.</p>\r\n\r\n                        <p><strong>Los buceadores llevaban en su busca más de un año, pero el lugar concreto de la ubicación de la nave se guarda en secreto.</strong></p>\r\n\r\n                        <p>Existe un alto riesgo de que los arqueólogos furtivos pueden saquear el barco. Por eso en estos momentos el lugar de las investigaciones está vigilado por los militares y aduaneros 24 horas al día. Solamente le puedo decir que el barco se encuentra a 80 metros de profundidad.</p>\r\n\r\n                        <p><strong>Se ha informado de que puede haber cientos de ánforas antiguas a bordo.</strong></p>\r\n\r\n                        <p><strong>¿Podría contar en qué estado se encuentra el propio barco y cuáles son los objetos detectados en su interior?</strong></p>\r\n\r\n                        <p>Para ser del siglo IX-XI está en muy buen estado. Por ejemplo, las fotografías que hemos podido tomar son tan limpias que da la impresión de que acababan de meter los objetos. No necesita trabajos serios de restauración. Si se desala y seca por un método no rápido podría completar la colección de cualquier museo arqueológico.</p>\r\n\r\n                        <p>En general, el Mar Negro tiene la capacidad única de conservar la belleza original de los objetos.</p>\r\n\r\n                        <a href=\"https://es.rbth.com/cultura/2015/06/02/hallan_antiguo_barco_lleno_de_tesoros_en_el_fondo_del_mar_negro_50031\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n\r\n                </div>		<!-- Descripcion -->\r\n', 'Un barco bizantino en el Mar Negro', 'obra3-2.jpg', '<p>Fecha de publicación: 01/04/2018 12:02:08.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(4, '<div class=\"obras\">        \r\n <a href=\"?obra=4\">\r\n  <img src=\"../Imagenes/obra4.jpg\" \r\n   alt=\"Obra 4\">\r\n  <div class=\"pie_foto\">Neápolis, una \r\n     ciudad romana sumergida</div>\r\n  </a>\r\n</div>', '<!-- Imagen de la obra y su pie de foto-->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra4.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">Neápolis, una ciudad romana sumergida. Foto de okdiario</div>\r\n                </div>\r\n\r\n                <!-- Descripcion de la obra -->\r\n                <div class = \"Descripcion\">    \r\n\r\n                    <!-- Título de la obra -->\r\n                    <h2>Neápolis</h2>\r\n                    <!-- Datación de la obra -->\r\n                    <h4>Datación: 1700 años de antigüedad</h4>\r\n                    <!-- Información de la obra -->\r\n                    <p>Una misión italotunecina ha hallado en Nabeul (Túnez) restos de la antigua ciudad romana de Néapolis que se extienden sobre 20 hectáreas bajo el mar y que confirman, según los arqueólogos, que un tsunami engulló una parte de la urbe en el siglo IV.</p>\r\n\r\n                    <p>Gracias a la investigación que ha realizado el equipo a través de prospecciones submarinas han conseguido encontrar calles, monumentos y sobre todo cerca de un centenar de cubas que servían para la producción de «garum», un condimento a base de pescado que gustaba mucho a los romanos.</p>\r\n\r\n                    <p>Además el equipo tiene ahora «la certeza de que Néapolis sufrió un seísmo» que data del 21 de julio del año 365 después de Cristo, según el relato del soldado e historiador Amiano Marcelino, y que golpeó con dureza Alejandría y Creta.</p>\r\n\r\n                    <p>Al seísmo que sufrió en el año 365 d.C. le siguió un tsunami que inundó una parte de Néapolis y las industrias de salazón tuvieron que ser reubicadas.</p>\r\n\r\n                    <p>La misión arqueológica comenzó sus trabajos en 2010 en busca del puerto de Néapolis, que fue en sus inicios un enclave cartaginés evocado por el historiador griego Tucídides antes de convertirse en una colonia del Imperio romano. Neápolis no aparece en muchos documentos porque se puso del lado de Cartago contra Roma durante la tercera guerra púnica, entre los años 149 a. C. y 146 a. C., según The Independent.</p>\r\n\r\n                    <!-- Enlace para mayor información acerca de la obra -->\r\n                    <a href=\"https://elpais.com/internacional/2017/09/06/mundo_global/1504708502_324045.html\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n\r\n                </div>		<!-- Descripcion -->', 'Neápolis, una ciudad romana sumergida', 'obra4.jpg', '<p>Fecha de publicación: 01/04/2018 13:25:46.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(5, '<div class=\"obras\">        \r\n <a href=\"?obra=5\" >\r\n  <img src=\"../Imagenes/obra5.JPG\" \r\n   alt=\"Obra 5\">\r\n  <div class=\"pie_foto\">Un pecio romano del \r\n    primer siglo</div>\r\n </a>\r\n</div>', '<!-- Imagen de la obra -->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra5.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">Un pecio romano del primer siglo. Foto de Carabinieri Subacquei / Soprintendenza Archeologia della Liguria</div>\r\n                </div>\r\n\r\n                <div class = \"Descripcion\">			<!-- Descripcion (texto plano) de la obra -->\r\n\r\n                        <h2> Hallan una nave romana con más de 2.000 ánforas de \'garum\' bético </h2>\r\n                        <h4>Datación: siglo I d.C.</h4>\r\n                        <p>La Superintendencia Arqueología de la Liguria y la Legión Carabinieri Liguria han localizado un <strong>pecio romano de la segunda mitad del siglo I d.C. </strong>frente a la costa de Alassio, al noroeste de Italia, según informa dicho organismo en un comunicado. El barco fue detectado en el verano de 2013 por un pescador y finalmente fue descubierto el pasado mes de noviembre con la ayuda de un vehículo subacuático y a unos 200 metros de profundidad. Al igual que el Cap del Vol, hallado cerca del Port de la Selva (Girona), fue concebido para la navegación de cabotaje, es decir, para transportar un cargamento a lo largo de la costa, sin adentrarse en aguas profundas pero expuesto a los peligros de la costa.</p>\r\n\r\n                        <h3>Una salsa con efecto afrodisíaco</h3>\r\n\r\n                        <p>El pecio Alassio 1, como ha sido bautizado, tenía <strong> entre 27 y 30 metros de longitud.</strong> Se trata de un hallazgo excepcional por las características de su cargamento: <strong> unas 2.000 ó 3.000 ánforas de garum </strong> , la salsa más codiciada de la época romana, hecha con vísceras de pescado fermentadas y que supuestamente tenía un efecto afrodisíaco. La salsa se disolvió tras hundirse en el mar, precisamente en el medio que la había originado. La nave provenía de un puerto de la Bética, \"probablemente Cádiz, que en época antigua representaba el principal centro de la industria de conservas del pescado\", según los arqueólogos. Un par de ánforas manufacturadas exclusivamente alrededor del río Tiber sugiere la hipótesis de que la nave procedía originalmente de Roma y que, después de cargar el garum en un puerto bético, regresó bordeando la costa hasta que <strong> naufragó repentinamente </strong>  junto a la costa ligur.</p>\r\n<a href=\"http://www.nationalgeographic.com.es/historia/actualidad/hallan-una-nave-romana-con-mas-de-2000-anforas-de-garum-betico_9983\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n\r\n                </div>		<!-- Descripcion -->', 'Un pecio romano del primer siglo', 'obra5.jpg', '<p>Fecha de publicación: 01/04/2018 15:26:20.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(6, '<div class=\"obras\">        \r\n <a href=\"?obra=6\">\r\n  <img src=\"../Imagenes/obra6.jpg\" \r\n   alt=\"Obra 6\">\r\n  <div class=\"pie_foto\">El barco fenicio de \r\n    Mazarrón</div>\r\n  </a>\r\n</div>', '<!-- Imagen de la obra y su pie de foto-->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra6.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">El barco fenicio de Mazarrón. Foto del Museo Nacional de Arqueología Subacuática.</div>\r\n                </div>\r\n\r\n                <!-- Descripcion de la obra -->\r\n                <div class = \"Descripcion\">     \r\n\r\n                    <!-- Título de la obra -->\r\n                    <h2>El segundo barco fenicio de Mazarrón</h2>\r\n                    <!-- Datación de la obra -->\r\n                    <h4>Datación: siglo VI a.C.</h4>\r\n                    <!-- Información de la obra -->\r\n                    <p>En 1995 se localizó un segundo pecio, Mazarrón 2 (Playa de la Isla, Mazarrón, Murcia), conservado casi completo con su cargamento, y ante la imposibilidad de abordar su documentación y estudio por estar trabajando en la extracción de los restos de Mazarrón 1, se decidió volver a enterrarlo con sedimento y protegerlo con una estructura metálica diseñada y construida para tal fin.</p>\r\n\r\n                    <p>Posteriormente, entre octubre de 1999 y enero de 2001 se procedió a la extracción y documentación del cargamento de Mazarrón 2, compuesto por lingotes de mineral de plomo, un ánfora, un molino de mano, una espuerta de esparto con asa de madera, restos de cabos de esparto de diversos grosores y tipos, abarrote para la estiba y protección del casco, o su ancla, de madera y plomo.</p>\r\n\r\n                    <p>El barco, del siglo VI antes de Cristo, tiene una longitud de 8,15 metros y 2,25 de manga, fue construido con madera de ciprés, pino carrasco, higuera y olivo y se localizó en 1995 con todo su cargamento, los objetos de la tripulación y el ancla, la más antigua de su tipo, de caña, cepo y uña.</p>\r\n\r\n                    <p>El hallazgo de Mazarrón 2 documenta por primera vez y de modo excepcional la vía marítima de la explotación del metal que los fenicios practicaron en la península ibérica, que solo conocíamos por los textos clásicos. Además este yacimiento da a conocer por primera vez la construcción naval, la vida a bordo, el sistema de estibado y abarrotado y el uso de anclas construidas más antiguo que se conoce. Se fecha en la segunda mitad del siglo VII a.C.</p>\r\n\r\n                    <!-- Enlace para mayor información acerca de la obra -->\r\n                    <a href=\"http://www.laverdad.es/murcia/mazarron/201511/10/expertos-aconsejan-desmontar-barco-20151110130847.html\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n\r\n                </div>		<!-- Descripcion -->', 'El barco fenicio de Mazarrón', 'obra6.jpg', '<p>Fecha de publicación: 02/04/2018 09:50:22.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(7, '<div class=\"obras\">        \r\n <a href=\"?obra=7\" >\r\n  <img src=\"../Imagenes/obra7.jpg\" \r\n   alt=\"Obra 7\">\r\n  <div class=\"pie_foto\">La cueva más grande del mundo en México.</div>\r\n  </a>\r\n</div>', '<!-- Imagen de la obra -->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra7.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">La cueva más grande del mundo en México. Foto de la revista \'Muy interesante\'.</div>\r\n                </div>\r\n\r\n                <div class = \"Descripcion\">			<!-- Descripcion (texto plano) de la obra -->\r\n\r\n                        <h2>Descubren la cueva subacuática más grande del mundo</h2>\r\n                        \r\n                        <h4>Datación: siglo XX aproximádamente</h4>\r\n                        <p>El grupo de exploración subacuática del proyecto Gran Acuífero Maya (GAM), ha descubierto el sitio arqueológico más grande del mundo al conectar los sistemas de las cavernas inundadas de Sac Actun y Dos Ojos en Tulum (México), dando como resultado una cueva subacuática de 347 kilómetros.</p>\r\n\r\n\r\n                        <p>Estos cientos de kilómetros de pasajes subterráneos se han convertido en verdaderos túneles del tiempo y resguardan, entre otras cosas, la historia remota y reciente de Quintana Roo, el estado mexicano de la península del Yucatán en el que se ha hallado el yacimiento.</p>\r\n\r\n                        <p>Ya que fue dañado severamente durante la batalla, el buque no se encuentra bien preservado, indicó el líder del equipo, Zhou Chunshui. Ninguna cabina fue encontrada intacta y el cuarto de máquinas aún se encuentra enterrado en la arena.</p>\r\n\r\n                        <p>\"Esta inmensa cueva representa el sitio arqueológico sumergido más importante del mundo, ya que cuenta con más de un centenar de contextos arqueológicos, entre los que se encuentran evidencias de los primeros pobladores de América, así como de fauna extinta y, por supuesto, de la cultura maya\", asegura el investigador del Instituto Nacional de Antropología e Historia y director del Gran Acuífero Maya, Guillermo de Anda.</p>\r\n<p>Este hallazgo es muy valioso, además, porque da pie y sustento a una gran biodiversidad que depende de este sistema enorme y representa una gran reserva de agua dulce.\r\n</p>\r\n\r\n<p>De acuerdo a las normas de espeleología, cuando dos sistemas de cuevas se conectan, la cueva más grande absorbe a la más pequeña, por lo que el nombre de esta última desaparece. Así pues, el Sistema Sac Actun es considerado ahora el más grande del mundo, con una longitud de 347 kilómetros de cueva inundada, la distancia entre Barcelona y València aproximadamente. Por tanto, el Sistema Dos Ojos deja de existir.\r\n</p>\r\n\r\n                        <a href=\"https://www.elperiodico.com/es/extra/20180117/cueva-subacuatica-mas-grande-mundo-mexico-6558067\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n\r\n                </div>', 'La cueva más grande del mundo en México', 'obra7.jpg', '<p>Fecha de publicación: 02/04/2018 16:48:05.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(8, '<div class=\"obras\">        \r\n <a href=\"?obra=8\" >\r\n <img src=\"../Imagenes/obra8.png\" alt=\"Obra \r\n  8\">\r\n  <div class=\"pie_foto\">El cañón de la \r\n   \"Mercedes\"</div>\r\n  </a>\r\n</div>', '<!-- Imagen de la obra y su pie de foto-->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra8-2.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">Dos cañones de la \"Mercedes\". Foto de la Agencia EFE.</div>\r\n                </div>\r\n\r\n                <!-- Descripcion de la obra -->\r\n                <div class = \"Descripcion\">    \r\n\r\n                    <!-- Título de la obra -->\r\n                    <h2>Dos cañones del pecio Las Mercedes</h2>\r\n                    <!-- Datación de la obra -->\r\n                    <h4>Datación: siglo XVI d.C.</h4>\r\n                    <!-- Información de la obra -->\r\n                    <p>La tercera expedición del Gobierno español al pecio de \"Nuestra Señora de las Mercedes\", hundido a principios del siglo XVIII, ha logrado recuperar dos culebrinas (cañones) de finales del siglo XVI, de estilo renacentista, y que el Ministerio de Cultura considera un hito en la arqueología subacuática mundial.</p>\r\n\r\n                    <p>En el acto de presentación de las conclusiones de la campaña, que ha transcurrido este mes de agosto a bordo del Buque de Investigación Oceanográfica \"María de Sarmiento\", se han mostrado el cañón \"Santa Bárbara\" (1586) encargado por Fernando Torres y Portugal, virrey del Perú, y \"Santa Rufina\" (1601), encargado por Luis de Velasco y Castilla, virrey del Perú y Nueva España (México).</p>\r\n\r\n                    <p>Ambos cañones, con un peso de 2 y 2,8 toneladas, respectivamente, fueron fundidos por Bernardino de Tejeda, y el personal del Museo Nacional de Arqueología Subacuática (Arqua) ya han comenzado a someterlos a trabajos de limpieza, desalinización, conservación y estudio.</p>\r\n\r\n                    <p>La idea es que los objetos arrojen luz sobre cómo era la vida a bordo de la fragata. De momento, ya se ha podido verificar que ambas culebrinas aparecen expresamente citadas en el manifiesto del cargo de la ‘Mercedes’ en el Archivo General de Indias (Sevilla). Está previsto que lo recuperado, junto con lo ya extraído en las dos campañas anteriores se incorpore, en un plazo de dos años, a la exposición permanente del ARQUA, en Cartagena. Allí se sumarán a las 500.000 monedas de oro y plata expoliadas por los cazatesoros del Odyssey, recuperadas posteriormente en una intensa batalla judicial, que ya descansan en los fondos del museo.</p>\r\n\r\n                    <!-- Enlace para mayor información acerca de la obra -->\r\n                    <a href=\"https://www.efe.com/efe/espana/cultura/recuperan-dos-canones-del-siglo-xvi-pecio-las-mercedes-en-la-ultima-campana/10005-3365523#\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n\r\n                </div>		<!-- Descripcion -->', 'El cañón de la Mercedes', 'obra8-2.jpg', '<p>Fecha de publicación: 03/04/2018 10:40:55.</p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());'),
(9, '<div class=\"obras\">        \r\n <a href=\"?obra=9\">\r\n <img src=\"../Imagenes/obra9.jpg\" alt=\"Obra \r\n   9\">\r\n <div class=\"pie_foto\">El mecanismo de la \r\n  Antikythera</div>\r\n  </a>\r\n</div>', '<!-- Imagen de la obra -->\r\n                <div class = \"img_obra\">\r\n                        <img src=\"../Imagenes/obra9-2.jpg\" alt=\"foto_obra\">\r\n                        <div class=\"pie_foto\">Mecanismo de Antikythera en el Museo Arqueológico Nacional de Atenas, Grecia.</div>\r\n                </div>\r\n\r\n                <div class = \"Descripcion\">			<!-- Descripcion (texto plano) de la obra -->\r\n\r\n                        <h2>Qué es el mecanismo de Antikythera: el enigmático artilugio de la antigua Grecia</h2>\r\n                        <h4>El artefacto, que cumple 115 años, fue encontrado por unos buscadores de esponjas marinas frente a la costa de la isla griega Antikythera.</h4>\r\n\r\n                        <p>Si preguntáramos a un alumno que cursa Secundaria que quién inventó la calculadora o dónde fue inventada, casi ninguno haría referencia al mecanismo de Antikythera. Las respuestas podrían ser miles, pero ninguna estaría cerca de la realidad y muchos menos harían referencia a una calculadora astronómica con más de 2.100 años de antigüedad.</p>\r\n\r\n                        <p>El mecanismo de Antikythera fue encontrado por unos buscadores de esponjas marinas entre los numerosos restos de joyería, monedas y estatuas de bronce y mármol de una galera romana que naufragó frente a la costa de la isla griega que le da su nombre, <strong> Antikythera. </strong></p>\r\n\r\n                        <p>Los 82 fragmentos de bronce localizados <strong> - hoy en el Museo Arqueológico Nacional de Atenas - </strong> estaban dentro de una caja de madera en cuyas tapas se mostraban numerosas inscripciones con información valiosísima (nombres de meses en corintio, planetas..)</p>\r\n\r\n\r\n                        <p>No todos los expertos están de acuerdo con la interpretación del mecanismo de Antikythera. Fue el arqueólogo Stais en 1902 el que creyó que se trataba de un reloj astronómico. Edmunds y T. Freeth creían que el artefacto se utilizaba para <strong> predecir eclipses solares y lunares </strong>, teniendo como referencia los conocimientos en progresión aritmética de los babilonios. Edmunds, por su parte, aseguraba que podría mostrar planetas como Venus y Mercurio.</p>\r\n\r\n                        <p>Sin embargo, Price tenía una teoría más celestial: el mecanismo de <strong> Antikythera </strong> se utilizaría para establecer el cronograma de festivales agrícolas y religiosos. Y Wright, con la reconstrucción del instrumento (72 engranajes), añadía que podía mostrar los movimientos de los cinco planetas conocidos en ese tiempo.</p>\r\n\r\n                        <p>Por último, otros estudiosos revelaron que podría servir para determinar la fecha exacta de celebración de los Juegos Olímpicos, apoyándose en las inscripciones que se han encontrado, (empezaban con la luna llena más cercana al solsticio de verano, siendo necesario un cálculo lo más exacto posible y un gran conocimiento de astronomía para establecer la fecha concreta)</p>\r\n\r\n                        <p>Lo que parece claro es que el mecanismo de Antikythera consta al menos de <strong> 37 ruedas dentadas de precisión </strong>, hechas de bronce, con las que se podría calcular con exactitud posiciones y movimientos astronómicos, recrear la órbita irregular de la Luna y, quizás, establecer la posición de planetas.</p>\r\n\r\n                        <p>Posterior a esta calculadora se encontró un calendario luni-solar mecánico persa del año 1000 con una gran precisión tecnológica, pero no fue hasta la Edad Media cuando aparecieron aparatos complejos en los relojes de las catedrales medievales.</p>\r\n\r\n                        <p>Hoy en día somos capaces de llegar a los lugares más insospechados, calcular distancias sorprendentes y alcanzar todo aquello con lo que los griegos soñaron alguna vez. Tan sólo pensar que un artefacto de semejantes características como el mecanismo de Antikythera fuera creado hace más de 2.000 años, nos da que pensar que estamos ante <strong> una civilización mucho más cercana a la nuestra de lo que podemos imaginar.</strong></p>\r\n\r\n                        <a href=\"https://elpais.com/cultura/2017/05/17/actualidad/1494973005_194869.html\" target=\"_blank\">Más información sobre este artículo aquí.</a>\r\n\r\n                </div>		<!-- Descripcion -->', 'El mecanismo de la Antikythera', 'obra9-2.jpg', '<p>Fecha de publicación: 03/04/2018 20:20:55. </p>', 'echo \"Fecha de la última modificación: \" . date (\"d/m/Y H:i:s.\", getlastmod());');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prohibidas`
--

CREATE TABLE `prohibidas` (
  `id` int(3) NOT NULL,
  `palabras` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prohibidas`
--

INSERT INTO `prohibidas` (`id`, `palabras`) VALUES
(1, 'caca'),
(2, 'gili'),
(3, 'idiota'),
(4, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `obra_asociada` int(3) NOT NULL,
  `url_video` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`obra_asociada`, `url_video`, `id`) VALUES
(1, 'https://www.youtube.com/watch?v=ouB8s5UOKy8', 1),
(2, 'https://www.youtube.com/watch?v=BtMGj9zGF9U', 2),
(3, 'https://www.youtube.com/watch?v=X5xhrqCB2Ss', 3),
(4, 'https://www.youtube.com/watch?v=48sSlrpZRoc', 4),
(5, 'https://www.youtube.com/watch?v=1bEbHd7yiKc', 5),
(6, 'https://www.youtube.com/watch?v=uXQSd7-AQ8A', 6),
(7, 'https://www.youtube.com/watch?v=utS2QdPaDWw', 7),
(8, 'https://www.youtube.com/watch?v=MhGxpSOXKmU', 8),
(9, 'https://www.youtube.com/watch?v=WN8uUl4rbkE', 9),
(7, 'https://www.youtube.com/watch?v=pfi6S620UUo', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colecciones`
--
ALTER TABLE `colecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obra_asociada` (`obra_asociada`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`FechaYHora`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obra_asociada` (`obra_asociada`);

--
-- Indices de la tabla `infogeneral`
--
ALTER TABLE `infogeneral`
  ADD PRIMARY KEY (`Contacto`(60));

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_obra` (`obra_asociada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colecciones`
--
ALTER TABLE `colecciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colecciones`
--
ALTER TABLE `colecciones`
  ADD CONSTRAINT `colecciones_ibfk_1` FOREIGN KEY (`obra_asociada`) REFERENCES `obras` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD CONSTRAINT `galerias_ibfk_1` FOREIGN KEY (`obra_asociada`) REFERENCES `obras` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`obra_asociada`) REFERENCES `obras` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
