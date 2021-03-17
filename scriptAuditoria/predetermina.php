<?php  
echo"
CREATE TABLE `estado` ( <br>
  `idedo` int(11) NOT NULL, <br>
  `edo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idedo`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; <br>


INSERT INTO `estado` (`idedo`, `edo`) VALUES <br>
(1, 'Aguascalientes'), <br>
(2, 'Baja California'), <br>
(3, 'Baja California Sur'), <br>
(4, 'Campeche'), <br>
(5, 'Chiapas'), <br>
(6, 'Chihuahua'), <br>
(7, 'Coahuila de Zaragoza'), <br>
(8, 'Colima'), <br>
(9, 'Distrito Federal'), <br>
(10, 'Durango'), <br>
(11, 'Guanajuato'), <br>
(12, 'Guerrero'), <br>
(13, 'Estado de Hidalgo'), <br>
(14, 'Jalisco'), <br>
(15, 'Estado de M?xico'), <br>
(16, 'Michoac?n de Ocampo'), <br>
(17, 'Morelos'), <br>
(18, 'Nayarit'), <br>
(19, 'Nuevo Le?n'), <br>
(20, 'Oaxaca'), <br>
(21, 'Puebla'), <br>
(22, 'Quer?taro'), <br>
(23, 'Quintana Roo'), <br>
(24, 'San Luis Potos'), <br>
(25, 'Sinaloa'), <br>
(26, 'Sonora'), <br>
(27, 'Tabasco'), <br>
(28, 'Tamaulipas'), <br>
(29, 'Tlaxcala'), <br>
(30, 'Veracruz de Ignacio de la Llav'), <br>
(31, 'Yucat'), <br>
(32, 'Zacatecas'), <br>
(33, 'Estados Unidos'), <br>
(34, 'Canad'), <br>
(35, 'Centro Am?rica y el Caribe'), <br>
(36, 'Sudam?rica'), <br>
(37, 'Africa'), <br>
(38, 'Asia'), <br>
(39, 'Europa'), <br>
(40, 'Ocean'), <br>
(41, 'Otro Pa'); <br><br>


CREATE TABLE `reloj` ( <br>
  `idr` int(11) NOT NULL, <br>
  `hora` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br> 
  PRIMARY KEY  (`idr`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; <br>


INSERT INTO `reloj` (`idr`, `hora`) VALUES <br>
(1, '08-09'), <br>
(2, '09-10'), <br>
(3, '10-11'), <br>
(4, '11-12'), <br>
(5, '12-13'), <br>
(6, '13-14'), <br>
(7, '14-15'), <br>
(8, '15-13'); <br><br>



CREATE TABLE `procedencia` ( <br>
  `idesc` int(11) NOT NULL, <br>
  `escuela` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br> 
  PRIMARY KEY  (`idesc`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; <br>


INSERT INTO `procedencia` (`idesc`, `escuela`) VALUES <br>
(1, 'CBTIS'), <br>
(2, 'CBTa'), <br>
(3, 'COBACH'), <br>
(4, 'CECYTE'), <br>
(5, 'PREPARATORIA'), <br>
(6, 'SISTEMA ABIERTO'), <br>
(7, 'SISTEMA PRIVADO'), <br>
(8, 'OTRO'); <br><br>

CREATE TABLE `semana` ( <br>
  `idia` int(11) NOT NULL, <br>
  `dia` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br> 
  PRIMARY KEY  (`idia`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; <br>

INSERT INTO `semana` (`idia`, `dia`) VALUES <br>
(1, 'LUNES'), <br>
(2, 'MARTES'), <br>
(3, 'MIERCOLES'), <br>
(4, 'JUEVES'), <br>
(5, 'VIERNES'), <br>
(6,'SABADO'), <br>
(7,'DOMINGO'); <br>


";
	?>
		

