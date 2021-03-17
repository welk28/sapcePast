<?php  

echo"
<br><br>


CREATE TABLE `responcomenta` (<br>
  `matricula` varchar(9) NOT NULL default '',<br>
  `noev` int(11) NOT NULL default '0',<br>
  `comentario` longtext,<br>
  PRIMARY KEY  (`matricula`,`noev`),<br>
  KEY `noev` (`noev`)<br>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br>

 <br><br>"; 

	?>
		

