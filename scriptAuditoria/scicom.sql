--
-- Estructura de tabla para la tabla `controlmantenimiento`
--

CREATE TABLE `controlmantenimiento` (
  `idcont` int(11) NOT NULL,
  `descrip` varchar(100) NOT NULL,
  `valor` int(11) default NULL,
  PRIMARY KEY  (`idcont`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `controlmantenimiento`
--

INSERT INTO `controlmantenimiento` (`idcont`, `descrip`, `valor`) VALUES
(1, 'NUMEROS DE FOLIO', 0),
(2, 'NUMEROS DE CONTROL', 0);


--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idpersonal` varchar(15) NOT NULL,
  `nompersonal` varchar(40) default NULL,
  `fechainicio` date default NULL,
  `status` int(11) default NULL,
  `fechafin` date default NULL,
  PRIMARY KEY  (`idpersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `nompersonal`, `fechainicio`, `status`, `fechafin`) VALUES
('LIMON', 'LIMON MOJICA EDUARDO', '0000-00-00', 0, '0000-00-00'),
('VICTOR', 'LIC. VICENTE JIMENEZ VICTOR IVAN', '0000-00-00', 0, '0000-00-00');


CREATE TABLE `oficina` (
  `idoficina` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL default '',
  `iddepto` varchar(15) default NULL,
  PRIMARY KEY  (`idoficina`,`nombre`),
  KEY `iddepto` (`iddepto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `odtm`
--

CREATE TABLE `odtm` (
  `numcontrol` varchar(15) NOT NULL,
  `folio` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `tiposervicio` varchar(30) default NULL,
  `tipomantenimiento` varchar(30) default NULL,
  `trabajo` longtext,
  `status` int(11) default NULL,
  `fechafin` date default NULL,
  `asignado` varchar(15) default NULL,
  PRIMARY KEY  (`numcontrol`,`folio`),
  KEY `folio` (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `marca` (
  `idmarca` varchar(15) NOT NULL,
  `nombre` varchar(20) default NULL,
  PRIMARY KEY  (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre`) VALUES
('ACER', 'ACER.SA.DE.CV'),
('APPLE', 'APPLE.SA.DE.CV'),
('CISCO', 'CISCO.SA.DE.CV'),
('DELL', 'DELL.SA.DE.CV'),
('HP', 'HP.SA.DE.CV'),
('LENOVO', 'LENOVO.SA.DE.CV'),
('SAMSUNG', 'SAMSUNG.SA.DE.CV'),
('SONY', 'SONY.SA.DE.CV'),
('TOSHIBA', 'TOSHIBA.SA.DE.CV');


CREATE TABLE `accesorio` (
  `idacce` varchar(15) NOT NULL,
  `descrip` longtext,
  `modelo` varchar(30) default NULL,
  `exist` int(11) default NULL,
  `idmarca` varchar(10) default NULL,
  `precio` decimal(6,2) default NULL,
  PRIMARY KEY  (`idacce`),
  KEY `idmarca` (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `accesorio`
--

INSERT INTO `accesorio` (`idacce`, `descrip`, `modelo`, `exist`, `idmarca`, `precio`) VALUES
('DISCODURO', ' DISCO DURO TIPO SATA  DE 160GB', 'SATA', 100, 'TOSHIBA', '800.00'),
('LECTORDVD/CD', ' COLOR NEGRO ENTRADA SATA', 'SATA', 100, 'HP', '350.00'),
('LECTORTARJETA', 'LECTOR PARA TARJETAS  USB,MIRCO SD, SD ,ENTRADA SATA', 'X', 100, 'HP', '300.00'),
('MONITOR', 'MONITOR 15`PULGADAS COLOR NEGRO TIPO ALAMBRICO ENTRADA VGA', 'X', 1000, 'HP', '300.00'),
('MOUSE', 'MOUSE COLOR NEGRO TIPO INALAMBRICO ENTRADA USB', 'X', 100, 'HP', '200.00'),
('PROYECTOR', 'PROEYCTOR COLOR BLANCO TIPO ALAMBRICO ENTRADA VGA Y HDMI', 'X', 2000, 'TOSHIBA', '300.00'),
('TARJETARED', 'TARJETA DE RED INALAMBRICA ', 'X', 100, 'TOSHIBA', '500.00'),
('TECLADO', 'TECLADO COLOR NEGRO TIPO INALAMBRICO ENTRADA USB', 'X', 100, 'HP', '300.00'),
('VENTILADOR', 'VENTILADOR ENTRADA SATA', 'SATA', 100, 'HP', '600.00');




CREATE TABLE `areas` (
  `idarea` varchar(30) NOT NULL default '',
  `nombrearea` varchar(40) default NULL,
  PRIMARY KEY  (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `areas`
--

INSERT INTO `areas` (`idarea`, `nombrearea`) VALUES
('CCOMPUTO', 'CENTRO DE COMPUTO'),
('MANTENIMIENTO', 'MANTENIMIENTO DE EQUIPO'),
('RECUMAT', 'RECURSOS MATERIALES Y SERVICIOS');


CREATE TABLE `asigna` (
  `idequipo` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `clave` varchar(15) NOT NULL,
  `area` varchar(15) default NULL,
  `observacion` varchar(50) default NULL,
  `status` int(11) default NULL,
  `fechafin` date default NULL,
  PRIMARY KEY  (`idequipo`,`clave`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `asigna`
--

INSERT INTO `asigna` (`idequipo`, `fecha`, `clave`, `area`, `observacion`, `status`, `fechafin`) VALUES
('MAQUINA1 ', '2014-08-19', 'CINTHIA   ', 'SUBPLA', 'PRUEBA DE ASIGNACION', 0, '0000-00-00');




-- auditoria


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `noev` int(11) NOT NULL,
  `idser` varchar(15) default NULL,
  `periodo` varchar(6) default NULL,
  `diag` longtext,
  `recom` longtext,
  `fecha` date default NULL,
  PRIMARY KEY  (`noev`),
  KEY `idser` (`idser`),
  KEY `periodo` (`periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`noev`, `idser`, `periodo`, `diag`, `recom`, `fecha`) VALUES
(1, 'CC', '2015-2', NULL, NULL, '2015-11-17'),
(2, 'CI', '2015-2', NULL, NULL, '2015-11-17'),
(3, 'IADM-2010-213', '2015-2', NULL, NULL, '2015-11-17'),
(4, 'ILOG-2009-202', '2015-2', NULL, NULL, '2015-11-17'),
(5, 'ITIC-2010-225', '2015-2', NULL, NULL, '2015-11-17'),
(6, 'RESIDENCIA', '2015-2', NULL, NULL, '2015-11-17'),
(7, 'RFIN', '2015-2', NULL, NULL, '2015-11-17'),
(8, 'SE', '2015-2', NULL, NULL, '2015-11-17'),
(9, 'SS', '2015-2', NULL, NULL, '2015-11-17'),
(10, 'CC', '2016-1', NULL, NULL, '2016-05-16'),
(11, 'IADM-2010-213', '2016-1', NULL, NULL, '2016-05-16'),
(12, 'CI', '2016-1', NULL, NULL, '2016-05-16'),
(13, 'ILOG-2009-202', '2016-1', NULL, NULL, '2016-05-16'),
(14, 'ITIC-2010-225', '2016-1', NULL, NULL, '2016-05-16'),
(15, 'RESIDENCIA', '2016-1', NULL, NULL, '2016-05-16'),
(16, 'RFIN', '2016-1', NULL, NULL, '2016-05-16'),
(17, 'SE', '2016-1', NULL, NULL, '2016-05-16'),
(18, 'SS', '2016-1', NULL, NULL, '2016-05-16'),
(19, 'CC', '2016-3', NULL, NULL, '2016-07-20'),
(20, 'CI', '2016-3', NULL, NULL, '2016-07-20'),
(21, 'IADM-2010-213', '2016-3', NULL, NULL, '2016-07-20'),
(22, 'ILOG-2009-202', '2016-3', NULL, NULL, '2016-07-20'),
(23, 'ITIC-2010-225', '2016-3', NULL, NULL, '2016-07-20'),
(24, 'RESIDENCIA', '2016-3', NULL, NULL, '2016-07-20'),
(25, 'RFIN', '2016-3', NULL, NULL, '2016-07-20'),
(26, 'SE', '2016-3', NULL, NULL, '2016-07-20'),
(27, 'SS', '2016-3', NULL, NULL, '2016-07-20'),
(28, 'SS', '2018-1', NULL, NULL, '2018-05-23'),
(29, 'SE', '2018-1', NULL, NULL, '2018-05-23'),
(30, 'RFIN', '2018-1', NULL, NULL, '2018-05-23'),
(31, 'RESIDENCIA', '2018-1', NULL, NULL, '2018-05-23'),
(32, 'ITIC-2010-225', '2018-1', NULL, NULL, '2018-05-23'),
(33, 'ILOG-2009-202', '2018-1', NULL, NULL, '2018-05-23'),
(34, 'IADM-2010-213', '2018-1', NULL, NULL, '2018-05-23'),
(35, 'CI', '2018-1', NULL, NULL, '2018-05-23'),
(36, 'CC', '2018-1', NULL, NULL, '2018-05-23');

CREATE TABLE `audita` (
  `noev` int(11) NOT NULL default '0',
  `idoc` varchar(15) NOT NULL default '',
  `idpuesto` int(11) default NULL,
  PRIMARY KEY  (`noev`,`idoc`),
  KEY `idoc` (`idoc`),
  KEY `idpuesto` (`idpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `audita`
--

INSERT INTO `audita` (`noev`, `idoc`, `idpuesto`) VALUES
(10, 'SOGC8411097R7', 1),
(11, 'SOGC8411097R7', 1),
(12, 'SOGC8411097R7', 1),
(13, 'SOGC8411097R7', 1),
(14, 'SOGC8411097R7', 1),
(15, 'SOGC8411097R7', 1),
(16, 'SOGC8411097R7', 1),
(17, 'SOGC8411097R7', 1),
(18, 'SOGC8411097R7', 1),
(29, 'LOCM820210152', 1),
(28, 'SOGC8411097R7', 2),
(30, 'SOGC8411097R7', 3),
(31, 'LOCM820210152', 3),
(32, 'SOGC8411097R7', 3),
(33, 'SOGC8411097R7', 3),
(34, 'SOGC8411097R7', 3),
(35, 'SOGC8411097R7', 3),
(36, 'SOGC8411097R7', 3);

CREATE TABLE `pregunta` (
  `nop` int(11) NOT NULL,
  `pregunta` varchar(250) default NULL,
  `nomod` int(11) NOT NULL,
  PRIMARY KEY  (`nop`),
  KEY `nomod` (`nomod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`nop`, `pregunta`, `nomod`) VALUES
(1, 'Explica de manera clara los contenidos de la asignatura.', 1),
(2, 'Relaciona los contenidos de la asignatura con los contenidos de otras.', 1),
(3, 'Resuelve las dudas relacionadas con los contenidos de la asignatura.', 1),
(4, 'Propone ejemplos o ejercicios que vinculan la asignatura con la pr?ctica profesional.', 1),
(5, 'Explica la utilidad de los contenidos te?ricos y pr?cticos para la actividad profesional.', 1),
(6, 'Cumple con los acuerdos establecidos al inicio de la asignatura.', 2),
(7, 'Durante el curso establece las estrategias adecuadas necesarias para lograr el aprendizaje deseado.', 2),
(8, 'El programa presentado al principio de la asignatura se cubre totalmente.', 2),
(9, 'Incluye experiencias de aprendizaje en lugares diferentes al aula (talleres, laboratorios, empresas, comunidad, etc.).', 3),
(10, 'Utiliza para el aprendizaje las herramientas de interacci?n de las tecnolog??as actuales de la informaci?n (correo electr?nico, chats, plataformas, etc.).', 3),
(11, 'Organiza actividades que me permiten ejercitar mi expresi?n oral y escrita.', 3),
(12, 'Relaciona los contenidos de la asignatura con la industria y la sociedad a nivel local, regional, nacional e internacional.', 3),
(13, 'Usa ejemplos y casos relacionados con la vida real.', 3),
(14, 'Adapta las actividades para atender los diferentes estilos de aprendizaje de los estudiantes.', 4),
(15, 'Promueve el autodidactismo y la investigaci?n.', 4),
(16, 'Promueve actividades participativas que me permiten colaborar con mis compa?eros con una actividad positiva.', 4),
(17, 'Estimula la reflexi?n sobre la manera en que aprendes.', 4),
(18, 'Se involucra en las actividades propuestas al grupo.', 4),
(19, 'Presenta y expone las clases de manera organizada y estructurada.', 4),
(20, 'Utiliza diversas estrategias, m?todos, medios y materiales.', 4),
(21, 'Muestra compromiso y entusiasmo en sus actividades docentes.', 5),
(22, 'Toma en cuenta las necesidades, intereses y expectativas del grupo.', 5),
(23, 'Propicia el desarrollo de un ambiente de respeto y confianza.', 5),
(24, 'Propicia la curiosidad y el deseo de aprender.', 5),
(25, 'Reconoce los ?xitos y logros en las actividades de aprendizaje.', 5),
(26, 'Existe la impresi?n de que se toman represalias con algunos estudiantes.', 5),
(27, 'Hace interesante la asignatura.', 5),
(28, 'Identifica los conocimientos y habilidades de los estudiantes al inicio de la asignatura o de cada unidad.', 6),
(29, 'Proporciona informaci?n para realizar adecuadamente las actividades de evaluaci?n.', 6),
(30, 'Toma en cuenta las actividades realizadas y los productos como evidencias para la calificaci?n y acreditaci?n de la asignatura. ', 6),
(31, 'Considera los resultados de la evaluaci?n (asesor?as, trabajos complementarios, b?squeda de informaci?n, etc.) para realizar mejoras en el aprendizaje.', 6),
(32, 'Da a conocer las calificaciones en el plazo establecido.', 6),
(33, 'Da oportunidad de mejorar los resultados de la evaluaci?n del aprendizaje.', 6),
(34, 'Muestra apertura para la correcci?n de errores de apreciaci?n y evaluaci?n.', 6),
(35, 'Otorga calificaciones imparciales.', 6),
(36, 'Desarrolla la clase en un clima de apertura y entendimiento.', 7),
(37, 'Escucha y toma en cuenta las opiniones de los estudiantes.', 7),
(38, 'Muestra congruencia entre lo que dice y lo que hace.', 7),
(39, 'Asiste a clases regular y puntualmente.', 8),
(40, 'Fomenta la importancia de contribuir a la conservaci?n del medio ambiente.', 8),
(41, 'Promueve mantener limpias y ordenadas las instalaciones.', 8),
(42, 'Es accesible y est? dispuesto a brindarte ayuda acad?mica.', 8),
(43, 'Emplea las tecnolog??as de la informaci?n y de la comunicaci?n como un medio que facilite el aprendizaje de los estudiantes.', 9),
(44, 'Promueve el uso de diversas herramientas, particularmente las digitales, para gestionar (recabar, procesar, evaluar y usar) informaci?n.', 9),
(45, 'Promueve el uso seguro, legal y ?tico de la informaci?n digital.', 9),
(46, 'En general, pienso que es un buen docente.', 10),
(47, 'Estoy satisfecha o satisfecho por mi nivel de desempe?o y aprendizaje logrado gracias a la labor del docente.', 10),
(48, 'Yo recomendar?a a este docente a otros compa?eros.', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntaudita`
--

CREATE TABLE `preguntaudita` (
  `nop` int(11) NOT NULL,
  `descp` varchar(150) default NULL,
  `status` int(11) default NULL,
  `idser` varchar(15) default NULL,
  PRIMARY KEY  (`nop`),
  KEY `idser` (`idser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `preguntaudita`
--

INSERT INTO `preguntaudita` (`nop`, `descp`, `status`, `idser`) VALUES
(1, 'Tiene un horario adecuado de consulta', 1, 'CI'),
(2, 'La informaci?n con la que cuenta me apoya en las asignaturas que curso.', 1, 'CI'),
(3, 'Siempre encuentro por lo menos un ejemplar disponible de la bibliograf?a se?alada en las asignaturas que curso.', 1, 'CI'),
(4, 'La bibliograf?a de la que se dispone es actualizada.', 1, 'CI'),
(5, 'Se me proporciona atenci?n adecuada en caso de buscar determinado libro', 1, 'CI'),
(6, 'Me orientan adecuadamente para encontrar en caso de carencia, libros equivalentes al  requerido.', 1, 'CI'),
(7, 'Tienen disposici?n para atenderme cuando solicito un servicio.', 1, 'CI'),
(8, 'Me atienden en forma amable cuando solicito su apoyo.', 1, 'CI'),
(9, 'Mantienen una relaci?n atenta conmigo durante mi estancia', 1, 'CI'),
(10, 'Tiene un horario adecuado de atenci?n.', 1, 'IADM-2010-213'),
(11, 'Me proporciona informaci?n necesaria para el manejo de mi ret?cula de carrera.', 1, 'IADM-2010-213'),
(12, 'Me da orientaci?n adecuada cuando requiero realizar tr?mites en la instituci?n', 1, 'IADM-2010-213'),
(13, 'Me orienta acerca de desarrollo del plan de estudios de la carrera.', 1, 'IADM-2010-213'),
(14, 'Me da informaci?n necesaria para realizar las Residencias Profesionales.', 1, 'IADM-2010-213'),
(15, 'Me proporciona informaci?n sobre el proceso para la reinscripci?n de alumnos.', 1, 'IADM-2010-213'),
(16, 'Me orientan para resolver situaciones de tipo acad?mico.', 1, 'IADM-2010-213'),
(17, 'Me dan la orientaci?n necesaria para la realizaci?n de tr?mites de titulaci?n.', 1, 'IADM-2010-213'),
(18, 'Tiene un horario adecuado para realizar mis tr?mites..', 1, 'RFIN'),
(19, 'Me proporcionan una lista actualizada de los costos de los diferentes tr?mites.', 1, 'RFIN'),
(20, ' El tiempo de espera para pagar en caja es aceptable.', 1, 'RFIN'),
(21, 'El personal de Recursos Financieros atiende las peticiones que le hago.', 1, 'RFIN'),
(22, 'El personal de Recursos Financieros siempre me cobra el concepto Correcto.', 1, 'RFIN'),
(23, 'Me proporcionan asesor?a adecuada cuando desconozco qu? o cu?nto pagar.', 1, 'RFIN'),
(24, 'Me atienden en forma oportuna cuando solicito un servicio.', 1, 'RFIN'),
(25, 'Me atienden en forma amable cuando solicito su servicio.', 1, 'RFIN'),
(26, ' Mantienen una relaci?n atenta conmigo durante todo el tiempo en que me otorga el servicio.', 1, 'RFIN'),
(27, 'El Departamento de Gesti?n Tecnol?gica y Vinculaci?n me proporciona  informaci?n del banco de proyectos de Residencias Profesionales.', 1, 'RESIDENCIA'),
(28, 'La Divisi?n de Estudios Profesionales me da informaci?n de las Opciones para realizar los Anteproyectos de Residencias Profesionales.', 1, 'RESIDENCIA'),
(29, 'El Coordinador de Carrera me da informaci?n para desarrollo de anteproyectos de Residencias Profesionales.', 1, 'RESIDENCIA'),
(30, 'La Divisi?n de Estudios me proporciona informaci?n acerca de los periodos para la recepci?n de anteproyectos de Residencias Profesionales.', 1, 'RESIDENCIA'),
(31, 'El Docente Asignado para revisar mi anteproyecto de residencias dictamina en el periodo establecido.', 1, 'RESIDENCIA'),
(32, 'Mi Asesor Interno me proporciona asesoria para el desarrollo de mi proyecto Residencias Profesionales.', 1, 'RESIDENCIA'),
(33, 'El Departamento de Gesti?n Tecnol?gica y Vinculaci?n me entrega en tiempo las cartas de presentaci?n y agradecimiento para la empresa.', 1, 'RESIDENCIA'),
(34, ' Mi Asesor Interno revisa mis informes parciales de Residencias Profesionales y me orienta para realizar las correcciones y cambios.', 1, 'RESIDENCIA'),
(35, 'Mi Asesor Interno me da a conocer la calificaci?n durante el periodo Establecido', 1, 'RESIDENCIA'),
(36, 'El Servicio de C?mputo tiene un horario adecuado.', 1, 'CC'),
(37, 'Siempre hay m?quinas disponibles para realizar mi trabajo.', 1, 'CC'),
(38, 'Siempre tengo disponible una conexi?n de Internet.', 1, 'CC'),
(39, 'Me proporcionan atenci?n adecuada en el servicio de Internet.', 1, 'CC'),
(40, 'Me proporcionan atenci?n adecuada en caso de presentarse fallas en el equipo que se me asign?', 1, 'CC'),
(41, 'Me proporcionan asesor?a adecuada para resolver mis dudas sobre el uso de software.', 1, 'CC'),
(42, 'Me atienden en forma oportuna cuando solicito cualquier servicio.', 1, 'CC'),
(43, 'Me atienden en forma amable cuando solicito informaci?n.', 1, 'CC'),
(44, 'Mantienen una relaci?n atenta conmigo durante toda mi estancia en las instalaciones', 1, 'CC'),
(45, 'La oficina de Servicio Social tiene un horario adecuado para realizar mis tr?mites.', 1, 'SS'),
(46, 'La oficina de Servicio Social me ofrece un cat?logo de instituciones en donde pueda realizarlo.', 1, 'SS'),
(47, 'La oficina de Servicio Social me gestiona apoyos para desarrollar mis actividades.', 1, 'SS'),
(48, 'Me proporcionan atenci?n  adecuada cuando realizo mis tr?mites.', 1, 'SS'),
(49, 'Me apoyan adecuadamente en la b?squeda, en caso de no tener en donde hacerlo.', 1, 'SS'),
(50, 'Me proporcionan asesor?a para desarrollar en forma adecuada el Servicio Social.', 1, 'SS'),
(51, 'Me atienden en forma inmediata al solicitar informaci?n.', 1, 'SS'),
(52, 'Me atienden en forma amable al solicitar informaci?n del Servicio Social.', 1, 'SS'),
(53, 'Mantienen una relaci?n atenta conmigo durante toda mi estancia en su oficina.', 1, 'SS'),
(54, 'El Departamento de Servicios Escolares tiene un horario adecuado de atenci?n.', 1, 'SE'),
(55, 'El tiempo de respuesta a mis solicitudes es r?pido.', 1, 'SE'),
(56, 'El tiempo de espera para ser atendido en ventanilla es adecuado.', 1, 'SE'),
(57, 'Me proporcionan atenci?n adecuada en el servicio.', 1, 'SE'),
(58, 'Me proporcionan informaci?n adecuada en caso de que se la solicite.', 1, 'SE'),
(59, 'Me orientan adecuadamente cuando se lo solicito.', 1, 'SE'),
(60, 'Me atienden en forma oportuna cuando solicito un servicio.', 1, 'SE'),
(61, 'Me atienden en forma amable cuando solicito su apoyo.', 1, 'SE'),
(62, 'Mantienen una relaci?n atenta conmigo durante toda mi estancia en el departamento.', 1, 'SE'),
(63, 'Tiene un horario adecuado de atenci?n.', 1, 'ILOG-2009-202'),
(64, 'Me proporciona informaci?n necesaria para el manejo de mi ret?cula de carrera.', 1, 'ILOG-2009-202'),
(65, 'Me da orientaci?n adecuada cuando requiero realizar tr?mites en la instituci?n', 1, 'ILOG-2009-202'),
(66, 'Me orienta acerca de desarrollo del plan de estudios de la carrera.', 1, 'ILOG-2009-202'),
(67, 'Me da informaci?n necesaria para realizar las Residencias Profesionales.', 1, 'ILOG-2009-202'),
(68, 'Me proporciona informaci?n sobre el proceso para la reinscripci?n de alumnos.', 1, 'ILOG-2009-202'),
(69, 'Me orientan para resolver situaciones de tipo acad?mico.', 1, 'ILOG-2009-202'),
(70, 'Me dan la orientaci?n necesaria para la realizaci?n de tr?mites de titulaci?n.', 1, 'ILOG-2009-202'),
(71, 'Tiene un horario adecuado de atenci?n.', 1, 'ITIC-2010-225'),
(72, 'Me proporciona informaci?n necesaria para el manejo de mi ret?cula de carrera.', 1, 'ITIC-2010-225'),
(73, 'Me da orientaci?n adecuada cuando requiero realizar tr?mites en la instituci?n', 1, 'ITIC-2010-225'),
(74, 'Me orienta acerca de desarrollo del plan de estudios de la carrera.', 1, 'ITIC-2010-225'),
(75, 'Me da informaci?n necesaria para realizar las Residencias Profesionales.', 1, 'ITIC-2010-225'),
(76, 'Me proporciona informaci?n sobre el proceso para la reinscripci?n de alumnos.', 1, 'ITIC-2010-225'),
(77, 'Me orientan para resolver situaciones de tipo acad?mico.', 1, 'ITIC-2010-225'),
(78, 'Me dan la orientaci?n necesaria para la realizaci?n de tr?mites de titulaci?n.', 1, 'ITIC-2010-225');



CREATE TABLE `equipo` (
  `idequipo` varchar(15) NOT NULL,
  `recumat` varchar(15) default NULL,
  `fechalt` date default NULL,
  `descrip` longtext,
  `status` int(11) default NULL,
  `fechbaja` date default NULL,
  `imagen` varchar(100) default NULL,
  `obser` varchar(50) default NULL,
  PRIMARY KEY  (`idequipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `recumat`, `fechalt`, `descrip`, `status`, `fechbaja`, `imagen`, `obser`) VALUES
('maquina1', '', '2014-01-01', 'MAQUINA HP CON: MONITOR, MOUSE,TECLADO', 0, '0000-00-00', '../../img//buho.jpg', ''),
('maquina10', '', '2014-05-10', 'maquina  con: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina2', '', '2014-05-02', 'maquina lenovo con: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina3', '', '2014-01-03', 'maquina samsung con: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina4', '', '2014-05-04', 'maquina  acer: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina5', '', '2014-01-05', 'maquina toshiba con: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina6', '', '2014-05-06', 'maquina  apple: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina7', '', '2014-01-07', 'maquina asus con: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina8', '', '2014-05-08', 'maquina  sony: monitor, mouse,teclado', 0, '0000-00-00', '', ''),
('maquina9', '', '2014-01-09', 'maquina dell con: monitor, mouse,teclado', 0, '0000-00-00', '', '');
