<?php  
$consulta="select * from periodo";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `periodo` (
  `periodo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `noper` int(11) default NULL, <br>
  `descper` varchar(60)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `reporte` varchar(50)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `predet` tinyint(4) default NULL, <br>
  PRIMARY KEY  (`periodo`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `periodo` (`periodo`, `noper`, `descper`, `reporte`, `predet`) VALUES <br>";

		echo"('$c->periodo', '$c->noper', '$c->descper', '$c->reporte', '$c->predet')";

		include "divisor.php";

	}
	?>
		

