<?php  
$consulta="select * from division";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>


CREATE TABLE `division` ( <br>
  `idiv` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `nomd` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `passd` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idiv`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `division` (`idiv`, `nomd`, `passd`) VALUES <br>";

		echo"('$c->idiv', '$c->nomd', '$c->passd')";
		
		include "divisor.php";

	}
	?>
		

