<?php  
$consulta="select * from certificado";
$cons=mysql_query($consulta,$conexion);
$fin=mysql_num_rows($cons);
echo"
<br><br>
-- $fin registros <br>

create table certificado( <br>
matricula varchar(9) NOT NULL primary key, <br>
numero varchar(10), <br>
libro varchar(10), <br>
foja varchar(10), <br>
fecha varchar(11), <br>
periodo varchar(100), <br>
fechaexp varchar(100) <br>
)ENGINE=InnoDB DEFAULT CHARSET=latin1; <br>




 <br><br>"; 

$x=0;
$y=0;
	while($c=mysql_fetch_object($cons)){
		$x++;
		$y++;
		if($x==1)
			echo"<br> INSERT INTO certificado (matricula, numero, libro, foja, fecha, periodo, fechaexp) VALUES <br>";

		echo"('$c->matricula', '$c->numero', '$c->libro', '$c->foja', '$c->fecha', '$c->periodo', '$c->fechaexp')";

		include "divisor.php";

	}
	?>
		

