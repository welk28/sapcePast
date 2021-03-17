<?php  
$consulta="select * from coordinador";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `coordinador` (
  `idcor` varchar(10)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `nomcor` varchar(60)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `passcor` varchar(40)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `dircor` varchar(60)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `telcor` varchar(15)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `mailcor` varchar(40)  CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idcor`)<br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `coordinador` (`idcor`, `nomcor`, `passcor`, `dircor`, `telcor`, `mailcor`) VALUES <br>";

		echo"('$c->idcor', '$c->nomcor', '$c->passcor', '$c->dircor', '$c->telcor', '$c->mailcor') ";

		include "divisor.php";

	}
	?>
		

