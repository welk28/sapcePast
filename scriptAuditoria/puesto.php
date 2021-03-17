<?php  

echo"
<br><br>

CREATE TABLE `puesto` (<br>
  `idpuesto` int(11) NOT NULL,<br>
  `descp` varchar(60) default NULL,<br>
  PRIMARY KEY  (`idpuesto`)<br>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br>


INSERT INTO `puesto` (`idpuesto`, `descp`) VALUES<br>
(1, 'RD'),<br>
(2, 'AUDITOR LIDER'),<br>
(3, 'COORDINADOR');<br>

 <br><br>"; 

	?>
		

