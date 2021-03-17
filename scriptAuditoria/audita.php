<?php  
echo"
<br><br>

CREATE TABLE `audita` ( <br>
  `noev` int(11) NOT NULL default '0', <br>
  `idoc` varchar(15) NOT NULL default '', <br>
  `idpuesto` int(11) default NULL, <br>
  PRIMARY KEY  (`noev`,`idoc`), <br>
  KEY `idoc` (`idoc`), <br>
  KEY `idpuesto` (`idpuesto`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=latin1; <br>

 <br><br>"; 

	?>
		

