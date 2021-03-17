drop database if exists evadoc;
create database evadoc;
use evadoc;

CREATE TABLE `administrador` (
  `adm` varchar(10) NOT NULL,
  `nomadm` varchar(60) default NULL,
  `passadm` varchar(40) default NULL,
  PRIMARY KEY  (`adm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`adm`, `nomadm`, `passadm`) VALUES
('SALVADOR', 'SALVADOR CUEVAS BUSTOS', '7eb115cce26ff814ca564ca0f46af148a17a318e');

--
--DAR DE ALTA A ALUMNOS
--


CREATE TABLE `alumnos` (
  `matricula` varchar(9) NOT NULL,
  `nom` varchar(40) default NULL,
  `app` varchar(20) default NULL,
  `apm` varchar(20) default NULL,
  `fecnac` date default NULL,
  `idcar` varchar(20) default NULL,
  `status` int(11) default NULL,
  PRIMARY KEY  (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `periodo` (
  `periodo` varchar(6) NOT NULL,
  `descper` varchar(60) NOT NULL,
  `predet` tinyint(4) default NULL,
  PRIMARY KEY  (`periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `docente` (
  `idoc` varchar(15) NOT NULL,
  `nomdoc` varchar(60) default NULL,
  PRIMARY KEY  (`idoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `materias` (
  `idmat` varchar(10) NOT NULL,
  `nommat` varchar(60) default NULL,
  PRIMARY KEY  (`idmat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `horario` (
  `idh` int(11) NOT NULL,
  `idoc` varchar(15) default NULL,
  `idmat` varchar(10) default NULL,
  `periodo` varchar(6) default NULL,
  `num` int(11) default NULL,
  PRIMARY KEY  (`idh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `cursa` (
  `idh` int(11) NOT NULL,
  `matricula` varchar(9) NOT NULL,
  `eval` int(11) default NULL,
  PRIMARY KEY  (`idh`,`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `nomod` int(11) NOT NULL,
  `descmod` varchar(80) default NULL,
  `p1` float default NULL,
  `p2` float default NULL,
  `p3` float default NULL,
  `p4` float default NULL,
  `p5` float default NULL,
  PRIMARY KEY  (`nomod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`nomod`, `descmod`, `p1`, `p2`, `p3`, `p4`, `p5`) VALUES
(1, 'Dominio de la asignatura', 2, 1.6, 1.2, 0.8, 0.4),
(2, 'Planificaci?n del curso', 3.33333, 2.66667, 2, 1.33333, 0.666667),
(3, 'Ambientes de aprendizaje ', 2, 1.6, 1.2, 0.8, 0.4),
(4, 'Estrategias, m?todos y t?cnicas ', 1.42857, 1.14286, 0.857143, 0.571429, 0.285714),
(5, 'Motivaci?n ', 1.42857, 1.14286, 0.857143, 0.571429, 0.285714),
(6, 'Evaluaci?n ', 1.25, 1, 0.75, 0.5, 0.25),
(7, 'Comunicaci?n ', 3.33333, 2.66667, 2, 1.33333, 0.666667),
(8, 'Gesti?n del curso ', 2.5, 2, 1.5, 1, 0.5),
(9, 'Tecnolog??as de la informaci?n y comunicaci?n ', 3.33333, 2.66667, 2, 1.33333, 0.666667),
(10, 'Satisfacci?n general ', 3.33333, 2.66667, 2, 1.33333, 0.666667);

-- --------------------------------------------------------

CREATE TABLE `pregunta` (
  `nop` int(11) NOT NULL,
  `pregunta` varchar(250) default NULL,
  `nomod` int(11) NOT NULL,
  PRIMARY KEY  (`nop`)
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
--creando tabla responde

CREATE TABLE `responde` (
  `matricula` varchar(10) NOT NULL,
  `idh` int(11) NOT NULL,
  `nop` int(11) NOT NULL default '0',
  `resp` int(11) default NULL,
  PRIMARY KEY  (`matricula`,`idh`,`nop`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

grant all privileges on evadoc.* to tecnologico@localhost identified by 'PASSTEC';