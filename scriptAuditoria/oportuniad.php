<?php  
$consulta="select * from oportunidad";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `oportunidad` ( <br>
  `opor` int(11) NOT NULL, <br>
  `descopor` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`opor`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
    $y++;
		if($x==1)
			echo"<br> INSERT INTO `oportunidad` (`opor`, `descopor`) VALUES <br>";

		echo"('$c->opor', '$c->descopor')";

		include "divisor.php";

	}
	?>
		

