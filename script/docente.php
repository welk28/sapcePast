<?php  
$consulta="select * from docente";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>


CREATE TABLE `docente` ( <br>
  `idoc` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `nomdoc` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `passdoc` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `dirdoc` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `teldoc` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `maildoc` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `status` int(11) default NULL, <br>
  `contra` int(11) default NULL, <br>
  PRIMARY KEY  (`idoc`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO `docente` (`idoc`, `nomdoc`, `passdoc`, `dirdoc`, `teldoc`, `maildoc`, `status`, `contra`) VALUES <br>";

		echo"('$c->idoc', '$c->nomdoc', '$c->passdoc', '$c->dirdoc', '$c->teldoc', '$c->maildoc', '$c->status', '$c->contra') ";

		include "divisor.php";

	}
	?>
		

