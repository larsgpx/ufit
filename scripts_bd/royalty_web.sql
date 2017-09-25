-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2016 a las 16:12:00
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `royalty_web`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `menu_categorias`(in id_tipo int)
SELECT * FROM tbl_categorias where fktipo_cate=id_tipo order by orden_cate asc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menu_tipo_producto`()
SELECT id_tipo,nombre_tipo,Url_tipos FROM tbl_tipos where lower(tipo)='prod' order by orden_tipo asc$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asesorias`
--

CREATE TABLE IF NOT EXISTS `tbl_asesorias` (
  `id_ase` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_ase` varchar(100) NOT NULL,
  `subtitulo_ase` longtext NOT NULL,
  `descripcion_ase` longtext NOT NULL,
  `foto1_ase` varchar(100) NOT NULL,
  `foto2_ase` varchar(100) NOT NULL,
  `orden_ase` int(10) NOT NULL,
  PRIMARY KEY (`id_ase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tbl_asesorias`
--

INSERT INTO `tbl_asesorias` (`id_ase`, `titulo_ase`, `subtitulo_ase`, `descripcion_ase`, `foto1_ase`, `foto2_ase`, `orden_ase`) VALUES
(3, 'THE ESSENTIALS', 'Never out of Style items no man should be without Never out of Style.', 'From casual Friday to boardroom ready -dress to impress at the office.Choose your work wear category, then shop now or add to your Wish List..', '160215015335asesoria_1.jpg', '160215015335detalle_asesoria.jpg', 0),
(4, 'THE ESSENTIALS', 'Never out of Style items no man should be without Never out of Style.', 'Never out of Style items no man should be without Never out of Style.', '160215015433asesoria_2.jpg', '160215015433detalle_asesoria.jpg', 0),
(7, 'THE ESSENTIALS', 'Never out of Style items no man should be without Never out of Style.	', 'Never out of Style items no man should be without Never out of Style Never out of Style items no man should be without Never out of Style Never out of Style items no man should be without Never out of Style Never out of Style items no man should be without Never out of Style Never out of Style items no man should be without Never out of Style Never out of Style items no man should be without Never out of Style Never out of Style items no man should be without Never out of Style Never out of Style items no man should be without Never out of Style ', '160915013038as3.jpg', '160915013038asint.jpg', 0),
(8, 'THE ESSENTIALS', 'Never out of Style items no man should be without Never out of Style.', 'Never out of Style items no man should be without Never out of Style.', '160913034202as1.jpg', '160913034202asint.jpg', 0),
(9, 'THE ESSENTIALS', 'Never out of Style items no man should be without Never out of Style.', 'Never out of Style items no man should be without Never out of Style.', '160913034459as2.jpg', '160913034459asint.jpg', 0),
(12, 'THE ESSENTIALS', 'Never out of Style items no man should be without Never out of Style.', 'From casual Friday to boardroom ready -dress to impress at the office.Choose your work wear category, then shop now or add to your Wish List..', '160919092323as1.jpg', '160919092323asint.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asesorias_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_asesorias_productos` (
  `id_ase_pro` int(10) NOT NULL AUTO_INCREMENT,
  `fkproducto_ase_pro` int(10) NOT NULL,
  `fkase_ase_pro` int(10) NOT NULL,
  PRIMARY KEY (`id_ase_pro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `tbl_asesorias_productos`
--

INSERT INTO `tbl_asesorias_productos` (`id_ase_pro`, `fkproducto_ase_pro`, `fkase_ase_pro`) VALUES
(24, 19, 4),
(25, 20, 4),
(26, 21, 4),
(31, 19, 12),
(32, 20, 12),
(33, 21, 12),
(34, 22, 12),
(35, 23, 12),
(36, 24, 12),
(37, 25, 12),
(38, 19, 3),
(39, 20, 3),
(40, 21, 3),
(41, 24, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_banner_home`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_banner_home`
--

INSERT INTO `tbl_banner_home` (`id`, `title`, `subtitle`) VALUES
(1, 'Colección Primavera Verano - 2017', 'Lo mejor en moda'),
(4, 'Verano Total  2017', 'Aprovecha descuentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_banner_home_slides`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_home_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_home_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_link` int(11) DEFAULT '0',
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_banner_home_slides_1_idx` (`banner_home_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tbl_banner_home_slides`
--

INSERT INTO `tbl_banner_home_slides` (`id`, `banner_home_id`, `image`, `has_link`, `link`) VALUES
(1, 1, '160915014050160514101331160514020152banner_1.jpg', 1, 'http://royalty.asesdigitales.pe/categorias.php?tipos=4'),
(7, 4, '160915014157160306015537160224025810a.jpg', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_banner_ofertas`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_ofertas` (
  `id_ba` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_ba` varchar(100) NOT NULL,
  `link_ba` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ba`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_banner_ofertas`
--

INSERT INTO `tbl_banner_ofertas` (`id_ba`, `imagen_ba`, `link_ba`) VALUES
(2, '1609061256271.jpg', 'tests');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `id_cate` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_cate` varchar(100) NOT NULL,
  `fktipo_cate` int(10) NOT NULL,
  `orden_cate` int(10) NOT NULL,
  `foto_cate` varchar(200) CHARACTER SET latin1 NOT NULL,
  `fk_id_seo` int(10) NOT NULL,
  `tipo_categoria` char(6) NOT NULL,
  `url_page_tbl` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id_cate`, `nombre_cate`, `fktipo_cate`, `orden_cate`, `foto_cate`, `fk_id_seo`, `tipo_categoria`, `url_page_tbl`) VALUES
(5, 'RECIEN LLEGADOS', 1, 7, '160224025810a.jpg', 0, '', 'recien-llegados'),
(6, 'COMPRA POR OCASIÓN', 1, 0, '160224025057a.jpg', 0, '', 'compra-por-ocasion'),
(7, 'COMPRA MÁS Y AHORRA', 1, 6, '160224025034a.jpg', 0, 'compra', ''),
(8, 'QUÉ ESTA DE MODA', 1, 4, '160224024955a.jpg', 0, '', ''),
(11, 'chicos', 7, 1, '', 0, '', ''),
(12, 'adultos', 7, 0, '', 0, '', ''),
(14, 'COMPRA POR COLOR', 1, 1, '160504125155camisa1.jpg', 0, '', ''),
(15, 'COMPRA POR ENTALLE', 1, 3, '160504125418camisa3.jpg', 0, '', ''),
(16, 'COMPRA POR DISEÑO', 1, 5, '160504125705camisa2.jpg', 0, '', ''),
(18, 'COMPRA POR LARGO DE MANGO', 1, 2, '160504010224morenos.jpg', 0, '', ''),
(21, 'COMPRA POR ESTILO', 4, 4, '160504010710crea.jpg', 0, '', ''),
(23, 'QUÉ ESTÁ DE MODA', 4, 5, '160504011225160224024955a.jpg', 0, '', ''),
(26, '¿QUÉ ESTÁ DE MODA?', 3, 4, '160507113235banner_pantalones_innovator.jpg', 0, '', ''),
(27, 'COMPRA POR DISEÑO', 3, 5, '160507114538160224024955a.jpg', 0, '', ''),
(28, 'COMPRA POR ENTALLE', 3, 3, '160507114611160224025034a.jpg', 0, '', ''),
(29, 'COMPRA POR COLOR', 3, 2, '160507114718160224025057a.jpg', 0, '', ''),
(30, 'COMPRA POR CATEGORÍA', 3, 0, '160507114901camisa1.jpg', 0, '', ''),
(31, 'RECIÉN LLEGADOS', 3, 7, '160507115059camisa2.jpg', 0, '', ''),
(32, 'COMPRAS MÁS Y AHORRA', 3, 6, '160507115158camisa3.jpg', 0, '', ''),
(33, 'COMPRAS POR OCASIÓN', 3, 1, '160507115411patabote.jpg', 0, '', ''),
(34, 'COMPRA POR CATEGORÍA', 2, 0, '160508125256calzado-italiano.jpg', 0, '', ''),
(35, 'COMPRA MÁS Y AHORRA', 2, 2, '160508125018zapatos1.jpg', 0, 'compra', ''),
(36, '¿QUÉ ESTÁ DE MODA?', 2, 3, '160508125504zapatos2.jpg', 0, '', ''),
(37, 'COMPRA POR COLOR', 2, 6, '160508125720zapatos3.jpg', 0, '', ''),
(38, 'COMPRA POR OCACIÓN', 2, 5, '160508010013zapatos4.jpg', 0, '', ''),
(39, 'COMPRA POR ESTILO', 2, 1, '160508010502zapatos5.jpg', 0, '', ''),
(40, 'COMPRA POR CATEGORÍA', 6, 0, '16051012551305212014-braun-watch-collection-02.jpg', 0, '', ''),
(41, 'COMPRA CON DESCUENTOS', 6, 2, '160510013659716966_mrp_ou_l.jpg', 0, 'descue', ''),
(43, 'QUÉ ESTÁ DE MODA', 6, 3, '160510013909bolsos.jpg', 0, '', ''),
(44, 'RECIÉN LLEGADOS', 6, 1, '160510012656lentes.jpg', 0, '', ''),
(51, 'COMPRA POR CATEGORÍA', 5, 0, '.', 0, '', ''),
(52, 'Demo', 14, 0, '.', 0, '', ''),
(57, 'Demo', 13, 0, '.', 0, '', ''),
(58, 'COMPRA MÁS Y AHORRA', 4, 2, '.', 0, 'compra', ''),
(59, 'COMPRA POR COLOR', 4, 3, '.', 0, '', ''),
(60, 'COMPRA POR ENTALLE', 4, 1, '.', 0, '', ''),
(61, 'COMPRA POR LARGO DE MANGA', 4, 6, '.', 0, '', ''),
(62, 'COMPRA POR DISEÑO', 4, 0, '.', 0, '', ''),
(63, 'COMPRA MÁS Y AHORRA', 5, 0, '.', 0, 'compra', ''),
(64, 'QUÉ ESTÁ DE MODA', 5, 0, '.', 0, '', ''),
(65, 'RECIÉN LLEGADOS', 5, 0, '.', 0, '', ''),
(68, 'COMPRA POR TALLA', 5, 0, '.', 0, '', ''),
(69, 'COMPRA CON DESCUENTOS', 5, 0, '.', 0, 'descue', ''),
(71, 'COMPRA POR MARCA', 5, 0, '.', 0, 'marca', ''),
(72, 'COMPRA POR MARCA', 4, 8, '.', 0, 'marca', ''),
(73, 'COMPRA POR TALLA', 4, 7, '.', 0, '', ''),
(74, 'COMPRA CON DESCUENTOS', 4, 9, '.', 0, 'descue', ''),
(75, 'RECIÉN LLEGADOS', 4, 10, '.', 0, '', ''),
(76, 'COMPRA POR TALLA Y LARGO', 3, 9, '.', 0, '', ''),
(77, 'COMPRA POR MARCA', 3, 10, '.', 0, 'marca', ''),
(78, 'COMPRA CON DESCUENTOS', 3, 8, '.', 0, 'descue', ''),
(80, 'COMPRA CON DESCUENTOS', 1, 9, '.', 0, 'descue', ''),
(81, 'COMPRA POR MARCA', 1, 8, '.', 0, 'marca', ''),
(82, 'COMPRA POR TALLA', 2, 4, '.', 0, '', ''),
(83, 'COMPRA CON DESCUENTOS', 2, 8, '.', 0, 'descue', ''),
(84, 'COMPRA POR MARCA', 2, 7, '.', 0, 'marca', ''),
(85, 'otra camisa', 1, 0, '.', 0, '', ''),
(86, 'compra', 2, 0, '.', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias_ofertas`
--

CREATE TABLE IF NOT EXISTS `tbl_categorias_ofertas` (
  `id_cate_oferta` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_cate_oferta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto_cate_oferta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `banner_cate_oferta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cate_oferta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tbl_categorias_ofertas`
--

INSERT INTO `tbl_categorias_ofertas` (`id_cate_oferta`, `nombre_cate_oferta`, `foto_cate_oferta`, `banner_cate_oferta`) VALUES
(2, 'Bermudas', '160913033133of2.jpg', '1603240100251.jpg'),
(7, '2X1 PANTALONES', '160913033302of1.jpg', '160905010713080916-home-ftr-1.jpg'),
(4, 'Polos', '160913033342of4.jpg', '160410055435160306015537160224025810a.jpg'),
(9, 'Camisas largas', '160913033325of3.jpg', '160907031718160410011440pantalon-azul-(4).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE IF NOT EXISTS `tbl_clientes` (
  `id_cli` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_cli` varchar(100) NOT NULL,
  `email_cli` varchar(100) NOT NULL,
  `clave_cli` varchar(100) NOT NULL,
  `token_nueva_clave_cli` varchar(45) DEFAULT NULL,
  `pais_cli` varchar(100) NOT NULL,
  `fecha_cli` date NOT NULL,
  `pais_facturacion_cli` varchar(100) NOT NULL,
  `nombre_facturacion_cli` varchar(100) NOT NULL,
  `apellido_facturacion_cli` varchar(100) NOT NULL,
  `dir1_facturacion_cli` varchar(100) NOT NULL,
  `dir2_facturacion_cli` varchar(100) NOT NULL,
  `provincia_facturacion_cli` varchar(100) NOT NULL,
  `postal_facturacion_cli` varchar(100) NOT NULL,
  `tel_facturacion_cli` varchar(100) NOT NULL,
  `tarjeta_cli` varchar(100) NOT NULL,
  `mes_tarjeta_cli` varchar(100) NOT NULL,
  `anio_tarjeta_cli` varchar(100) NOT NULL,
  `pais_direccion_cli` varchar(100) NOT NULL,
  `nombre_direccion_cli` varchar(100) NOT NULL,
  `apellido_direccion_cli` varchar(100) NOT NULL,
  `dir1_direccion_cli` varchar(100) NOT NULL,
  `dir2_direccion_cli` varchar(100) NOT NULL,
  `provincia_direccion_cli` varchar(100) NOT NULL,
  `postal_direccion_cli` varchar(100) NOT NULL,
  `tel_direccion_cli` varchar(100) NOT NULL,
  `envio_cli` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`id_cli`, `nombre_cli`, `email_cli`, `clave_cli`, `token_nueva_clave_cli`, `pais_cli`, `fecha_cli`, `pais_facturacion_cli`, `nombre_facturacion_cli`, `apellido_facturacion_cli`, `dir1_facturacion_cli`, `dir2_facturacion_cli`, `provincia_facturacion_cli`, `postal_facturacion_cli`, `tel_facturacion_cli`, `tarjeta_cli`, `mes_tarjeta_cli`, `anio_tarjeta_cli`, `pais_direccion_cli`, `nombre_direccion_cli`, `apellido_direccion_cli`, `dir1_direccion_cli`, `dir2_direccion_cli`, `provincia_direccion_cli`, `postal_direccion_cli`, `tel_direccion_cli`, `envio_cli`) VALUES
(5, 'Sandro Pastor Monzon', 'spastor@as.pe', '$2y$11$2Mh6WPBucCVb2nelmmfykuyaZ/HYbncMjApQBtG1lGC/uBfIQVAVy', '9dNuvsRZP5VvdYDEJcs9UbxJjvwQEb', 'PerÃº', '2016-03-07', '', '', '', '', '', '', '', '', '4140688159567499', 'Enero', '2017', 'PerÃº', 'Sandro', 'Pastor MonzÃ³n', 'Av. ayacucho 918 - Dpto. 202, Los Rosales - Miraflores', 'Surco', 'Lima', '511', '977728584', 'Standar Delivery'),
(8, 'William', 'wiescobedo@gmail.com', '123', NULL, 'PerÃº', '2016-03-08', 'PerÃº', 'William', 'Escobedo', 'Petunia 196', 'Petunia 196', 'Lima', ' 51', '4323475', '5345435345345345', 'Febrero', '2018', 'PerÃº', 'William', 'Escobedo', 'Petunia 1967', 'Petunia 1967', 'Lima', ' 51', '345345', 'Standar Delivery'),
(9, 'Sandro Pastor', 'comunica@as.pe', '123', NULL, 'PerÃº', '2016-03-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'sandro pastor monzon del poso ', 'comunica@asbtl.pe', 'sandro', NULL, 'PerÃº', '2016-03-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Express Delivery'),
(11, 'James', 'james.otiniano@gmail.com', '$2y$11$ZdeVF0mCcr8KB.j7vdtWReluhXQej0Bjomxy1r5oAgpijng/3kyLC', 'VtRmbudjSR8Ndj8JB7ygFR8cJANx7G', 'PerÃº', '2016-04-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Probando', 'prueba@prueba.com', '123123', NULL, 'PerÃº', '2016-04-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Prueba', 'prueba2@prueba.com', '$2y$11$ixteHYfD.2GGHGUZznd7zuS5RMZgrix6fd6g8mi7gpP7AkgteK4R6', NULL, 'PerÃº', '2016-04-22', '', '', '', '', '', '', '', '', '', '', '', 'PerÃº', 'Prueba', 'asdfasdf', 'asdfasdf', 'asdfa', 'asdf', 'asdfasdf', '234234234234', 'Standar Delivery'),
(14, 'usuario1', 'usuario1@usuario.com', '$2y$11$RhO55dm.ywIF1Yr1qjWNKOuC9xfM17or1ceuUKXvH.UJjIJiph9ie', NULL, 'PerÃº', '2016-04-22', '', '', '', '', '', '', '', '', '', '', '', 'Anguila', 'asdf', 'asdf', 'fsdf', 'fasdf', 'fasdf', '234234', '2r23423', 'Standar Delivery'),
(15, 'usuario2', 'usuario2@usuario.com', '$2y$11$EEzsyGFNLiWxpaDnXiFc8O25t7Xy2.ASim3K5E0kCC/U0hPS8Ciwe', NULL, 'AfganistÃ¡n', '2016-04-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Alexandre', 'info@alexfilgueira.com', '$2y$11$OhAMFv6zsJQesvZFeuiOj.gIX3Q7saO2un98WY3KI1/WB2nRWLUSa', NULL, 'Australia', '2016-05-02', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Alexandre Filgueira', 'faidoc@gmail.com', '$2y$11$QmW7b4I0.fhobZ10zzDXgehQYdWB4a7HaU/OWXqR8RrsYl.DkHfPe', 'CydNeYd5usSx5b5eXw4hxnG8jMN48z', 'PerÃº', '2016-05-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'James', 'james.otiniano@altimea.com', '$2y$11$zvgPwv2rRoSgnkzeSEpqgeRu2h8jX/2Q9DPGZCl/t4/GMUe.Tiywa', NULL, 'PerÃº', '2016-05-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Alex', 'faidoc2@gmail.com', '$2y$11$xMZ9WP8Lvnk7hXX0mBmU9ea4Un.8r0TFGClia.Sm91UHfHZuqxYGW', NULL, 'Argentina', '2016-05-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'Ademar Soria', 'comunica@asesdigitales.pe', '$2y$11$kK56qODYr77vU9ULUjA3IuEhSXuVz9FfpRE20DQZvXhquWybURVk2', NULL, 'PerÃº', '2016-05-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Renzo', 'renzonovoa1@gmail.com', '$2y$11$ZovbbHBWMbZvweFgay5CSeNjW6qe2pUeBM3.9MrCemGHURLuGdEbK', NULL, 'PerÃº', '2016-08-19', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Nombre', 'cpantani@as.pe', '$2y$11$.6y.Oeoh532c.q10BU7iPOuxI0RW9H83nZe39RwV.N/83nRlfBhLW', NULL, 'PerÃº', '2016-09-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Martin', 'marti_15_jch@hotmail.com', '$2y$11$BRC0crePKT2jgBZMnkI6Me6iz.4XO1NPaSVaU8jIzjWqpjXqBgsdC', NULL, 'PerÃº', '2016-09-26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes_email`
--

CREATE TABLE IF NOT EXISTS `tbl_clientes_email` (
  `id_em` int(10) NOT NULL AUTO_INCREMENT,
  `email_em` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_em` date NOT NULL,
  PRIMARY KEY (`id_em`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tbl_clientes_email`
--

INSERT INTO `tbl_clientes_email` (`id_em`, `email_em`, `fecha_em`) VALUES
(8, 'spastor@as.pe', '2016-05-06'),
(7, 'faidoc@gmail.com', '2016-05-04'),
(6, 'spastor@as.pe', '2016-03-15'),
(5, 'wiescobedo@gmail.com', '2016-03-15'),
(9, 'renzonovoa1@gmail.com', '2016-08-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes_novedades`
--

CREATE TABLE IF NOT EXISTS `tbl_clientes_novedades` (
  `id_no` int(10) NOT NULL AUTO_INCREMENT,
  `email_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_no` date NOT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_clientes_novedades`
--

INSERT INTO `tbl_clientes_novedades` (`id_no`, `email_no`, `fecha_no`) VALUES
(1, 'wiescobedo@gmail.com', '2016-03-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes_ofertas`
--

CREATE TABLE IF NOT EXISTS `tbl_clientes_ofertas` (
  `id_ofe` int(10) NOT NULL AUTO_INCREMENT,
  `email_ofe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ofe` date NOT NULL,
  PRIMARY KEY (`id_ofe`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tbl_clientes_ofertas`
--

INSERT INTO `tbl_clientes_ofertas` (`id_ofe`, `email_ofe`, `fecha_ofe`) VALUES
(1, 'wiescobedo@gmail.com', '2016-03-15'),
(2, 'undefined', '2016-03-22'),
(3, 'undefined', '2016-03-22'),
(4, 'undefined', '2016-05-04'),
(5, 'undefined', '2016-05-05'),
(6, 'nombre@empresa.com', '2016-08-24'),
(7, 'nombre@empresa.com', '2016-08-24'),
(8, 'spastor@as.pe', '2016-08-29'),
(9, 'renzo.novoa@hotmail.com', '2016-10-06'),
(10, 'bebeluhidalgo@hotmail.com', '2016-10-06'),
(11, 'renzo.novoa@hotmail.com', '2016-10-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

CREATE TABLE IF NOT EXISTS `tbl_comentarios` (
  `id_comentario` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_comentario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `des_comentario` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estrella_comentario` int(10) NOT NULL,
  `fkproducto_comentario` int(10) NOT NULL,
  `fkcliente_comentario` int(10) NOT NULL,
  `fecha_comentario` date NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`id_comentario`, `titulo_comentario`, `des_comentario`, `estrella_comentario`, `fkproducto_comentario`, `fkcliente_comentario`, `fecha_comentario`) VALUES
(2, 'Primer comentario', 'BacanÃ­simo', 4, 21, 8, '2016-03-27'),
(3, 'Segundo', 'Test', 4, 21, 8, '2016-03-27'),
(4, 'TEST', 'test', 2, 21, 8, '2016-03-27'),
(5, 'Bueno', 'Bueno', 3, 21, 5, '2016-03-27'),
(6, 'sasasa', 'sasasa', 3, 23, 5, '2016-05-03'),
(7, 'Buena billetera', 'Excelente cuero argentino. Hay mÃ¡s colores?', 3, 30, 5, '2016-05-10'),
(8, 'Un lujo!', 'Excelente cuero argentino. Hay mÃ¡s colores?', 5, 30, 5, '2016-05-10'),
(9, 'Excelente', 'Quiero distribuir relojes de esa misma marca.', 5, 29, 5, '2016-08-17'),
(10, 'Excelente', 'Hola me fascina este reloj.', 2, 29, 5, '2016-08-17'),
(11, 'Buen Polo', 'Holas', 4, 36, 5, '2016-08-17'),
(12, 'buena tela', 'QuÃ© paja el pantalon', 5, 23, 5, '2016-08-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuerpo_home`
--

CREATE TABLE IF NOT EXISTS `tbl_cuerpo_home` (
  `id_cuerpo` int(10) NOT NULL AUTO_INCREMENT,
  `imagen_cuerpo` varchar(100) NOT NULL,
  `link_cuerpo` varchar(100) NOT NULL,
  `titulo_cuerpo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cuerpo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tbl_cuerpo_home`
--

INSERT INTO `tbl_cuerpo_home` (`id_cuerpo`, `imagen_cuerpo`, `link_cuerpo`, `titulo_cuerpo`) VALUES
(4, '1609060719581.jpg', 'http://royalty2.asesdigitales.pe/T-1-camisas', 'CAMISAS'),
(5, '1609060720192.jpg', 'http://royalty2.asesdigitales.pe/T-2-zapatos', 'ZAPATOS'),
(6, '1609060720313.jpg', 'new_arrivals.php?id=1', '<small>New Arrivals</small> Hombre'),
(7, '1609060720404.jpg', 'new_arrivals.php?id=2', '<small>New Arrivals</small> NiÃ±os'),
(8, '1609060720555.jpg', 'http://royalty2.asesdigitales.pe/T-4-polos', 'POLOS'),
(9, '1609060721326.jpg', 'http://royalty2.asesdigitales.pe/T-3-pantalones', 'PANTALONES'),
(10, '1609060721507.jpg', 'http://royalty2.asesdigitales.pe/T-5-ropa', 'ROPA'),
(11, '1609060722088.jpg', 'http://royalty2.asesdigitales.pe/marcas', 'MARCAS'),
(12, '1609060722249.jpg', 'http://royalty2.asesdigitales.pe/accesorios', 'ACCESORIOS'),
(13, '16090607223810.jpg', 'http://royalty2.asesdigitales.pe/asesoria', 'AsesorÃ­a Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_fecha_registro_producto`
--

CREATE TABLE IF NOT EXISTS `tbl_fecha_registro_producto` (
  `id_fecha_registro_prod` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` varchar(200) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_fecha_registro_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `tbl_fecha_registro_producto`
--

INSERT INTO `tbl_fecha_registro_producto` (`id_fecha_registro_prod`, `id_producto`, `fecha_registro`) VALUES
(1, '43', '2016-09-23'),
(2, '44', '2016-09-30'),
(3, '45', '2016-10-20'),
(4, '46', '2016-10-20'),
(5, '47', '2016-10-20'),
(6, '48', '2016-10-20'),
(7, '49', '2016-10-20'),
(8, '50', '2016-10-20'),
(9, '51', '2016-10-20'),
(10, '52', '2016-10-20'),
(11, '45', '2016-10-24'),
(12, '46', '2016-10-24'),
(13, '47', '2016-11-03'),
(14, '48', '2016-11-03'),
(15, '49', '2016-11-03'),
(16, '50', '2016-11-03'),
(17, '51', '2016-11-03'),
(18, '52', '2016-11-03'),
(19, '53', '2016-11-03'),
(20, '54', '2016-11-04'),
(21, '55', '2016-11-04'),
(22, '56', '2016-11-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_filtros`
--

CREATE TABLE IF NOT EXISTS `tbl_filtros` (
  `id_filtro` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_filtro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fktipo_filtro` int(10) NOT NULL,
  `tipo_filtro` varchar(12) NOT NULL,
  PRIMARY KEY (`id_filtro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Volcado de datos para la tabla `tbl_filtros`
--

INSERT INTO `tbl_filtros` (`id_filtro`, `nombre_filtro`, `fktipo_filtro`, `tipo_filtro`) VALUES
(3, 'Talla', 1, ''),
(6, 'Color', 1, ''),
(8, 'filtro uno', 7, ''),
(9, 'filtro dos', 7, ''),
(21, 'Categorí­a', 6, ''),
(22, 'Talla', 2, ''),
(23, 'Color', 2, ''),
(24, 'Talla', 13, ''),
(25, 'Color', 13, ''),
(26, 'Diseño', 1, ''),
(27, 'Entalle', 1, ''),
(28, 'Largo de manga', 1, ''),
(29, 'Marca', 1, 'marca'),
(31, 'Descuentos', 6, 'descuento'),
(33, 'Marca', 2, 'marca'),
(34, 'Talla', 4, ''),
(35, 'Color', 4, ''),
(36, 'Diseño', 4, ''),
(37, 'Marca', 4, 'marca'),
(38, 'Talla y largo', 3, ''),
(39, 'Color', 3, ''),
(40, 'Diseño', 3, ''),
(41, 'Marca', 3, 'marca'),
(42, 'Entalle', 3, ''),
(43, 'Entalle', 4, ''),
(44, 'Talla', 5, ''),
(45, 'Marca', 5, 'marca'),
(49, 'Descuentos', 5, 'descuento'),
(51, 'Descuentos', 4, 'descuento'),
(53, 'Descuentos', 3, 'descuento'),
(54, 'Descuentos', 1, 'descuento'),
(55, 'Categorí­a', 2, ''),
(56, 'Descuentos', 2, 'descuento'),
(57, 'Categorí­a', 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ideas`
--

CREATE TABLE IF NOT EXISTS `tbl_ideas` (
  `id_idea` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_idea` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo_idea` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url_idea` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_idea` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url_video_idea` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `seccion_idea` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_idea`),
  KEY `id_ide` (`id_idea`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tbl_ideas`
--

INSERT INTO `tbl_ideas` (`id_idea`, `titulo_idea`, `subtitulo_idea`, `url_idea`, `imagen_idea`, `url_video_idea`, `seccion_idea`) VALUES
(6, 'CAMISAS', 'camisa nueva  ', 'D-38-camisa-washed-azul', '161004044504160209032627camisa marron (2).jpg', '', '1'),
(7, 'Nueva idea para regalar', 'subtÃ­tulo 1', 'http://facebook.com', '161017032258160902034103h.jpg', '', '2'),
(8, 'TÃ­tulo 3', 'subtitulo 3', 'http://facebook.com', '161017032401160902033857c.jpg', '', '3'),
(9, 'Otro tÃ­tulo', 'subtÃ­tulo 4', 'http://facebook.com', '161017032503banner-tercio-1.jpg', '', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ideas_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_ideas_productos` (
  `id_ide_pro` int(10) NOT NULL AUTO_INCREMENT,
  `fkideas_ide_pro` int(10) NOT NULL,
  `fkproducto_ide_pro` int(10) NOT NULL,
  PRIMARY KEY (`id_ide_pro`),
  KEY `id_ide_pro` (`id_ide_pro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_ideas_productos`
--

INSERT INTO `tbl_ideas_productos` (`id_ide_pro`, `fkideas_ide_pro`, `fkproducto_ide_pro`) VALUES
(1, 1, 19),
(2, 1, 20),
(3, 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_items_categoria`
--

CREATE TABLE IF NOT EXISTS `tbl_items_categoria` (
  `id_item_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_item_categoria` varchar(100) CHARACTER SET utf8 NOT NULL,
  `url_page_tbl` varchar(900) NOT NULL,
  `valor_item_categoria` varchar(11) NOT NULL,
  `tendencia_item` char(1) NOT NULL,
  `numero_item` int(11) NOT NULL,
  `fk_item_categoria` int(10) NOT NULL,
  `fk_id_seo` int(11) NOT NULL,
  PRIMARY KEY (`id_item_categoria`),
  KEY `fk_id_seofk` (`fk_id_seo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=226 ;

--
-- Volcado de datos para la tabla `tbl_items_categoria`
--

INSERT INTO `tbl_items_categoria` (`id_item_categoria`, `nombre_item_categoria`, `url_page_tbl`, `valor_item_categoria`, `tendencia_item`, `numero_item`, `fk_item_categoria`, `fk_id_seo`) VALUES
(4, 'Casual', '', '0', '', 0, 6, 0),
(5, 'Oficina', '', '0', '', 0, 6, 0),
(6, 'Urbano', '', '0', '', 0, 6, 0),
(7, '50 a menos', '', '50', '', 0, 7, 0),
(8, '2 * 100 sale camisass', '', '100', '', 0, 7, 0),
(9, 'Tendencias', '', '0', '', 0, 8, 0),
(10, 'Más vendidos', '', '0', '', 0, 8, 0),
(11, 'Zapatos Grandes', '', '0', '', 0, 9, 0),
(12, 'ANCHO 1', '', '0', '', 0, 10, 0),
(13, 'chico uno', '', '0', '', 0, 11, 0),
(14, 'chico dos', '', '0', '', 0, 11, 0),
(15, 'adulto uno', '', '0', '', 0, 12, 0),
(16, 'adulto dos', '', '0', '', 0, 12, 0),
(17, 'Recién Llegados para verano caliente - full playa, sol, arena, mar y chicas', '', '0', '', 0, 13, 0),
(18, 'Moda caliente', '', '0', '', 0, 13, 0),
(19, 'Moda ardiente', '', '0', '', 0, 13, 0),
(20, 'Tendencias', '', '0', '', 0, 23, 0),
(21, 'top 10 básicos', '', '0', '', 0, 23, 0),
(23, 'Más tendencias', '', '0', '', 0, 26, 0),
(24, 'Los más vendidos', '', '0', '', 0, 26, 0),
(25, 'Top 10 básicos', '', '0', '', 0, 26, 0),
(26, 'Color entero', '', '0', '', 0, 27, 0),
(27, 'Corduroy', '', '0', '', 0, 27, 0),
(28, 'Denin', '', '0', '', 0, 27, 0),
(29, 'Estructuras', '', '0', '', 0, 27, 0),
(30, 'Estampados', '', '0', '', 0, 27, 0),
(31, 'Slim', '', '0', '', 0, 28, 0),
(32, 'Straight', '', '0', '', 0, 28, 0),
(33, 'Skinny', '', '0', '', 0, 28, 0),
(34, 'Relaxed', '', '0', '', 0, 28, 0),
(35, 'Standard', '', '0', '', 0, 28, 0),
(36, 'Blanco', '', '0', '', 0, 29, 0),
(37, 'Azul', '', '0', '', 0, 29, 0),
(38, 'Celeste', '', '0', '', 0, 29, 0),
(39, 'Gris', '', '0', '', 0, 29, 0),
(40, 'Verde', '', '0', '', 0, 29, 0),
(41, 'Negro', '', '0', '', 0, 29, 0),
(42, 'Beige', '', '0', '', 0, 29, 0),
(43, 'Otros', '', '0', '', 0, 29, 0),
(44, 'Khakis', '', '0', '', 0, 30, 0),
(45, 'Jeans', '', '0', '', 0, 30, 0),
(46, 'Chinos', '', '0', '', 0, 30, 0),
(47, 'Cinco bolsillos', '', '0', '', 0, 30, 0),
(48, 'Cargo', '', '0', '', 0, 30, 0),
(49, 'Joggers', '', '0', '', 0, 30, 0),
(50, 'Bermudas', '', '0', '', 0, 30, 0),
(51, 'De 50 a menos', '', '50', '', 0, 32, 0),
(52, 'De 100 a menos', '', '100', '', 0, 32, 0),
(53, 'De 200 a menos', '', '200', '', 0, 32, 0),
(54, 'De 300 a menos', '', '300', '', 0, 32, 0),
(55, 'De 300 a más', '', '300', '', 0, 32, 0),
(56, 'Uso casual', '', '0', '', 0, 33, 0),
(57, 'Para oficina', '', '0', '', 0, 33, 0),
(58, 'Para urbano', '', '0', '', 0, 33, 0),
(59, 'Al aire libre', '', '0', '', 0, 33, 0),
(60, 'Elegante', '', '0', '', 0, 33, 0),
(61, 'De fiesta', '', '0', '', 0, 33, 0),
(62, 'Playa', '', '0', '', 0, 33, 0),
(63, 'Correas', '', '0', '', 0, 40, 0),
(64, 'Billeteras', '', '0', '', 0, 40, 0),
(65, 'Pulseras', '', '0', '', 0, 40, 0),
(66, 'Llaveros', '', '0', '', 0, 40, 0),
(76, 'Más vendidos', '', '0', '', 0, 43, 0),
(78, 'Tendencias', '', '0', '', 0, 43, 0),
(79, 'Top 10 básicas', '', '0', '', 0, 43, 0),
(80, 'Todo fútbol', '', '0', '', 0, 45, 0),
(81, 'Ocacón tenis', '', '0', '', 0, 45, 0),
(82, 'Protección agua', '', '0', '', 0, 45, 0),
(83, 'Desde 15 años', '', '0', '', 0, 47, 0),
(84, 'Hasta 20 años', '', '0', '', 0, 47, 0),
(85, 'Para niños', '', '0', '', 0, 47, 0),
(86, 'Todo adolecentes', '', '0', '', 0, 47, 0),
(87, 'Tradionales', '', '0', '', 0, 46, 0),
(88, 'Modernas', '', '0', '', 0, 46, 0),
(89, 'Exclusivos modelos', '', '0', '', 0, 46, 0),
(90, 'oxfords', '', '0', '', 0, 34, 0),
(91, 'Mocasines', '', '0', '', 0, 34, 0),
(92, 'Al aire libre', '', '0', '', 0, 6, 0),
(93, 'Elegante', '', '0', '', 0, 6, 0),
(94, 'Fiesta', '', '0', '', 0, 6, 0),
(95, 'Para playa', '', '0', '', 0, 6, 0),
(96, 'Top 10 básicas', '', '0', '', 0, 8, 0),
(97, '2 * 200 colección', '', '0', '', 0, 7, 0),
(98, '2 * 300 quedan pocas', '', '0', '', 0, 7, 0),
(99, '300 a más últimas', '', '0', '', 0, 7, 0),
(100, 'Blanco', '', '0', '', 0, 14, 0),
(101, 'Azul', '', '0', '', 0, 14, 0),
(102, 'Celeste', '', '0', '', 0, 14, 0),
(103, 'Rojo', '', '0', '', 0, 14, 0),
(104, 'Verde', '', '0', '', 0, 14, 0),
(105, 'Negro', '', '0', '', 0, 14, 0),
(108, 'Rayas', '', '0', '', 0, 16, 0),
(109, 'Estampados', '', '0', '', 0, 16, 0),
(110, 'Cuadros', '', '0', '', 0, 16, 0),
(111, 'Color entero', '', '0', '', 0, 16, 0),
(112, 'Lino', '', '0', '', 0, 16, 0),
(113, 'Corduroy', '', '0', '', 0, 16, 0),
(114, 'Denin', '', '0', '', 0, 16, 0),
(115, 'Estructuras', '', '0', '', 0, 16, 0),
(116, 'Slim', '', '0', '', 0, 15, 0),
(117, 'Regular', '', '0', '', 0, 15, 0),
(118, 'Classic', '', '0', '', 0, 15, 0),
(119, 'Manga corta', '', '0', '', 0, 18, 0),
(120, 'Manga larga', '', '0', '', 0, 18, 0),
(121, 'Manga 3/4', '', '0', '', 0, 18, 0),
(122, 'sdsds', '', '0', '', 0, 50, 0),
(123, 'bvbvbvbv', '', '0', '', 0, 50, 0),
(124, 'Fresco', '', '0', '', 0, 54, 0),
(125, 'Primavera', '', '0', '', 0, 54, 0),
(126, 'Verano', '', '0', '', 0, 54, 0),
(127, 'Largos', '', '0', '', 0, 55, 0),
(128, 'Anchos', '', '0', '', 0, 55, 0),
(129, 'Zapatillas', '', '0', '', 0, 34, 0),
(130, 'Botas', '', '0', '', 0, 34, 0),
(131, 'Top Sider', '', '0', '', 0, 34, 0),
(132, 'Sandalias', '', '0', '', 0, 34, 0),
(133, 'Plantillas y accesorios', '', '0', '', 0, 34, 0),
(134, 'Limpieza y lustrado', '', '0', '', 0, 34, 0),
(135, 'Tendencia', '', '0', '', 0, 35, 0),
(136, '100 a menos', '', '0', '', 0, 35, 0),
(137, '200 a menos', '', '0', '', 0, 35, 0),
(138, '300 a menos', '', '0', '', 0, 35, 0),
(139, '300 a más', '', '0', '', 0, 35, 0),
(140, 'Tendencias', '', '0', '', 0, 36, 0),
(141, 'Más vendidos', '', '0', '', 0, 36, 0),
(142, 'Top 10 básicas', '', '0', '', 0, 36, 0),
(143, 'Negro', '', '0', '', 0, 37, 0),
(144, 'Blanco', '', '0', '', 0, 37, 0),
(145, 'Azul', '', '0', '', 0, 37, 0),
(146, 'Natural', '', '0', '', 0, 37, 0),
(147, 'Burgundy', '', '0', '', 0, 37, 0),
(148, 'Vestir', '', '0', '', 0, 38, 0),
(149, 'Casual', '', '0', '', 0, 38, 0),
(150, 'Oficina', '', '0', '', 0, 38, 0),
(151, 'Bodas', '', '0', '', 0, 38, 0),
(152, 'Al aire libre', '', '0', '', 0, 38, 0),
(153, 'Fiesta', '', '0', '', 0, 38, 0),
(154, 'De vuelta al colegio', '', '0', '', 0, 38, 0),
(155, 'Para la playa', '', '0', '', 0, 38, 0),
(156, 'Confort', '', '0', '', 0, 39, 0),
(157, 'Alta moda', '', '0', '', 0, 39, 0),
(158, 'Diseño', '', '0', '', 0, 39, 0),
(159, 'Elegante', '', '0', '', 0, 39, 0),
(160, 'Casual', '', '0', '', 0, 39, 0),
(161, 'Clásico', '', '0', '', 0, 39, 0),
(163, 'listado', '', '0', '', 0, 62, 0),
(164, 'color entero', '', '0', '', 0, 62, 0),
(165, 'estampadas', '', '0', '', 0, 62, 0),
(166, 'denin', '', '0', '', 0, 62, 0),
(167, 'estructuras', '', '0', '', 0, 62, 0),
(168, 'Más vendidos', '', '0', '', 0, 23, 0),
(169, '50 a menos', '', '0', '', 0, 58, 0),
(170, '100 a menos', '', '0', '', 0, 58, 0),
(171, '200 a menos', '', '0', '', 0, 58, 0),
(172, '300 a menos', '', '0', '', 0, 58, 0),
(173, '300 a más', '', '0', '', 0, 58, 0),
(174, 'Cuello camisero', '', '0', '', 0, 21, 0),
(175, 'cuello redondo', '', '0', '', 0, 21, 0),
(176, 'cuello V', '', '0', '', 0, 21, 0),
(177, 'slim', '', '0', '', 0, 60, 0),
(178, 'regular', '', '0', '', 0, 60, 0),
(179, 'classic', '', '0', '', 0, 60, 0),
(180, 'Manga corta', '', '0', '', 0, 61, 0),
(181, 'manga larga', '', '0', '', 0, 61, 0),
(182, 'blanco', '', '0', '', 0, 59, 0),
(183, 'azul', '', '0', '', 0, 59, 0),
(184, 'celeste', '', '0', '', 0, 59, 0),
(185, 'gris', '', '0', '', 0, 59, 0),
(186, 'verde', '', '0', '', 0, 59, 0),
(187, 'negro', '', '0', '', 0, 59, 0),
(188, 'beige', '', '0', '', 0, 59, 0),
(189, 'blazers', '', '0', '', 0, 51, 0),
(190, 'chalecos', '', '0', '', 0, 51, 0),
(191, 'chompas', '', '0', '', 0, 51, 0),
(192, 'pullovers', '', '0', '', 0, 51, 0),
(193, 'casacas', '', '0', '', 0, 51, 0),
(194, 'sweaters', '', '0', '', 0, 51, 0),
(195, 'underwears', '', '0', '', 0, 51, 0),
(196, 'pijamas', '', '0', '', 0, 51, 0),
(197, 'Tendencias', '', '0', '', 0, 64, 0),
(198, 'más vendidos', '', '0', '', 0, 64, 0),
(199, 'top 10 básicos', '', '0', '', 0, 64, 0),
(200, '50 a menos', '', '50', '', 0, 63, 0),
(201, '100 a menos', '', '100', '', 0, 63, 0),
(202, '200 a menos', '', '200', '', 0, 63, 0),
(203, '300 a menos', '', '300', '', 0, 63, 0),
(204, '300 a más', '', '300', '', 0, 63, 0),
(205, 'Vino', '', '0', '', 0, 14, 0),
(206, 'Guinda', '', '0', '', 0, 14, 0),
(207, 'Celeste estampado', '', '0', '', 0, 14, 0),
(210, 'Bermudas', '', '0', '', 0, 51, 0),
(211, 'Jeans', '', '0', '', 0, 51, 0),
(212, 'Productos de limpieza', '', '0', '', 0, 40, 0),
(213, 'Marrón', '', '0', '', 0, 37, 0),
(214, '38', '', '0', '', 0, 82, 0),
(215, '39', '', '0', '', 0, 82, 0),
(216, '40', '', '0', '', 0, 82, 0),
(217, '41', '', '0', '', 0, 82, 0),
(218, '42', '', '0', '', 0, 82, 0),
(219, '43', '', '0', '', 0, 82, 0),
(220, '44', '', '0', '', 0, 82, 0),
(221, '45', '', '0', '', 0, 82, 0),
(222, 'otro 2', '', '0', '', 0, 6, 0),
(223, '4 * 100 sale camisas', '', '', 'n', 0, 7, 0),
(224, '3 * 500 sale camisas', '', '500', 'n', 3, 7, 0),
(225, '4* 30 salen', '', '0', 'n', 0, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_items_filtro`
--

CREATE TABLE IF NOT EXISTS `tbl_items_filtro` (
  `id_item_filtro` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_item_filtro` varchar(100) NOT NULL,
  `fk_item_filtro` int(10) NOT NULL,
  PRIMARY KEY (`id_item_filtro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Volcado de datos para la tabla `tbl_items_filtro`
--

INSERT INTO `tbl_items_filtro` (`id_item_filtro`, `nombre_item_filtro`, `fk_item_filtro`) VALUES
(5, 'Azul', 6),
(6, 'Celeste', 6),
(12, 'S', 3),
(13, 'M', 3),
(14, 'L', 3),
(15, 'XLL', 3),
(16, '2XXL', 3),
(17, 'TALLA 39', 7),
(18, 'TALLA 40', 7),
(19, 'TALLA 41', 7),
(20, 'filtro lista 1', 8),
(21, 'filtro lista 2', 8),
(22, 'filtro lista 22', 9),
(23, 'Perfumes ricos', 10),
(24, 'Perfumes regulares', 10),
(25, 'Perfumes feos', 10),
(26, 'Manga corta', 11),
(27, 'Manga 3/4', 11),
(28, 'Sin  manga', 11),
(29, 'Celeste', 14),
(30, 'Gris', 14),
(31, 'Negro', 14),
(32, 'Beige', 14),
(33, 'Otros', 14),
(34, 'Rayas', 16),
(35, 'Estampados', 16),
(36, 'Cuadros', 16),
(37, 'Color entero', 16),
(38, 'Lino', 16),
(39, 'Slim', 15),
(40, 'Regular', 15),
(41, 'Clasic', 15),
(42, 'Manga corta', 17),
(43, 'Manga larga', 17),
(44, 'Manga tipo 3/4', 17),
(45, 'Ocre', 14),
(46, 'Small', 13),
(47, 'Medium', 13),
(48, 'Large', 13),
(49, '39', 7),
(50, 'Negro noche', 20),
(51, 'Azul cielo', 20),
(54, 'S', 22),
(55, 'AZUL', 23),
(56, 'NEGRO', 23),
(57, 'Lux', 26),
(58, 'Estela', 26),
(59, 'Venecia', 26),
(60, 'Times', 26),
(61, 'Golf', 26),
(62, 'Baffie', 26),
(63, 'Skull', 26),
(64, 'Sptus', 26),
(65, 'Pono', 26),
(66, 'Fyniant', 26),
(67, 'Vino', 6),
(68, 'Verde', 6),
(69, 'Guinda', 6),
(70, 'Celeste estampado', 6),
(71, 'Crema', 6),
(72, 'Rojo', 6),
(73, 'Azul estampado', 6),
(74, 'S', 44),
(75, 'M', 44),
(76, 'L', 44),
(77, 'XLL', 44),
(78, '2XLL', 44),
(79, '100', 49),
(80, '110', 49),
(81, '150', 49),
(82, 'Manga corta', 28),
(83, 'Manga larga', 28),
(84, 'Manga 3/4', 28),
(85, 'Slim', 27),
(86, 'Regular', 27),
(87, 'Clasic', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_magazines`
--

CREATE TABLE IF NOT EXISTS `tbl_magazines` (
  `id_ma` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_ma` longtext COLLATE utf8_unicode_ci NOT NULL,
  `foto1_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto2_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto3_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto4_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto5_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto6_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto7_ma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orden_ma` int(10) NOT NULL,
  PRIMARY KEY (`id_ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `tbl_magazines`
--

INSERT INTO `tbl_magazines` (`id_ma`, `titulo_ma`, `subtitulo_ma`, `descripcion_ma`, `foto1_ma`, `foto2_ma`, `foto3_ma`, `foto4_ma`, `foto5_ma`, `foto6_ma`, `foto7_ma`, `orden_ma`) VALUES
(10, 'LUJOS ILIMITADOS', 'Magazine by Royalty', 'No illusion, they may be mini but they play a major part in making an impact on your look. With a little design prestidigitation, your mighty IT bag has been nanofied. These tiny totes and satchels are versatile, easily transitioning from day to evening with the ever mercurial shoulder strap turning shoulder bag into clutch in seconds. These elegant little packages appear in colors and hues that enliven and in a plethora of shapes and styles that', '160306104354magazine_3.jpg', '160306104354detalle_magazine_1.jpg', '160306104354detalle_magazine_2.jpg', '160509110553magazine7.jpg', '160509110553magazine6.jpg', '160509110553magazine5.jpg', '160509110553magazine4.jpg', 2),
(12, 'LUJOS ILIMITADOS', 'Magazine by Royalty', 'IT bag has been nanofied. These tiny totes and satchels are versatile, easily transitioning from day to evening with the ever mercurial shoulder strap turning shoulder bag into clutch in seconds. These elegant little packages appear in colors and hues that enliven and in a plethora of shapes and styles that', '160509070347magazine9.jpg', '160509110414magazine9.jpg', '160306104657detalle_magazine_2.jpg', '160509110414magazine7.jpg', '160509110414magazine6.jpg', '160509110414magazine5.jpg', '160509110414magazine4.jpg', 1),
(13, 'LUJOS ILIMITADOS', 'Magazine Hombre - by Royalty', 'Para el hombre que no tiene miedo de empujar el sobre con un estilo convencional. Que atrae la atenciÃ³n los colores, cuadros fuertes y colores vivos combinados con tendencias clÃ¡sicas y minimalistas crean un comunicado todavÃ­a claro refinada que las reglas estÃ¡n hechas para romperse.', '160509070112magazine2.jpg', '160509110135magazine13.jpg', '160509070112magazine5.jpg', '160509070112magazine4.jpg', '160509070112magazine6.jpg', '160509070112magazine7.jpg', '160509070112magazine8.jpg', 0),
(14, 'LUJOS ILIMITADOS', 'Magazine by Royalty', 'IT bag has been nanofied. These tiny totes and satchels are versatile, easily transitioning from day to evening with the ever mercurial shoulder strap turning shoulder bag into clutch in seconds. These elegant little packages appear in colors and hues that enliven and in a plethora of shapes and styles that.', '160509071407magazine10.jpg', '160509071407magazine3.jpg', '160509071407magazine8.jpg', '160509071407magazine7.jpg', '160509071407magazine5.jpg', '160509071407magazine4.jpg', '160509071407magazine6.jpg', 3),
(15, 'LUJOS ILIMITADOS', 'Magazine by Royalty', 'No illusion, they may be mini but they play a major part in making an impact on your look. With a little design prestidigitation, your mighty IT bag has been nanofied. These tiny totes and satchels are versatile, easily transitioning from day to evening with the ever mercurial shoulder strap turning shoulder bag into clutch in seconds. These elegant little packages appear in colors and hues that enliven and in a plethora of shapes and styles that', '160509073316magazine13.jpg', '160913034958catint.jpg', '160509071821magazine8.jpg', '160509071821magazine7.jpg', '160509071821magazine5.jpg', '160509071821magazine4.jpg', '160509071821magazine6.jpg', 6),
(17, 'LUJOS ILIMITADOS', 'Magazine by Royalty', 'No illusion, they may be mini but they play a major part in making an impact on your look. With a little design prestidigitation, your mighty IT bag has been nanofied. These tiny totes and satchels are versatile, easily transitioning from day to evening with the ever mercurial shoulder strap turning shoulder bag into clutch in seconds. These elegant little packages appear in colors and hues that enliven and in a plethora of shapes and styles that', '160509073201magazine11.jpg', '160509072605magazine3.jpg', '160509072605magazine6.jpg', '160509072605magazine8.jpg', '160509072605magazine7.jpg', '160509072605magazine5.jpg', '160509072605magazine4.jpg', 4),
(18, 'LUJOS ILIMITADOS PARA HOMBRES', 'Magazine by Royalty', 'No illusion, they may be mini but they play a major part in making an impact on your look. With a little design prestidigitation, your mighty IT bag has been nanofied. These tiny totes and satchels are versatile, easily transitioning from day to evening with the ever mercurial shoulder strap turning shoulder bag into clutch in seconds. These elegant little packages appear in colors and hues that enliven and in a plethora of shapes and styles that', '160509111145magazine12.jpg', '160509111145magazine13.jpg', '160509111145magazine7.jpg', '160509111145magazine8.jpg', '160509111145magazine6.jpg', '160509111145magazine5.jpg', '160509111145magazine4.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_magazines_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_magazines_productos` (
  `id_ma_pro` int(10) NOT NULL AUTO_INCREMENT,
  `fkmagazine_ma_pro` int(10) NOT NULL,
  `fkproducto_ma_pro` int(10) NOT NULL,
  PRIMARY KEY (`id_ma_pro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tbl_magazines_productos`
--

INSERT INTO `tbl_magazines_productos` (`id_ma_pro`, `fkmagazine_ma_pro`, `fkproducto_ma_pro`) VALUES
(6, 12, 21),
(5, 12, 20),
(4, 12, 19),
(7, 10, 19),
(8, 10, 20),
(9, 10, 21),
(10, 13, 19),
(11, 13, 20),
(12, 13, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas`
--

CREATE TABLE IF NOT EXISTS `tbl_marcas` (
  `id_marca` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(100) NOT NULL,
  `url_page_tbl` varchar(900) NOT NULL,
  `foto1_marca` varchar(100) NOT NULL,
  `foto2_marca` varchar(100) NOT NULL,
  `banner_marca` varchar(100) NOT NULL,
  `orden_marca` int(10) NOT NULL,
  `_id_seo` int(11) NOT NULL,
  PRIMARY KEY (`id_marca`),
  KEY `_id_seo` (`_id_seo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tbl_marcas`
--

INSERT INTO `tbl_marcas` (`id_marca`, `nombre_marca`, `url_page_tbl`, `foto1_marca`, `foto2_marca`, `banner_marca`, `orden_marca`, `_id_seo`) VALUES
(2, 'Rock & Republic', '', '161013064258rock_and_republic.png', '160125030516marca_1.jpg', '1609060806171.jpg', 2, 0),
(3, 'Aeropostale', 'aeropostale', '161013064245aeropostale.png', '160125030617marca_2.jpg', '160125030617detalle_marca_1.jpg', 0, 3),
(4, 'Innovatore', 'innovatore', '161013064212innovatore.png', '160509105330marca_3.jpg', '160507094048banner_innovator.jpg', 0, 1),
(5, 'Ritzy of Italy', '', '161013064313ritzy_of_italy.png', '160517033619marca_4.jpg', '1602011232381.jpg', 3, 0),
(6, 'Renzo Lucciano', '', '161013064538renzo_lucciano.png', '160125032118marca_5.jpg', '1602010349421.jpg', 5, 0),
(7, 'Hartzvolk', '', '161013064552hartzvolk.png', '160915013531160509105330marca_3.jpg', '1602010403111.jpg', 6, 0),
(8, 'Stropicciato', '', '161013064604stropicciato.png', '160125032319marca_7.jpg', '1609060805091.jpg', 7, 0),
(9, 'Scombro', '', '160927111350scombro.png', '160930043449scombro.jpg', '1602010157551.jpg', 4, 0),
(10, 'Etiqueta Negra', '', '161014041637etiqueta_negra.png', '160930043606etiqueta-negra.jpg', '160927120010151112114845banner.jpg', 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_new_arrivals`
--

CREATE TABLE IF NOT EXISTS `tbl_new_arrivals` (
  `id_new_arrivals` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_new_arrivals` varchar(250) NOT NULL,
  `banner_new_arrivals` varchar(100) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  `foto4` varchar(100) NOT NULL,
  `foto5` varchar(100) NOT NULL,
  `foto6` varchar(100) NOT NULL,
  `tipo_foto1` varchar(100) NOT NULL,
  `tipo_foto2` varchar(100) NOT NULL,
  `tipo_foto3` varchar(100) NOT NULL,
  `tipo_foto4` varchar(100) NOT NULL,
  `tipo_foto5` varchar(100) NOT NULL,
  `tipo_foto6` varchar(100) NOT NULL,
  PRIMARY KEY (`id_new_arrivals`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_new_arrivals`
--

INSERT INTO `tbl_new_arrivals` (`id_new_arrivals`, `titulo_new_arrivals`, `banner_new_arrivals`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `tipo_foto1`, `tipo_foto2`, `tipo_foto3`, `tipo_foto4`, `tipo_foto5`, `tipo_foto6`) VALUES
(1, 'New Arrivals Hombres', '160923025216151112114845banner.jpg', '160923025216160125025726foto_detalle_1.jpg', '160923025250160125025813foto_detalle_2.jpg', '160923025216151112114701detalle_marca_2.jpg', '160923025216151111120856box_2.jpg', '160923025216160125025819foto_detalle_3.jpg', '160923025216160125030516detalle_marca_1.jpg', '1', '1', '4', '1', '2', '5'),
(2, 'New Arrivals NiÃ±os', '160928120743160410011440pantalon-azul-(4).jpg', '16092812044502.jpg', '160922045341151111120856box_2.jpg', '160923095615160125025808foto_detalle_1.jpg', '160922045341160125025813foto_detalle_2.jpg', '1609220511201.jpg', '1609220511203.jpg', '1', '5', '1', '3', '1', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ofertas`
--

CREATE TABLE IF NOT EXISTS `tbl_ofertas` (
  `id_oferta` int(10) NOT NULL AUTO_INCREMENT,
  `desde_oferta` date NOT NULL,
  `hasta_oferta` date NOT NULL,
  `fkproducto_oferta` int(10) NOT NULL,
  `fkcategoria_oferta` int(10) NOT NULL,
  `estado_oferta` int(10) NOT NULL,
  PRIMARY KEY (`id_oferta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tbl_ofertas`
--

INSERT INTO `tbl_ofertas` (`id_oferta`, `desde_oferta`, `hasta_oferta`, `fkproducto_oferta`, `fkcategoria_oferta`, `estado_oferta`) VALUES
(12, '0000-00-00', '0000-00-00', 36, 4, 0),
(13, '0000-00-00', '0000-00-00', 37, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ordenes`
--

CREATE TABLE IF NOT EXISTS `tbl_ordenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'Pendiente',
  `fecha_ingreso` datetime DEFAULT NULL,
  `id_cliente` int(10) NOT NULL,
  `total` decimal(10,2) DEFAULT '0.00',
  `moneda` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'PEN',
  `total_transaccion` decimal(10,2) DEFAULT '0.00',
  `moneda_transaccion` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'PEN',
  `forma_pago` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `respuesta_pasarela` mediumtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`,`codigo`),
  KEY `fk_tbl_ordenes_1_idx` (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `tbl_ordenes`
--

INSERT INTO `tbl_ordenes` (`id`, `codigo`, `estado`, `fecha_ingreso`, `id_cliente`, `total`, `moneda`, `total_transaccion`, `moneda_transaccion`, `forma_pago`, `respuesta_pasarela`) VALUES
(1, 'nAM2z4Jxw9bS4kbVGsvS8CUExVFNynvtMrCkmAxQZXSuE', 'Pendiente', '2016-04-22 20:22:54', 13, '834.00', 'PEN', '0.00', 'PEN', 'paypal', NULL),
(2, 'PSsGkSFTKVa5kSqtdGnb5KXyR7TFJEpHjkWpKYKdVjv65', 'Pendiente', '2016-04-22 20:34:10', 14, '278.00', 'PEN', '0.00', 'PEN', 'credit', NULL),
(3, 'MbVzE8RexfXwzEDXVBpgJwRCYcT3yJ22cdHYgKB9Vkkuc', 'Pendiente', '2016-05-02 11:53:37', 11, '139.00', 'PEN', '0.00', 'PEN', 'credit', NULL),
(4, 'aXDrGM28uz3fN82cZXwQuAd5yfuEfQ2ekDgFtW2KrG6f9', 'Pendiente', '2016-05-02 22:31:32', 16, '278.00', 'PEN', '0.00', 'PEN', 'credit', NULL),
(5, 'M67DUjZ2J54QVfNDnseetMuuAbKyeWv4gcnw5bDvMVsGt', 'Pendiente', '2016-05-03 11:06:09', 14, '139.00', 'PEN', '0.00', 'PEN', 'paypal', NULL),
(6, 'NJSafEkZ3b4GDVKTX4K4QMhujk3JHJRdyYbCHkTDSEwEt', 'Pendiente', '2016-05-03 11:23:30', 11, '278.00', 'PEN', '0.00', 'PEN', 'credit', NULL),
(7, 'Zv5yGUwMUxygfgKdYenfMZ3vWFMpST9GDxuCeSGbw4Nne', 'Pendiente', '2016-05-03 11:47:55', 14, '278.00', 'PEN', '0.00', 'PEN', 'credit', NULL),
(8, 'dYtDc9XK98f2Y6qYwtTCtTB6Br725Vd5m339z53XMQEQT', 'Pendiente', '2016-05-03 18:59:16', 5, '111.00', 'PEN', '0.00', 'PEN', 'deposit', NULL),
(9, 'KNt99duHkX7VmCyGXRsxg5tPrDqWzBxMbvqm8n64tFusy', 'Pendiente', '2016-05-03 19:01:15', 5, '444.00', 'PEN', '0.00', 'PEN', 'cash', NULL),
(10, 'rmerXnBGSnDNAcvnmPcjrWjGGdjWFSkBnG77spr5ZDEMe', 'Pendiente', '2016-05-03 19:16:38', 5, '600.00', 'PEN', '0.00', 'PEN', 'credit', NULL),
(11, 'SfSxVdc4MSeJShgd8a2EtGqnv5DyzZdpAUx3WneehmrUU', 'Pendiente', '2016-05-04 21:36:41', 17, '99.00', 'PEN', '0.00', 'PEN', 'paypal', NULL),
(12, 'wJHbQf5n2CySNg9hM6RyCrSsSpEQGq9ZFtYB822nxYsnR', 'Pendiente', '2016-05-05 11:30:32', 18, '139.00', 'PEN', '0.00', 'PEN', 'paypal', NULL),
(13, '5eNRgCZAEhFhv3EjXNE3QSzuf44Snez682XZRukh4tUXn', 'Pendiente', '2016-05-17 16:04:42', 20, '39.00', 'PEN', '0.00', 'PEN', 'paypal', NULL),
(14, 'kAQ5p7g5hthcjbxQddZwDJdzyfSKPEv3b5B4CjqRehnrA', 'Pendiente', '2016-05-17 16:05:25', 20, '39.00', 'PEN', '0.00', 'PEN', 'credit', NULL),
(15, 'TT2MNd2t2CWkuuDjM4mYQcpbKzzm9uKbWMjNqYQvkQedY', 'Pendiente', '2016-05-17 16:06:04', 20, '39.00', 'PEN', '0.00', 'PEN', 'deposit', NULL),
(16, 'eVrJjVdTbMjwcYxc2unQG8xJMQ9HjpUwJgy7RTNGvqCWb', 'Pendiente', '2016-05-17 16:07:31', 20, '79.00', 'PEN', '0.00', 'PEN', 'cash', NULL),
(17, 'S4tT2fxWJWaE4Kxka9dehkzZdpYpGctXE4ptZQ6p2C8Yg', 'Pendiente', '2016-07-13 10:49:46', 5, '300.00', 'PEN', '0.00', 'PEN', 'deposit', NULL),
(18, 'TkpzAwKSdpGfZ6BexbUqf7GUeH9q596UnT8D56JhbtBtA', 'Pendiente', '2016-07-13 10:54:03', 5, '900.00', 'PEN', '0.00', 'PEN', 'deposit', NULL),
(19, 'ft59vGHFJtzYSnZAJ3m4TmAA6zKzUSVXagdx66BTKfpxk', 'Pendiente', '2016-08-17 20:36:55', 5, '1950.00', 'PEN', '0.00', 'PEN', 'deposit', NULL),
(20, '3ke9Rqgb7DHBfuU3z5yCast7X7ykUJjGJYbr8NhK76td5', 'Pendiente', '2016-08-24 11:46:57', 5, '750.00', 'PEN', '0.00', 'PEN', 'cash', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id_page_tbl` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_page_tbl` varchar(50) NOT NULL,
  `url_page_tbl` varchar(800) NOT NULL,
  `plantilla_page_tbl` varchar(30) NOT NULL,
  `estado_page_tbl` char(1) NOT NULL,
  `orden_page_tbl` int(11) NOT NULL,
  `parent_page_tbl` int(11) NOT NULL,
  `tabla_page_tbl` varchar(26) NOT NULL,
  `id_tabla_page_tbl` int(11) NOT NULL,
  `fk_id_seo` int(11) NOT NULL,
  PRIMARY KEY (`id_page_tbl`),
  KEY `fk_id_seo` (`fk_id_seo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_page`
--

INSERT INTO `tbl_page` (`id_page_tbl`, `titulo_page_tbl`, `url_page_tbl`, `plantilla_page_tbl`, `estado_page_tbl`, `orden_page_tbl`, `parent_page_tbl`, `tabla_page_tbl`, `id_tabla_page_tbl`, `fk_id_seo`) VALUES
(1, '', 'innovatore', 'marca', 'a', 0, 0, 'tbl_marcas', 4, 1),
(2, '', 'camisas', 'tipos_prenda', 'a', 0, 0, 'tbl_marcas', 1, 2),
(3, '', 'aeropostale', 'marca', 'a', 0, 0, 'tbl_marcas', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pagos`
--

CREATE TABLE IF NOT EXISTS `tbl_pagos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `datos_array` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email_cliente` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_pago` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email_empresa` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `comision` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_cancelado` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `orden` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_pagos`
--

INSERT INTO `tbl_pagos` (`id`, `datos_array`, `email_cliente`, `fecha_pago`, `total`, `estado`, `txn_id`, `email_empresa`, `comision`, `fecha_cancelado`, `orden`) VALUES
(1, '21-1,-0-8', 'millyt-buyer@netkrom.com', '09:38:45 Mar 19, 2016 PDT', '139.00', 'Completed', '77D367657M341483W', 'millyt-facilitator@netkrom.com', '4.33', '09:38:45 Mar 19, 2016 PDT', 'RY03192016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_popup`
--

CREATE TABLE IF NOT EXISTS `tbl_popup` (
  `id_popup` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_popup` varchar(100) CHARACTER SET utf8 NOT NULL,
  `des_popup` longtext CHARACTER SET utf8 NOT NULL,
  `ancho_popup` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `titulo_popup` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_popup`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `tbl_popup`
--

INSERT INTO `tbl_popup` (`id_popup`, `nombre_popup`, `des_popup`, `ancho_popup`, `titulo_popup`) VALUES
(1, 'ULTIMAS PROMOCIONES', '<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\n	<tbody>\n		<tr>\n			<td><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Special Offer<br />\n			$15 Off a $100 Order<br />\n			$25 Off a $150 Order<br />\n			$50 Off a $250 Order</strong></span></span></td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>\n			<div style="width:100%; height:1px;background-color:#666">&nbsp;</div>\n			</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>TO REDEEM OFFERS:</strong></span></span>\n			<ul>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Add qualifying items totaling $100 or more to your shopping bag.</strong></span></span></li>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Enter offer code FALL2015 at checkout.</strong></span></span></li>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Discount will be deducted after offer code is applied.</strong></span></span></li>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Valid through 11:59pm PT September 9, 2015.</strong></span></span></li>\n			</ul>\n			<span style="font-family:arial,helvetica,sans-serif"> <span style="font-size:12px"><strong> OFFER EXCLUDES THE FOLLOWING:</strong></span></span>\n\n			<ul>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Clearance (items with prices ending in $.99), non-Victoria&rsquo;s Secret brands, gift cards, gift wrap &amp; kits, store and previous purchases do not qualify toward offer eligibility.</strong></span></span></li>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Shipping &amp; handling and taxes do not qualify towards the minimum purchase.</strong></span></span></li>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Not valid with shipping offers or other offers that provide discounts on your entire order.</strong></span></span></li>\n			</ul>\n\n			<p><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>OFFER EXCLUDES THE FOLLOWING:</strong></span></span></p>\n\n			<ul>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Clearance (items with prices ending in $.99), non-Victoria&rsquo;s Secret brands, gift cards, gift wrap &amp; kits, store and previous purchases do not qualify toward offer eligibility.</strong></span></span></li>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Shipping &amp; handling and taxes do not qualify towards the minimum purchase.</strong></span></span></li>\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Not valid with shipping offers or other offers that provide discounts on your entire order.</strong></span></span></li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', '700', '$15 y $100, EN ULTIMAS PROMOCIONES Precio en soles. Código 2016.'),
(2, 'ENVÍO GRATUITO A TODO EL PERÚ', '<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">\r\n<br>\r\n			<p><span style="font-size:14px"><span style="font-family:comic sans ms,cursive"><strong>ENV&Iacute;O&nbsp;A PER&Uacute;</strong></span></span><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/icono_peru.jpg" /></strong></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Le felicitamos comprar desde Per&uacute; con:</strong></span></span>\r\n			<ul>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Todos los precios en nuevo sol peruano</strong></span></span></li>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Los aranceles y el IGV se calculan a pagar</strong></span></span></li>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Tarifas bajas para env&iacute;o internacional</strong></span></span></li>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Costo total de importaci&oacute;n (Sin cargos adicionales en la entrega)</strong></span></span></li>\r\n			</ul>\r\n			<span style="font-family:arial,helvetica,sans-serif"> <span style="font-size:12px"> <strong> Informaci&oacute;n adicional sobre env&iacute;os internacionales esta disponible en nuestro sitio Web: <a href="http://www.royalty.pe">http://www.royalty.pe</a></strong></span></span><br />\r\n			&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '400', ''),
(3, 'Políticas', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>POL&Iacute;TICA DE DEVOLUCIONES</strong></p>\r\n\r\n			<p><strong>&iquest;Cu&aacute;nto tiempo tengo para solicitar la devoluci&oacute;n?</strong></p>\r\n\r\n			<p>Usted tendr&aacute; un lapso de 15 d&iacute;as h&aacute;biles a partir del d&iacute;a en que se entreg&oacute; su pedido.</p>\r\n\r\n			<p><strong>&iquest;Cu&aacute;les son las instrucciones para la devoluci&oacute;n de un producto?</strong></p>\r\n\r\n			<p>Para devolver un producto, es necesario seguir estas instrucciones:</p>\r\n\r\n			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. Comunicarse con nuestro equipo de atenci&oacute;n al cliente para comenzar el tr&aacute;mite de tu devoluci&oacute;n. Ellos le guiaran en todo el proceso.</p>\r\n\r\n			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. Si su solicitud es autorizada, programaremos una recogida del producto a la direcci&oacute;n que nos indique. Aseg&uacute;rese de entregar los art&iacute;culos en su embalaje original y de que todos los art&iacute;culos de ropa o calzado cuentan con las etiquetas originales.</p>\r\n\r\n			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. Antes de llamar a nuestra l&iacute;nea de atenci&oacute;n al cliente, aseg&uacute;rese de que tiene la siguiente informaci&oacute;n a mano:</p>\r\n\r\n			<p>&middot; N&uacute;mero de pedido</p>\r\n\r\n			<p>&middot; Fecha del pedido</p>\r\n\r\n			<p>&middot; Direcci&oacute;n de recogida</p>\r\n\r\n			<p>&middot; N&uacute;mero de tel&eacute;fono</p>\r\n\r\n			<p><strong>&iquest;A d&oacute;nde debo comunicarme para iniciar un proceso de devoluci&oacute;n?</strong></p>\r\n\r\n			<p>Puedes ponerte en contacto mediante nuestro centro de Servicio al cliente Royalty, enviandonos un correo electr&oacute;nico a la direcci&oacute;n <a href="mailto:atencionalcliente@royalty.pe">atencionalcliente@royalty.pe</a></p>\r\n\r\n			<p><strong>Quiero un reembolso de dinero, &iquest;c&oacute;mo se realiza el proceso?</strong></p>\r\n\r\n			<p>En caso de que necesites la devoluci&oacute;n de tu dinero ya sea por retracto de Compra o por falla t&eacute;cnica o Calidad, es necesario que te comuniques a nuestro centro de atenci&oacute;n a clientes para iniciar el proceso.&nbsp; El reembolso se realizar&aacute; independientemente del m&eacute;todo de pago bajo el siguiente proceso:</p>\r\n\r\n			<p>Para poder realizar el reembolso, es necesario llenar el formulario de reembolso que recibir&aacute; despu&eacute;s de realizada la solicitud de devoluci&oacute;n con los datos bancarios de la cuenta a donde se reintegrar&aacute; el dinero, siempre y cuando se cumpla con los t&eacute;rminos y condiciones de devoluci&oacute;n.</p>\r\n\r\n			<p>Los reembolsos de productos devueltos por calidad ser&aacute;n tramitados en un plazo de 25 d&iacute;as h&aacute;biles a partir de tu solicitud de devoluci&oacute;n.</p>\r\n\r\n			<p><strong>&iquest;Realic&eacute; mi compra y no he recibido el correo de confirmaci&oacute;n?</strong></p>\r\n\r\n			<p>Es importante mencionar que si el pago lo realizaste a trav&eacute;s de un pago en l&iacute;nea, el correo de confirmaci&oacute;n por parte de Royalty lo estar&aacute; recibiendo dentro de un plazo de 72 horas, si este plazo se ha excedido y el correo de confirmaci&oacute;n a&uacute;n no lo recibes, te pedimos por favor te comuniques a nuestro centro de servicio a clientes, o bien enviar un correo electr&oacute;nico a <a href="mailto:atencionalcliente@royalty.pe">atencionalcliente@royalty.pe</a>, para que se pueda validar que la compra se haya realizado correctamente.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>POL&Iacute;TICA DE ENTREGA</strong></p>\r\n\r\n			<p><strong>Entregas Royalty:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>\r\n\r\n			<p>En Royalty realizamos entregas a todos los departamentos del Per&uacute;. Sin embargo, hay algunas &aacute;reas en donde, por el momento, las compa&ntilde;&iacute;as de mensajer&iacute;a no tienen cobertura. Pero no te preocupes, podemos enviar tu producto a otro lugar. Intenta con una nueva direcci&oacute;n o forma de pago y finaliza tu compra.</p>\r\n\r\n			<p>Recuerda que el pago contra entrega no est&aacute; disponible en todo el territorio peruano y la cobertura puede cambiar. En caso de no poder completar t&uacute; compra, por favor intenta eligiendo otra forma de pago o cambiando la direcci&oacute;n de entrega.</p>\r\n\r\n			<p>Si necesitas ayuda con tu pedido, no dudes en contactarnos. En Royalty estaremos encantados de ayudarte.</p>\r\n\r\n			<p><strong>&iquest;ROYALTY HACE ENTREGAS FUERA DE PER&Uacute;?</strong></p>\r\n\r\n			<p>No, en Royalty&nbsp; solamente realizamos env&iacute;os dentro del territorio nacional.</p>\r\n\r\n			<p>Sin embargo, se est&aacute; trabajando con nuestro equipo de desarrollo para que en un futuro no muy lejano esto sea posible.</p>\r\n\r\n			<p><strong>&iquest;QU&Eacute; COMPA&Ntilde;&Iacute;AS DE MENSAJER&Iacute;A UTILIZA ROYALTY PARA ENVIAR LOS PRODUCTOS?</strong></p>\r\n\r\n			<p>Para entregar los productos justo en la direcci&oacute;n que nos indicas, bajo las mejores condiciones y en el menor tiempo posible, &nbsp;utilizamos las compa&ntilde;&iacute;as de mensajer&iacute;a m&aacute;s grandes y confiables del Per&uacute;, como</p>\r\n\r\n			<p>Recuerda que por el momento no es posible elegir qu&eacute; mensajer&iacute;a realizar&aacute; la entrega en tu domicilio, ya que &eacute;sta es asignada autom&aacute;ticamente dependiendo de las caracter&iacute;sticas del producto (dimensiones y peso) y la zona geogr&aacute;fica en la que se entregar&aacute; el pedido.</p>\r\n\r\n			<p><strong>&iquest;CU&Aacute;L ES EL TIEMPO DE ENTREGA?</strong></p>\r\n\r\n			<p>YA REALIC&Eacute; MI COMPRA</p>\r\n\r\n			<p>Por favor, revisa la confirmaci&oacute;n que enviamos a tu correo electr&oacute;nico para conocer la fecha estimada de entrega en la que recibir&aacute;s tu producto.</p>\r\n\r\n			<p>En la fila &ldquo;Productos en tu pedido&rdquo; ver&aacute;s el n&uacute;mero aproximado de d&iacute;as h&aacute;biles que tomar&aacute; en llegar tu producto. No olvides que los d&iacute;as h&aacute;biles excluyen s&aacute;bados, domingos y d&iacute;as festivos y empiezan a contar a partir del d&iacute;a en que recibes el correo de confirmaci&oacute;n, el cual no necesariamente es el mismo d&iacute;a de la compra.</p>\r\n\r\n			<p>Recuerda que el tiempo de entrega depende de diferentes factores:</p>\r\n\r\n			<ul>\r\n				<li>Caracter&iacute;sticas del producto (peso, dimensiones).</li>\r\n				<li>Distancia entre el lugar de env&iacute;o y el lugar de entrega.</li>\r\n				<li>Forma de pago</li>\r\n			</ul>\r\n\r\n			<p><strong>&iquest;PUEDO ELEGIR UNA FECHA Y HORA PARA LA ENTREGA DE MI PRODUCTO?</strong></p>\r\n\r\n			<p>No, desafortunadamente no podemos agendar ninguna fecha u hora para entregar tus productos, ya que cada mensajer&iacute;a cuenta con rutas espec&iacute;ficas a seguir seg&uacute;n la zona geogr&aacute;fica. Sin embargo, cuando tu producto sea enviado, te enviaremos un correo donde podr&aacute;s conocer la fecha estimada de entrega.</p>\r\n\r\n			<p><strong>ACERCA DE ENV&Iacute;OS GRATIS</strong></p>\r\n\r\n			<p>Para Lima Metropolitana y el Callao el env&iacute;o es GRATIS y llega en un estimado de &nbsp;48 horas a 72 horas laborables.</p>\r\n\r\n			<p>Para env&iacute;os a domicilio en Provincias es GRATIS si el monto de compra es mayor a S/. 200.00 de lo contrario el costo de env&iacute;o es de S/. 15.00 por art&iacute;culo.</p>\r\n\r\n			<p>No se hacen env&iacute;os los domingos ni d&iacute;as feriados.</p>\r\n\r\n			<p>El rango de tiempo estimado de entrega a provincias var&iacute;a de acuerdo a la zona.</p>\r\n\r\n			<p>Tabla de referencias</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '700', ''),
(6, 'Mapa de sitio', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Inicio</li>\r\n	<li>Marcas\r\n	<ol>\r\n		<li>Innovatore</li>\r\n		<li>Aeropostale</li>\r\n		<li>Rock &amp; Republic</li>\r\n		<li>Ritzy of Italy</li>\r\n		<li>Scombro</li>\r\n		<li>Renzo Lucciano</li>\r\n		<li>Hartzvolk</li>\r\n		<li>Stropicciato</li>\r\n		<li>Etiqueta Negra</li>\r\n	</ol>\r\n	</li>\r\n	<li>Camisas\r\n	<ol>\r\n		<li>Compra por Ocasi&oacute;n\r\n		<ol>\r\n			<li>Casual</li>\r\n			<li>Oficina</li>\r\n			<li>Urbano</li>\r\n			<li>Al aire libre</li>\r\n			<li>Elegante</li>\r\n			<li>Fiesta</li>\r\n			<li>Para la playa</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por color\r\n		<ol>\r\n			<li>Blanco</li>\r\n			<li>Azul</li>\r\n			<li>Celeste</li>\r\n			<li>Rojo</li>\r\n			<li>Verde</li>\r\n			<li>Negro</li>\r\n			<li>Vino</li>\r\n			<li>Guinda</li>\r\n			<li>Celeste estampado</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por largo de manga\r\n		<ol>\r\n			<li>Manga larga</li>\r\n			<li>Manga corta</li>\r\n			<li>Manga 3/4</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por entalle\r\n		<ol>\r\n			<li>Slim</li>\r\n			<li>Regular</li>\r\n			<li>Classic</li>\r\n		</ol>\r\n		</li>\r\n		<li>&iquest;Qu&eacute; est&aacute; de moda?\r\n		<ol>\r\n			<li>Tendencias</li>\r\n			<li>M&aacute;s vendidos</li>\r\n			<li>Top 10 b&aacute;sicas</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por dise&ntilde;o\r\n		<ol>\r\n			<li>Rayas</li>\r\n			<li>Estampados</li>\r\n			<li>Cuadros</li>\r\n			<li>Color entero</li>\r\n			<li>Lino</li>\r\n			<li>Corduroy</li>\r\n			<li>Denin</li>\r\n			<li>Estructuras</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra m&aacute;s y ahorra\r\n		<ol>\r\n			<li>50 a menos</li>\r\n			<li>2 * 100 Sale camisas</li>\r\n			<li>2 * 200 Colecci&oacute;n</li>\r\n			<li>2 * 300 Quedan pocas</li>\r\n			<li>300 a m&aacute;s &uacute;ltimas</li>\r\n		</ol>\r\n		</li>\r\n		<li>Reci&eacute;n llegados</li>\r\n	</ol>\r\n	</li>\r\n	<li>Zapatos\r\n	<ol>\r\n		<li>Compra por categor&iacute;a\r\n		<ol>\r\n			<li>Oxfords</li>\r\n			<li>Mocasiones</li>\r\n			<li>Zapatillas</li>\r\n			<li>Botas</li>\r\n			<li>Top sider</li>\r\n			<li>Sandalias</li>\r\n			<li>Plantillas y accesorios</li>\r\n			<li>Limpieza y lustrado</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por estilo\r\n		<ol>\r\n			<li>Confort</li>\r\n			<li>Alta moda</li>\r\n			<li>Dise&ntilde;o</li>\r\n			<li>Elegante</li>\r\n			<li>Casual</li>\r\n			<li>Cl&aacute;sico</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra m&aacute;s y ahorra\r\n		<ol>\r\n			<li>Tendencia</li>\r\n			<li>100 a menos</li>\r\n			<li>200 a menos</li>\r\n			<li>300 a menos</li>\r\n			<li>300 a m&aacute;s</li>\r\n		</ol>\r\n		</li>\r\n		<li>&iquest;Qu&eacute; est&aacute; de moda?\r\n		<ol>\r\n			<li>Tendencias</li>\r\n			<li>M&aacute;s vendidos</li>\r\n			<li>Top 10 b&aacute;sicas</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por talla\r\n		<ol>\r\n			<li>38</li>\r\n			<li>39</li>\r\n			<li>40</li>\r\n			<li>41</li>\r\n			<li>42</li>\r\n			<li>43</li>\r\n			<li>44</li>\r\n			<li>45</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por ocasi&oacute;n\r\n		<ol>\r\n			<li>Vestir</li>\r\n			<li>Casual</li>\r\n			<li>Oficina</li>\r\n			<li>Bodas</li>\r\n			<li>Al aire libre</li>\r\n			<li>Fiesta</li>\r\n			<li>De vuelta al colegio</li>\r\n			<li>Para la playa</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por color\r\n		<ol>\r\n			<li>Negro</li>\r\n			<li>Blanco</li>\r\n			<li>Azul</li>\r\n			<li>Natural</li>\r\n			<li>Burgundy</li>\r\n			<li>Marr&oacute;n</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por marca</li>\r\n	</ol>\r\n	</li>\r\n	<li>Polos\r\n	<ol>\r\n		<li>Compra por dise&ntilde;o\r\n		<ol>\r\n			<li>Listado</li>\r\n			<li>Color entero</li>\r\n			<li>Estampadas</li>\r\n			<li>Denin</li>\r\n			<li>Estructuras</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por entalle\r\n		<ol>\r\n			<li>Slim</li>\r\n			<li>Regular</li>\r\n			<li>Classic</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra m&aacute;s y ahorra\r\n		<ol>\r\n			<li>50 a menos</li>\r\n			<li>100 a menos</li>\r\n			<li>200 a menos</li>\r\n			<li>300 a menos</li>\r\n			<li>300 a m&aacute;s</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por color\r\n		<ol>\r\n			<li>Blanco</li>\r\n			<li>Azul</li>\r\n			<li>Celeste</li>\r\n			<li>Gris</li>\r\n			<li>Verde</li>\r\n			<li>Negro</li>\r\n			<li>Beige</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por estilo\r\n		<ol>\r\n			<li>Cuello camisero</li>\r\n			<li>Cuello rendondo</li>\r\n			<li>Cuello V</li>\r\n		</ol>\r\n		</li>\r\n		<li>&iquest;Qu&eacute; est&aacute; de moda?\r\n		<ol>\r\n			<li>Tendencias</li>\r\n			<li>Top 10 B&aacute;sicos</li>\r\n			<li>M&aacute;s vendidos</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por largo de manga\r\n		<ol>\r\n			<li>Manga larga</li>\r\n			<li>Manga corta</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por talla</li>\r\n	</ol>\r\n	</li>\r\n	<li>Pantalones\r\n	<ol>\r\n		<li>Compra por categor&iacute;a\r\n		<ol>\r\n			<li>Khakis</li>\r\n			<li>Jeans</li>\r\n			<li>Chinos</li>\r\n			<li>Cinco bolsillos</li>\r\n			<li>Cargo</li>\r\n			<li>Joggers</li>\r\n			<li>Bermudas</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por ocasi&oacute;n\r\n		<ol>\r\n			<li>Color entero</li>\r\n			<li>Corduroy</li>\r\n			<li>Denin</li>\r\n			<li>Estructuras</li>\r\n			<li>Estampados</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por color\r\n		<ol>\r\n			<li>Blanco</li>\r\n			<li>Azul</li>\r\n			<li>Celeste</li>\r\n			<li>Gris</li>\r\n			<li>Verde</li>\r\n			<li>Negro</li>\r\n			<li>Beige</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por entalle\r\n		<ol>\r\n			<li>Slim</li>\r\n			<li>Straight</li>\r\n			<li>Skinny</li>\r\n			<li>Relaxed</li>\r\n			<li>Standard</li>\r\n		</ol>\r\n		</li>\r\n		<li>&iquest;Qu&eacute; est&aacute; de moda?\r\n		<ol>\r\n			<li>Tendencias</li>\r\n			<li>Top 10 B&aacute;sicos</li>\r\n			<li>M&aacute;s vendidos</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra por dise&ntilde;o\r\n		<ol>\r\n			<li>Color entero</li>\r\n			<li>Corduroy</li>\r\n			<li>Denin</li>\r\n			<li>Estructuras</li>\r\n			<li>Estampados</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra m&aacute;s y ahorra\r\n		<ol>\r\n			<li>De 50 a menos</li>\r\n			<li>De 100 a menos</li>\r\n			<li>De 200 a menos</li>\r\n			<li>De 300 a menos</li>\r\n			<li>De 300 a m&aacute;s</li>\r\n		</ol>\r\n		</li>\r\n		<li>Reci&eacute;n llegados</li>\r\n		<li>Compra con descuentos</li>\r\n		<li>Compra por talla y largo</li>\r\n		<li>Compra por marca</li>\r\n	</ol>\r\n	</li>\r\n	<li>Ropa\r\n	<ol>\r\n		<li>Compra por categor&iacute;a\r\n		<ol>\r\n			<li>Blazers</li>\r\n			<li>Chalecos</li>\r\n			<li>Chompas</li>\r\n			<li>Pullovers</li>\r\n			<li>Casacas</li>\r\n			<li>Sweaters</li>\r\n			<li>Underwater</li>\r\n			<li>Pijamas</li>\r\n			<li>Bermudas</li>\r\n			<li>Jeans</li>\r\n		</ol>\r\n		</li>\r\n		<li>Compra m&aacute;s y ahorra\r\n		<ol>\r\n			<li>De 50 a menos</li>\r\n			<li>De 100 a menos</li>\r\n			<li>De 200 a menos</li>\r\n			<li>De 300 a menos</li>\r\n			<li>De 300 a m&aacute;s</li>\r\n		</ol>\r\n		</li>\r\n		<li>&iquest;Qu&eacute; est&aacute; de moda?\r\n		<ol>\r\n			<li>Tendencias</li>\r\n			<li>Top 10 B&aacute;sicos</li>\r\n			<li>M&aacute;s vendidos</li>\r\n		</ol>\r\n		</li>\r\n		<li>Reci&eacute;n llegados</li>\r\n		<li>Compra por talla</li>\r\n		<li>Compra con descuentos</li>\r\n		<li>Compra por marca</li>\r\n	</ol>\r\n	</li>\r\n	<li>Accesorios</li>\r\n	<li>Asesor&iacute;a</li>\r\n	<li>Cat&aacute;logo</li>\r\n	<li>Oferta</li>\r\n	<li>Ayuda\r\n	<ol>\r\n		<li>Servicio al cliente</li>\r\n		<li>Estilos &amp; consejos fit</li>\r\n		<li>Chat en vivo</li>\r\n	</ol>\r\n	</li>\r\n	<li>Mi cuenta Royalty\r\n	<ol>\r\n		<li>Mi cuenta</li>\r\n		<li>Lista de deseos</li>\r\n	</ol>\r\n	</li>\r\n	<li>Suscribirse\r\n	<ol>\r\n		<li>E-mail</li>\r\n		<li>Cat&aacute;logos y actividades</li>\r\n		<li>Ofertas</li>\r\n	</ol>\r\n	</li>\r\n	<li>Royalty Card\r\n	<ol>\r\n		<li>Administra tu tarjeta</li>\r\n		<li>Beneficios</li>\r\n		<li>Hazlo ahora</li>\r\n	</ol>\r\n	</li>\r\n	<li>Asesoramiento experto</li>\r\n	<li>Ideas para regalar</li>\r\n	<li>Compra un Gift Card</li>\r\n	<li>Encuentra una tienda</li>\r\n	<li>Compra un cat&aacute;logo</li>\r\n	<li>Mi cuenta</li>\r\n</ol>\r\n', '700', ''),
(7, 'Tï¿½rminos & Noticias', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Las ofertas publicadas por Royalty en nuestro Sitio Web ser&aacute;n cumplidas por Royalty. Sin Embargo, &nbsp;no quedar&aacute; obligada por errores manifiestos de transcripci&oacute;n. Se advierte que es posible que se produzcan variaciones peque&ntilde;as de color u otro tipo de variaciones menores en productos, como consecuencia de las diferentes tecnolog&iacute;as de adquisici&oacute;n de imagen y exhibici&oacute;n, o por otras razones t&eacute;cnicas.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Los precios consignados incluyen IGV. Los precios se expresan en nuevos soles. royalty se reserva el derecho de hacer cambios en los precios y el producto con anterioridad a un pedido realizado por usted. royalty se reserva el derecho a cambiar, limitar o dar por terminadas ofertas especiales o promociones en cualquier momento, siempre que as&iacute; haya sido previamente informado a los consumidores desde su inicio.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Usted podr&aacute; dejar sin efecto la compra por un producto comprado online dentro del plazo de 10 d&iacute;as h&aacute;biles contados desde su recepci&oacute;n, sin invocar causa y siempre que el producto no se haya deteriorado con posterioridad a su recepci&oacute;n, ya sea contact&aacute;ndose con nuestro servicio de atenci&oacute;n al a trav&eacute;s de nuestro correo electr&oacute;nico servicioalcliente@royalty.com</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>En caso de producirse una devoluci&oacute;n v&aacute;lida de acuerdo con estas&nbsp;<strong>Condiciones de Entrega</strong>, Royalty reembolsar&aacute; el precio de compra que usted haya abonado por el producto devuelto en los plazos mencionados en la&nbsp;politica de devoluciones.&nbsp;Si se devuelve un producto y royalty cree que ha sido da&ntilde;ado por un acto u omisi&oacute;n imputables a usted, o que deba correr por cualquier otro motivo por cuenta y riesgo de usted, royalty podr&aacute; deducir del importe que deba ser devuelto a usted la disminuci&oacute;n de valor del producto como consecuencia de estos da&ntilde;os. Usted podr&aacute; evitar la obligaci&oacute;n de compensar la disminuci&oacute;n de valor de un producto causado por el uso de dicho producto, si usted no usa el producto como si fuera de su propiedad y si se abstiene, tanto como sea razonablemente posible, de cualquier acci&oacute;n que pueda afectar negativamente a su valor.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Estos T&eacute;rminos y condiciones se regir&aacute;n por la legislaci&oacute;n peruana y en caso de controversias &eacute;stas se resolver&aacute;n por los tribunales competentes en el territorio del Per&uacute;.</p>\r\n', '500', ''),
(8, 'Privacidad y Seguridad', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>POL&Iacute;TICA DE PRIVACIDAD</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n			<p><strong>Efectiva desde el: 2016-02-15</strong></p>\r\n\r\n			<p>Le aseguramos que en ROYALTY.PE respetamos su privacidad y la protegemos de acuerdo a los est&aacute;ndares de la Agencia Espa&ntilde;ola de Protecci&oacute;n de Datos con lo dispuesto en su Ley Org&aacute;nica 15/1999 del 13 de diciembre relativa a la protecci&oacute;n de datos de car&aacute;cter personal. La informaci&oacute;n recibida como resultado de su compra on-line es completamente confidencial. ROYALTY.PE no vende, alquila o presta ning&uacute;n dato o informaci&oacute;n relativa a nuestros clientes a terceras personas de formas diferentes a las reflejadas a continuaci&oacute;n.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>NOS PREOCUPAMOS POR SU PRIVACIDAD</strong></p>\r\n\r\n			<p>Sepa c&oacute;mo funcionamos y cu&aacute;les son sus derechos respecto a la protecci&oacute;n de sus datos personales.</p>\r\n\r\n			<p>Dudas o preguntas respecto a nuestra pol&iacute;tica puede ser enviada a nuestro centro de informaci&oacute;n por e-mail, correo ordinario o por tel&eacute;fono. Los usuarios tienen en todo momento la posibilidad de ejercitar los derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n sobre sus datos personales en las siguientes direcciones:</p>\r\n\r\n			<p>EMAIL: <a href="mailto:info@royalty.pe">info@royalty.pe</a></p>\r\n\r\n			<p>LAVORAZIONE ATIGIANA SAC</p>\r\n\r\n			<p>RUC 20516785161<br />\r\n			Los Castillos 500 Lima 33 PERU</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>CUANDO REALIZA UN PEDIDO:</strong></p>\r\n\r\n			<p>Necesitamos su nombre, direcci&oacute;n del comprador y del destinatario, tel&eacute;fono, e-mail y la informaci&oacute;n de la tarjeta de cr&eacute;dito. Estos datos s&oacute;lo se usan para realizar su pedido y, en caso necesario, ponernos en contacto con usted para tratar alg&uacute;n tema relativo a su pedido. Al procesar los pedidos nosotros mismos, no compartimos la informaci&oacute;n con casi ninguna parte excepto cuando es estrictamente necesario con otras partes necesarias en el proceso. Para conocer la pol&iacute;tica de privacidad del Paypal deben referirse a su propia p&aacute;gina. Paypal s&oacute;lo comunica a ROYALTY.PE la aprobaci&oacute;n o no de la compra.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>SI NOS CONTACTA VIA E-MAIL</strong></p>\r\n\r\n			<p>Si nos escribe a nuestro e-mail para resolver una duda o realizar alg&uacute;n comentario nos estar&aacute; suministrando su nombre y direcci&oacute;n de correo electr&oacute;nico. S&oacute;lo usamos esa informaci&oacute;n para mandarle una respuesta apropiada.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>V&Iacute;A ROYALTY CARD Tarjeta de Privilegios</strong></p>\r\n\r\n			<p>Si se afilia al Club de Privilegios Royalty, le enviaremos anuncios especiales hasta que decida darse de baja haciendo clic en el v&iacute;nculo &quot;darse de baja&quot; que encontrar&aacute; en la parte inferior de cada correo electr&oacute;nico.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>V&Iacute;A &nbsp;SORTEO</strong></p>\r\n\r\n			<p>Para participar en nuestros Sorteos, necesitamos su nombre, direcci&oacute;n de correo, e-mail. Las reglas del sorteo establecen que usted nos da el permiso en caso de que resulte ganador de publicar su nombre, ciudad, pa&iacute;s en nuestras redes sociales. No utilizaremos sus datos personales para otros prop&oacute;sitos. Nota: tenga en cuenta que los sorteos se realizan espor&aacute;dicamente.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>V&Iacute;A CONTAR A UN AMIGO</strong></p>\r\n\r\n			<p>Royalty.pe advierte que mediante el servicio Cont&aacute;rselo a un Amigo al usuario se le pedir&aacute; el nombre y e-mail de una amigo. Esta informaci&oacute;n ser&aacute; para realizarle una invitaci&oacute;n mediante correo electr&oacute;nico y no ser&aacute; almacenada para usos en el futuro.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>INFORMACI&Oacute;N OBTENIDA AUTOM&Aacute;TICAMENTE</strong></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>ID o DNI DEL COMPRADOR</strong></p>\r\n\r\n			<p>Al visitar nuestra p&aacute;gina, le asignamos un ID &uacute;nico y tratamos de almacenarlo en su ordenador en forma de cookie. Sirve para facilitar la tramitaci&oacute;n de los pedidos y proporcionar servicios personalizados. Si no desea que se le asigne un n&uacute;mero de comprador le recomendamos que desactive la opci&oacute;n de cookies de su explorador. Le recordamos que tambi&eacute;n puede realizar un pedido a trav&eacute;s del tel&eacute;fono, fax o correo postal. Deshabilitar la opci&oacute;n de cookies puede modificar opciones de la cesta de la compra de nuestra web.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>DIRECCI&Oacute;N IP</strong></p>\r\n\r\n			<p>Guardamos las direcciones de IP para controlar el nivel de actividad de nuestro sitio, pero no unimos esto a su n&uacute;mero de identificaci&oacute;n de comprador.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>COMPARTIR INFORMACI&Oacute;N</strong></p>\r\n\r\n			<p>Nuestra pol&iacute;tica nos impide compartir su informaci&oacute;n a terceras personas, excepto las que participan en el proceso normal de entrega del pedido.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>SEGURIDAD</strong></p>\r\n\r\n			<p>Utilizamos el protocolo de seguridad SSL (Secure Socket Layer) que encripta toda la informaci&oacute;n relativa a su tarjeta de cr&eacute;dito. Para incrementar las medidas de seguridad nuestra base de datos con la informaci&oacute;n relativa a la tarjeta se borra en 24 desde que se realiza la entrega del env&iacute;o.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>LINKS/ENLACES</strong></p>\r\n\r\n			<p>Incluimos links de otras p&aacute;ginas en nuestra web. ROYALTY no se responsabiliza de las pol&iacute;ticas de privacidad y contenidos de dichos sitios.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>MODIFICACIONES</strong></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>CAMBIOS EN LA POL&Iacute;TICA DE PRIVACIDAD</strong></p>\r\n\r\n			<p>Royalty.pe podr&aacute; modificar o actualizar en todo momento su pol&iacute;tica de privacidad de acuerdo con las modificaciones de las que sean objeto la legislaci&oacute;n y las normativas que reglamentan la protecci&oacute;n de datos personales. Si us&aacute;ramos sus datos de forma diferente a la establecida en el momento de su recogida le ser&aacute; notificada v&iacute;a e-mail, usted podr&aacute; oponerse a que utilicemos su informaci&oacute;n de ese modo.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>GLOSARIO DE T&Eacute;RMINOS</strong></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>COOKIES</strong></p>\r\n\r\n			<p>Cookies son piezas de informaci&oacute;n que un sitio web graba en su ordenador. Se usan para identificar a los usuarios que visitan las p&aacute;ginas web y para ofrecerles servicios personalizados.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>DIRECCI&Oacute;N IP</strong></p>\r\n\r\n			<p>Cuando se conecta a Internet, su ordenador tiene un identificador &uacute;nico, llamado IP Adress. Es dif&iacute;cil para una web site obtener informaci&oacute;n (nombre, e-mail, etc) de su direcci&oacute;n IP.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>ID DEL COMPRADOR</strong></p>\r\n\r\n			<p>Un &uacute;nico identificador -ID- es asignado a cada comprador que visita una tienda on-line.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>SSL</strong></p>\r\n\r\n			<p>Es un m&eacute;todo mediante el cual la informaci&oacute;n se transmite encriptada a trav&eacute;s de Internet. La mayor&iacute;a de tiendas on-line utilizan este sistema. Normalmente las p&aacute;ginas que lo utilizan tienen un icono de un candado o una llave en alguna parte del explorador.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>INFORMACI&Oacute;N DE CONTACTO/INFORMATION</strong></p>\r\n\r\n			<p>Si tiene alguna sugerencia o comentario acerca de nuestra pol&iacute;tica de privacidad, por favor, contacte con nosotros en:<br />\r\n			<br />\r\n			Pamela C&oacute;rdova<br />\r\n			51 1 &nbsp;2472272<br />\r\n			EMAIL: <a href="mailto:info@royalty.pe">info@royalty.pe</a></p>\r\n\r\n			<p>LAVORAZIONE ATIGIANA SAC</p>\r\n\r\n			<p>RUC 20516785161<br />\r\n			Los Castillos 500 Lima 33 PERU</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '700', ''),
(9, 'Privacidad Perú', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>Privacidad:</strong></p>\r\n\r\n			<p>Royalty cuenta con una estricta pol&iacute;tica de privacidad y confidencialidad. Nuestras bases de datos se encuentran codificadas y encriptadas garantizando la informaci&oacute;n personal de nuestros clientes.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '500', ''),
(10, 'Tecnología', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<h2 class="text-center" style="color: #000;">TecnologÃ­a</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div class="height-30"></div>\r\n<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>Suela Flexible</h4>\r\n				<p class="text-justify">La suela combina un diseÃ±o flexible que proporciona el ajuste perfecto para sus pies de un material antialÃ©rgico cuya caracterÃ­stica no permiten se aloje bacteria ni hongos.</p>\r\n			</td>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>Suela Masajeador</h4>\r\n				<p class="text-justify">Prestigiosos diseÃ±adores italianos: Gianfranco Giosue, Alessandra Torresi y Romagnolo crean diseÃ±os vanguardistas y ademÃ¡s para que al contacto con el suelo proporcione un masaje a cada paso y tambien fortalece y tonifica los mÃºsculos de los pies, las piernas, las nalgas, el estÃ³mago y la espalda.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>Ãngulo de pronunciaciÃ³n</h4>\r\n				<p class="text-justify">(Producimos diariamente 10.000 choques a la columna vertebral y otras articulaciones de las piernas y los pies)  \r\nDiseÃ±amos especialmente un menor impacto de la estructura humana, relaja su posiciÃ³n, erige su columna vertebral y alivia la espalda, la rodilla, la pelvis y los pies lo que aumenta la actividad muscular y la circulaciÃ³n y conduce a una postura relajada, aliviando la tensiÃ³n muscular y problemas en las articulaciones.</p>\r\n			</td>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>El masaje de nuestra plantilla</h4>\r\n				<p class="text-justify">Plantilla con diseÃ±o masajeador amortiguador y anatÃ³mico con memoria (no se deforma) con cuero natural absorbe la humedad de los pies, menos bacterias y mayor bienestar a los pies. Aumenta la actividad muscular y la circulaciÃ³n que puede ayudar a reducir la celulitis y varices. Alivia la tensiÃ³n muscular, problemas de espalda y articulaciones, protegiendo cadera rodillas y columna. Conduce a una postura erguida y relajada de la marcha.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>MÃ¡s espacio interior</h4>\r\n				<p class="text-justify">Forma con mayor espacio interior, previniendo lesiones y formaciÃ³n de callos. Sus pies con mÃ¡s comodidad durante todo el dÃ­a.</p>\r\n			</td>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>Antideslizante</h4>\r\n				<p class="text-justify">DiseÃ±os italianos especialmente flexibles y antideslizantes, que garantizan un caminar mÃ¡s seguro y mÃ¡s cÃ³modo.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>La absorciÃ³n de la humedad</h4>\r\n				<p class="text-justify">Todo el calzado estÃ¡ forrado 100% de cuero natural cuya propiedad natural es absorber el exceso de humedad de los pies.</p>\r\n			</td>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>Suela leve</h4>\r\n				<p class="text-justify">Suela desarrollada con material extremadamente resistente y ligero que no es trasmisor de calor, proporcionando una mayor comodidad durante todo el dÃ­a. Aumenta la absorciÃ³n de choque para las articulaciones y los discos.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>CirculaciÃ³n de aire</h4>\r\n				<p class="text-justify">Con el sistema Ãºnico de la circulaciÃ³n del aire en el interior del zapato, los pies se quedan con una temperatura mÃ¡s agradable durante todo el dÃ­a eliminando todos los olores.</p>\r\n			</td>\r\n			<td style="text-align: center; width: 50%; position: relative; padding: 20px; vertical-align: top;">\r\n				<img src="http://placehold.it/80x80" alt=""><br>\r\n				<h4>Tecnologia de suavidad</h4>\r\n				<p class="text-justify">Calzado Bioacolchado con tejido tecnolÃ³gico sÃºper amortiguador que reviste el 100% del pie con agujeros que permiten la salida del aire caliente mejoran do la circulaciÃ³n.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '750', ''),
(11, 'SSL Pago Seguro', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>En Royalty contamos con:</strong></p>\r\n\r\n<p><strong>Certificados SSL HostGator.com</strong></p>\r\n\r\n<p>Encriptaci&oacute;n - la clave para compras por Internet seguro Certificados HostGator.com respaldan tanto est&aacute;ndar de 128 bits (usado por todos los infraestructuras bancarias para salvaguardar datos sensibles ) y el cifrado de alto grado 256-bit SSL para asegurar las transacciones en l&iacute;nea. El real cifrado de la fuerza de una conexi&oacute;n segura utilizando un certificado digital est&aacute; determinada por el nivel de cifrado apoyado por el navegador del usuario y el servidor del sitio Web.</p>\r\n\r\n<p>Se trata de un certificado digital personal que permiten asegurar y autenticar personas, garantizando la identidad de estas y autenticidad de los negocios y transacciones que realizan on-line. El certificado digital, entre m&uacute;ltiples aplicaciones puede ser usado para firma de documentos, control de acceso, enviar correo electr&oacute;nico seguro, intercambio seguro de informaci&oacute;n, acceso a ciertos sistemas que requieran del uso de certificado Digital.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&iquest;Por qu&eacute; es importante el uso de certificados?</strong></p>\r\n\r\n<p>Te da mayor seguridad en la comunicaci&oacute;n electr&oacute;nica ya se v&iacute;a mail, aplicaciones en la Web, etc. Con el uso de Certificado digital personal se permite garantizar que el autor del mensaje es quien realmente dice ser. Es decir, se garantiza que el receptor pueda verificar que el documento ha sido enviado por el autor, que el autor no pueda negar la realizaci&oacute;n del documento, y que el receptor no pueda alterar su contenido.</p>\r\n', '700', ''),
(4, 'ENTREGA EN TODO EL MUNDO MEMBRESIA', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Lorem Ipsum&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto&nbsp;de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la&nbsp;imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos&nbsp;especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos&nbsp;electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas&nbsp;&quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como&nbsp;por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '400', ''),
(5, 'BENEFICIO DE MI CUENTA', '<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Lorem Ipsum&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto&nbsp;de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la&nbsp;imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos&nbsp;especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos&nbsp;electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas&nbsp;&quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como&nbsp;por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '600', ''),
(12, 'Trabaja con Nosotros', '<table align="center" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td>\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\n	<tbody>\n		<tr>\n			<td>\n			<p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Lorem Ipsum&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto&nbsp;de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la&nbsp;imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos&nbsp;especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos&nbsp;electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas&nbsp;&quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como&nbsp;por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</span></span></p>\n			</td>\n		</tr>\n	</tbody>\n</table>', '500', '');
INSERT INTO `tbl_popup` (`id_popup`, `nombre_popup`, `des_popup`, `ancho_popup`, `titulo_popup`) VALUES
(13, 'Términos & Condiciones', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p><strong>T&eacute;rminos y condiciones</strong></p>\r\n\r\n			<p>El acceso y uso del servicio de compras por Internet de la tienda virtual de Royalty est&aacute;n sujetos a la legislaci&oacute;n peruana as&iacute; como a los t&eacute;rminos y condiciones que detallamos a continuaci&oacute;n:</p>\r\n\r\n			<p>Registro del cliente</p>\r\n\r\n			<p>1. El registro de la tienda virtual de Royalty es gratuito y requisito indispensable para la adquisici&oacute;n de los productos ofrecidos. Con este prop&oacute;sito el cliente debe ingresar a la secci&oacute;n &#39;Mi cuenta&#39;, hacer clic en el enlace Registrarse y llenar el formulario con sus datos personales.</p>\r\n\r\n			<p>2. Es necesario ingresar una cuenta de correo con su Contrase&ntilde;a, la cual le permitir&aacute; efectuar compras de manera personalizada, confidencial y segura. La tienda virtual de Royalty invoca a sus clientes a mantener la confidencialidad de su Contrase&ntilde;a. Cualquier uso irregular de la misma es responsabilidad &uacute;nica del titular de la cuenta.</p>\r\n\r\n			<p>a. Los clientes que residen fuera de Lima y posean tarjetas de cr&eacute;dito Visa emitidas en Per&uacute;, deben registrarse con una cuenta de correo no gratuita para realizar sus compras. Los clientes cuyas tarjetas de cr&eacute;dito Visa han sido emitidas en el extranjero pueden registrarse con cuentas de correo gratuitas o no.</p>\r\n\r\n			<p>b. Se entiende por cuenta de correo gratuita a aquella proporcionada sin cobro alguno por proveedores de servicios de Internet; as&iacute; como a aquellas que ofrecidas gratuitamente por periodos determinados, pasan a ser cuentas no gratuitas una vez concluido el plazo. (ejemplo: yahoo, gmail, terra, etc.)</p>\r\n\r\n			<p>c. El cliente debe mantener vigente su correo electr&oacute;nico a fin de mantener una comunicaci&oacute;n fluida ante cualquier eventualidad que se presente durante la entrega del pedido.</p>\r\n\r\n			<p>3. En el formulario de datos, el cliente deber&aacute; colocar su lugar de residencia (Lima, provincias o fuera del Per&uacute;), consider&aacute;ndose como tal al lugar donde se encuentra al momento de hacer sus compras.</p>\r\n\r\n			<p>4. Culminado el proceso de registro el cliente s&oacute;lo necesita ingresar a la opci&oacute;n Mi Cuenta con su direcci&oacute;n de correo y contrase&ntilde;a.</p>\r\n\r\n			<p>5. Nuestro sitio web (Portal) ha sido desarrollado para garantizar la confidencialidad de la informaci&oacute;n proporcionada por nuestros clientes. El Internet Secure Socket Layer (SSL) garantiza la seguridad de sus transacciones. Los navegadores Netscape Navigator y Microsoft Internet Explorer soportan SSL.</p>\r\n\r\n			<p>6. La utilizaci&oacute;n del Portal atribuye la condici&oacute;n de usuario del Portal (en adelante, el &quot;Usuario&quot;) e implica la aceptaci&oacute;n plena y sin reservas de todas y cada una de las disposiciones incluidas en este Aviso Legal en la versi&oacute;n publicada por Royalty en el momento mismo en que el Usuario acceda al Portal. En consecuencia, el Usuario debe leer atentamente el presente documento en cada una de las ocasiones en que se proponga utilizar el Portal, ya que aqu&eacute;l puede sufrir modificaciones.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>7. La tienda virtual de Royalty requiere que todos nuestros clientes se identifiquen con su cuenta de correo y Contrase&ntilde;a antes de acceder al servicio. Si olvid&oacute; estos datos deber&aacute; hacer click en &iquest;olvid&oacute; sus datos?. Tambi&eacute;n puede solicitar esta informaci&oacute;n a trav&eacute;s de la opci&oacute;n Cont&aacute;ctenos.</p>\r\n\r\n			<p>8. La tienda virtual de Royalty se reserva el derecho de modificar cualquier informaci&oacute;n sobre las condiciones de acceso y uso del servicio, sin previo aviso. Asimismo, se reserva el derecho de interrumpir el servicio de la tienda virtual, ya sea en forma transitoria o permanente, sin previo aviso o consentimiento de nuestros clientes.</p>\r\n\r\n			<p>9. Los precios de los productos en La tienda virtual de Royalty var&iacute;an a los que exhiben en las tiendas f&iacute;sicas. Sin perjuicio de ello, Platanitos se reserva el derecho de cambio de precios en los productos en venta de la p&aacute;gina web sin previo aviso.</p>\r\n\r\n			<p>10. La tienda virtual de Royalty no garantiza el stock de sus productos, ni necesariamente son los mismos que se tienen en las tiendas. En virtud a ello, Royalty se reserva el derecho de no despachar un producto si este no se encuentra en stock.</p>\r\n\r\n			<p>11. La tienda virtual de Royalty atiende el ingreso de pedidos las 24 horas del d&iacute;a y los 7 d&iacute;as de la semana, pero el proceso del pedido es con hora de corte hasta las 12 pm, cualquier pedido realizado pasada la hora de corte se tomar&aacute; como ingreso el d&iacute;a siguiente. Los pedidos realizados pasado las 12 pm del d&iacute;a viernes se proceder&aacute; como recepci&oacute;n el d&iacute;a lunes. Asimismo, Royalty se reserva el derecho de cambiar la hora / fecha de entrega, estos podr&aacute;n ser alterados sin previa comunicaci&oacute;n al cliente por motivos de fuerza mayor. Posteriormente se coordinar&aacute; con el cliente la nueva fecha / hora de despacho.</p>\r\n\r\n			<p>12. Los precios para los art&iacute;culos ofertados en La tienda virtual de Royalty incluyen el Impuesto General a las Ventas (IGV). El pedido ser&aacute; facturado con los precios vigentes al d&iacute;a que ser&aacute; entregado al cliente.</p>\r\n\r\n			<p>13. La tienda virtual de Royalty no se compromete a hacer envios fuera del Per&uacute;.</p>\r\n\r\n			<p>14. La anulaci&oacute;n del pedido s&oacute;lo se podr&aacute; realizar cuando la asesora de ventas se comunique con el cliente para confirmar la compra y el env&iacute;o.</p>\r\n\r\n			<p>15. Los colores de los productos en la p&aacute;gina s&oacute;lo son referenciales y pueden variar ligeramente con respecto al producto f&iacute;sico.</p>\r\n\r\n			<p>16. Royalty se reserva el derecho de interrumpir el servicio de tienda virtual ya sea temporal o permanentemente sin previo aviso o consentimiento de nuestros clientes.</p>\r\n\r\n			<p>17. Royalty se reserva el derecho de bloquear productos para la venta a trav&eacute;s de la tienda virtual.</p>\r\n\r\n			<p>18. El destinatario del pedido debe contar con un n&uacute;mero telef&oacute;nico para coordinar la entrega (hora, lugar, persona que recibir&aacute; el pedido, identificaci&oacute;n del receptor, etc.).</p>\r\n\r\n			<p>19. Cuando se realiza una compra con tarjeta de cr&eacute;dito, en la que el emisor y receptor son la misma persona, al momento de la entrega del pedido se solicitar&aacute; la presentaci&oacute;n de la tarjeta de cr&eacute;dito y el respectivo documento de identidad.</p>\r\n\r\n			<p>20. Cualquiera sea la modalidad de pago, el encargado del reparto exigir&aacute; la identificaci&oacute;n del receptor del pedido mediante su Documento Nacional de Identidad as&iacute; como la firma de la gu&iacute;a de entrega. No se entregar&aacute;n pedidos a menores de edad.</p>\r\n\r\n			<p>22. La tienda virtual de Royalty es el &uacute;nico responsable de la calidad de los productos as&iacute; como de la calidad del env&iacute;o.</p>\r\n\r\n			<p>23. Las opciones de entrega hacen referencia al horario de Lima, Per&uacute;.</p>\r\n\r\n			<p>24. En caso de seleccionar un horario fuera de los plazos se&ntilde;aladas, nuestra Asesora de Servicio se comunicar&aacute; con el destinatario para indicar la disponibilidad de atenci&oacute;n. Entrega de pedidos para clientes residentes en las provincias que Royalty tiene presencia f&iacute;sica.</p>\r\n\r\n			<p>25. La tienda virtual de Royalty aceptar&aacute; todo cambio debidamente justificado.</p>\r\n\r\n			<p>26. Las devoluciones proceder&aacute;n s&oacute;lo si el cliente presenta la boleta o factura y sin se&ntilde;ales de uso, adem&aacute;s del empaque con el que se hizo entrega.</p>\r\n\r\n			<p>27. Las devoluciones deben comunicarse en un plazo de 48 horas para coordinar los cambios.</p>\r\n\r\n			<p>28. Cuando el cliente devuelva un producto se proceder&aacute; a realizar una nota de cr&eacute;dito que valide el acto.</p>\r\n\r\n			<p>Todas las marcas, nombres comerciales o signos distintivos de cualquier clase que aparecen en el Portal son propiedad de Royalty, sin que pueda entenderse que el uso o acceso al Portal y/o a los Servicios atribuya al Usuario derecho alguno sobre las citadas marcas, nombres comerciales y/o signos distintivos.</p>\r\n\r\n			<p>Asimismo, los Contenidos son propiedad intelectual de Royalty, sin que puedan entenderse cedidos al Usuario, en virtud de lo establecido en estos T&eacute;rminos y Condiciones, ninguno de los derechos de explotaci&oacute;n que existen o puedan existir sobre dichos Contenidos m&aacute;s all&aacute; de lo estrictamente necesario para el correcto uso del Portal y de los servicios que aqu&iacute; se incluyen.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '700', ''),
(14, 'Informacón de contacto', '<table align="center" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/logo.png" style="height:45px; width:247px" /></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lavorazione Artigiana S.A.C</strong></p>\r\n\r\n<p><strong>RUC:</strong> 20516785161</p>\r\n\r\n<p><strong>Direcci&oacute;n:</strong></p>\r\n\r\n<p>Jr. Los Castillos N&ordm; 50, Santiago de Surco</p>\r\n\r\n<p>Lima, Per&uacute;</p>\r\n\r\n<p><strong>Tel&eacute;fono: </strong>(01) 2472272</p>\r\n\r\n<p><strong>Correo electr&oacute;nico:</strong> <a href="mailto:servicioalcliente@royalty.pe">servicioalcliente@royalty.pe</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', '400', ''),
(15, 'Enviar a un amigo', '<h2>Sugerir producto a un amigo</h2>\r\n\r\n<p>Rellena el siguiente formulario con los datos contacto de destino.</p>\r\n\r\n<form action="" enctype="multipart/form-data" method="post" name="popup">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Nombres:</td>\r\n			<td><input name="nombre" type="text" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Email (*):</td>\r\n			<td><input name="email" type="email" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td style="text-align:right"><input type="submit" value="Enviar" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</form>\r\n', '700', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_popup_home`
--

CREATE TABLE IF NOT EXISTS `tbl_popup_home` (
  `id_popup_home` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_popup_home` varchar(100) CHARACTER SET utf8 NOT NULL,
  `des_popup_home` longtext CHARACTER SET utf8 NOT NULL,
  `ancho_popup_home` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto_popup_home` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orden_popup_home` int(10) NOT NULL,
  PRIMARY KEY (`id_popup_home`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tbl_popup_home`
--

INSERT INTO `tbl_popup_home` (`id_popup_home`, `nombre_popup_home`, `des_popup_home`, `ancho_popup_home`, `foto_popup_home`, `orden_popup_home`) VALUES
(7, 'OFERTA INCREÍBLE', '', '700', '160829011019imagen_popup.jpg', 2),
(8, 'ENVÍO GRATUITO A TODO EL PERÚ', '<p>&nbsp;</p>\r\n\r\n<table align="center" cellpadding="0" cellspacing="0" style="width:90%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p style="text-align:center"><img src="http://royalty.asesdigitales.pe/images/logo.png" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p><span style="font-size:14px"><span style="font-family:comic sans ms,cursive"><strong>ENV&Iacute;O&nbsp;A PER&Uacute;</strong></span></span><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>&nbsp;&nbsp;<img alt="" src="http://asesdigitales.pe/clientes/royalti/images/icono_peru.jpg" /></strong></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Le felicitamos comprar desde Per&uacute; con:</strong></span></span>\r\n			<ul>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Todos los precios en nuevo sol peruano</strong></span></span></li>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Los aranceles y el IGV se calculan a pagar</strong></span></span></li>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Tarifas bajas para env&iacute;o internacional</strong></span></span></li>\r\n				<li><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:12px"><strong>Costo total de importaci&oacute;n (Sin cargos adicionales en la entrega)</strong></span></span></li>\r\n			</ul>\r\n			<span style="font-family:arial,helvetica,sans-serif"> <span style="font-size:12px"> <strong> Informaci&oacute;n adicional sobre env&iacute;os internacionales esta disponible en nuestro sitio Web: <a href="http://www.royalty.pe">http://www.royalty.pe</a></strong></span></span><br />\r\n			&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '400', '.', 0),
(9, '¿Qué hay de nuevo?', '<h2>&iquest;Qu&eacute; hay de nuevo?</h2>\r\n\r\n<p>Suscr&iacute;bete a nuestro newsletter y enterate de nuestras &uacute;ltimas novedades.</p>\r\n\r\n<form action="" enctype="multipart/form-data" method="post" name="popup">\r\n<div style="text-align: center;"><input type="email" />\r\n<div id="error_clave_10" style="display:none;"><br />\r\nIngrese su correo electr&oacute;nico</div>\r\n<br />\r\n<input type="submit" value="Suscribirse" /></div>\r\n</form>\r\n', '700', '160831053634160829011019imagen_popup.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas`
--

CREATE TABLE IF NOT EXISTS `tbl_preguntas` (
  `id_pre` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_pre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_pre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fktema_pre` int(10) NOT NULL,
  PRIMARY KEY (`id_pre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `tbl_preguntas`
--

INSERT INTO `tbl_preguntas` (`id_pre`, `titulo_pre`, `respuesta_pre`, `fktema_pre`) VALUES
(4, 'Â¿QuÃ© es Royalty.pe?', 'Lorem ipsum dolor sit amet, consectetuer.', 2),
(5, 'He recibido un artÃ­culo defectuoso', 'Lorem ipsum dolor sit amet, consectetuer.', 1),
(7, 'Falta un artÃ­culo de mi pedido', 'Lorem ipsum dolor sit amet, consectetuer', 1),
(8, 'Como Registrarme', 'Lorem ipsum dolor sit amet, consectetuer.', 3),
(15, 'Â¿CÃ³mo cambio mi ContraseÃ±a?', 'Lorem ipsum dolor sit amet, consectetuer.', 3),
(10, 'Â¿DÃ³nde estÃ¡ mi orden?', 'Lorem ipsum dolor sit amet, consectetuer.', 4),
(11, 'He recibido un artÃ­culo incorrecto en mi pedido', 'Lorem ipsum dolor sit amet, consectetuer.', 1),
(12, 'Â¿QuiÃ©nes somos?', 'Lorem ipsum dolor sit amet, consectetuer.', 2),
(13, 'PolÃ­tica de la calidad', 'Lorem ipsum dolor sit amet, consectetuer.', 2),
(14, 'Â¿Olvidaste tu contraseÃ±a?', 'Lorem ipsum dolor sit amet, consectetuer.', 3),
(16, 'Busca el producto que deseas ', 'Lorem ipsum dolor sit amet, consectetuer.', 3),
(17, 'Agregar el producto a la bolsa de compra', 'Lorem ipsum dolor sit amet, consectetuer.', 3),
(18, 'MasterCard', 'Lorem ipsum dolor sit amet, consectetuer.', 5),
(19, 'VIsa', 'Lorem ipsum dolor sit amet, consectetuer.', 5),
(20, 'Safetypay', 'Lorem ipsum dolor sit amet, consectetuer.', 5),
(21, 'DepÃ³sito en nuestra cuenta corriente', 'Lorem ipsum dolor sit amet, consectetuer.', 5),
(22, 'Pago a contra entrega', 'Lorem ipsum dolor sit amet, consectetuer.', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_privilegio`
--

CREATE TABLE IF NOT EXISTS `tbl_privilegio` (
  `id_privilegio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_privilegio` varchar(50) NOT NULL,
  `label_privilegio` varchar(50) NOT NULL,
  `url_privilegio` varchar(900) NOT NULL,
  `estado_privilegio` char(1) NOT NULL,
  `parent_privilegio` int(11) NOT NULL,
  `plantilla_privilegio` varchar(50) NOT NULL,
  PRIMARY KEY (`id_privilegio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `tbl_privilegio`
--

INSERT INTO `tbl_privilegio` (`id_privilegio`, `titulo_privilegio`, `label_privilegio`, `url_privilegio`, `estado_privilegio`, `parent_privilegio`, `plantilla_privilegio`) VALUES
(1, 'TIPO DE CAMBIO', '', 'tipo-de-cambio', '1', 0, ''),
(2, 'TRABAJADORES', '', 'trabajadores', '1', 0, 'trabajadores'),
(3, 'Clientes', '', 'clientes', '1', 0, 'clientes'),
(4, 'Cuerpo Inicio', '', 'cuerpos', '1', 0, 'cuerpos'),
(5, 'Marcas', '', 'marcas', '1', 0, 'marcas'),
(6, 'Tipos de Prenda', '', 'tipos-de-prenda', '1', 0, 'tipos'),
(7, 'Productos', '', 'productos', '1', 0, 'productos'),
(8, 'ventas', '', 'Ventas', '1', 0, 'ventas'),
(9, 'Asesorías', '', 'asesorias', '1', 0, 'asesorias'),
(10, 'Magazine', '', 'magazine', '1', 0, 'magazine'),
(11, 'Ideas para Regalar', '', 'ideas-para-regalar', '1', 0, 'ideas'),
(12, 'Preguntas frecuentes', '', 'preguntas-frecuentes', '1', 0, 'temas'),
(13, 'Videos', '', 'videos', '1', 0, 'videos'),
(14, 'CATEGORÍA DE OFERTAS', '', 'categoria-de-oferta', '1', 0, 'cateofertas'),
(15, 'Ofertas', '', 'ofertas', '1', 0, 'ofertas'),
(16, 'Relacionar productos', '', 'productos/relacionar-productos', '1', 7, 'productos.php?action=relacionar'),
(17, 'Popup', '', 'popup', '1', 0, 'popups'),
(18, 'Popup Home', '', 'popup-home', '1', 0, 'popuphomes'),
(19, 'Inscripciones', '', 'inscripciones-mailing', '1', 0, 'bd.php?action=listemailing'),
(20, 'Inscripciones novedades', '', 'inscripciones-novedades', '1', 0, 'bd.php?action=listnovedades'),
(21, 'Categorías', '', 'categorias', '1', 6, 'categorias'),
(22, 'tipos marcas', '', 'tipos_marcas', '1', 5, 'tipos_marcas'),
(23, 'Productos filtros', '', 'productos_filtros', '1', 7, 'productos_filtros'),
(24, 'productos_categorias', '', 'productos_categorias', '1', 7, 'productos_categorias'),
(25, 'productos_fotos', '', 'productos_fotos', '1', 7, 'productos_fotos'),
(26, 'productos_caracteristicas', '', 'productos_caracteristicas', '1', 7, 'productos_caracteristicas'),
(27, 'tipos', '', 'tipos', '1', 6, 'tipos'),
(28, 'filtros', '', 'filtros', '1', 6, 'filtros'),
(29, 'ideas', '', 'ideas', '1', 11, 'ideas'),
(30, 'temas_preguntas', '', 'temas_preguntas', '1', 31, 'temas_preguntas'),
(31, 'temas', '', 'temas', '1', 0, 'temas'),
(32, 'cateofertas', '', 'cateofertas', '1', 14, 'cateofertas'),
(33, 'popups', '', 'popups', '1', 17, 'popups');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `id_producto` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_producto` varchar(100) CHARACTER SET utf8 NOT NULL,
  `url_page_tbl` varchar(600) NOT NULL,
  `precio_producto` float NOT NULL,
  `descripcion_producto` longtext NOT NULL,
  `codigo_producto` varchar(100) NOT NULL,
  `fktipo_producto` int(10) NOT NULL,
  `foto_producto` varchar(100) NOT NULL,
  `precio_oferta_producto` float NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `oferta_producto` varchar(100) NOT NULL,
  `orden_oferta_producto` int(10) NOT NULL,
  `Url_producto` varchar(800) NOT NULL,
  `foto1_producto` varchar(100) NOT NULL,
  `foto2_producto` varchar(100) NOT NULL,
  `foto3_producto` varchar(100) NOT NULL,
  `foto4_producto` varchar(100) NOT NULL,
  `foto5_producto` varchar(100) NOT NULL,
  `foto6_producto` varchar(100) NOT NULL,
  `fk_id_tipo_cambio` int(11) NOT NULL,
  `_id_seo` int(11) NOT NULL,
  `descuento_producto` int(11) NOT NULL,
  `periodo_descuento_prod` varchar(25) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `Url_producto` (`Url_producto`(767)),
  KEY `_id_seo` (`_id_seo`),
  KEY `fk_id_tipo_cambio` (`fk_id_tipo_cambio`),
  KEY `url_page_tbl` (`url_page_tbl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id_producto`, `titulo_producto`, `url_page_tbl`, `precio_producto`, `descripcion_producto`, `codigo_producto`, `fktipo_producto`, `foto_producto`, `precio_oferta_producto`, `stock_producto`, `oferta_producto`, `orden_oferta_producto`, `Url_producto`, `foto1_producto`, `foto2_producto`, `foto3_producto`, `foto4_producto`, `foto5_producto`, `foto6_producto`, `fk_id_tipo_cambio`, `_id_seo`, `descuento_producto`, `periodo_descuento_prod`) VALUES
(19, 'Polo con cuello Aldos', '', 249, 'Mezcla de algodÃ³n que absorbe la humedad', 'PC-ALDO', 4, '160224125646pc-aldo-2_470x660.jpg', 0, 0, '', 1, '', '1603060604391.jpg', '1603060604391.jpg', '1603060604391.jpg', '1603060604391.jpg', '1603060604391.jpg', '1603060604391.jpg', 0, 0, 0, ''),
(20, 'Polo cuello redondo Frank', '', 99, '100 % algodÃ³n. Polo casual super resistente', 'PC-FRANK', 4, '160224010419polo-frank-1_470x660.jpg', 0, 0, '', 0, '', '1603060607411.jpg', '1603060607411.jpg', '1603060607411.jpg', '1603060607411.jpg', '1603060607411.jpg', '1603060607411.jpg', 0, 0, 0, ''),
(22, 'Camisa gris elegante', '', 1401, 'desDD', '67567', 1, '1603240259032.jpg', 20, 0, '', 0, '', '1603240259032.jpg', '1603240259032.jpg', '1603240259032.jpg', '1603240259032.jpg', '1603240259032.jpg', '1603240259032.jpg', 0, 0, 0, ''),
(23, 'PantalÃ³n drill', '', 39.9, 'PantalÃ³n Ocre\r\n', '5454as', 3, '160508114430pantalon_color_ocre.jpg', 10, 0, 'SI', 0, '', '1604100616271603240259032.jpg', '1604100616271603240259032.jpg', '1604100616271603240259032.jpg', '1604100616271603240259032.jpg', '1604100616271603240259032.jpg', '1604100616271603240259032.jpg', 0, 0, 0, ''),
(24, 'Zapatos marrÃ³n noche', '', 250, 'Zapato OtoÃ±o-invierno. ClÃ¡sicos varoniles modernos.', '2541wq', 2, '160410065604z1.jpg', 200, 0, '', 0, '', '160410065604z1.jpg', '160410065604z1.jpg', '160410065604z1.jpg', '160410065604z1.jpg', '160410065604z1.jpg', '160503073740160410065604z1.jpg', 0, 0, 0, ''),
(25, 'Â¡LO ÃšLTIMO! CAMISA LUX - Vino', '', 180, 'Camisas 2 x 1', '78442dd', 1, '160930050108camisa-lux-vino.jpg', 120, 0, 'SI', 0, '', '160930044947camisa-lux-guinda.jpg', '160930044947camisa-lux-guinda.jpg', '160930044947camisa-lux-guinda.jpg', '160930044947camisa-lux-guinda.jpg', '160930044947camisa-lux-guinda.jpg', '160930044947camisa-lux-guinda.jpg', 0, 0, 0, ''),
(26, 'Camisa pink', '', 250, 'Pink', '4s4s5d', 1, '160504115353160224024955a.jpg', 150, 0, 'SI', 0, '', '160504115353160224024955a.jpg', '160504115353160224024955a.jpg', '160504115353160224024955a.jpg', '160504115353160224024955a.jpg', '160504115353160224024955a.jpg', '160504115353160224024955a.jpg', 0, 0, 0, ''),
(27, 'medias XL', '', 3333, 'wwwww', 'eqwqwq333', 6, '160507115710captura de pantalla de 2016-04-27 19-37-07.png', 0, 0, '', 0, '', '160507115710captura de pantalla de 2016-04-27 14-48-54.png', '160507115710captura de pantalla de 2016-04-27 19-37-07.png', '160507115710captura de pantalla de 2016-04-27 19-37-07.png', '160507115710captura de pantalla de 2016-04-27 19-37-07.png', '160507115710captura de pantalla de 2016-04-27 19-37-07.png', '160507115710captura de pantalla de 2016-04-27 19-37-07.png', 0, 0, 0, ''),
(28, 'PantalÃ³n moda Italia', '', 79, 'Moda Masculina', '7458dsf', 3, '160508120307pantalon-beish-(1).jpg', 0, 0, '', 0, '', '160508122853pantalon-beish-(0).jpg', '160508120307pantalon-beish-(3).jpg', '160508120307pantalon-beish-(2).jpg', '160508122853pantalon-beish-(4).jpg', '160508120307pantalon-beish-(6).jpg', '160508120307pantalon-beish-(7).jpg', 0, 0, 0, ''),
(29, 'Reloj - BRAUN ', '', 300, 'BN0035 Stainless Steel And Leather Watch', 'FSCF56', 6, '160510035426reloj.jpg', 0, 0, '', 0, '', '160510021732reloj3.jpg', '160510035426reloj2.jpg', '160510021732reloj4.jpg', '160510021732reloj5.jpg', '160510021732reloj6.jpg', '160510035426reloj2.jpg', 0, 0, 0, ''),
(30, 'Sweater - Primavera', '', 129, 'Billetera cuero', '75sdr1', 5, '160922120721camisa-lux-guinda.jpg', 100, 0, '', 0, '', '160922120721camisa-lux-guinda.jpg', '160922120721camisa-lux-guinda.jpg', '160922120721camisa-lux-guinda.jpg', '160922120721camisa-lux-guinda.jpg', '160922120721camisa-lux-guinda.jpg', '160922120721camisa-lux-guinda.jpg', 0, 0, 0, ''),
(31, 'Oferta 1b', '', 34, 'ffff', 'eeee', 1, '160514021209captura de pantalla de 2016-04-27 19-37-07.png', 10, 0, 'SI', 0, '', '160514021210captura de pantalla de 2016-04-27 19-37-07.png', '160514021210captura de pantalla de 2016-04-27 14-48-59.png', '160514021210captura de pantalla de 2016-04-27 19-37-07.png', '160514021210captura de pantalla de 2016-04-27 19-37-07.png', '160514021210captura de pantalla de 2016-04-27 19-37-07.png', '160514021210captura de pantalla de 2016-04-27 19-37-07.png', 0, 0, 0, ''),
(32, 'Oferta test3', '', 199, 'Oferta test descripcion', 'ABC', 1, '16051610365310.jpg', 100, 0, '', 0, '', '16051610365410.jpg', '16051610365410.jpg', '16051610365410.jpg', '16051610365410.jpg', '16051610365410.jpg', '16051610365410.jpg', 0, 0, 0, ''),
(33, 'Producto Zapatos', '', 120, 'opoo', '74oopp', 2, '160517100929billetera5.jpg', 0, 0, '', 0, '', '160517100929billetera2.jpg', '160517100929billetera2.jpg', '160517100929billetera.jpg', '160517100929billetera5.jpg', '160517100929billetera3.jpg', '160517100929billetera5.jpg', 0, 0, 0, ''),
(34, 'Zapatos marrÃ³n dÃ­a', '', 7845, 'fdfdfd', 'kdkd54', 2, '160517030813za-uomo_negro.jpg', 450, 0, 'SI', 0, '', '160517030814za-uomo_negro.jpg', '160517030814za-uomo_negro.jpg', '160517030814za-uomo_negro.jpg', '160517030814za-uomo_negro.jpg', '160517030814za-uomo_negro.jpg', '160517030814za-uomo_negro.jpg', 0, 0, 0, ''),
(35, 'OfertÃ³n Camisa', '', 250, 'sasa', '47sdg', 1, '1605180552461602010154201.jpg', 50, 0, 'SI', 0, '', '1605180552461602010154201.jpg', '1605180552461602010154201.jpg', '1605180552461602010154201.jpg', '1605180552461602010154201.jpg', '1605180552461602010154201.jpg', '1605180552461602010154201.jpg', 0, 0, 0, ''),
(36, 'Polo rayas', '', 180, 'sasa', '54DSE', 4, '160519025417716966_mrp_ou_l.jpg', 120, 0, '', 0, '', '160519025417716966_mrp_ou_l.jpg', '160519025417716966_mrp_ou_l.jpg', '160519025417716966_mrp_ou_l.jpg', '160519025417716966_mrp_ou_l.jpg', '160519025417716966_mrp_ou_l.jpg', '160519025417716966_mrp_ou_l.jpg', 0, 0, 0, ''),
(37, 'SEXY PANTALON', '', 60, 'DES', 'DGF', 3, '160905010955080916-home-ftr-1.jpg', 20, 0, 'SI', 0, '', '160905010955080916-home-ftr-1.jpg', '160905010955080916-home-ftr-1.jpg', '160905010955080916-home-ftr-1.jpg', '160905010955080916-home-ftr-1.jpg', '160905010955080916-home-ftr-1.jpg', '160905010955080916-home-ftr-1.jpg', 0, 0, 0, ''),
(38, 'Â¡LO ÃšLTIMO! CAMISA LUX - Vino', '', 189, 'Washed azul', 'H4899U', 1, '160918115623camisa-lux-vino.jpg', 0, 0, '', 0, '', '16091212362702.jpg', '16091212511203.jpg', '16091212362701.jpg', '16091212362702.jpg', '16091212511203.jpg', '16091212362701.jpg', 0, 0, 0, ''),
(39, 'Camisa primavera floreada', '', 125, 'Lo nuevo', 'skl447', 13, '16091203284201.jpg', 0, 0, '', 0, '', '16091203284202.jpg', '16091203284203.jpg', '16091203284201.jpg', '16091203284202.jpg', '16091203284203.jpg', '16091203284201.jpg', 0, 0, 0, ''),
(40, 'Â¡LO ÃšLTIMO! CAMISA LUX - Vino', '', 189, 'Camisa-Lux-Guinda', 'jdjk4md', 1, '161004104616160410011440pantalon-azul-(4).jpg', 0, 0, '', 0, '', '160919033802camisa-lux-guinda.jpg', '160919033802camisa-lux-guinda.jpg', '160919033802camisa-lux-guinda.jpg', '160919033802camisa-lux-guinda.jpg', '160919033802camisa-lux-guinda.jpg', '160919033802camisa-lux-guinda.jpg', 0, 0, 0, ''),
(41, 'Pullover Primavera', '', 158, 'Camisa-Lux-Verde', '47sde3', 5, '160919055405camisa-lux-verde.jpg', 145, 0, '', 0, '', '160919055405camisa-lux-verde.jpg', '160919055405camisa-lux-verde.jpg', '160919055405camisa-lux-verde.jpg', '160919055405camisa-lux-verde.jpg', '160919055405camisa-lux-verde.jpg', '160919055405camisa-lux-verde.jpg', 0, 0, 0, ''),
(43, 'Polo verano', '', 60, 'Buen producto', 'P1001', 4, '160923025734151112114701detalle_marca_2.jpg', 0, 0, '', 0, '', '160923025734151112115244detalle_marca_2.jpg', '160923025734160125025726foto_detalle_1.jpg', '160923025734151111120659box_1.jpg', '160923025734151111120659box_1.jpg', '160923025734151111111130banner.jpg', '160923025734160125025813foto_detalle_2.jpg', 0, 0, 0, ''),
(44, 'Â¡LO ÃšLTIMO! CAMISA LUX 2017 - Vino', '', 125, 'Camisa-Lux-Vino', '4jh57ff', 1, '161004104351camisa-lux-verde.jpg', 0, 0, '', 0, '', '160930020934camisa-lux-vino.jpg', '160930020934camisa-lux-vino.jpg', '160930020934camisa-lux-vino.jpg', '160930020934camisa-lux-vino.jpg', '160930020934camisa-lux-vino.jpg', '160930020934camisa-lux-vino.jpg', 0, 0, 0, ''),
(45, 'New Arrivals NiÃ±os', '', 129, '', 'H4899U', 1, '24-10-2016-22-44-21-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '24-10-2016-22-44-21-chrysanthemumjpg.jpg', '24-10-2016-22-44-21-desertjpg.jpg', '24-10-2016-22-44-21-hydrangeasjpg.jpg', '24-10-2016-22-44-21-jellyfishjpg.jpg', '24-10-2016-22-44-21-penguinsjpg.jpg', '24-10-2016-22-44-21-tulipsjpg.jpg', 1, 2, 0, ''),
(46, 'New Arrivals NiÃ±os', '', 129, '', 'H4899U', 1, '24-10-2016-22-44-21-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '24-10-2016-22-44-21-chrysanthemumjpg.jpg', '24-10-2016-22-44-21-desertjpg.jpg', '24-10-2016-22-44-21-hydrangeasjpg.jpg', '24-10-2016-22-44-21-jellyfishjpg.jpg', '24-10-2016-22-44-21-penguinsjpg.jpg', '24-10-2016-22-44-21-tulipsjpg.jpg', 1, 3, 0, ''),
(47, 'Polo verano', '', 129, 'ddfd', 'H4899U', 1, '', 0, 0, '', 0, 'polo-verano', '', '', '', '', '', '', 1, 4, 0, ''),
(48, 'New Arrivals NiÃ±os', '', 129, 'dfdfdsfsd', 'DGF', 1, '', 0, 0, '', 0, 'new-arrivals-ninos', '', '', '', '', '', '', 1, 5, 0, ''),
(49, 'New Arrivals NiÃ±os', '', 129, 'trtgfdgdf', 'H4899U', 1, '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', 1, 12, 0, ''),
(50, 'New Arrivals NiÃ±os', '', 129, 'trtgfdgdf', 'H4899U', 1, '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', 1, 13, 0, ''),
(51, 'New Arrivals NiÃ±os', '', 129, 'trtgfdgdf', 'H4899U', 1, '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', '3-11-2016-22-35-27-chrysanthemum-copiajpg.jpg', 1, 14, 0, ''),
(52, 'New Arrivals NiÃ±os', '', 129, 'hghfgh', 'DGF', 1, '3-11-2016-22-43-50-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '3-11-2016-22-43-50-chrysanthemum-copiajpg.jpg', '3-11-2016-22-43-50-chrysanthemum-copiajpg.jpg', '3-11-2016-22-43-50-chrysanthemum-copiajpg.jpg', '3-11-2016-22-43-50-chrysanthemum-copiajpg.jpg', '3-11-2016-22-43-50-chrysanthemum-copiajpg.jpg', '3-11-2016-22-43-50-chrysanthemum-copiajpg.jpg', 1, 15, 0, ''),
(53, 'New Arrivals NiÃ±os', '', 129, 'yt', 'DGF', 1, '3-11-2016-22-46-23-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '3-11-2016-22-46-23-chrysanthemum-copiajpg.jpg', '3-11-2016-22-46-23-chrysanthemum-copiajpg.jpg', '3-11-2016-22-46-23-chrysanthemum-copiajpg.jpg', '3-11-2016-22-46-23-chrysanthemum-copiajpg.jpg', '3-11-2016-22-46-23-chrysanthemum-copiajpg.jpg', '3-11-2016-22-46-23-chrysanthemum-copiajpg.jpg', 1, 16, 0, ''),
(54, 'New Arrivals NiÃ±os', '', 129, 'gdfgdfgfd', 'H4899U', 1, '4-11-2016-0-37-52-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '4-11-2016-0-37-52-chrysanthemum-copiajpg.jpg', '4-11-2016-0-37-52-chrysanthemum-copiajpg.jpg', '4-11-2016-0-37-52-chrysanthemum-copiajpg.jpg', '4-11-2016-0-37-52-chrysanthemum-copiajpg.jpg', '4-11-2016-0-37-52-chrysanthemum-copiajpg.jpg', '4-11-2016-0-37-52-chrysanthemum-copiajpg.jpg', 1, 17, 0, ''),
(55, 'CAMISAS', '', 129, 'dfdfdsfdf', 'DGF', 1, '4-11-2016-0-42-15-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'camisas', '4-11-2016-0-42-15-chrysanthemum-copiajpg.jpg', '4-11-2016-0-42-15-chrysanthemum-copiajpg.jpg', '4-11-2016-0-42-15-chrysanthemum-copiajpg.jpg', '4-11-2016-0-42-15-chrysanthemum-copiajpg.jpg', '4-11-2016-0-42-15-chrysanthemum-copiajpg.jpg', '4-11-2016-0-42-15-chrysanthemum-copiajpg.jpg', 1, 18, 0, ''),
(56, 'New Arrivals NiÃ±os', '', 129, 'sdsds', 'H4899U', 1, '4-11-2016-0-53-58-chrysanthemum-copiajpg.jpg', 0, 0, '', 0, 'new-arrivals-ninos', '4-11-2016-0-53-58-chrysanthemum-copiajpg.jpg', '4-11-2016-0-53-58-chrysanthemum-copiajpg.jpg', '4-11-2016-0-53-58-chrysanthemum-copiajpg.jpg', '4-11-2016-0-53-58-chrysanthemum-copiajpg.jpg', '4-11-2016-0-53-58-chrysanthemum-copiajpg.jpg', '4-11-2016-0-53-58-chrysanthemum-copiajpg.jpg', 1, 19, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_caracteristicas`
--

CREATE TABLE IF NOT EXISTS `tbl_productos_caracteristicas` (
  `id_cara` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_cara` varchar(100) NOT NULL,
  `detalle_cara` varchar(100) NOT NULL,
  `descripcion_cara` longtext NOT NULL,
  `fkproducto_cara` int(10) NOT NULL,
  `orden_cara` int(10) NOT NULL,
  PRIMARY KEY (`id_cara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `tbl_productos_caracteristicas`
--

INSERT INTO `tbl_productos_caracteristicas` (`id_cara`, `titulo_cara`, `detalle_cara`, `descripcion_cara`, `fkproducto_cara`, `orden_cara`) VALUES
(1, 'DescripciÃ³n', '', 'Esta impecable camisa blanca estÃ¡ confeccionada segÃºn nuestro patrÃ³n Slim con algodÃ³n egipcio washed 100% de Albiate. El cuello italiano curvo y un puÃ±o sencillo la convierten en la opciÃ³n perfecta para prÃ¡cticamente cualquier ocasiÃ³n', 5, 1),
(2, 'Tejido', '', 'AlgodÃ³n Egipcio', 5, 0),
(3, 'Tejido', 'Holandes', '', 6, 0),
(4, 'PuÃ±o', 'Cuadrado', '', 6, 0),
(5, 'DescripciÃ³n', '', 'Este producto lorem ipsus  lorem ipsus   lorem ipsus  lorem ipsus', 6, 0),
(6, 'Tipo', 'Cuero', 'desss', 7, 0),
(7, 'Pasador', 'No tiene', '', 7, 0),
(8, 'DescripciÃ³n', '', 'Este zapato puede volar', 7, 0),
(9, 'Color', 'azul', '', 8, 0),
(10, 'PuÃ±o', 'Verde', '', 10, 0),
(11, 'CANZONCILLO DE VERANO', 'DETALLE', 'ESTE ....', 18, 0),
(12, 'Detalle1', 'sub_Detalle1', 'test_Detalle1', 19, 0),
(13, 'Detalle2', 'sub_Detalle2', 'test_Detalle1', 19, 0),
(14, 'Blanco mÃ¡s blanco', 'PantalÃ³n fit', 'El mejor estilo y marca en pantalones', 23, 0),
(15, 'Blanco humo', 'Slim fit', 'Sexy with a strappy back and sporty with an elastic band: this bralette has the effortless look on lock, with light padding when you want it.', 23, 0),
(16, 'dsdsd', 'dsd', 'sdsds', 25, 0),
(17, 'trtrt', 'rtrt', 'rtrtr rtrtr', 25, 0),
(18, 'PantalÃ³n beige - Hombre full moda', 'Doble costura y estilizado', 'Con un diseÃ±o ajustado en la cadera y el muslo, la pernera ligeramente ceÃ±ida y entallada por debajo de la cintura.', 28, 0),
(19, 'Ligero y fresco', 'Fit - pegado total', 'Tus modelos favoritos estÃ¡n ahora disponibles en tejidos mÃ¡s ligeros. Si buscas un look moderno', 28, 0),
(21, 'BOTTEGA VENETA ', 'Timeless luxury label', 'Founded near Venice in 1966, Bottega Veneta is renowned for meticulously handcrafted leather goods. Under creative director Mr Tomas Maier,', 30, 0),
(22, 'DETAILS & CARE', 'DETAILS & CARE', 'Black and grey washed-leather (lamb)\r\nInternal designer stamp, eight card slots, two note sleeves\r\nMade in Italy\r\nComes in a box', 30, 0),
(23, 'des', 'des', 'des', 21, 0),
(25, 'Material', '100% AlgodÃ³n Pima', '', 38, 0),
(26, 'Material', '100% AlgodÃ³n Pima', '100% AlgodÃ³n Pima', 40, 0),
(28, 'Material', '100% AlgodÃ³n Pima', '', 44, 0),
(29, 'Estilo', 'Juvenil', '', 44, 0),
(30, '', '', '', 47, 0),
(31, 'New Arrivals NiÃ±os', 'New Arrivals NiÃ±os', '', 48, 0),
(32, '', '', '', 49, 0),
(33, '', '', '', 50, 0),
(34, '', '', '', 51, 0),
(35, '', '', '', 52, 0),
(36, 'rtyrt', 'yrtyrt', 'rtyrt', 53, 0),
(37, '', '', '', 54, 0),
(38, '', '', '', 55, 0),
(39, 'dsdsds', 'sds', 'sdsdsds', 56, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_categorias`
--

CREATE TABLE IF NOT EXISTS `tbl_productos_categorias` (
  `id_productos_categorias` int(10) NOT NULL AUTO_INCREMENT,
  `fkproducto_productos_categorias` int(10) NOT NULL,
  `fkcategoria_productos_categorias` int(10) NOT NULL,
  `fksubcategoria_productos_categorias` int(10) NOT NULL,
  `fktipo_productos_categorias` int(10) NOT NULL,
  PRIMARY KEY (`id_productos_categorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `tbl_productos_categorias`
--

INSERT INTO `tbl_productos_categorias` (`id_productos_categorias`, `fkproducto_productos_categorias`, `fkcategoria_productos_categorias`, `fksubcategoria_productos_categorias`, `fktipo_productos_categorias`) VALUES
(1, 5, 6, 4, 1),
(2, 6, 8, 10, 1),
(3, 7, 9, 11, 2),
(4, 8, 6, 4, 1),
(5, 9, 7, 7, 1),
(6, 10, 7, 7, 1),
(7, 11, 7, 7, 1),
(8, 12, 10, 12, 3),
(9, 13, 10, 12, 3),
(10, 14, 10, 12, 3),
(11, 15, 10, 12, 3),
(12, 16, 9, 11, 2),
(13, 18, 11, 13, 7),
(16, 20, 13, 17, 4),
(19, 20, 23, 20, 4),
(20, 20, 23, 21, 4),
(22, 19, 13, 17, 4),
(23, 19, 13, 18, 4),
(24, 19, 13, 19, 4),
(25, 23, 26, 23, 3),
(26, 28, 29, 42, 3),
(27, 28, 26, 23, 3),
(28, 29, 40, 63, 6),
(30, 34, 34, 90, 2),
(31, 21, 6, 6, 1),
(32, 38, 6, 4, 1),
(33, 39, 54, 124, 13),
(36, 40, 6, 4, 1),
(37, 30, 51, 189, 5),
(38, 41, 51, 192, 5),
(39, 25, 6, 4, 1),
(40, 44, 6, 4, 1),
(41, 44, 6, 5, 1),
(42, 22, 38, 149, 2),
(43, 47, 6, 98, 1),
(44, 47, 7, 98, 1),
(45, 47, 7, 98, 1),
(46, 47, 7, 98, 1),
(47, 48, 6, 97, 1),
(48, 48, 7, 97, 1),
(49, 48, 7, 97, 1),
(50, 48, 7, 97, 1),
(51, 49, 6, 98, 1),
(52, 49, 7, 98, 1),
(53, 49, 7, 98, 1),
(54, 50, 6, 98, 1),
(55, 50, 7, 98, 1),
(56, 50, 7, 98, 1),
(57, 51, 6, 98, 1),
(58, 51, 7, 98, 1),
(59, 51, 7, 98, 1),
(60, 52, 6, 4, 1),
(61, 53, 6, 4, 1),
(62, 54, 6, 98, 1),
(63, 54, 6, 98, 1),
(64, 54, 7, 98, 1),
(65, 54, 7, 98, 1),
(66, 54, 7, 98, 1),
(67, 54, 7, 98, 1),
(68, 55, 6, 8, 1),
(69, 55, 6, 8, 1),
(70, 55, 7, 8, 1),
(71, 55, 7, 8, 1),
(72, 56, 6, 5, 1),
(73, 56, 6, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_filtros`
--

CREATE TABLE IF NOT EXISTS `tbl_productos_filtros` (
  `id_producto_filtros` int(10) NOT NULL AUTO_INCREMENT,
  `fkproducto_productos_filtros` int(10) NOT NULL,
  `fkfiltro_productos_filtros` int(10) NOT NULL,
  `fksubfiltro_productos_filtros` int(10) NOT NULL,
  `fktipo_productos_filtros` int(10) NOT NULL,
  `foto_productos_filtros` varchar(100) NOT NULL,
  PRIMARY KEY (`id_producto_filtros`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Volcado de datos para la tabla `tbl_productos_filtros`
--

INSERT INTO `tbl_productos_filtros` (`id_producto_filtros`, `fkproducto_productos_filtros`, `fkfiltro_productos_filtros`, `fksubfiltro_productos_filtros`, `fktipo_productos_filtros`, `foto_productos_filtros`) VALUES
(2, 5, 3, 16, 1, ''),
(3, 5, 6, 6, 1, ''),
(4, 7, 7, 19, 2, ''),
(5, 7, 7, 18, 2, ''),
(6, 8, 6, 5, 1, ''),
(7, 9, 6, 6, 1, ''),
(8, 10, 6, 6, 1, ''),
(9, 11, 3, 13, 1, ''),
(10, 16, 7, 17, 2, ''),
(11, 18, 8, 20, 7, ''),
(19, 25, 10, 23, 6, '160410090638perfumes.jpg'),
(20, 19, 11, 26, 4, '.'),
(21, 19, 11, 27, 4, '.'),
(24, 26, 3, 14, 1, '.'),
(25, 26, 3, 15, 1, '.'),
(26, 26, 3, 16, 1, '.'),
(29, 26, 6, 8, 1, '160506041013verde.jpg'),
(30, 26, 6, 5, 1, '160506041051azul.jpg'),
(31, 26, 6, 9, 1, '160506041130morado.jpg'),
(32, 26, 6, 6, 1, '160506041235blanco.jpg'),
(37, 19, 11, 28, 4, '160507122726captura de pantalla de 2016-04-27 19-37-07.png'),
(40, 23, 14, 29, 3, '160508113532color_celeste.jpg'),
(41, 23, 14, 31, 3, '160508113547color_negro.jpg'),
(42, 23, 14, 32, 3, '160508113600color_beige.jpg'),
(43, 23, 14, 45, 3, '160508114640color_ocre.jpg'),
(44, 28, 14, 32, 3, '160508120747color_beige.jpg'),
(45, 28, 14, 29, 3, '160508121552color_celeste.jpg'),
(46, 28, 14, 30, 3, '160508121641color_gris.jpg'),
(47, 28, 14, 31, 3, '160508121821color_negro.jpg'),
(48, 28, 13, 46, 3, '.'),
(53, 23, 13, 46, 3, '.'),
(54, 23, 13, 47, 3, '.'),
(57, 34, 23, 56, 2, '160517032525color_negro.jpg'),
(58, 34, 22, 54, 2, '.'),
(59, 21, 3, 12, 1, '.'),
(60, 21, 3, 13, 1, '.'),
(61, 21, 3, 14, 1, '.'),
(63, 21, 6, 5, 1, '.'),
(64, 21, 6, 6, 1, '.'),
(66, 38, 3, 12, 1, '.'),
(67, 38, 3, 13, 1, '.'),
(68, 38, 3, 14, 1, '.'),
(69, 38, 3, 16, 1, '.'),
(72, 38, 26, 57, 1, '.'),
(75, 40, 3, 12, 1, '.'),
(76, 40, 3, 13, 1, '.'),
(77, 40, 3, 14, 1, '.'),
(78, 40, 3, 15, 1, '.'),
(79, 40, 3, 16, 1, '.'),
(80, 40, 6, 69, 1, '.'),
(81, 40, 26, 57, 1, '.'),
(83, 38, 6, 68, 1, '160921093241160411120119verde.png'),
(84, 25, 6, 6, 1, '160921125826160411120005azul.png'),
(86, 41, 44, 74, 5, '.'),
(87, 41, 44, 75, 5, '.'),
(88, 41, 44, 76, 5, '.'),
(89, 41, 44, 77, 5, '.'),
(90, 41, 44, 78, 5, '.'),
(91, 41, 49, 79, 5, '.'),
(93, 30, 44, 74, 5, '.'),
(94, 30, 44, 75, 5, '.'),
(95, 30, 44, 76, 5, '.'),
(96, 30, 49, 79, 5, '.'),
(98, 44, 6, 67, 1, '160930021545camisa-lux-vino.jpg'),
(99, 44, 27, 85, 1, '.'),
(100, 44, 26, 57, 1, '.'),
(101, 44, 3, 12, 1, '.'),
(102, 44, 28, 83, 1, '.'),
(103, 44, 3, 13, 1, '.'),
(104, 44, 3, 14, 1, '.'),
(105, 44, 3, 15, 1, '.'),
(107, 25, 6, 67, 1, '161003092027160506041130morado.jpg'),
(108, 47, 1, 12, 1, ''),
(109, 48, 1, 12, 1, ''),
(110, 49, 5, 5, 1, ''),
(111, 50, 5, 5, 1, ''),
(112, 51, 5, 5, 1, ''),
(113, 52, 6, 6, 1, ''),
(114, 53, 1, 12, 1, ''),
(115, 54, 3, 14, 1, ''),
(116, 54, 3, 14, 1, ''),
(117, 54, 3, 14, 1, ''),
(118, 55, 3, 13, 1, ''),
(119, 55, 3, 13, 1, ''),
(120, 56, 3, 13, 1, ''),
(121, 56, 3, 13, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_fotos`
--

CREATE TABLE IF NOT EXISTS `tbl_productos_fotos` (
  `id_productos_fotos` int(10) NOT NULL AUTO_INCREMENT,
  `fkproducto_productos_fotos` int(10) NOT NULL,
  `nombre_productos_fotos` varchar(100) NOT NULL,
  `orden_productos_fotos` int(10) NOT NULL,
  PRIMARY KEY (`id_productos_fotos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Volcado de datos para la tabla `tbl_productos_fotos`
--

INSERT INTO `tbl_productos_fotos` (`id_productos_fotos`, `fkproducto_productos_fotos`, `nombre_productos_fotos`, `orden_productos_fotos`) VALUES
(2, 5, '160125025808foto_detalle_1.jpg', 2),
(3, 5, '160125025813foto_detalle_2.jpg', 1),
(4, 5, '160125025819foto_detalle_3.jpg', 0),
(5, 6, '160125052148foto_detalle_1.jpg', 0),
(6, 6, '160125052155foto_detalle_2.jpg', 1),
(7, 7, '1601271105571.jpg', 1),
(8, 7, '1601271106022.jpg', 0),
(9, 8, '160209030149camisa azul (2).jpg', 0),
(10, 8, '160209030228camisa azul (3).jpg', 0),
(11, 8, '160209030252camisa azul (4).jpg', 0),
(12, 9, '160209030533camisa blanca (2).jpg', 0),
(13, 9, '160209030615camisa blanca (3).jpg', 0),
(14, 9, '160209030640camisa blanca (4).jpg', 0),
(15, 10, '160209031204camisa celesta (1).jpg', 0),
(16, 10, '160209031218camisa celesta (2).jpg', 0),
(17, 10, '160209031231camisa celesta (3).jpg', 0),
(18, 11, '160209032444camisa marron (1).jpg', 0),
(19, 11, '160209032627camisa marron (2).jpg', 0),
(20, 11, '160209032647camisa marron (4).jpg', 0),
(21, 12, '160209033052pantalon-azul-(1).jpg', 0),
(22, 12, '160209033105pantalon-azul-(2).jpg', 0),
(23, 12, '160209033141pantalon-azul-(3).jpg', 0),
(24, 13, '160209033331pantalon-beish-(2).jpg', 0),
(25, 13, '160209033411pantalon-beish-(3).jpg', 0),
(26, 13, '160209033437pantalon-beish-(4).jpg', 0),
(27, 14, '160209033608pantalon-gris-(1).jpg', 0),
(28, 14, '160209033644pantalon-gris-(2).jpg', 0),
(29, 14, '160209033708pantalon-gris-(3).jpg', 0),
(30, 15, '160209034830pantalon-negrol-(2).jpg', 0),
(31, 15, '160209034849pantalon-negrol-(3).jpg', 0),
(32, 15, '160209034907pantalon-negrol-(4).jpg', 0),
(33, 16, '160209035805zapato-azul-(1).jpg', 0),
(34, 16, '160209035815zapato-azul-(2).jpg', 0),
(35, 16, '160209035919zapato-azul-(3).jpg', 0),
(36, 17, '160209040304zapato-marron-(1).jpg', 0),
(37, 17, '160209040313zapato-marron-(2).jpg', 0),
(38, 17, '160209040324zapato-marron-(3).jpg', 0),
(39, 18, '160216042533chrysanthemum.jpg', 1),
(40, 18, '160216042602koala.jpg', 0),
(41, 19, '160224010139pc-aldo-2.jpg', 0),
(42, 20, '160224010504polo-frank-1.jpg', 0),
(43, 20, '160224010526polo-frank-2.jpg', 0),
(44, 20, '160224010539polo-frank-3.jpg', 0),
(45, 20, '160224010558polo-frank-4.jpg', 0),
(46, 20, '160224010612polo-frank-5.jpg', 0),
(47, 20, '160224010625polo-frank-6.jpg', 0),
(48, 21, '160224010940kl-venanzio-2.jpg', 0),
(49, 21, '160224011023kl-venanzio-3.jpg', 2),
(50, 21, '160224011042kl-venanzio-4.jpg', 1),
(51, 21, '160224011058kl-venanzio-6.jpg', 3),
(52, 21, '160224011126kl-venanzio-negro-1.jpg', 4),
(53, 21, '160224011234kl-venanzio-5.jpg', 5),
(54, 25, '160410083150dg-publicidad.jpg', 0),
(55, 37, '1609111211291.jpg', 0),
(56, 28, '160912120905160410011440pantalon-azul-(4).jpg', 0),
(57, 38, '16091811002801.jpg', 2),
(58, 38, '16091811010802.jpg', 1),
(59, 38, '16091811012703.jpg', 0),
(60, 40, '160919034312camisa-lux-guinda.jpg', 0),
(61, 40, '160919034332camisa-lux-guinda.jpg', 0),
(62, 40, '160919034340camisa-lux-guinda.jpg', 0),
(63, 40, '160919034414camisa-lux-guinda.jpg', 0),
(64, 40, '160919034420camisa-lux-guinda.jpg', 0),
(65, 41, '160919055638camisa-lux-verde.jpg', 0),
(66, 41, '160919055648camisa-lux-verde.jpg', 0),
(67, 41, '160919055656camisa-lux-verde.jpg', 0),
(68, 44, '160930021232camisa-lux-vino.jpg', 1),
(69, 44, '16093002133502.jpg', 0),
(70, 47, '', 0),
(71, 47, '3-11-2016-20-22-8-chrysanthemum-copiajpg.jpg', 0),
(72, 48, '', 0),
(73, 48, '3-11-2016-20-25-15-chrysanthemum-copiajpg.jpg', 0),
(74, 49, '', 0),
(75, 49, '3-11-2016-22-35-44-chrysanthemum-copiajpg.jpg', 0),
(76, 49, '3-11-2016-22-35-44-chrysanthemum-copiajpg.jpg', 0),
(77, 50, '', 0),
(78, 50, '3-11-2016-22-35-44-chrysanthemum-copiajpg.jpg', 0),
(79, 50, '3-11-2016-22-35-44-chrysanthemum-copiajpg.jpg', 0),
(80, 51, '', 0),
(81, 51, '3-11-2016-22-35-44-chrysanthemum-copiajpg.jpg', 0),
(82, 51, '3-11-2016-22-35-44-chrysanthemum-copiajpg.jpg', 0),
(83, 52, '', 0),
(84, 52, '3-11-2016-22-44-27-chrysanthemum-copiajpg.jpg', 0),
(85, 53, '', 0),
(86, 53, '3-11-2016-22-46-49-chrysanthemum-copiajpg.jpg', 0),
(87, 54, '', 0),
(88, 54, '4-11-2016-0-38-30-chrysanthemum-copiajpg.jpg', 0),
(89, 54, '4-11-2016-0-38-30-chrysanthemum-copiajpg.jpg', 0),
(90, 55, '', 0),
(91, 55, '4-11-2016-0-42-27-chrysanthemum-copiajpg.jpg', 0),
(92, 56, '', 0),
(93, 56, '4-11-2016-0-53-34-chrysanthemum-copiajpg.jpg', 0),
(94, 22, '161111075105chrysanthemum - copia.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_marcas`
--

CREATE TABLE IF NOT EXISTS `tbl_productos_marcas` (
  `id_productos_marcas` int(10) NOT NULL AUTO_INCREMENT,
  `fkproducto_productos_marcas` int(10) NOT NULL,
  `fkmarca_productos_marcas` int(10) NOT NULL,
  `fktipo_productos_marcas` int(10) NOT NULL,
  PRIMARY KEY (`id_productos_marcas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Volcado de datos para la tabla `tbl_productos_marcas`
--

INSERT INTO `tbl_productos_marcas` (`id_productos_marcas`, `fkproducto_productos_marcas`, `fkmarca_productos_marcas`, `fktipo_productos_marcas`) VALUES
(2, 5, 2, 1),
(3, 6, 2, 1),
(4, 7, 8, 2),
(5, 8, 4, 1),
(6, 9, 5, 1),
(7, 10, 5, 1),
(8, 11, 2, 1),
(9, 12, 6, 3),
(10, 13, 3, 3),
(11, 14, 4, 3),
(12, 15, 9, 3),
(13, 16, 2, 2),
(14, 17, 9, 2),
(15, 18, 2, 7),
(17, 20, 3, 4),
(20, 19, 9, 4),
(24, 23, 3, 3),
(25, 28, 4, 3),
(30, 37, 4, 3),
(31, 25, 7, 1),
(32, 31, 6, 1),
(33, 34, 6, 2),
(34, 35, 6, 1),
(35, 26, 6, 1),
(39, 38, 4, 1),
(40, 40, 4, 1),
(43, 30, 3, 5),
(44, 41, 5, 5),
(45, 22, 2, 1),
(46, 39, 7, 13),
(47, 27, 8, 6),
(49, 32, 5, 1),
(50, 36, 5, 4),
(51, 33, 6, 2),
(52, 29, 4, 6),
(53, 24, 2, 2),
(55, 43, 8, 4),
(56, 44, 4, 1),
(57, 45, 0, 0),
(58, 46, 0, 0),
(59, 47, 0, 0),
(60, 48, 0, 0),
(61, 49, 0, 0),
(62, 50, 0, 0),
(63, 51, 0, 0),
(64, 52, 0, 0),
(65, 45, 2, 1),
(66, 46, 2, 1),
(67, 47, 2, 1),
(68, 48, 2, 1),
(69, 49, 3, 1),
(70, 50, 3, 1),
(71, 51, 3, 1),
(72, 52, 2, 1),
(73, 53, 2, 1),
(74, 54, 2, 1),
(75, 55, 2, 1),
(76, 56, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos_ordenes`
--

CREATE TABLE IF NOT EXISTS `tbl_productos_ordenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `talla_producto` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_producto` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT '1',
  `precio` decimal(10,2) DEFAULT '0.00',
  `precio_total` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`,`id_orden`),
  KEY `fk_tbl_productos_ordenes_1_idx` (`id_orden`),
  KEY `fk_tbl_productos_ordenes_2_idx` (`id_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `tbl_productos_ordenes`
--

INSERT INTO `tbl_productos_ordenes` (`id`, `id_orden`, `id_producto`, `talla_producto`, `color_producto`, `cantidad`, `precio`, `precio_total`) VALUES
(1, 1, 21, 'S', '1603271231401.jpg', 6, '139.00', '834.00'),
(2, 2, 21, 'S', '1603271231401.jpg', 2, '139.00', '278.00'),
(3, 3, 21, '-', '-', 1, '139.00', '139.00'),
(4, 4, 21, 'S', '1603271231401.jpg', 2, '139.00', '278.00'),
(5, 5, 21, 'S', '1603271231401.jpg', 1, '139.00', '139.00'),
(6, 6, 21, 'S', '1603271231401.jpg', 2, '139.00', '278.00'),
(7, 7, 21, 'S', '1603271231401.jpg', 2, '139.00', '278.00'),
(8, 8, 19, '-', '-', 0, '249.00', '0.00'),
(9, 8, 23, '-', '-', 1, '111.00', '111.00'),
(10, 9, 23, '-', '-', 4, '111.00', '444.00'),
(11, 10, 24, '-', '-', 4, '150.00', '600.00'),
(12, 11, 21, 'S', '1603271231401.jpg', 0, '139.00', '0.00'),
(13, 11, 20, '-', '-', 1, '99.00', '99.00'),
(14, 12, 21, 'M', '1603271231401.jpg', 1, '139.00', '139.00'),
(15, 13, 23, 'Small', '160508113547color_negro.jpg', 1, '39.90', '39.90'),
(16, 14, 23, 'Small', '160508113547color_negro.jpg', 1, '39.90', '39.90'),
(17, 15, 23, 'Small', '160508113547color_negro.jpg', 1, '39.90', '39.90'),
(18, 16, 28, 'Small', '160508121821color_negro.jpg', 1, '79.00', '79.00'),
(19, 17, 29, '-', '-', 1, '300.00', '300.00'),
(20, 18, 34, 'S', '160517032525color_negro.jpg', 2, '450.00', '900.00'),
(21, 19, 29, '-', '-', 2, '300.00', '600.00'),
(22, 19, 34, 'S', '160517032525color_negro.jpg', 3, '450.00', '1350.00'),
(23, 20, 34, 'S', '160517032525color_negro.jpg', 1, '450.00', '450.00'),
(24, 20, 29, '-', '-', 1, '300.00', '300.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto_persona`
--

CREATE TABLE IF NOT EXISTS `tbl_producto_persona` (
  `id_producto_persona` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_tipo_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_producto_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `tbl_producto_persona`
--

INSERT INTO `tbl_producto_persona` (`id_producto_persona`, `id_producto`, `id_tipo_persona`) VALUES
(1, 43, 1),
(2, 44, 1),
(3, 45, 0),
(4, 46, 0),
(5, 47, 0),
(6, 48, 0),
(7, 49, 0),
(8, 50, 0),
(9, 51, 0),
(10, 52, 0),
(11, 45, 1),
(12, 46, 1),
(13, 47, 1),
(14, 48, 1),
(15, 49, 1),
(16, 50, 1),
(17, 51, 1),
(18, 52, 1),
(19, 53, 1),
(20, 54, 1),
(21, 55, 1),
(22, 56, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_relacionar_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_relacionar_productos` (
  `id_re_pro` int(10) NOT NULL AUTO_INCREMENT,
  `fkproducto1_re_pro` int(10) NOT NULL,
  `fkproducto2_re_pro` int(10) NOT NULL,
  PRIMARY KEY (`id_re_pro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `tbl_relacionar_productos`
--

INSERT INTO `tbl_relacionar_productos` (`id_re_pro`, `fkproducto1_re_pro`, `fkproducto2_re_pro`) VALUES
(7, 19, 20),
(5, 20, 19),
(3, 21, 19),
(4, 21, 20),
(6, 20, 21),
(8, 19, 21),
(11, 25, 22),
(12, 25, 23),
(13, 25, 24),
(14, 26, 22),
(15, 26, 23),
(19, 28, 26),
(18, 28, 22),
(20, 34, 25),
(21, 34, 29),
(22, 34, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_rol`, `nombre_rol`) VALUES
(4, 'Administrador'),
(5, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_seo`
--

CREATE TABLE IF NOT EXISTS `tbl_seo` (
  `id_seo` int(11) NOT NULL AUTO_INCREMENT,
  `title_seo` varchar(25) CHARACTER SET utf8 NOT NULL,
  `keywords_seo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description_seo` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_seo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_seo`
--

INSERT INTO `tbl_seo` (`id_seo`, `title_seo`, `keywords_seo`, `description_seo`) VALUES
(1, 'Innovatoreeee in', 'Innovatore', 'innovatore desc'),
(2, 'CAMISAS  ', 'camisas key', 'descripcion camisas'),
(3, 'Aeropostale', 'jovial, atrevido', 'Marca muy jovial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_temas`
--

CREATE TABLE IF NOT EXISTS `tbl_temas` (
  `id_tema` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_tema` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orden_tema` int(10) NOT NULL,
  PRIMARY KEY (`id_tema`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_temas`
--

INSERT INTO `tbl_temas` (`id_tema`, `titulo_tema`, `orden_tema`) VALUES
(1, 'Problemas con el enviÃ³', 0),
(2, 'Temas de Ayuda', 0),
(3, 'Comprar', 0),
(4, 'Estado De Ordenes y envÃ­os', 0),
(5, 'Medios de pago', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos`
--

CREATE TABLE IF NOT EXISTS `tbl_tipos` (
  `id_tipo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(100) NOT NULL,
  `foto_tipo` varchar(100) NOT NULL,
  `orden_tipo` int(10) NOT NULL,
  `url_page_tbl` varchar(900) NOT NULL,
  `tipo` char(4) NOT NULL,
  `_id_seo` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `_id_seo` (`_id_seo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tbl_tipos`
--

INSERT INTO `tbl_tipos` (`id_tipo`, `nombre_tipo`, `foto_tipo`, `orden_tipo`, `url_page_tbl`, `tipo`, `_id_seo`) VALUES
(1, 'CAMISAS ', '151111120659box_1.jpg', 0, 'camisas', 'prod', 2),
(2, 'ZAPATOS', '160830121932zapatos.jpg', 1, 'T-2-zapatos', 'prod', 0),
(3, 'PANTALONES', '1602011146241.jpg', 5, 'T-3-pantalones', 'prod', 0),
(4, 'POLOS', '1602011243161.jpg', 4, 'T-4-polos', 'prod', 0),
(5, 'ROPA', '160830122054ropa.jpg', 6, 'T-5-ropa', 'prod', 0),
(6, 'ACCESORIOS', '160830120518accesorios.jpg', 8, 'accesorios', '', 0),
(7, 'Ninguno', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_imagenes`
--

CREATE TABLE IF NOT EXISTS `tbl_tipos_imagenes` (
  `id_tipo_img` int(10) NOT NULL AUTO_INCREMENT,
  `foto_tipo_img` varchar(100) NOT NULL,
  `link_tipo_img` varchar(100) NOT NULL,
  `fk_tipo_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_img`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `tbl_tipos_imagenes`
--

INSERT INTO `tbl_tipos_imagenes` (`id_tipo_img`, `foto_tipo_img`, `link_tipo_img`, `fk_tipo_img`) VALUES
(1, '160913102957banner-categorias-1.jpg', 'compra-por-ocasion', '1'),
(2, '160913102311banner-tercio-1.jpg', 'http://royalty2.asesdigitales.pe/C-6-compra-por-ocasi%C3%93n', '1'),
(3, '160913102346banner-tercio-2.jpg', 'http://royalty2.asesdigitales.pe/C-14-compra-por-color', '1'),
(4, '160913102705banner-tercio-3.jpg', 'http://royalty2.asesdigitales.pe/C-16-compra-por-dise%C3%91o', '1'),
(5, '160913103530banner-categorias-2.jpg', 'http://royalty2.asesdigitales.pe/C-8-que-esta-de-moda', '1'),
(6, '160913104001banner-categorias-3.jpg', 'http://royalty2.asesdigitales.pe/C-7-compra-m%C3%81s-y-ahorra', '1'),
(7, '160913104252banner-categorias-4.jpg', 'http://royalty2.asesdigitales.pe/C-15-compra-por-entalle', '1'),
(8, '160913104645banner-categorias-5.jpg', 'http://royalty2.asesdigitales.pe/C-17-compra-todo-camisa', '1'),
(9, '160913104809banner-categorias-6.jpg', 'http://royalty2.asesdigitales.pe/C-5-recien-llegados', '1'),
(10, '160913104909banner-categorias-6.jpg', 'http://royalty2.asesdigitales.pe/C-18-compra-por-largo-de-mango', '1'),
(11, '160913115939banner-categorias-1.jpg', 'cxv', '2'),
(12, '160913120053banner-tercio-1.jpg', 'uty', '2'),
(13, '160913120224banner-tercio-2.jpg', 'rty', '2'),
(14, '160913125059banner-tercio-3.jpg', 'rty', '2'),
(15, '160913120359banner-categorias-2.jpg', 'rty', '2'),
(16, '160913120545banner-categorias-3.jpg', 'rty', '2'),
(17, '160913120611banner-categorias-4.jpg', 'hjk', '2'),
(18, '160913120650banner-categorias-5.jpg', 'iih', '2'),
(19, '160913120715banner-categorias-6.jpg', 'tu', '2'),
(20, '160913120746banner-categorias-6.jpg', 'tyu', '2'),
(21, '160913010133banner-categorias-1.jpg', 'cxv', '4'),
(22, '160913010254banner-tercio-1.jpg', 'uty', '4'),
(23, '160913010454banner-tercio-2.jpg', 'rty', '4'),
(24, '160913010819banner-tercio-3.jpg', 'rty', '4'),
(25, '160913010943banner-categorias-2.jpg', 'rty', '4'),
(26, '160913011135banner-categorias-3.jpg', 'rty', '4'),
(27, '160913011344banner-categorias-4.jpg', 'hjk', '4'),
(28, '160913011758banner-categorias-5.jpg', 'iih', '4'),
(29, '160913011940banner-categorias-6.jpg', 'tu', '4'),
(30, '160913012102banner-categorias-6.jpg', 'tyu', '4'),
(31, '160913010150banner-categorias-1.jpg', 'cxv', '3'),
(32, '160913010314banner-tercio-1.jpg', 'uty', '3'),
(33, '160913010650banner-tercio-2.jpg', 'rty', '3'),
(34, '160913010833banner-tercio-3.jpg', 'rty', '3'),
(35, '160913011001banner-categorias-2.jpg', 'rty', '3'),
(36, '160913011152banner-categorias-3.jpg', 'rty', '3'),
(37, '160913011412banner-categorias-4.jpg', 'hjk', '3'),
(38, '160913011818banner-categorias-5.jpg', 'iih', '3'),
(39, '160913011955banner-categorias-6.jpg', 'tu', '3'),
(40, '160913012119banner-categorias-6.jpg', 'tyu', '3'),
(41, '160913010208banner-categorias-1.jpg', 'cxv', '5'),
(42, '160913011212banner-categorias-3.jpg', 'http://royalty2.asesdigitales.pe/C-51-compra-por-categor%C3%8Da', '5'),
(43, '160913010710banner-tercio-2.jpg', 'http://royalty2.asesdigitales.pe/C-63-compra-m%C3%81s-y-ahorra', '5'),
(44, '160913010849banner-tercio-3.jpg', 'http://royalty2.asesdigitales.pe/C-64-qu%C3%89-est%C3%81-de-moda', '5'),
(45, '160913011019banner-categorias-2.jpg', 'http://royalty2.asesdigitales.pe/C-68-compra-por-talla', '5'),
(46, '160913011656banner-categorias-3.jpg', 'http://royalty2.asesdigitales.pe/C-69-compra-con-descuentos', '5'),
(47, '160913011609banner-categorias-4.jpg', 'http://royalty2.asesdigitales.pe/C-70-compra-todo-ropa', '5'),
(48, '160913011837banner-categorias-5.jpg', 'http://royalty2.asesdigitales.pe/C-71-compra-por-marca', '5'),
(49, '160913012011banner-categorias-6.jpg', 'http://royalty2.asesdigitales.pe/C-65-reci%C3%89n-llegados', '5'),
(50, '160913012135banner-categorias-6.jpg', 'tyu', '5'),
(51, '160913123232banner-categorias-1.jpg', 'http://royalty2.asesdigitales.pe/D-38-camisa-washed-azul', '13'),
(52, '160913125437banner-tercio-1.jpg', 'uty', '13'),
(53, '160913125547banner-tercio-2.jpg', 'rty', '13'),
(54, '160913125641banner-tercio-3.jpg', 'rty', '13'),
(55, '160913123833banner-categorias-2.jpg', 'rty', '13'),
(56, '160913125726banner-categorias-3.jpg', 'rty', '13'),
(57, '160913125804banner-categorias-4.jpg', 'hjk', '13'),
(58, '160913125841banner-categorias-5.jpg', 'iih', '13'),
(59, '160913125921banner-categorias-6.jpg', 'tu', '13'),
(60, '160913125953banner-categorias-6.jpg', 'tyu', '13'),
(61, '160913010053banner-categorias-1.jpg', 'http://localhost/web-royalti/productos.php?categoria=5', '14'),
(62, '160913010117banner-categorias-3.jpg', 'uty', '14'),
(63, '160913010432banner-tercio-2.jpg', 'rty', '14'),
(64, '160913010802banner-tercio-3.jpg', 'rty', '14'),
(65, '160913010929banner-categorias-2.jpg', 'rty', '14'),
(66, '160913011116banner-categorias-3.jpg', 'rty', '14'),
(67, '160913011318banner-categorias-4.jpg', 'hjk', '14'),
(68, '160913011736banner-categorias-5.jpg', 'iih', '14'),
(69, '160913011923banner-categorias-6.jpg', 'tu', '14'),
(70, '160913012046banner-categorias-6.jpg', 'tyu', '14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_marcas`
--

CREATE TABLE IF NOT EXISTS `tbl_tipos_marcas` (
  `id_tipos_marcas` int(10) NOT NULL AUTO_INCREMENT,
  `fkmarcas_tipos_marcas` int(10) NOT NULL,
  `foto_tipos_marcas` varchar(100) NOT NULL,
  `fktipos_tipos_marcas` int(10) NOT NULL,
  PRIMARY KEY (`id_tipos_marcas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

--
-- Volcado de datos para la tabla `tbl_tipos_marcas`
--

INSERT INTO `tbl_tipos_marcas` (`id_tipos_marcas`, `fkmarcas_tipos_marcas`, `foto_tipos_marcas`, `fktipos_tipos_marcas`) VALUES
(56, 4, '1609051230001.jpg', 3),
(57, 4, '1609050923102.jpg', 2),
(58, 4, '1609050923243.jpg', 1),
(59, 4, '1609050924034.jpg', 4),
(60, 4, '1609050924155.jpg', 6),
(61, 4, '1609050924306.jpg', 5),
(87, 6, '1609051002471.jpg', 4),
(88, 6, '1609051002542.jpg', 3),
(89, 6, '1609051003063.jpg', 2),
(90, 6, '1609051003144.jpg', 1),
(91, 6, '1609051003265.jpg', 5),
(92, 6, '1609051003346.jpg', 6),
(93, 5, '1609051010101.jpg', 1),
(94, 5, '1609051010182.jpg', 3),
(95, 5, '1609051010293.jpg', 4),
(96, 5, '1609051010374.jpg', 2),
(97, 5, '1609051010475.jpg', 5),
(98, 5, '1609051010546.jpg', 6),
(114, 3, '16090510544210.jpg', 3),
(115, 3, '16090510545511.jpg', 5),
(116, 3, '16090510550512.jpg', 6),
(117, 3, '16090510551413.jpg', 4),
(118, 3, '16090510552714.jpg', 5),
(121, 8, '1609051112503.jpg', 4),
(122, 8, '1609051113074.jpg', 2),
(124, 8, '1609051113216.jpg', 3),
(132, 2, '1609051153461.jpg', 1),
(133, 2, '1609051154012.jpg', 2),
(134, 2, '1609051154153.jpg', 6),
(135, 2, '1609051154334.jpg', 4),
(136, 2, '1609051154415.jpg', 5),
(137, 2, '1609051154486.jpg', 3),
(138, 9, '1609050441161.jpg', 5),
(139, 9, '1609050441372.jpg', 4),
(140, 9, '1609050441453.jpg', 3),
(141, 9, '1609050441534.jpg', 6),
(142, 9, '1609050442025.jpg', 2),
(143, 7, '1609050501461.jpg', 1),
(144, 7, '1609050501592.jpg', 3),
(145, 7, '1609050502093.jpg', 4),
(146, 7, '1609050502194.jpg', 5),
(147, 7, '1609050502305.jpg', 6),
(148, 7, '1609050502396.jpg', 2),
(149, 8, '1609061111321.jpg', 6),
(152, 10, '160927122543160125025819foto_detalle_3.jpg', 7),
(153, 10, '160927122602151111120856box_2.jpg', 7),
(154, 10, '160927122619160209033411pantalon-beish-(3).jpg', 3),
(155, 10, '160927123158151112114701detalle_marca_2.jpg', 4),
(156, 10, '1609050923102.jpg', 5),
(157, 10, '1609050923102.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_cambio`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_cambio` (
  `id_tipo_cambio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_moneda` varchar(60) CHARACTER SET utf8 NOT NULL,
  `tipo_moneda` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `valor_moneda` double NOT NULL,
  `simbolo_moneda` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `estado_moneda` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `orden_moneda` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_cambio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_tipo_cambio`
--

INSERT INTO `tbl_tipo_cambio` (`id_tipo_cambio`, `nombre_moneda`, `tipo_moneda`, `valor_moneda`, `simbolo_moneda`, `estado_moneda`, `orden_moneda`) VALUES
(1, 'Soles', 'N', 1, 'S/.', '1', 0),
(2, 'Dolares', 'E', 3.4, '$/', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_persona`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_persona` (
  `id_tipo_persona` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_persona` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_tipo_persona`
--

INSERT INTO `tbl_tipo_persona` (`id_tipo_persona`, `tipo_persona`) VALUES
(1, 'Adulto'),
(2, 'Niño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajadores`
--

CREATE TABLE IF NOT EXISTS `tbl_trabajadores` (
  `id_tra` int(10) NOT NULL AUTO_INCREMENT,
  `nom_tra` varchar(100) NOT NULL,
  `paterno_tra` varchar(100) NOT NULL,
  `materno_tra` varchar(100) NOT NULL,
  `dni_tra` char(8) NOT NULL,
  `email_tra` varchar(100) NOT NULL,
  `fk_rol` int(10) NOT NULL,
  `user_tra` varchar(100) NOT NULL,
  `pass_tra` varchar(100) NOT NULL,
  `fkunidad_tra` int(10) NOT NULL,
  `celular_tra` int(9) NOT NULL,
  PRIMARY KEY (`id_tra`),
  KEY `trabajadores_roles` (`fk_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_trabajadores`
--

INSERT INTO `tbl_trabajadores` (`id_tra`, `nom_tra`, `paterno_tra`, `materno_tra`, `dni_tra`, `email_tra`, `fk_rol`, `user_tra`, `pass_tra`, `fkunidad_tra`, `celular_tra`) VALUES
(2, 'SQUARZI', 'TEST', 'TEST', '5466456', 'test@hotmail.com', 4, 'admin', '0502', 9, 983636463);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `id_vi` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_vi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto_vi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_vi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orden_vi` int(10) NOT NULL,
  PRIMARY KEY (`id_vi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_videos`
--

INSERT INTO `tbl_videos` (`id_vi`, `titulo_vi`, `foto_vi`, `link_vi`, `orden_vi`) VALUES
(1, 'El desfile de Dolce & Gabbana para el Invierno 2015-2016', '160306120935video_2.jpg', 'https://www.youtube.com/watch?v=eIxNF7u78tM', 1),
(3, 'Hombres elegantes y vanguardistas', '160306121114video_2.jpg', 'https://www.youtube.com/watch?v=AwWKNauSZZ8', 2),
(4, 'Tendencia DOLCE GABANNA 2015', '160306121130video_2.jpg', 'https://www.youtube.com/watch?v=Ohdsg4u6Nc0', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
