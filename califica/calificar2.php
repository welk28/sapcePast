<?php
session_start();
?>
<!DOCTYPE html >
<html >
<head>
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
include "../conexion.php";
$conexion=conectar();
$po1=$_GET[po1];
$so1=$_GET[so1];
$po2=$_GET[po2];
$so2=$_GET[so2];
$po3=$_GET[po3];
$so3=$_GET[so3];
$po4=$_GET[po4];
$so4=$_GET[so4];
$po5=$_GET[po5];
$so5=$_GET[so5];
$po6=$_GET[po6];
$so6=$_GET[so6];
$po7=$_GET[po7];
$so7=$_GET[so7];
$po8=$_GET[po8];
$so8=$_GET[so8];
$po9=$_GET[po9];
$so9=$_GET[so9];
$deser=$_GET[deser];

$idmat=$_GET[idmat];
$idh=$_GET[idh];
$matricula=$_GET[matricula];
//echo"$idmat";
if($deser!=NULL)
{
	$deser=1;
}
   $unidad="select unid from materias where idmat='$idmat'";
$uni=mysql_query($unidad,$conexion);
$u=mysql_fetch_object($uni);
$unidad=$u->unid;
$pagina='unidad'.$unidad.'.php';
/*echo"
po1: $po1 <br> 
so1: $so1 <br> 
po2: $po2 <br> 
so2: $so2 <br> 
po3: $po3 <br> 
so3: $so3 <br> 
po4: $po4 <br> 
so4: $so4 <br> 
po5: $po5 <br> 
so5: $so5 <br> 
po6: $po6 <br> 
so6: $so6 <br> 
po7: $po7 <br> 
so7: $so7 <br> 
po8: $po8 <br> 
so8: $so8 <br> 
po9: $po9 <br> 
so9: $so9 <br>
deser: $deser <br>
idh=$idh <br>
matricula: $matricula <br>

";*/
if (($po1 <0 || $po1>100) || ($so1 <0 || $so1>100) || ($po2 <0 || $po2>100) || ($so2 <0 || $so2>100) || ($po3 <0 || $po3>100) || ($so3 <0 || $so3>100) || ($po4 <0 || $po4>100) || ($so4 <0 || $so4>100) || ($po5 <0 || $po5>100) || ($so5 <0 || $so5>100) || ($po6 <0 || $po6>100) || ($so6 <0 || $so6>100) || ($po7 <0 || $po7>100) || ($so7 <0 || $so7>100) || ($po8 <0 || $po8>100) || ($so8 <0 || $so8>100) || ($po9 <0 || $po9>100) || ($so9 <0 || $so9>100) )
{
		print"
		<script languaje='JavaScript'>
		alert('ALGUNA CANTIDAD NO ESTA EN EL RANGO DE 0 A 100, ¡¡VERIFIQUE!!');
		window.location.href='$pagina?idh=$idh';
		</script>";
		exit();

}
else
{
	$sumador=0; $su1=0; $su2=0;	$su3=0;	$su4=0;	$su5=0;	$su6=0;	$su7=0;	$su8=0;	$su9=0;
//------------------ PRIMERA UNIDAD PO1 Y SO1 ------------------------
	if((empty($po1)) || ($po1>=0 && $po1<70)) 
	{
		$po1=0;
		if($so1>=0 && $so1<70)
		{
			$so1=0; 
		}
		$su1=$so1;
		$mod="update cursa set po1='$po1', so1='$so1', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su1=$po1;
		$modi="update cursa set po1='$po1', so1=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);

	}
	$sumador+=$su1;

//------------------ SEGUNDA UNIDAD PO2 Y SO2 ------------------------
	if((empty($po2)) || ($po2>=0 && $po2<70)) 
	{
		$po2=0;
		if($so2>=0 && $so2<70)
		{
			$so2=0; 
		}
		$su2=$so2;
		$mod="update cursa set po2='$po2', so2='$so2', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su2=$po2;
		$modi="update cursa set po2='$po2', so2=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);

	}
$sumador+=$su2;
//------------------ TERCERA UNIDAD PO3 Y SO3 ------------------------
	if((empty($po3)) || ($po3>=0 && $po3<70)) 
	{
		$po3=0;
		if($so3>=0 && $so3<70)
		{
			$so3=0; 
		}
		$su3=$so3;
		$mod="update cursa set po3='$po3', so3='$so3', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su3=$po3;
		$modi="update cursa set po3='$po3', so3=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);
	
	}
$sumador+=$su3;
//------------------ CUARTA UNIDAD PO3 Y SO3 ------------------------
	
	if((empty($po4)) || ($po4>=0 && $po4<70)) 
	{
		$po4=0;
		if($so4>=0 && $so4<70)
		{
			$so4=0; 
		}
		$su4=$so4;
		$mod="update cursa set po4='$po4', so4='$so4', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su4=$po4;
		$modi="update cursa set po4='$po4', so4=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);

	}
	$sumador+=$su4;
//------------------ CINCO UNIDAD PO3 Y SO3 ------------------------
	if((empty($po5)) || ($po5>=0 && $po5<70)) 
	{
		$po5=0;
		if($so5>=0 && $so5<70)
		{
			$so5=0; 
		}
		$su5=$so5;
		$mod="update cursa set po5='$po5', so5='$so5', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su5=$po5;
		$modi="update cursa set po5='$po5', so5=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);
	
	}
$sumador+=$su5;
//------------------ SEIS UNIDAD PO3 Y SO3 ------------------------
	if((empty($po6)) || ($po6>=0 && $po6<70)) 
	{
		$po6=0;
		if($so6>=0 && $so6<70)
		{
			$so6=0; 
		}
		$su6=$so6;
		$mod="update cursa set po6='$po6', so6='$so6', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su6=$po6;
		$modi="update cursa set po6='$po6', so6=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);
	
	}
$sumador+=$su6;
//------------------ SIETE UNIDAD PO3 Y SO3 ------------------------
	if((empty($po7)) || ($po7>=0 && $po7<70)) 
	{
		$po7=0;
		if($so7>=0 && $so7<70)
		{
			$so7=0; 
		}
		$su7=$so7;
		$mod="update cursa set po7='$po7', so7='$so7', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);
		
	
	} 
	else
	{
		$su7=$po7;
		$modi="update cursa set po7='$po7', so7=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);
		
	}
$sumador+=$su7;
//------------------ OCHO UNIDAD PO3 Y SO3 ------------------------
	if((empty($po8)) || ($po8>=0 && $po8<70)) 
	{
		$po8=0;
		if($so4>=0 && $so4<70)
		{
			$so4=0; 
		}
		$su8=$so8;
		$mod="update cursa set po8='$po8', so8='$so8', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su8=$po8;
		$modi="update cursa set po8='$po8', so8=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);
	
	}
$sumador+=$su8;
//------------------ NUEVE UNIDAD PO3 Y SO3 ------------------------
	if((empty($po9)) || ($po9>=0 && $po9<70)) 
	{
		$po9=0;
		if($so9>=0 && $so9<70)
		{
			$so9=0; 
		}
		$su9=$so9;
		$mod="update cursa set po9='$po9', so9='$so9', deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mo=mysql_query($mod,$conexion);

	} 
	else
	{
		$su9=$po9;
		$modi="update cursa set po9='$po9', so9=NULL, deser='$deser'  where matricula='$matricula' and idh='$idh';";
		$mod=mysql_query($modi,$conexion);
		
	}
	
	$sumcal=0;


//------------UNIDAD 3 --------------------------------------------------
	if($unidad==3)
	{
		if(($su1!=0)&&($su2!=0)&&($su3!=0))
		{
			$sumcal=$su1+$su2+$su3;
			$promedio=$sumcal/$unidad;
		}
		else
		{
			$promedio=0;
		}
		
	}


//------------UNIDAD 4 --------------------------------------------------
	if($unidad==4)
	{
		if(($su1!=0)&&($su2!=0)&&($su3!=0)&&($su4!=0))
		{
			$sumcal=$su1+$su2+$su3+$su4;
			$promedio=$sumcal/$unidad;
		}
		else
		{
			$promedio=0;
		}
		
	}
//------------UNIDAD 5 --------------------------------------------------
	if($unidad==5)
	{
		if(($su1!=0)&&($su2!=0)&&($su3!=0)&&($su4!=0)&&($su5!=0))
		{
			$sumcal=$su1+$su2+$su3+$su4+$su5;
			$promedio=$sumcal/$unidad;
		}
		else
		{
			$promedio=0;
		}
		
	}

//------------UNIDAD 6 --------------------------------------------------
	if($unidad==6)
	{
		if(($su1!=0)&&($su2!=0)&&($su3!=0)&&($su4!=0)&&($su5!=0)&&($su6!=0))
		{
			$sumcal=$su1+$su2+$su3+$su4+$su5+$su6;
			$promedio=$sumcal/$unidad;
		}
		else
		{
			$promedio=0;
		}
		
	}

//------------UNIDAD 7 --------------------------------------------------
	if($unidad==7)
	{
		if(($su1!=0)&&($su2!=0)&&($su3!=0)&&($su4!=0)&&($su5!=0)&&($su6!=0)&&($su7!=0))
		{
			$sumcal=$su1+$su2+$su3+$su4+$su5+$su6+$su7;
			$promedio=$sumcal/$unidad;
		}
		else
		{
			$promedio=0;
		}
		
	}

//------------UNIDAD 8 --------------------------------------------------
	if($unidad==8)
	{
		if(($su1!=0)&&($su2!=0)&&($su3!=0)&&($su4!=0)&&($su5!=0)&&($su6!=0)&&($su7!=0)&&($su8!=0))
		{
			$sumcal=$su1+$su2+$su3+$su4+$su5+$su6+$su7+$su8;
			$promedio=$sumcal/$unidad;
		}
		else
		{
			$promedio=0;
		}
		
	}

//------------UNIDAD 9 --------------------------------------------------
	if($unidad==9)
	{
		if(($su1!=0)&&($su2!=0)&&($su3!=0)&&($su4!=0)&&($su5!=0)&&($su6!=0)&&($su7!=0)&&($su8!=0)&&($su9!=0))
		{
			$sumcal=$su1+$su2+$su3+$su4+$su5+$su6+$su7+$su8+$su9;
			$promedio=$sumcal/$unidad;
		}
		else
		{
			$promedio=0;
		}
		
	}
//----------- GUARDA PROMEDIO ---------------------------------------------
	$califinal="update cursa set prom='$promedio' where matricula='$matricula' and idh='$idh';";
	$guardacal=mysql_query($califinal,$conexion);
	echo"total: $sumador :::: promedio: $promedio ";
		print"
		<script languaje='JavaScript'>
		window.location.href='$pagina?idh=$idh';
		</script>";

}
?>
</body>
</html>