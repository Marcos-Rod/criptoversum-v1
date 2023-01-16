-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-08-2022 a las 09:55:32
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peperoni_criptoversum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `slug`, `status`, `create_at`, `update_at`) VALUES
(1, 'Tecnología', 'tecnologia', '1', '2022-07-18 22:43:35', '2022-07-18 22:42:52'),
(2, 'Negocios', 'negocios', '1', '2022-07-18 22:41:23', '2022-07-18 22:41:23'),
(3, 'Deportes', 'deportes', '1', '2022-07-18 22:39:01', '2022-07-18 22:33:21'),
(4, 'Cultura', 'cultura', '1', '2022-07-18 22:44:49', '2022-07-18 22:44:49'),
(5, 'Política', 'politica', '1', '2022-07-18 22:45:00', '2022-07-18 22:45:00'),
(6, 'Viajes', 'viajes', '1', '2022-07-18 22:45:06', '2022-07-18 22:45:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(1) NOT NULL,
  `proyecto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `proyecto`, `url`, `keywords`, `descripcion`) VALUES
(1, 'CriptoVersum', 'http://web.peperonidigital.mx/criptoversum/', 'Cripto, Criptomonedas,', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus ut architecto tempora sunt repellat iure nisi aut, veritatis illo eveniet omnis at veniam amet cumque animi eos. Distinctio, minima facilis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `destacada` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extracto` text COLLATE utf8_unicode_ci,
  `keywords` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_new` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `categoria_id` int(11) NOT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `titulo`, `slug`, `destacada`, `extracto`, `keywords`, `data_new`, `body`, `categoria_id`, `status`, `create_at`, `update_at`) VALUES
(1, 'Se abre el primer cajero automático de Bitcoins en México', 'se-abre-el-primer-cajero-automatico-de-bitcoins-en-mexico', 'a6c1b-bitcoin-mexico.jpg', 'Si quieres sumarte a millones de personas de todo el mundo que ya usan la criptomoneda, hay una forma de hacerlo de una manera que te resultará familiar.', 'tecnología, Bitcoin, Bitcoin mexico, Cajeros de bitcoin', 'Carlos Morales | Forbes | 1 enero 2018', '<p>El fin del dinero tal como lo conocemos est&aacute; cerca, o al menos eso es lo que David Noriega cree, es por eso que hace tres a&ntilde;os instal&oacute; en su tienda de c&oacute;mics un cajero autom&aacute;tico en donde cualquiera puede comprar o vender bitcoins, esa criptomoneda que se ha vuelto tan popular en los &uacute;ltimos a&ntilde;os.</p>\r\n\r\n<p>A pesar de ser primordialmente un empresario, Noriega se autodefine a s&iacute; mismo como un &ldquo;evangelizador del Bitcoin, alguien que quiere que la gente lo acepte&rdquo;.</p>\r\n\r\n<p>Noriega recibi&oacute; a <strong>Forbes M&eacute;xico</strong> en Fant&aacute;stico, su tienda de c&oacute;mics &mdash;ubicada en la esquina de F&eacute;lix Cuevas y Nicol&aacute;s San Juan&mdash; para platicar sobre los motivos que lo llevaron a instalar el ATM, y lo que pens&aacute;bamos ser&iacute;a una conversaci&oacute;n sobre tecnolog&iacute;a r&aacute;pidamente se volc&oacute; a la pol&iacute;tica y la econom&iacute;a.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo;Yo me enter&eacute; del Bitcoin por mi afiliaci&oacute;n pol&iacute;tica, soy libertario y como tal s&eacute; que un gran problema de los gobiernos de todo el mundo es la gran libertad con la que manejan su moneda, pr&aacute;cticamente todos los pa&iacute;ses tienen un banco central y, aunque se supone que el banco central es independiente, en realidad sigue siendo parte del gobierno y como tal sus pol&iacute;ticas monetarias responden a las necesidades coyunturales de ese gobierno&rdquo;</p>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<p style=\"text-align:start\">&ldquo;Una de esas necesidades, por lo general, es estimular la econom&iacute;a a m&aacute;s no poder, lo que motiva la creaci&oacute;n de una moneda ficticia, una moneda respaldada porque el gobierno dice que es v&aacute;lida y con la que solamente puedes pagar impuestos, as&iacute; que desde hace muchos a&ntilde;os he estado buscado una criptomoneda que sea efectiva y descubr&iacute; una forma de hacerlo con el Bitcoin, cuando me entere pens&eacute; que era una maravilla, eso fue en 2011.&rdquo;</p>\r\n</blockquote>\r\n\r\n<p>Noriega sinti&oacute; una fascinaci&oacute;n con la criptomoneda, cuya meta es reemplazar a todas las monedas del mundo &mdash;eso incluye, obviamente, al d&oacute;lar, al yen y al euro&mdash;, una tarea nada sencilla.</p>\r\n\r\n<h2>&iquest;Y qu&eacute; demonios es el Bitcoin?</h2>\r\n\r\n<p>El Bitcoin es un protocolo desarrollado por Satoshi Nakamoto, cuya identidad es desconocida hasta la fecha &mdash;podr&iacute;a tratarse de una persona o de un grupo de personas y mucho se ha especulado al respecto&ndash;, con el fin de crear una moneda digital que escapara a un control centralizado.</p>\r\n\r\n<p>Cada moneda digital es una l&iacute;nea de c&oacute;digo que se crea tras la resoluci&oacute;n de complejos problemas matem&aacute;ticos que se vuelven cada vez m&aacute;s elaborados, a la resoluci&oacute;n de esos problemas se le llama miner&iacute;a y el proceso demanda una gran capacidad de c&oacute;mputo para su realizaci&oacute;n.</p>\r\n\r\n<p>Cada moneda es &uacute;nica y divisible hasta en 10 millon&eacute;simas. La seguridad de las transacciones se asegura gracias a una tecnolog&iacute;a llamada blockchain, &ldquo;cuando t&uacute; haces una transacci&oacute;n de Bitcoin, no s&eacute;, equis cantidad, esa se manda al internet y esa transacci&oacute;n empieza a rebotar en toda la red de todas las personas que tienen un billete de Bitcoin&rdquo;, de forma que todos saben cuando una transacci&oacute;n es realizada y &eacute;sta queda registrada en un archivo inalterable, lo que permite que cualquiera pueda verificarla.</p>\r\n\r\n<h2>La pizza m&aacute;s cara de la historia</h2>\r\n\r\n<p>Al inicio, relata Noriega, el Bitcoin no val&iacute;a nada y hab&iacute;a algunas personas que ten&iacute;an cientos de miles de ellos porque los estaban minando muy f&aacute;cilmente, &ldquo;un d&iacute;a alguien dijo &lsquo;yo tengo unos Bitcoins y si alguien me compra una pizza le mando 10,000&rsquo;, y alguien desde otra parte del mundo orden&oacute; la pizza usando su tarjeta de cr&eacute;dito y entonces recibi&oacute; sus 10,000 bitcoins, &eacute;sa fue la primera transacci&oacute;n que se hizo por un producto&rdquo;.</p>\r\n\r\n<p>Al precio actual, de 1,254 d&oacute;lares, esa pizza habr&iacute;a valido m&aacute;s de 12.5 millones de d&oacute;lares. Al principio el valor de la criptomoneda era m&aacute;s bien simb&oacute;lico, pero, cuenta Noriega, poco a poco fue apreci&aacute;ndose: &ldquo;Cuando yo entr&eacute; en el 2011 el bitcoin andaba entre 5 y 10 d&oacute;lares, y de repente se dispar&oacute; much&iacute;simo, en 2013 lleg&oacute; a valer 1,000 d&oacute;lares, si yo compr&eacute; 100 bitcoins a 10 d&oacute;lares, en 2013 ten&iacute;a 100,000 d&oacute;lares, fue una subida muy fuerte, pero luego cay&oacute; y ahora se ha recuperado y volvi&oacute; a superar los 1,200 d&oacute;lares.&rdquo;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Bitcoin pizza day\" class=\"img-fluid\" src=\"/userfiles/images/bitcoin_pizza_day.jpg\" style=\"width:600px\" title=\"Bitcoin pizza day\" /></p>\r\n', 1, '2', '2022-07-19 16:54:28', '2022-08-01 18:35:40'),
(2, 'Se abre el primer café de crypto en Argentina', 'se-abre-el-primer-cafe-de-crypto-en-argentina', 'f7db0-img-crypstation.jpg', 'CrypStation es pionero en el país. Está ubicado en Puerto Madero y tendrá actividades para la comunidad cripto.', 'Café crypto, CrypStation, Bitcoin, criptomonedas,', 'Cronista | 06 mayo 2022', '<p>CrypStation es pionero en el pa&iacute;s. Est&aacute; ubicado en Puerto Madero y tendr&aacute; actividades para la comunidad cripto.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Crypstation\" class=\"img-fluid\" src=\"/userfiles/images/img-crypstation.jpg\" style=\"width:600px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Hoy <strong>abri&oacute; sus puertas al p&uacute;blico</strong> un nuevo caf&eacute; crypto con <strong>cajero Athena</strong> para comprar Bitcoin. El comercio surge en pleno boom de las criptomonedas en la Argentina y el mundo, ajeno a la embestida del Banco Central contra la popularizaci&oacute;n de los criptoactivos.</p>\r\n\r\n<p style=\"text-align:justify\">El caf&eacute; <strong>CrypStation </strong>est&aacute; en <strong>Puerto Madero</strong> y permite pagar con m&aacute;s de 30 criptomonedas y brinda asesoramiento especial para quienes quieran conocer o profundizar sus conocimientos sobre el mundo cripto.</p>\r\n\r\n<h2 style=\"text-align:justify\">UN FARO CRIPTO EN BUENOS AIRES</h2>\r\n\r\n<p style=\"text-align:justify\">Este primer cripto caf&eacute; de Buenos Aires es, adem&aacute;s, un espacio de capacitaciones y encuentro. Promete charlas y lanzamientos para incentivar el uso de las <strong>criptomonedas </strong>en Argentina, ya no s&oacute;lo como una opci&oacute;n de inversi&oacute;n, sino como moneda de uso corriente.</p>\r\n\r\n<blockquote>\r\n<p style=\"text-align:justify\">&quot;Queremos acercar las criptomonedas a todo el p&uacute;blico, que los que a&uacute;n no se animan se acerquen a CrypStation y se saquen las dudas, reciban asesoramiento y pasen a formar parte de esta comunidad, que sigue creciendo en Argentina y en el mundo. Creemos en un futuro con una econom&iacute;a digital, libre y abierta&quot;, <strong>explic&oacute; Mauro Liberman, socio fundador de CrypStation</strong>.</p>\r\n</blockquote>\r\n\r\n<p style=\"text-align:justify\">Como parte de su estrategia de consolidarse como lugar de Networking, CrypStation tambi&eacute;n funcionar&aacute; como incubadora, fomentando y dando soporte de VC a distintos proyectos en blockchain, de la mano de Sancor Venture.</p>\r\n\r\n<h2>CAJERO ATHENA PARA COMPRAR BITCOIN</h2>\r\n\r\n<p style=\"text-align:justify\"><strong>CrypStation </strong>tendr&aacute; su propio espacio en el metaverso y cuenta con <strong>cajero autom&aacute;tico de Athena</strong>, que permite comprar y vender las principales <strong>criptomonedas </strong>de manera sencilla e instant&aacute;nea. Adem&aacute;s de dar la opci&oacute;n de pagar con <strong>criptomonedas</strong>, tambi&eacute;n acepta los medios de pagos tradicionales.</p>\r\n\r\n<p style=\"margin-left:auto; margin-right:0; text-align:start\">El espacio est&aacute; ubicado en la UCA de Puerto Madero y es de acceso p&uacute;blico.</p>\r\n\r\n<h2 style=\"text-align:start\">EMPRENDIMIENTO CRIPTO</h2>\r\n\r\n<blockquote>\r\n<p>CrypStation surgi&oacute; de cuatro emprendedores argentinos que fundaron CrypGroup: Jorge Molina, especialista en finanzas, Mauro Liberman, master en blockchain y metaverse, Ezequiel Fern&aacute;ndez, especialista en desarrollo y Pablo D&#39;Alessandro con trayectoria en el mundo gastron&oacute;mico y franquicias.</p>\r\n</blockquote>\r\n\r\n<p>Desde hace a&ntilde;os trabajan en distintos proyectos fomentando el uso de las criptomonedas.</p>\r\n', 2, '2', '2022-07-19 20:54:19', '2022-08-01 18:25:15'),
(3, 'El primer equipo de futbol en aceptar criptomonedas', 'el-primer-equipo-de-futbol-en-aceptar-criptomonedas', '59557-des-deportes.jpg', 'Los Tigres se convirtieron en el primer equipo del fútbol mexicano en anunciar su entrada al comercio digital mediante una alianza con Bitso, plataforma dedicada en comprar y vender criptomonedas.', 'criptomonedas', 'AFP | 24 Horas | 23 noviembre 2021', '<p>Los Tigres se convirtieron en el primer equipo del f&uacute;tbol mexicano en anunciar su entrada al comercio digital mediante una alianza con Bitso, plataforma dedicada en comprar y vender criptomonedas.</p>\r\n\r\n<blockquote>\r\n<p>Esta alianza marca nuestra entrada al mundo de los deportes a nivel mundial y es el primer patrocinio de una empresa de criptomonedas en el f&uacute;tbol nacional&raquo;, dijo Jos&eacute; Molina, director global de marketing de Bitso, en conferencia de prensa.</p>\r\n</blockquote>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" class=\"img-fluid\" src=\"/userfiles/images/el-primer-equipo-de-futbol-en-aceptar-criptomonedas.jpg\" style=\"height:300px; width:600px\" />&nbsp;</p>\r\n\r\n<p>Esta relaci&oacute;n tendr&aacute; una duraci&oacute;n de tres a&ntilde;os a partir del torneo Clausura 2022 que comenzar&aacute; en enero e ir&aacute; m&aacute;s all&aacute; de la presencia de la marca Bitso en la camiseta de los Tigres.</p>\r\n\r\n<p>Mauricio Culebro, presidente de Tigres, coment&oacute; que el club explorar&aacute; &laquo;nuevas oportunidades&raquo; para interactuar con la afici&oacute;n y los futbolistas mediante el uso de criptomonedas.</p>\r\n\r\n<blockquote>\r\n<p>Explorar nuevas oportunidades para el club como aceptar pagos en criptomonedas en la tienda virtual, taquilla, as&iacute; como ver la posibilidad de que nuestros jugadores puedan recibir su salario en criptomonedas en un futuro y &iquest;por qu&eacute; no?, tambi&eacute;n explorar otras posibilidades dentro del mercado de transferencias de jugadores&raquo;, explic&oacute; Culebro.</p>\r\n</blockquote>\r\n\r\n<p>Este convenio implica que los jugadores de Tigres participar&aacute;n en la generaci&oacute;n de contendido educativo para que los aficionados se acerquen y conozcan m&aacute;s de las criptomonedas y del comercio digital.</p>\r\n\r\n<p>Fundados en 1960, los Tigres, siete veces campeones de la liga mexicana, cuenta con una base de 42.000 aficionados que cuentan con abono para el estadio Universitario.</p>\r\n', 3, '2', '2022-07-19 16:54:16', '2022-08-01 18:48:20'),
(4, 'Signal integra criptomoneda enfocada en privacidad a su app de mensajería', 'signal-integra-criptomoneda-enfocada-en-privacidad-a-su-app-de-mensajeria', 'a7581-des-signal.jpg', 'Signal, aplicación de llamadas y mensajería instantánea de código abierto, lanzó ayer, 6 de abril, una actualización de prueba con distintas funciones, entre las que se encuentra la función de pagos, Signal Payment.', 'Signal, Criptomonedas, Seguridad, Ciberseguridad', '', '<p>Signal, aplicaci&oacute;n de llamadas y mensajer&iacute;a instant&aacute;nea de c&oacute;digo abierto, lanz&oacute; ayer, 6 de abril, una actualizaci&oacute;n de prueba con distintas funciones, entre las que se encuentra la funci&oacute;n de pagos, <strong>Signal Payment</strong>. Esta nueva funci&oacute;n permite a los usuarios de Signal recibir y enviar dinero a trav&eacute;s de la aplicaci&oacute;n, con la misma rapidez de un mensaje de texto.</p>\r\n\r\n<p>Seg&uacute;n el blog oficial de Signal, los pagos con <strong>Signal Payment</strong> se har&aacute;n a trav&eacute;s de la red de <strong>MobileCoin</strong>, la cual tiene su propia moneda enfocada en privacidad, <strong>MOB</strong>.</p>\r\n\r\n<p>En una entrevista hecha por la revista Wired a Moxie Marlinspike, creador y CEO de Signal, dijo que la idea de Signal Payment era extender la <strong>protecci&oacute;n de privacidad</strong> que hasta ahora ha ofrecido Signal en sus conversaciones encriptadas, al nuevo sistema de pagos.</p>\r\n\r\n<blockquote>\r\n<p>Hay una diferencia palpable en la sensaci&oacute;n de c&oacute;mo es comunicarse por Signal sabiendo que no estas siendo observado o escuchado frente a otras plataformas (&hellip;) Me gustar&iacute;a llegar a un mundo donde no solo puedas sentir eso cuando hablas con tu terapeuta por Signal, si no tambi&eacute;n cuando le pagas a tu terapeuta por la sesi&oacute;n en Signal.</p>\r\n</blockquote>\r\n\r\n<p>Signal fue recomendada por<strong> Elon Musk</strong> y<strong> Edward Snowden</strong> en enero tras el anuncio de las nuevas pol&iacute;ticas de privacidad de WhatsApp, ya que la aplicaci&oacute;n prioriza la protecci&oacute;n de la informaci&oacute;n y no recopila ning&uacute;n dato del usuario.</p>\r\n\r\n<p>Siguiendo por esta l&iacute;nea, para <strong>resguardar la privacidad de sus usuarios</strong>, Signal no tendr&aacute; forma de acceder a la informaci&oacute;n del balance, el historial de transacciones o los fondos que estos tenga en MobileCoin o Signal Payment.</p>\r\n\r\n<p>Por ahora la funci&oacute;n de Signal Payment solo estar&aacute; disponible para <strong>IOS </strong>y <strong>Android </strong>para usuarios de Signal que vivan en el <strong>Reino Unido</strong>. A medida que se vea el desarrollo de la funci&oacute;n, esta ir&aacute; abri&eacute;ndose paulatinamente en otros pa&iacute;ses.</p>\r\n\r\n<p>MobileCoin empez&oacute; a cotizar como una moneda de valor real en diciembre del a&ntilde;o pasado con un suministro de <strong>250 millones de monedas</strong>. Tras el anuncio, la moneda se ha disparado desde <strong>USD 6</strong> por unidad a un pico de<strong> USD 66</strong>. Sin embargo, en este momento experimenta un retroceso que la sit&uacute;a en <strong>USD 38</strong> por moneda, tal como puede verse en CoinMarketCap</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"MobileCoin\" src=\"https://www.criptonoticias.com/wp-content/uploads/2021/04/grafico-precio-mobilecoin.jpg.webp\" style=\"height:365px; width:600px\" /></p>\r\n\r\n<p>Las MOB recibidas a trav&eacute;s de Signal se pueden cambiar por ahora solo a trav&eacute;s de los exchanges FTX, el cual en 2020 lanz&oacute; contratos de futuros sobre el hash rate de Bitcoin, as&iacute; como en Bitfinex, BigONE y HotBit.</p>\r\n\r\n<h2>Privacidad dentro de las transacciones de MobileCoin</h2>\r\n\r\n<p>MobileCoin, al igual que Bitcoin, se basa en un modelo de transacciones UTXO, donde cada una de ellas es independiente y por lo tanto no existe un balance unitario, si bien puede reflejarse de esta manera ante el usuario.</p>\r\n\r\n<p>La red, seg&uacute;n se lee en su GitHub, tambi&eacute;n utiliza el protocolo llamado <strong>CryptoNote</strong>, usado por Monero en sus inicios, y varias t&eacute;cnicas de ofuscamiento como <em><strong>Ring Confidencial Transactions y Zero Knowledge Proof</strong></em>. La primera t&eacute;cnica mezcla las transacciones de los usuarios para que sea dif&iacute;cil rastrearlas, a la vez que oculta el n&uacute;mero de transacciones del usuario; mientras que la segunda tiene la funci&oacute;n de garantizar que una transacci&oacute;n ha ocurrido sin revelar su valor.</p>\r\n\r\n<p>MobileCoin por &uacute;ltimo se vale de la<strong> funci&oacute;n SGX</strong> de los procesadores de Intel, para asegurarse de que los servidores de red eliminen toda la informaci&oacute;n de la transacci&oacute;n, dejando solo una especie de <strong>recibo criptogr&aacute;fico</strong> que confirma que esta se hizo.</p>\r\n', 1, '2', '2022-07-19 22:01:24', '2022-08-01 19:14:19'),
(5, 'Los países que más usan criptomonedas', 'los-paises-que-mas-usan-criptomonedas', '6354e-criptomonedas.jpg', 'La inversión en criptomonedas es bastante popular en la India, donde en 2021 el 18% de los encuestados dijo poseer bitcoins o altcoins.', 'Adopción de cripto, Criptomonedas', 'EKOS | 16 Febrero 2022', '<p>El precio de las criptomonedas suele ser extremadamente vol&aacute;til, como demuestra el ejemplo de Bitcoin. No obstante, los problemas derivados de las fluctuaciones en el valor de las monedas virtuales no impiden que los inversores se decanten, al parecer, cada vez m&aacute;s por los activos digitales, como muestran los resultados de la macroencuesta Statista Global Consumer Survey.</p>\r\n\r\n<p>La inversi&oacute;n en criptomonedas es bastante popular en la India, donde en 2021 el 18% de los encuestados dijo poseer bitcoins o altcoins &mdash;t&eacute;rmino que hace referencia a cualquier criptomoneda que no sea Bitcoin&mdash;. En comparaci&oacute;n con la encuesta llevada a cabo en 2019, la proporci&oacute;n ha aumentado once puntos porcentuales. Las monedas basadas en la tecnolog&iacute;a blockchain tambi&eacute;n han experimentado un importante auge en pa&iacute;ses como Corea del Sur, Estados Unidos o Alemania. En Espa&ntilde;a, el 14% de los encuestados afirmaba usar o poseer criptomonedas en 2021, frente al 10% de 2019. En cambio, en los dos pa&iacute;ses latinoamericanos recogidos en el gr&aacute;fico, Brasil (16%) y M&eacute;xico (11%), los porcentajes se mantienen invariables.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Adopción de criptomonedas\" class=\"img-fluid\" src=\"https://admin.grupo-ekos.com//storage/posts/February2022/18425.jpg\" style=\"width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', 5, '2', '2022-07-20 17:28:03', '2022-08-01 19:30:21'),
(6, 'Gobierno de Uruguay alerta sobre Fake Coins, estafas con criptomonedas', 'gobierno-de-uruguay-alerta-sobre-fake-coins-estafas-con-criptomonedas', 'dbf99-cripto-fake.jpg', 'El gobierno de Uruguay, a través del Ministerio del Interior, dio comienzo esta semana a una campaña informativa que busca concientizar al público y ayudarlo a identificar las diferentes formas de estafas con criptomonedas.', 'Fake Coins, Estafas cripto', 'Glenda Gonzálex | Criptonoticias | 20 mayo 2022', '<p>El gobierno de Uruguay, a trav&eacute;s del Ministerio del Interior, dio comienzo esta semana a una campa&ntilde;a informativa que busca concientizar al p&uacute;blico y ayudarlo a identificar las diferentes formas de estafas con criptomonedas.</p>\r\n\r\n<p>Bajo el nombre &laquo;Fake Coins: Estafas con criptomonedas&raquo; los mensajes que se presentan en la campa&ntilde;a abordan los delitos m&aacute;s comunes que se han detectado en 17 pa&iacute;ses de Am&eacute;rica Latina y la Uni&oacute;n Europea.</p>\r\n\r\n<p>La campa&ntilde;a que arranc&oacute; en Uruguay forma parte del programa llamado &laquo;EL PAcCTO&raquo; iniciado en la Uni&oacute;n Europea, el cual tiene como prop&oacute;sito ayudar a combatir, junto a pa&iacute;ses de Am&eacute;rica Latina, el crimen organizado internacional. Recientemente el proyecto comenz&oacute; a divulgar datos sobre las amenazas detectadas en el mercado de las criptomonedas.</p>\r\n\r\n<p>&laquo;Las criptomonedas se han popularizado como fen&oacute;meno medi&aacute;tico y como un nuevo instrumento de inversi&oacute;n. Como tal, son una herramienta financiera legal y &uacute;til si se sabe hacer uso de ellas&raquo;, se&ntilde;ala el comunicado del ministerio uruguayo publicado este 18 de mayo.</p>\r\n\r\n<p>Acotan luego que, &laquo;a ra&iacute;z de su fama, han aparecido una serie de estafas que, utilizando las criptomonedas como gancho, confunden a los inversionistas con el fin de sustraer su dinero&raquo;.</p>\r\n\r\n<h2>Los seis diferentes tipos de estafa</h2>\r\n\r\n<p>Los mensajes de la campa&ntilde;a muestran una clasificaci&oacute;n de las diferentes formas de estafas con criptomonedas, identificando hasta seis tipos: WebCoin, AppCoin, BesuCoin, CelebriCoin, MailCoin y PiramiCoin.</p>\r\n\r\n<p>Se trata de 6 criptomonedas ficticias que se corresponden con las principales estafas detectadas y que se explican a continuaci&oacute;n:</p>\r\n\r\n<ul>\r\n	<li><strong>WebCoin</strong>: Simulan p&aacute;ginas web de servicios de compra y venta de criptomonedas. El nivel de simulaci&oacute;n puede ser tan elevado que cuesta distinguir que son falsas.</li>\r\n	<li><strong>AppCoin</strong>: Igual que con las webs, existen aplicaciones que suplantan las wallets reales o, en otros casos, aplicaciones que parecen ser carteras de inversi&oacute;n en criptomonedas pero que solo buscan obtener los datos de la v&iacute;ctima.</li>\r\n	<li><strong>BesuCoin</strong>: Aparece en forma de amante en plataformas para encontrar parejas o hacer amigos. Tras un periodo de seducci&oacute;n, el novio o novia virtual propondr&aacute; invertir en bitcoins, trat&aacute;ndose la propuesta de un enga&ntilde;o.</li>\r\n	<li><strong>CelebriCoin</strong>: La reconocer&aacute;s porque se anuncia utilizando la imagen de alg&uacute;n famoso, generalmente en redes sociales, como gancho para que accedas a alg&uacute;n servicio fraudulento o des tus datos bancarios.</li>\r\n	<li><strong>MailCoin</strong>: Aparecer&aacute; en la bandeja de entrada de tu correo electr&oacute;nico pidiendo que renueves tu contrase&ntilde;a, ofreci&eacute;ndote la posibilidad de enriquecerte muy r&aacute;pido y, tal vez, por la recomendaci&oacute;n de alguien conocido.</li>\r\n	<li><strong>PiramiCoin</strong>: Te ofrece ganancias irrechazables en criptomonedas y, adem&aacute;s, te promete que tus ganancias aumentar&aacute;n si consigues que otras personas se sumen al servicio. Funcionan como una pir&aacute;mide al estilo de los esquemas Ponzi.</li>\r\n</ul>\r\n\r\n<h2>La meta: que el p&uacute;blico identifique las estafas y presente denuncias</h2>\r\n\r\n<p>Los seis tipos de estafas con criptomonedas antes expuestos surgieron del seguimiento hecho por los investigadores al modus operandi que los delincuentes utilizan. La clasificaci&oacute;n se dio a conocer en abril pasado, <strong>con base en las investigaciones realizadas por la Guardia Civil de Espa&ntilde;a</strong>.</p>\r\n\r\n<p>El trabajo se hizo en conjunto con polic&iacute;as y fiscal&iacute;as de Argentina, Bolivia, Chile, Colombia, Costa Rica, Ecuador, El Salvador, Espa&ntilde;a, Guatemala, Honduras, M&eacute;xico, Panam&aacute;, Paraguay, Per&uacute;, Portugal, Rep&uacute;blica Dominicana y Uruguay.</p>\r\n\r\n<p>La presentaci&oacute;n de los tipos de estafas con criptomonedas estuvo a cargo de la directora general de la Guardia Civil, Mar&iacute;a G&aacute;mez; la secretaria general de la Fundaci&oacute;n Internacional y para Iberoam&eacute;rica de Administraci&oacute;n y Pol&iacute;ticas P&uacute;blicas (FFIAPP), Inma Zamora; y el director General de la Polic&iacute;a de Investigaciones de Chile, Sergio Mu&ntilde;oz Y&aacute;&ntilde;ez.</p>\r\n\r\n<p>El equipo anunci&oacute; el despliegue de la campa&ntilde;a informativa, incluida en el programa &laquo;EL PAcCTO&raquo;, en los pa&iacute;ses que participaron en la investigaci&oacute;n. <strong>Se tienen en mente dos p&uacute;blicos</strong>: la ciudadan&iacute;a en general como potenciales v&iacute;ctimas y, a nivel operativo, las polic&iacute;as y juristas de los pa&iacute;ses participantes.</p>\r\n\r\n<blockquote>\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Los objetivos principales son concienciar, capacitar a la poblaci&oacute;n en general y prevenir este tipo de estafas. Pero tambi&eacute;n evidenciar y registrar el n&uacute;mero de denuncias para conocer la situaci&oacute;n del delito en cada pa&iacute;s y valorar operaciones conjuntas entre las polic&iacute;as de las dos regiones.</p>\r\n</blockquote>\r\n\r\n<p>Al respecto, el Ministerio de Interior de Uruguay acota que la idea no solo es que las personas puedan identificar las estafas, sino que tambi&eacute;n <strong>sepan qu&eacute; hacer y c&oacute;mo consultar los canales de denuncia</strong> de cada pa&iacute;s participante.</p>\r\n\r\n<p>Con este fin los pa&iacute;ses latinoamericanos junto con Portugal y Espa&ntilde;a <strong>crearon el sitio web <a href=\"https://www.fakecoins.org/\" target=\"_blank\">FakeCoins.org</a></strong>, donde se ofrece informaci&oacute;n sobre estas estafas, se incluyen consejos para evitar caer en los enga&ntilde;os y se facilitan los n&uacute;meros de tel&eacute;fono de denuncia de cada pa&iacute;s.</p>\r\n', 5, '2', '2022-08-01 21:06:37', '2022-08-01 21:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `destacada` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extracto` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `titulo`, `slug`, `destacada`, `extracto`, `keywords`, `body`, `user_id`, `status`, `create_at`, `update_at`) VALUES
(1, 'Nuevas Tecnologías', 'nuevas-tecnologias', '2ada7-des-nuevas_tecnologias.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, laborum ex, esse ipsa odit reprehenderit eum possimus quis aliquid facere, natus qui! Itaque, ad sed? Dolorum ea nihil, in maiores nostrum fugit expedita odio, voluptatibus atque ad cupiditate facilis velit accusamus quaerat. Vero porro accusantium impedit provident minima dolorum voluptates nihil expedita molestias adipisci asperiores sit esse, nulla, debitis necessitatibus qui, facere recusandae aut dolores et aliquid obcaecati? Laborum obcaecati provident nesciunt numquam illum neque minima reprehenderit reiciendis error dicta nulla, cumque ipsa minus deleniti a in, aliquid quae voluptas nihil atque fuga quis autem recusandae soluta. Iusto, deleniti sequi.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" class=\"img-fluid\" src=\"/userfiles/images/default-1200-x-600.jpg\" style=\"height:525px; width:700px\" /></p>\r\n', 1, '2', '2022-07-14 13:02:07', '2022-07-19 11:22:45'),
(2, 'Post 2', 'post-2', '1551f-des-post-2.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel exercitationem vero laboriosam. Magnam unde ducimus dolorum iusto, ab doloremque enim accusamus ex atque quidem porro expedita dolore dolorem animi perferendis.', 'CriptoVersum, Cripto', '<p><img alt=\"\" class=\"img-fluid\" src=\"/userfiles/images/des-post-2.jpg\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel exercitationem vero laboriosam. Magnam unde ducimus dolorum iusto, ab doloremque enim accusamus ex atque quidem porro expedita dolore dolorem animi perferendis.</p>\r\n', 1, '2', '2022-07-15 08:45:07', '2022-07-15 15:53:12'),
(3, 'Post 3', 'post-3', 'a07ac-des-nuevas_tecnologias.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.', '', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptate soluta eius earum fugiat recusandae delectus, doloremque asperiores quod doloribus distinctio molestias tempora similique iusto voluptatem a ex maiores architecto.</p>\r\n', 1, '2', '2022-07-15 17:48:47', '2022-07-15 17:49:30'),
(4, 'Post 4', 'post-4', '187b3-des-post-2.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex aperiam modi, maxime quae quidem accusamus hic sapiente consequatur inventore quo quia aliquam non iste maiores blanditiis numquam, molestias, cum autem!', 'Lorem ipsum, Cripto', '<p><strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. <strong>Ex aperiam modi, maxime</strong> quae quidem accusamus hic sapiente consequatur inventore quo quia aliquam non iste maiores blanditiis numquam, molestias, cum autem!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet c<strong>onsectetur adipisicing elit</strong>. Ex aperiam modi, maxime quae quidem accusamus hic sapiente consequatur inventore quo quia al<u>iquam no</u>n iste maiores blanditiis numquam, molestias, cum autem!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex aperiam modi, maxime quae<em> quidem</em> accusamus hic sapiente consequatur inventore quo quia aliquam non iste maiores blanditiis numquam, molestias, cum autem!</p>\r\n\r\n<blockquote>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex aperiam modi, maxime quae quidem accusamus hic sapiente consequatur inventore quo quia aliquam non iste maiores blanditiis numquam, molestias, cum autem!</p>\r\n</blockquote>\r\n\r\n<ul>\r\n	<li>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex aperiam modi, maxime quae quidem accusamus hic sapiente consequatur inventore quo quia aliquam non iste maiores blanditiis numquam, molestias, cum autem!</li>\r\n	<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex aperiam modi, maxime quae quidem accusamus hic sapiente consequatur inventore quo quia aliquam non iste maiores blanditiis numquam, molestias, cum autem!</li>\r\n	<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex aperiam modi, maxime quae quidem accusamus hic sapiente consequatur inventore quo quia aliquam non iste maiores blanditiis numquam, molestias, cum autem!</li>\r\n</ul>\r\n\r\n<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2', '2022-07-18 10:55:01', '2022-07-18 10:55:26'),
(5, 'Post 5', 'post-5', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', '', '', 1, '1', '2022-07-19 10:30:04', '2022-07-19 10:30:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_tags`
--

CREATE TABLE `notas_tags` (
  `id` int(11) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notas_tags`
--

INSERT INTO `notas_tags` (`id`, `nota_id`, `tag_id`) VALUES
(1, 2, 2),
(2, 2, 3),
(6, 3, 1),
(7, 3, 2),
(11, 4, 5),
(12, 4, 6),
(13, 4, 8),
(15, 5, 6),
(16, 5, 8),
(19, 1, 2),
(20, 1, 4),
(21, 1, 5),
(22, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podcast`
--

CREATE TABLE `podcast` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `destacada` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `url_video` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `podcast`
--

INSERT INTO `podcast` (`id`, `titulo`, `slug`, `destacada`, `descripcion`, `keywords`, `url_video`, `status`, `create_at`, `update_at`) VALUES
(1, 'Episodio 1', 'episodio_1', '11663-des-podcast.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia harum similique.</p>\r\n', 'Cripto, criptomonedas', 'fLCthAdsatU', '2', '2022-07-21 18:06:49', '2022-07-21 21:43:50'),
(2, 'Episodio 2', 'episodio-2', '9061a-des-podcast.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia harum similique.</p>', '', 'fLCthAdsatU', '2', '2022-07-21 20:45:53', '2022-07-21 20:45:53'),
(3, 'Episodio 3', 'episodio-3', '83ccb-des-podcast.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia...</p>\r\n', '', 'fLCthAdsatU', '2', '2022-07-21 21:51:06', '2022-07-21 22:12:59'),
(4, 'Episodio 4', 'episodio-4', 'f5627-des-podcast.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia...</p>\r\n', '', 'fLCthAdsatU', '2', '2022-07-21 22:12:04', '2022-07-21 22:51:57'),
(5, 'Episodio 5', 'episodio-5', '40a41-des-podcast.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia...</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus unde ex, pariatur, debitis laudantium omnis dicta assumenda facilis molestiae vitae provident culpa perferendis soluta placeat dolor! Quo mollitia...</p>\r\n', '', 'fLCthAdsatU', '2', '2022-07-21 22:52:21', '2022-07-21 22:52:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `titulo`, `slug`, `status`, `create_at`, `update_at`) VALUES
(1, 'Ahorro energético', 'ahorro-energetico', '1', NULL, '2022-07-15 15:39:31'),
(2, 'Aire acondicionado', 'aire-acondicionado', '1', NULL, '2022-07-15 15:33:52'),
(3, 'Aislamiento', 'aislamiento', '1', '2022-07-15 16:00:21', '2022-07-15 16:00:21'),
(4, 'Armarios', 'armarios', '1', '2022-07-15 16:01:02', '2022-07-15 16:01:02'),
(5, 'Barbacoas', 'barbacoas', '1', '2022-07-15 16:04:02', '2022-07-15 16:04:02'),
(6, 'Baños', 'banos', '1', '2022-07-18 15:49:47', '2022-07-18 15:49:47'),
(7, 'Bricolaje', 'bricolaje', '1', '2022-07-18 15:49:55', '2022-07-18 15:49:55'),
(8, 'Calefacción', 'calefaccion', '1', '2022-07-18 15:50:12', '2022-07-18 15:50:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `correo`, `contrasena`, `create_at`, `update_at`) VALUES
(1, 'Peperoni', 'web@peperonidigital.mx', '$2y$10$s5pKOIos01Y0xPK5uRxOke0Hb3gzABIqig.ngS/VwkjRbH3RbsYvu', '2022-07-12 11:24:01', '2022-07-12 11:24:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas_tags`
--
ALTER TABLE `notas_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota` (`nota_id`),
  ADD KEY `tag` (`tag_id`);

--
-- Indices de la tabla `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notas_tags`
--
ALTER TABLE `notas_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas_tags`
--
ALTER TABLE `notas_tags`
  ADD CONSTRAINT `nota` FOREIGN KEY (`nota_id`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
