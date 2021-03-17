<?php  

echo"
<br><br>


CREATE TABLE `respondaudita` ( <br>
  `matricula` varchar(9) NOT NULL default '',<br>
  `noev` int(11) NOT NULL default '0',<br>
  `nop` int(11) NOT NULL default '0',<br>
  `resp` int(11) default NULL,<br>
  PRIMARY KEY  (`matricula`,`noev`,`nop`),<br>
  KEY `noev` (`noev`),<br>
  KEY `nop` (`nop`)<br>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br>

 <br><br>"; 

	?>
		

