<?php  
$consulta="select * from preguntaudita";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `preguntaudita` (<br>
  `nop` int(11) NOT NULL,<br>
  `descp` varchar(150) default NULL,<br>
  `status` int(11) default NULL,<br>
  `idser` varchar(15) default NULL,<br>
  PRIMARY KEY  (`nop`),<br>
  KEY `idser` (`idser`)<br>
) ENGINE=InnoDB DEFAULT CHARSET=latin1;<br>

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `preguntaudita` (`nop`, `descp`, `status`, `idser`) VALUES <br>";
      
		echo"($c->nop, '$c->descp', $c->status, '$c->idser' )";
		
		include "divisor.php";

	}
	?>
		

