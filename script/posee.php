<?php  
$consulta="select * from posee";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `posee` ( <br>
  `idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `sem` int(11) default NULL, <br>
  `cven` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `tipom` int(11) default NULL, <br>
  `prerre` int(11) default NULL, <br>
  `ht` int(11) default NULL, <br>
  `hp` int(11) default NULL, <br>
  `orden` int(11) default NULL, <br>
  `renglon` int(11) default NULL, <br>
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idcar`,`idmat`), <br>
  KEY `idmat` (`idmat`), <br>
 FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON UPDATE CASCADE, <br>
FOREIGN KEY (`idmat`) REFERENCES `materias` (`idmat`) ON UPDATE CASCADE <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
    $y++;
		if($x==1)
			echo"<br> INSERT INTO `posee` (`idcar`, `idmat`, `sem`, `cven`, `tipom`, `prerre`, `ht`, `hp`, `orden`, `renglon`, `status`) VALUES <br>";

		echo"('$c->idcar', '$c->idmat', '$c->sem', '$c->cven', '$c->tipom', '$c->prerre', '$c->ht', '$c->hp', '$c->orden', '$c->renglon', '$c->status')";

		include "divisor.php";

	}
	?>
		

