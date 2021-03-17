<?php  
$consulta="select * from servicio";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `servicio` ( <br>
  `idser` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `descs` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idser`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `servicio` (`idser`, `descs`) VALUES <br>";

		echo"('$c->idser', '$c->descs')";

		include "divisor.php";

	}
	?>
		

