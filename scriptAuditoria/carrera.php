<?php  
$consulta="select * from carrera";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `carrera` ( <br>
  `idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `descar` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `status` tinyint(4) default NULL, <br>
  `credito` int(11) default NULL, <br>
  `cvec` varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `reticula` varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idcar`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `carrera` (`idcar`, `descar`, `status`, `credito`, `cvec`, `reticula`) VALUES <br>";

		echo"('$c->idcar', '$c->descar', '$c->status', '$c->credito', '$c->cvec', '$c->reticula')";

		include "divisor.php";
	}
	?>
		

