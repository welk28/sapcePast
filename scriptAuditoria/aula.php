<?php  
$consulta="select * from aula";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `aula` (
  `ida` int(11) NOT NULL,
  `aula` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`ida`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `aula` (`ida`, `aula`) VALUES <br>";

		echo"('$c->ida', '$c->aula')";
		
		include "divisor.php";

	}
	?>
		

