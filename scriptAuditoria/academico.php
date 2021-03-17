<?php  
$consulta="select * from academico";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `academico` ( <br>
  `idacad` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL, <br>
  `nomacad` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `passacad` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idacad`) <br>
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ; <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"INSERT INTO academico (idacad, nomacad, passacad) VALUES <br>";


		echo"('$c->idacad', '$c->nomacad', '$c->passacad')";

		include "divisor.php";

	}
	?>
		

