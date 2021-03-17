<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Actualización de FOLIOS</title>
</head>

<body>

	<?php

		include "../conexion.php";
		$conexion=conectar();
		$periodo='2020-V'; // SE ESTABLECE EL PERIODO AL QUE SE VA A FOLEAR
//PERIODO NATURAL (NO VERANO)

		$p171="select idh from horario where periodo='$periodo';";
		$alum=mysql_query($p171,$conexion);
		$c=0;

$pl=109;
$anio=date(Y);
$t='-F';

$c=118; //ULTIMO NUMERO DE FOLIO
/*		while($a=mysql_fetch_object($alum))
		{	
			$c++;
			if($c>0 && $c<10)
			{
				$ceros="000";
				$no=$pl.$anio[2].$anio[3].$ceros.$c.$t;
			}
			else
			{
				if($c>=10 && $c<100)
				{
					$ceros="00";
					$no=$pl.$anio[2].$anio[3].$ceros.$c.$t;
				}
				else
				{
					if($c>=100 && $c<1000)
					{
						$ceros="0";
						$no=$pl.$anio[2].$anio[3].$ceros.$c.$t;
					}
					else
					{
						$no=$pl.$anio[2].$anio[3].$c.$t;
					}
				}
			}

			
			$actualiza="update horario set folio='$no' where idh=$a->idh ;";
			$actu=mysql_query($actualiza,$conexion);
			if(!$actu)
			{
				echo"error";
			}
			else
			{
				echo"update horario set folio='$no' where idh=$a->idh ; REALIZADO <BR>";
			}
			echo"<br>";
		}
*/
//PARA FOLEAR PERIODOS EN VERANO

		$p17v="select idh from horario where periodo='$periodo';";

		$alu=mysql_query($p17v,$conexion);
$t='-V';

		while($a=mysql_fetch_object($alu))
		{	
			$c++;
			if($c>0 && $c<10)
			{
				$ceros="000";
				$no=$pl.$anio[2].$anio[3].$ceros.$c.$t;
			}
			else
			{
				if($c>=10 && $c<100)
				{
					$ceros="00";
					$no=$pl.$anio[2].$anio[3].$ceros.$c.$t;
				}
				else
				{
					if($c>=100 && $c<1000)
					{
						$ceros="0";
						$no=$pl.$anio[2].$anio[3].$ceros.$c.$t;
					}
					else
					{
						$no=$pl.$anio[2].$anio[3].$c.$t;
					}
				}
			}
						echo"<br>";
			
			$actualiza="update horario set folio='$no' where idh=$a->idh ;";
			$actu=mysql_query($actualiza,$conexion);
			if(!$actu)
			{
				echo"error";
			}
			else
			{
				echo"update horario set folio='$no' where idh=$a->idh ;";
			}

			echo"<br>";
		}



	?>

</body>

</html>