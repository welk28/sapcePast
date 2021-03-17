<?php  
$consulta="select * from cursa";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);


echo"
<br><br>
-- $fin registros <br>
CREATE TABLE `cursa` ( <br>
  `idh` int(11) NOT NULL, <br>
  `matricula` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL, <br>
  `opor` int(11) NOT NULL default '0', <br>
  `fecing` date default NULL, <br>
  `asigna` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `eval` int(11) default NULL, <br>
  `po1` float default NULL, <br>
  `so1` float default NULL, <br>
  `po2` float default NULL, <br>
  `so2` float default NULL, <br>
  `po3` float default NULL,<br>
  `so3` float default NULL, <br>
  `po4` float default NULL, <br> 
  `so4` float default NULL, <br>
  `po5` float default NULL, <br>
  `so5` float default NULL, <br>
  `po6` float default NULL, <br>
  `so6` float default NULL, <br>
  `po7` float default NULL, <br>
  `so7` float default NULL, <br>
  `po8` float default NULL, <br>
  `so8` float default NULL, <br>
  `po9` float default NULL, <br>
  `so9` float default NULL, <br>
  `deser` int(11) default NULL, <br>
  `prom` float default NULL, <br>
  `pso` int(11) default NULL, <br>
  PRIMARY KEY  (`idh`,`matricula`,`opor`), <br>
  KEY `idh` (`idh`,`matricula`), <br>
  KEY `matricula` (`matricula`), <br>
  KEY `opor` (`opor`), <br>
  FOREIGN KEY (`idh`) REFERENCES `horario` (`idh`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON UPDATE CASCADE, <br>
  FOREIGN KEY (`opor`) REFERENCES `oportunidad` (`opor`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



 <br><br>"; 

 $registrosc="select distinct idh from cursa order by idh desc";
 $recg=mysql_query($registrosc,$conexion);
 $rc=mysql_num_rows($recg);
 $rg=mysql_fetch_object($recg);
 $primer= intval($rg->idh/2);
 $segunda=$primer+1;
 echo"
 --inicio: 1 <br> 
 --fin: $rg->idh <br> 
 --primera mitad: $primer <br>
 --Segunda mitad: $segunda <br>
 --imprimiendo primera mitad";

$consulta="select * from cursa where idh between 1 and $primer";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);


$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
    $y++;
		if($x==1)
			echo"<br> INSERT INTO `cursa` (`idh`, `matricula`, `opor`, `fecing`, `asigna`, `eval`, `po1`, `so1`, `po2`, `so2`, `po3`, `so3`, `po4`, `so4`, `po5`, `so5`, `po6`, `so6`, `po7`, `so7`, `po8`, `so8`, `po9`, `so9`, `deser`, `prom`, `pso`) VALUES <br>";

		echo"('$c->idh', '$c->matricula', '$c->opor', '$c->fecing', '$c->asigna', '$c->eval', '$c->po1', '$c->so1', '$c->po2', '$c->so2', '$c->po3', '$c->so3', '$c->po4', '$c->so4', '$c->po5', '$c->so5', '$c->po6', '$c->so6', '$c->po7', '$c->so7', '$c->po8', '$c->so8', '$c->po9', '$c->so9', '$c->deser', '$c->prom', '$c->pso')";

		include "divisor.php";

	}
  
	?>
		

