<?php  
$consulta="select * from administrador";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `administrador` ( <br>
  `adm` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `nomadm` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `passadm` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`adm`) <br>
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `administrador` (`adm`, `nomadm`, `passadm`) VALUES <br>";

		echo"('$c->adm', '$c->nomadm', '$c->passadm')";

		include "divisor.php";

	}
	?>
		

