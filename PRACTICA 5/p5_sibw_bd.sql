-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2018 a las 16:29:31
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `p5_sibw_bd`
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
(2, 'Preclásica', 7),
(3, 'Prehistórica', 2),
(4, 'Prehistórica', 6),
(5, 'Preclásica', 8),
(6, 'Prehistórica', 9),
(7, 'Romana', 3),
(8, 'Romana', 4),
(51, 'Prehistórica', 51);

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
('<p>Dirección IP: ::1</p>', '<p><strong>Autor: Nati</strong></p>', '<p>E-mail: nati@jeje.es</p>', '<p> Comentario: Qué obras tan CHULAS!!!!!!!!</p><p> <font color=red> Mensaje editado por el moderador.</font> </p>', '2018-05-03 14:13:35'),
('<p>Dirección IP: 192.20.58.50</p>\r\n', '<p><strong>Autor: Jose</strong></p>\r\n', '<p>Email: brolivars@gmail.com</p>\r\n', '<p>Comentario: Me chifla esta obra.</p><p> <font color=red> Mensaje editado por el moderador.</font> </p>', '2018-05-03 15:10:44'),
('<p>Dirección IP: ::1</p>', '<p><strong>Autor: Lidia</strong></p>', '<p>E-mail: lidia@lidia.es</p>', '<p>Comentario: Qué museo tan bonito!!!!!!</p><p> <font color=red> Mensaje editado por el moderador.</font> </p>', '2018-05-05 18:35:27'),
('<p>Dirección IP: ::1</p>', '<p><strong>Autor: super06</strong></p>', '<p>E-mail: super@super.es</p>', '<p>Comentario: Las obras son muy originales</p>', '2018-05-06 15:59:53');

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
(10, 'obra4.jpg		', 2),
(11, 'obra3.jpg', 3),
(15, 'obra1_2.jpg', 1),
(16, 'obra1_3.jpg', 1),
(17, 'obra1_4.jpg', 1),
(18, 'obra1_5.jpg', 1),
(19, 'obra1_6.jpg', 1),
(20, 'obra1_7.jpg', 1),
(21, 'obra1_8.png', 1),
(22, 'obra1_9.jpg', 1),
(23, 'obra1.jpg', 1),
(24, 'obra2_1.jpg', 2),
(25, 'obra2_2.jpg', 2),
(33, 'obra2_3.jpg', 2),
(34, 'obra2_4.jpg', 2),
(35, 'obra2_5.jpg', 2),
(39, 'obra2_6.jpg', 2),
(40, 'obra2_7.jpg', 2),
(41, 'obra2_8.jpg', 2),
(42, 'obra3-2.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infogeneral`
--

CREATE TABLE `infogeneral` (
  `ID` varchar(50) NOT NULL,
  `Pagina` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `infogeneral`
--

INSERT INTO `infogeneral` (`ID`, `Pagina`) VALUES
('contacto', '<div class=\"contacto\">\r\n\r\n<p>Para cualquier tipo de duda o consulta no duden en contactarnos a través de las siguientes direcciones de correo:</p>\r\n<p><strong>lidiasm96@correo.ugr.es y brolivars@gmail.com</strong></p>\r\n<p>Intentaremos responderles en la mayor brevedad posible.</p>\r\n\r\n</div>'),
('entradas', '<div class=\"entradas\">\r\n\r\n<p>El precio de las entradas varía según las siguientes condiciones que se explican:</p>\r\n<p><strong>Niños y estudiantes: 5€ de Lunes a Viernes.</strong></p>\r\n<p><strong>Adultos: 8€ de Lunes a Viernes.</strong></p>\r\n<p><strong>Mayores de 65 años: 6€ de Lunes a Viernes.</strong></p>\r\n\r\n<p><strong>Tarifas especiales</strong> para grupos a partir de 5 miembros con hasta un 10% de descuento.</p>\r\n\r\n</div>'),
('horario', '<div class=\"horario\">\r\n\r\n<p>El horario de apertura se puede comprobar a continuación:</p>\r\n<p><strong>Lunes y Viernes de 9:30h a 13:30h</strong></p>\r\n<p><strong>Martes a Jueves de 9:30h a 13:30h y de 17:00h a 20:00h</strong></p>\r\n<p><strong>Sábados de 10:00h a 13:00h</strong></p>\r\n\r\n</div>'),
('localizacion', '<div class=\"localizacion\">\r\n\r\n<p>El museo de Arqueología Subacuática se encuentra ubicado en el Parque de las Ciencias situado en la provincia de <strong>Granada</strong>.</p>\r\n<p>La dirección concreta es la siguiente: <strong>Av. de la Ciencia, s/n, 18006 Granada.</strong></p>\r\n<div class = \"imagen_localizacion\">\r\n	<img src=\"../Imagenes/localizacion.png\" alt=\"imagen_localizacion\">\r\n</div>\r\n\r\n</div>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infogeneralpublicadas`
--

CREATE TABLE `infogeneralpublicadas` (
  `id_infogen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `infogeneralpublicadas`
--

INSERT INTO `infogeneralpublicadas` (`id_infogen`) VALUES
('contacto'),
('horario');

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
(7, 'Identificarse', '?login'),
(8, 'Modificar mis datos', '?plantillaEdicionDatos'),
(9, 'Gestionar permisos', '?plantillaGestionPermisos'),
(10, 'Gestionar Obras', '?gestionarobras'),
(11, 'Buscador', '?plantillaBuscadorGoogle');

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
  `Fecha_Publicacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Fecha_Modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`ID`, `miniatura`, `descripcion`, `Titulo`, `Imagen`, `Fecha_Publicacion`, `Fecha_Modificacion`) VALUES
(1, '<div class=\"obras\"> \r\n<a href=\"?obra=1\">\r\n <img src=\"../Imagenes/obra1.jpg\" alt=\"Obra \r\n   1\">\r\n <div class=\"pie_foto\">Restos prehispánicos \r\n    en el Cenote San Manuel</div>\r\n</a>\r\n</div>\r\n', '																																																																								<h2> Encuentran restos prehispánicos en el Cenote San Manuel </h2>\r\n<h4>Datación: más de 13 mil años de antigüedad</h4>\r\n<p>MÉRIDA, Yuc.- El trabajo de investigación subacuático ha permitido encontrar elementos importantes para la arqueología, confirmando en algunos casos la influencia e intercambio de conocimientos que existieron entre las antiguas culturas mayas, señaló la investigadora Helena Barba Meinecke, del departamento de arqueología subacuática del Instituto Nacional de Antropología e Historia (INAH).</p>\r\n<p>La especialista presentó la ponencia “Cenote San Manuel, evidencia del cerámica preclásica”, en el marco del Segundo Simposio de Cultura Maya Ichkaantijoo que organizó el Instituto Nacional de Antropología e Historia (INAH) en Yucatán.</p>\r\n<p>Explicó la forma del cenote, sus variedades, y comentó que en la Península existen unos siete mil cuerpos de agua, algunos de ellos con gran cantidad de cuevas inundadas. En algunos casos durante los trabajos de exploración que se han realizado se han hallado vestigios arqueológicos importantes.</p>\r\n<p>Como en el caso de “Hoyo negro” en Quintana Roo, donde se encontraron restos con más de 13 mil años de antigüedad. </p>\r\n<p>En el cenote San Manuel, ubicado en el municipio de Tizimín, Yucatán, se han detectado restos óseos y materiales prehispánicos. Por los hallazgos encontrados en este sitio se considera uno de los más importantes registrados por la Subdirección de Arqueología Subacuática del INAH. </p>\r\n<p> Ahí hallaron una jarra con cuerpo de calabaza, rostro en su parte frontal y asa trenzada, así como una pieza es parecida a las vertederas o “chocolareras” que los mayas utilizaban para bebidas fermentadas o guardar la miel, con algunas variaciones, estas piezas se han identificado en diferentes regiones desde Honduras, El Salvador, Edzná, Chiapa de Corzo, Kabah y Tikal, entre otros. También hallaron un cráneo y vasijas bícromas.</p>\r\n<p><a href=\"https://sipse.com/milenio/dan-conocer-hallazgos-arqueologicos-importantes-cenotes-yucatan-182889.html\" target=\"_blank\">Más información sobre este artículo aquí.</a></p>						    							    							    						    						    						    						    						    						    						    						    						    			', 'Restos prehistóricos en el Cenote San Manuel', 'obra1.jpg', '2018-05-13 15:48:44', '2018-05-20 18:28:06'),
(2, '<div class=\"obras\">\r\n <a href=\"?obra=2\">\r\n  <img src=\"../Imagenes/obra2.jpg\" \r\n    alt=\"Obra 2\">\r\n  <div class=\"pie_foto\">La Ciudad de \r\n    Samabaj</div>\r\n  </a>\r\n</div>\r\n', '																																																																																																<h2>Samabaj, la Atlántida Maya en Atitlán </h2>\r\n<h4>Fecha de construcción: 200 a.C.</h4>\r\n<p>Es un área arqueológica situada en el lago de Atitlán en Sololá, Guatemala.</p>\r\n<p>Hace unos 2.000 años aproximadamente, al sur del lago había una pequeña isla, donde estaba situado el sitio de Samabaj, una pequeña aldea maya que se sumergió misteriosamente.</p>\r\n<p>Hasta la fecha se manejan tres posibles teorías que causaron su desparación: una repentina inundación que pudo haber sido provocada por una tormenta, una erupción volcánica que hizo que el agua subiera o un deslave o terremoto gigantesco que pudo haber subido la marea.</p>\r\n<p>Sus habitantes pertenecían al período Preclásico Tardío, que abarcó desde 400 a.C. a 100 d.C. Específicamente, vivieron entre el 200 a.C. y 200 d.C. en la isla. Además desarrollaron un sistema donde ya se daban divisiones de clases sociales y diferenciación del trabajo.</p>\r\n<p>La ciudad estuvo conformada por 3 grupos principales:</p>\r\n<p> · Grupo 1: Muros bien tallados, parece haber sido un área ocupacional.</p>\r\n<p> · Grupo 2: Formada por 8 estructuras, de las cuales dos son paralelas, y al este de la primera estructura, se encuentra una estela bien pulida.</p>\r\n<p> · Grupo 3: Es la más grande, posee una escalinata, y está a las afueras del grupo habitacional.</p>\r\n<a href=\"http://arquehistoria.com/historiassamabaj-ciudad-sumergida-en-el-lago-de-atitl-n-503\" target=\"_blank\">Más información sobre este artículo aquí.</a>          			    						    						    						    						    						    						    						    						    						    						    						    						    						    			', 'La Ciudad de Samabaj', 'obra2.jpg', '2018-04-11 14:39:23', '2018-05-28 19:14:31'),
(3, '<div class=\"obras\">        \r\n <a href=\"?obra=3\">\r\n  <img src=\"../Imagenes/obra3.jpg\" \r\n    alt=\"Obra 3\">\r\n   <div class=\"pie_foto\">Un barco bizantino \r\n    en el Mar Negro</div>\r\n </a>\r\n</div>', '																																<h2> Hallan un antiguo barco lleno de tesoros en el fondo del Mar Negro </h2>\r\n<h4>Datación: siglo IX-XI</h4>\r\n<p>El barco descubierto en el fondo del Mar Negro, cerca de Sebastopol, ya ha sido bautizado por varios arqueólogos como “el hallazgo del siglo”. La nave de más de 100 metros de eslora se conserva en perfectas condiciones y según se ha dicho pertenece a la época bizantina. El director del club submarino encargado de la búsqueda, Román Dunáev, cuenta cómo avanza la investigación.</p>\r\n<p><strong>Solamente se ha llevado a cabo la primera etapa de las investigaciones y los miembros de la expedición hablan sobre su hallazgo con mucha cautela.</strong></p>\r\n<p>Solamente podemos decir que se encontró una barco antiguo, bizantino. Es muy grande, diría que inusualmente grande para esta época – hasta ahora los investigadores trataban con naves de unos  20-30 metros. Por eso surgió otra hipótesis. Lo que descubrimos probablemente sea el lugar de un accidente y en el fondo hay varios barcos que chocaron. El hecho de que los escombros estén en perpendicular, el uno contra el otro, hace que nos inclinemos por esta versión.</p>\r\n<p><strong>Los buceadores llevaban en su busca más de un año, pero el lugar concreto de la ubicación de la nave se guarda en secreto.</strong></p>\r\n<p>Existe un alto riesgo de que los arqueólogos furtivos pueden saquear el barco. Por eso en estos momentos el lugar de las investigaciones está vigilado por los militares y aduaneros 24 horas al día. Solamente le puedo decir que el barco se encuentra a 80 metros de profundidad.</p>\r\n<p><strong>Se ha informado de que puede haber cientos de ánforas antiguas a bordo.</strong></p>\r\n<p><strong>¿Podría contar en qué estado se encuentra el propio barco y cuáles son los objetos detectados en su interior?</strong></p>\r\n<p>Para ser del siglo IX-XI está en muy buen estado. Por ejemplo, las fotografías que hemos podido tomar son tan limpias que da la impresión de que acababan de meter los objetos. No necesita trabajos serios de restauración. Si se desala y seca por un método no rápido podría completar la colección de cualquier museo arqueológico.</p>\r\n<p>En general, el Mar Negro tiene la capacidad única de conservar la belleza original de los objetos.</p>\r\n<a href=\"https://es.rbth.com/cultura/2015/06/02/hallan_antiguo_barco_lleno_de_tesoros_en_el_fondo_del_mar_negro_50031\" target=\"_blank\">Más información sobre este artículo aquí.</a>			    						    						    						    			', 'Un barco bizantino en el Mar Negro', 'obra3-2.jpg', '2018-05-17 11:35:17', '2018-05-17 19:47:48'),
(4, '<div class=\"obras\">        \r\n <a href=\"?obra=4\">\r\n  <img src=\"../Imagenes/obra4.jpg\" \r\n   alt=\"Obra 4\">\r\n  <div class=\"pie_foto\">Neápolis, una \r\n     ciudad romana sumergida</div>\r\n  </a>\r\n</div>', '																																<h2>Neápolis</h2>\r\n<h4>Datación: 1700 años de antigüedad</h4>\r\n<p>Una misión italotunecina ha hallado en Nabeul (Túnez) restos de la antigua ciudad romana de Néapolis que se extienden sobre 20 hectáreas bajo el mar y que confirman, según los arqueólogos, que un tsunami engulló una parte de la urbe en el siglo IV.</p>\r\n<p>Gracias a la investigación que ha realizado el equipo a través de prospecciones submarinas han conseguido encontrar calles, monumentos y sobre todo cerca de un centenar de cubas que servían para la producción de «garum», un condimento a base de pescado que gustaba mucho a los romanos.</p>\r\n<p>Además el equipo tiene ahora «la certeza de que Néapolis sufrió un seísmo» que data del 21 de julio del año 365 después de Cristo, según el relato del soldado e historiador Amiano Marcelino, y que golpeó con dureza Alejandría y Creta.</p>\r\n<p>Al seísmo que sufrió en el año 365 d.C. le siguió un tsunami que inundó una parte de Néapolis y las industrias de salazón tuvieron que ser reubicadas.</p>\r\n<p>La misión arqueológica comenzó sus trabajos en 2010 en busca del puerto de Néapolis, que fue en sus inicios un enclave cartaginés evocado por el historiador griego Tucídides antes de convertirse en una colonia del Imperio romano. Neápolis no aparece en muchos documentos porque se puso del lado de Cartago contra Roma durante la tercera guerra púnica, entre los años 149 a. C. y 146 a. C., según The Independent.</p>\r\n<a href=\"https://elpais.com/internacional/2017/09/06/mundo_global/1504708502_324045.html\" target=\"_blank\">Más información sobre este artículo aquí.</a>			    						    						    						    			', 'Neápolis, una ciudad romana sumergida', 'obra4.jpg', '2018-05-28 18:13:50', '2018-05-17 19:47:56'),
(6, '<div class=\"obras\">        \r\n <a href=\"?obra=6\">\r\n  <img src=\"../Imagenes/obra6.jpg\" \r\n   alt=\"Obra 6\">\r\n  <div class=\"pie_foto\">El barco fenicio de \r\n    Mazarrón</div>\r\n  </a>\r\n</div>', '																								<h2>El segundo barco fenicio de Mazarrón</h2>\r\n<h4>Datación: siglo VI a.C.</h4>\r\n<p>En 1995 se localizó un segundo pecio, Mazarrón 2 (Playa de la Isla, Mazarrón, Murcia), conservado casi completo con su cargamento, y ante la imposibilidad de abordar su documentación y estudio por estar trabajando en la extracción de los restos de Mazarrón 1, se decidió volver a enterrarlo con sedimento y protegerlo con una estructura metálica diseñada y construida para tal fin.</p>\r\n<p>Posteriormente, entre octubre de 1999 y enero de 2001 se procedió a la extracción y documentación del cargamento de Mazarrón 2, compuesto por lingotes de mineral de plomo, un ánfora, un molino de mano, una espuerta de esparto con asa de madera, restos de cabos de esparto de diversos grosores y tipos, abarrote para la estiba y protección del casco, o su ancla, de madera y plomo.</p>\r\n<p>El barco, del siglo VI antes de Cristo, tiene una longitud de 8,15 metros y 2,25 de manga, fue construido con madera de ciprés, pino carrasco, higuera y olivo y se localizó en 1995 con todo su cargamento, los objetos de la tripulación y el ancla, la más antigua de su tipo, de caña, cepo y uña.</p>\r\n<p>El hallazgo de Mazarrón 2 documenta por primera vez y de modo excepcional la vía marítima de la explotación del metal que los fenicios practicaron en la península ibérica, que solo conocíamos por los textos clásicos. Además este yacimiento da a conocer por primera vez la construcción naval, la vida a bordo, el sistema de estibado y abarrotado y el uso de anclas construidas más antiguo que se conoce. Se fecha en la segunda mitad del siglo VII a.C.</p>\r\n<a href=\"http://www.laverdad.es/murcia/mazarron/201511/10/expertos-aconsejan-desmontar-barco-20151110130847.html\" target=\"_blank\">Más información sobre este artículo aquí.</a>		    						    						    						    			', 'El barco fenicio de Mazarrón', 'obra6.jpg', '2018-05-17 11:48:54', '2018-05-17 11:55:49'),
(7, '<div class=\"obras\">        \r\n <a href=\"?obra=7\" >\r\n  <img src=\"../Imagenes/obra7.jpg\" \r\n   alt=\"Obra 7\">\r\n  <div class=\"pie_foto\">La cueva más grande del mundo en México.</div>\r\n  </a>\r\n</div>', '																<h2>Descubren la cueva subacuática más grande del mundo</h2>\r\n<h4>Datación: siglo XX aproximádamente</h4>\r\n<p>El grupo de exploración subacuática del proyecto Gran Acuífero Maya (GAM), ha descubierto el sitio arqueológico más grande del mundo al conectar los sistemas de las cavernas inundadas de Sac Actun y Dos Ojos en Tulum (México), dando como resultado una cueva subacuática de 347 kilómetros.</p>\r\n<p>Estos cientos de kilómetros de pasajes subterráneos se han convertido en verdaderos túneles del tiempo y resguardan, entre otras cosas, la historia remota y reciente de Quintana Roo, el estado mexicano de la península del Yucatán en el que se ha hallado el yacimiento.</p>\r\n<p>Ya que fue dañado severamente durante la batalla, el buque no se encuentra bien preservado, indicó el líder del equipo, Zhou Chunshui. Ninguna cabina fue encontrada intacta y el cuarto de máquinas aún se encuentra enterrado en la arena.</p>\r\n<p>\"Esta inmensa cueva representa el sitio arqueológico sumergido más importante del mundo, ya que cuenta con más de un centenar de contextos arqueológicos, entre los que se encuentran evidencias de los primeros pobladores de América, así como de fauna extinta y, por supuesto, de la cultura maya\", asegura el investigador del Instituto Nacional de Antropología e Historia y director del Gran Acuífero Maya, Guillermo de Anda.</p>\r\n<p>Este hallazgo es muy valioso, además, porque da pie y sustento a una gran biodiversidad que depende de este sistema enorme y representa una gran reserva de agua dulce.\r\n</p>\r\n<p>De acuerdo a las normas de espeleología, cuando dos sistemas de cuevas se conectan, la cueva más grande absorbe a la más pequeña, por lo que el nombre de esta última desaparece. Así pues, el Sistema Sac Actun es considerado ahora el más grande del mundo, con una longitud de 347 kilómetros de cueva inundada, la distancia entre Barcelona y Valencia aproximadamente. Por tanto, el Sistema Dos Ojos deja de existir.\r\n</p>\r\n<a href=\"https://www.elperiodico.com/es/extra/20180117/cueva-subacuatica-mas-grande-mundo-mexico-6558067\" target=\"_blank\">Más información sobre este artículo aquí.</a>			    						    			', 'La cueva más grande del mundo en México', 'obra7.jpg', '2018-05-16 11:32:19', '2018-05-17 19:48:11'),
(8, '<div class=\"obras\">        \r\n <a href=\"?obra=8\" >\r\n <img src=\"../Imagenes/obra8.png\" alt=\"Obra \r\n  8\">\r\n  <div class=\"pie_foto\">El cañón de la \r\n   \"Mercedes\"</div>\r\n  </a>\r\n</div>', '																<h2>Dos cañones del pecio Las Mercedes</h2>\r\n<h4>Datación: siglo XVI d.C.</h4>\r\n<p>La tercera expedición del Gobierno español al pecio de \"Nuestra Señora de las Mercedes\", hundido a principios del siglo XVIII, ha logrado recuperar dos culebrinas (cañones) de finales del siglo XVI, de estilo renacentista, y que el Ministerio de Cultura considera un hito en la arqueología subacuática mundial.</p>\r\n<p>En el acto de presentación de las conclusiones de la campaña, que ha transcurrido este mes de agosto a bordo del Buque de Investigación Oceanográfica \"María de Sarmiento\", se han mostrado el cañón \"Santa Bárbara\" (1586) encargado por Fernando Torres y Portugal, virrey del Perú, y \"Santa Rufina\" (1601), encargado por Luis de Velasco y Castilla, virrey del Perú y Nueva España (México).</p>\r\n<p>Ambos cañones, con un peso de 2 y 2,8 toneladas, respectivamente, fueron fundidos por Bernardino de Tejeda, y el personal del Museo Nacional de Arqueología Subacuática (Arqua) ya han comenzado a someterlos a trabajos de limpieza, desalinización, conservación y estudio.</p>\r\n<p>La idea es que los objetos arrojen luz sobre cómo era la vida a bordo de la fragata. De momento, ya se ha podido verificar que ambas culebrinas aparecen expresamente citadas en el manifiesto del cargo de la ‘Mercedes’ en el Archivo General de Indias (Sevilla). Está previsto que lo recuperado, junto con lo ya extraído en las dos campañas anteriores se incorpore, en un plazo de dos años, a la exposición permanente del ARQUA, en Cartagena. Allí se sumarán a las 500.000 monedas de oro y plata expoliadas por los cazatesoros del Odyssey, recuperadas posteriormente en una intensa batalla judicial, que ya descansan en los fondos del museo.</p>\r\n<a href=\"https://www.efe.com/efe/espana/cultura/recuperan-dos-canones-del-siglo-xvi-pecio-las-mercedes-en-la-ultima-campana/10005-3365523#\" target=\"_blank\">Más información sobre este artículo aquí.</a>			    						    			', 'El cañón de la Mercedes', 'obra8-2.jpg', '2018-05-17 16:45:50', '2018-05-17 19:48:19'),
(9, '<div class=\"obras\">        \r\n <a href=\"?obra=9\">\r\n <img src=\"../Imagenes/obra9.jpg\" alt=\"Obra \r\n   9\">\r\n <div class=\"pie_foto\">El mecanismo de la \r\n  Antikythera</div>\r\n  </a>\r\n</div>', '																<h2>Qué es el mecanismo de Antikythera: el enigmático artilugio de la antigua Grecia</h2>\r\n<h4>El artefacto, que cumple 115 años, fue encontrado por unos buscadores de esponjas marinas frente a la costa de la isla griega Antikythera.</h4>\r\n<p>Si preguntáramos a un alumno que cursa Secundaria que quién inventó la calculadora o dónde fue inventada, casi ninguno haría referencia al mecanismo de Antikythera. Las respuestas podrían ser miles, pero ninguna estaría cerca de la realidad y muchos menos harían referencia a una calculadora astronómica con más de 2.100 años de antigüedad.</p>\r\n<p>El mecanismo de Antikythera fue encontrado por unos buscadores de esponjas marinas entre los numerosos restos de joyería, monedas y estatuas de bronce y mármol de una galera romana que naufragó frente a la costa de la isla griega que le da su nombre, <strong> Antikythera. </strong></p>\r\n<p>Los 82 fragmentos de bronce localizados <strong> - hoy en el Museo Arqueológico Nacional de Atenas - </strong> estaban dentro de una caja de madera en cuyas tapas se mostraban numerosas inscripciones con información valiosísima (nombres de meses en corintio, planetas..)</p>\r\n<p>No todos los expertos están de acuerdo con la interpretación del mecanismo de Antikythera. Fue el arqueólogo Stais en 1902 el que creyó que se trataba de un reloj astronómico. Edmunds y T. Freeth creían que el artefacto se utilizaba para <strong> predecir eclipses solares y lunares </strong>, teniendo como referencia los conocimientos en progresión aritmética de los babilonios. Edmunds, por su parte, aseguraba que podría mostrar planetas como Venus y Mercurio.</p>\r\n<p>Sin embargo, Price tenía una teoría más celestial: el mecanismo de <strong> Antikythera </strong> se utilizaría para establecer el cronograma de festivales agrícolas y religiosos. Y Wright, con la reconstrucción del instrumento (72 engranajes), añadía que podía mostrar los movimientos de los cinco planetas conocidos en ese tiempo.</p>\r\n<p>Por último, otros estudiosos revelaron que podría servir para determinar la fecha exacta de celebración de los Juegos Olímpicos, apoyándose en las inscripciones que se han encontrado, (empezaban con la luna llena más cercana al solsticio de verano, siendo necesario un cálculo lo más exacto posible y un gran conocimiento de astronomía para establecer la fecha concreta)</p>\r\n<p>Lo que parece claro es que el mecanismo de Antikythera consta al menos de <strong> 37 ruedas dentadas de precisión </strong>, hechas de bronce, con las que se podría calcular con exactitud posiciones y movimientos astronómicos, recrear la órbita irregular de la Luna y, quizás, establecer la posición de planetas.</p><p>Posterior a esta calculadora se encontró un calendario luni-solar mecánico persa del año 1000 con una gran precisión tecnológica, pero no fue hasta la Edad Media cuando aparecieron aparatos complejos en los relojes de las catedrales medievales.</p>\r\n<p>Hoy en día somos capaces de llegar a los lugares más insospechados, calcular distancias sorprendentes y alcanzar todo aquello con lo que los griegos soñaron alguna vez. Tan sólo pensar que un artefacto de semejantes características como el mecanismo de Antikythera fuera creado hace más de 2.000 años, nos da que pensar que estamos ante <strong> una civilización mucho más cercana a la nuestra de lo que podemos imaginar.</strong></p>\r\n<a href=\"https://elpais.com/cultura/2017/05/17/actualidad/1494973005_194869.html\" target=\"_blank\">Más información sobre este artículo aquí.</a>			    						    			', 'El mecanismo de la Antikythera', 'obra9-2.jpg', '2018-04-20 13:36:45', '2018-05-28 20:54:48'),
(51, '', '																								<h2> Descubren los restos de un pecio romano en aguas de Israel </h2>\r\n<h4>Datación: siglo IV</h4>\r\n<p>Un hallazgo casual de dos buzos israelíes en Cesárea (Israel) supone el mayor descubrimiento arqueológico de los últimos 30 años: un pecio romano con objetos de incalculable valor.\r\n\r\nEl pasado mes de abril, los buceadores Ran Feinstein y Ofer Raanan estuvieron buceando frente a la costa de Cesárea, donde encontraron un antiguo naufragio romano con objetos de incalculable valor.  \r\n\r\n\"Nos tomó un par de segundos entender lo que estaba pasando\", recuerda Raanan, que descubrió la primera escultura en el fondo marino pero entonces cuando descubrieron una segunda, se dieron cuenta de que era algo especial y lo llevaron a la superficie. Más tarde, registraron la zona y descubrieron más artefactos antiguos. \"Fue increíble. Yo buceo aquí cada fin de semana y nunca había encontrado nada similar\", dijo Raanan.  \r\n\r\nLa Autoridad de Antigüedades de Israel (IAA) envió a sus buzos para investigar y recuperar la valiosa carga de la era romana, que incluye estatuas de bronce, lámparas, jarras, objetos con forma de animales, anclas y miles de monedas con imágenes de los emperadores romanos Constantino y Licinio. Muchos de los objetos en muy buen estado de conservación.  \r\n\r\nAlgunos de los objetos datan del siglo IV, mientras que otros son de los siglos I y II, dijo Jacob Sharvit, director de arqueología marina en el IAA.\r\n\r\nLos indicios indican que debía tratarse de un gran mercante que transportaba un cargamento de metal programado para su reciclaje pero tras encontrarse con una tormenta, los marineros bajaron los anclajes para tratar de salvar la nave, dijo Sharvit, pero todos sus intentos fracasaron; la nave naufragó y toda su carga se hundió en aguas de Cesárea donde ha permanecido durante 1.600 años.  \r\n\r\nLos dos submarinistas afortunados recibirán un diploma de reconocimiento del AAI, mientras que las autoridades no pueden ocultar su orgullo ante tan preciado hallazgo.\r\n\r\n</p>\r\n<p><a href=\"http://www.bajoelagua.com/buceo/noticias/2016-05-17/descubren-restos-pecio-romano-aguas-1144.html\" target=\"_blank\">Más información sobre este artículo aquí.</a></p>			    						    						    			', 'Pecio romano en Israel', 'obra5.jpg', '2018-05-18 18:39:41', '2018-05-28 19:17:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obraspublicadas`
--

CREATE TABLE `obraspublicadas` (
  `id_obra` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obraspublicadas`
--

INSERT INTO `obraspublicadas` (`id_obra`) VALUES
(1),
(2),
(9),
(51);

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
-- Estructura de tabla para la tabla `rolesusuarios`
--

CREATE TABLE `rolesusuarios` (
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rolesusuarios`
--

INSERT INTO `rolesusuarios` (`rol`) VALUES
('anonimo'),
('gestor'),
('moderador'),
('registrado'),
('superusuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nickname` text NOT NULL,
  `clave` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nickname`, `clave`, `email`, `rol`, `nombre`, `apellidos`) VALUES
('alesito', 'alex', 'alex@alex.alex', 'registrado', 'Alex', 'Alejandrito'),
('gestor06', 'gestor', 'gestor@gestor.es', 'gestor', 'Gestor Castor', 'Gestorcito'),
('Hola', 'hola', 'hola@hola.es', 'registrado', 'Hola', 'Que tal'),
('Jose', 'jose', 'jose@jose.jose', 'registrado', 'Jose', 'Joselito'),
('lidia06', 'lidia', 'lidia@lidia.es', 'registrado', 'Lidia', 'Jeeeje'),
('mod', 'mod', 'mod@mod.com', 'moderador', 'moderador', 'moder'),
('Nati', 'nati', 'nati@nati.es', 'registrado', 'Natalia', 'Ordóñez'),
('super06', 'super', 'super@super.es', 'superusuario', 'Super', 'Superman'),
('test', 'test1', 'test@gmail.com', 'registrado', 'jj', 'ee'),
('user', 'uu', 'usertest@gmail.com', 'registrado', 'uuuuu', 'dddd');

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
(2, 'https://www.youtube.com/watch?v=BtMGj9zGF9U							  									  									  									  				    								    								    								    				', 2),
(4, 'https://www.youtube.com/watch?v=48sSlrpZRoc				    								    								    								    								    								    								    								    								    								    													  									  									  									  									  									  									  									  									  									  ', 4),
(6, 'https://www.youtube.com/watch?v=uXQSd7-AQ8A', 6),
(7, 'https://www.youtube.com/watch?v=utS2QdPaDWw			    								    								    								    								    								    								    								    								    								    								    								    													  									  									  									  									  									  									  									  									  									  									  									  				    								    				', 7),
(8, 'https://www.youtube.com/watch?v=MhGxpSOXKmU', 8),
(7, '									  									  https://www.youtube.com/watch?v=pfi6S620UUo			    								    													  									  				    								    				', 10),
(9, 'https://www.youtube.com/watch?v=WN8uUl4rbkE				    				', 12),
(9, 'https://www.youtube.com/watch?v=WN8uUl4rbkE				    				', 34),
(1, 'https://www.youtube.com/watch?v=ouB8s5UOKy8', 45),
(51, 'https://www.youtube.com/watch?v=mSSoErubsuU', 47);

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
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `infogeneralpublicadas`
--
ALTER TABLE `infogeneralpublicadas`
  ADD PRIMARY KEY (`id_infogen`);

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
-- Indices de la tabla `obraspublicadas`
--
ALTER TABLE `obraspublicadas`
  ADD PRIMARY KEY (`id_obra`),
  ADD KEY `id_obra` (`id_obra`);

--
-- Indices de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rolesusuarios`
--
ALTER TABLE `rolesusuarios`
  ADD PRIMARY KEY (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`),
  ADD KEY `rol` (`rol`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
-- Filtros para la tabla `infogeneralpublicadas`
--
ALTER TABLE `infogeneralpublicadas`
  ADD CONSTRAINT `infogeneralpublicadas_ibfk_1` FOREIGN KEY (`id_infogen`) REFERENCES `infogeneral` (`ID`);

--
-- Filtros para la tabla `obraspublicadas`
--
ALTER TABLE `obraspublicadas`
  ADD CONSTRAINT `obraspublicadas_ibfk_1` FOREIGN KEY (`id_obra`) REFERENCES `obras` (`ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rolesusuarios` (`rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`obra_asociada`) REFERENCES `obras` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
