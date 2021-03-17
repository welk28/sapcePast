<?php  
$consulta="select * from materias";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>


CREATE TABLE materias ( <br>
  `idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `nommat` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `credit` int(11) default NULL, <br>
  `habil` tinyint(4) default NULL, <br>
  `depto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `unid` int(11) default NULL, <br>
  `cred` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `idesp` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (`idmat`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
    $y++;
		if($x==1)
			echo"<br> INSERT INTO `materias` (`idmat`, `nommat`, `credit`, `habil`, `depto`, `unid`, `cred`, `idesp`) VALUES<br>";

		echo"('$c->idmat', '$c->nommat', '$c->credit', '$c->habil', '$c->depto', '$c->unid', '$c->cred', '$c->idesp')";

		include "divisor.php";

	}
	?>
		

