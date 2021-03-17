<?php  
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `auditoria` (
  `noev` int(11) NOT NULL, <br>
  `idser` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `periodo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `diag` longtext, <br>
  `recom` longtext, <br>
  `fecha` date default NULL, <br>
  PRIMARY KEY  (`noev`), <br>
  KEY `idser` (`idser`), <br>
  KEY `periodo` (`periodo`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=latin1; <br>

 <br><br>"; 

	?>
		

