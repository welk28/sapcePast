<?php  
$consulta="select * from control";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

CREATE TABLE `control` ( <br>
  `id` int(11) NOT NULL, <br>
  `des` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `opcion` int(11) NOT NULL, <br>
  PRIMARY KEY  (`id`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `control` (`id`, `des`, `opcion`) VALUES <br>";

		echo"('$c->id', '$c->des', '$c->opcion')";

		include "divisor.php";

	}
	?>
		

