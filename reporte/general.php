<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
    <header id="cabecera">
		<?php 	include "../usuarios.php";	
		$periodo=$_SESSION['periodo'];
		 //$idcar='ITIC-2010-225';
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
    <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>  
        </div>
    <header id="header">
			<div class="subtitulo">Total de alumnos por carrera/semestre</div>
        <br>
    </header>

<div id="registros" >


    <?php 
	$carreras="select * from carrera where idcar<>'POR ASIGNAR';";
	$carre=mysql_query($carreras,$conexion);
	while($ca=mysql_fetch_object($carre))
	{
	$totcar="select distinct c.matricula, a.status from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo';";
	$toc=mysql_query($totcar,$conexion);
	$tc=mysql_num_rows($toc);
	
	$nfc=13;//número de filas y columnas
	$fil=17;
	$nfc1=$nfc+1;
	$fil1=4;
	echo"<table>
		<tr>
			<th colspan='$nfc1' class='tdf'>$ca->descar <br>Alumnos:$tc</th>
		</tr>
	";
     
	 
	  
	  echo"<tr>"; //inicio de cada fila de Título
	  echo"<th width='109px' class='tdf'> Semestre</th> ";
		for($j=1;$j<=$nfc; $j++) //fijando columnas 10 j son los semestres
		{
        	echo"<th>$j</th>"; 
		}
        echo"</tr>"; //fin de cada fila de TITULO
		
	  for($i=1; $i<=$fil1; $i++)
	  {
        echo"<tr>";
		if($i==1)
			echo"<th class='tdf'>Alumnos</th>";
	
		if($i==2)
			echo"<th class='tdf'>Hombres</th>";
		
		if($i==3)
			echo"<th class='tdf'>Mujeres</th>";
		
		if($i==4)
			echo"<th class='tdf'>Discap</th>";
			
        	for($k=1;$k<=$nfc; $k++) //realizar consultas tomando en cuenta el valor de $i
			{	
				if($i==1)
				{
				$totsem="select distinct c.matricula, a.status from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k';";
				$tots=mysql_query($totsem,$conexion);
				$ts=mysql_num_rows($tots);
				
				echo"<td width='67px' class='tdle'>$ts</td>";
				}
				
				if($i==2) //cuantos hombres
				{
				$totsem="select distinct c.matricula, a.status from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k' and a.sexo='H';";
				$tots=mysql_query($totsem,$conexion);
				$ts=mysql_num_rows($tots);
				
				echo"<td width='67px' class='tdle'>$ts</td>";
				}
				
				if($i==3) //cuantas mujeres
				{
				$totsem="select distinct c.matricula, a.status from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k' and a.sexo='M';";
				$tots=mysql_query($totsem,$conexion);
				$ts=mysql_num_rows($tots);
				
				echo"<td width='67px' class='tdle'>$ts</td>";
				}
				
				if($i==4) //cuantas mujeres
				{
				$discaph="select distinct c.matricula, a.status from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k' and a.sexo='H' and a.discap='1';";
				$dish=mysql_query($discaph,$conexion);
				$dh=mysql_num_rows($dish);
				
				$discapm="select distinct c.matricula, a.status from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k' and a.sexo='H' and a.discap='1';";
				$dism=mysql_query($discapm,$conexion);
				$dm=mysql_num_rows($dism);
				
				echo"<td width='67px' class='tdle'><b>H:</b>$dh <b>M: </b>$dm</td>";
				}
				
			}
        echo"</tr>";
	  }
echo"</table>";

	?>
     
   
    <p>&nbsp;</p>

      <table>
      <?php
	 
	  $nfc=14;//número de columnas
	  $edband=16;
	  $fil=17;
	  echo"<tr>"; //inicio de cada fila de Título
	  echo"<th width='109px'> </th> ";
		for($j=1;$j<=$nfc; $j++) //fijando columnas 10
		{
        	echo"<th width='67'>$j</th>";
		}
        echo"</tr>"; //fin de cada fila de TITULO
	
	  for($i=1; $i<=16; $i++)
	  {
		 
		  $edband++;
        echo"<tr>";
		if($i==1)
			echo"<th width='67px' class='tdf'>Menos de 18</th>";
		
		
		if(($i>1)&&($i<=13))
		{
			$fil++;
			echo"<th width='67px' class='tdf'>$fil</th>";
		}
		if($i==14)
			echo"<th width='67px' class='tdf'>30 a 34</th>";
		
		if($i==15)
			echo"<th width='67px' class='tdf'>35 a 39</th>";
		
		if($i==16)
			echo"<th width='67px' class='tdf'>Más de 39</th>";
		
			$h=0;
			$m=0;
        	for($k=1;$k<=$nfc; $k++) //realizar consultas tomando en cuenta el valor de $i
			{	
				
			
				if($i==1)
				{
					
					$totsem="select distinct c.matricula, a.status, a.fecnac, a.sexo from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k';";
					$tots=mysql_query($totsem,$conexion);
					$ts=mysql_num_rows($tots);
					
					while($ho=mysql_fetch_object($tots))
					{
						$fechanacimiento=$ho->fecnac;
						list($ano,$mes,$dia) = explode("-",$fechanacimiento);
						$edad= date("Y") - $ano;
						if(($edad<18)&&($ho->sexo=='H'))
						{$h++;}
						
						if(($edad<18)&&($ho->sexo=='M'))
						{$m++;}
					}
					
					echo"<td width='67px' class='tdle'><b class='ho'>H:</b>$h <b class='mu'>M:</b>$m</td>";
				}
				$h=0;
				$m=0;
				//if(($i>=2) && ($i<=9))
				//if($i==2)
				
				if(($i>=2) && ($i<=13))
				{
					
					$totsem="select distinct c.matricula, a.sexo, a.status, a.fecnac from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k';";
					$tots=mysql_query($totsem,$conexion);
					$ts=mysql_num_rows($tots);
					
					while($ho=mysql_fetch_object($tots))
					{
						$fechanacimiento=$ho->fecnac;
						list($ano,$mes,$dia) = explode("-",$fechanacimiento);
						$edad= date("Y") - $ano;
						if(($edad==$edband)&&($ho->sexo=='H'))
						{$h++;}
						
						if(($edad==$edband)&&($ho->sexo=='M'))
						{$m++;}
					}
					
					echo"<td width='67px' class='tdle'><b class='ho'>H:</b>$h <b class='mu'>M:</b>$m </td>";
				}
				$h=0;
				$m=0;
				if($i==14)
				{
					
					$totsem="select distinct c.matricula, a.status, a.sexo, a.fecnac from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k';";
					$tots=mysql_query($totsem,$conexion);
					$ts=mysql_num_rows($tots);
					
					while($ho=mysql_fetch_object($tots))
					{
						$fechanacimiento=$ho->fecnac;
						list($ano,$mes,$dia) = explode("-",$fechanacimiento);
						$edad= date("Y") - $ano;
						//echo"$edad , $ho->status, $ho->sexo <br>";
						if(($edad>=30) && ($edad<=34)&&($ho->sexo=='H'))
						{$h++;}
						
						if(($edad>=30) && ($edad<=34)&&($ho->sexo=='M'))
						{$m++;}
					}
					
					echo"<td width='67px' class='tdle'><b class='ho'>H:</b>$h <b class='mu'>M:</b>$m</td>";
				}
				$h=0;
				$m=0;
				if($i==15)
				{
					
					$totsem="select distinct c.matricula, a.status, a.sexo, a.fecnac from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k';";
					$tots=mysql_query($totsem,$conexion);
					$ts=mysql_num_rows($tots);
					
					while($ho=mysql_fetch_object($tots))
					{
						$fechanacimiento=$ho->fecnac;
						list($ano,$mes,$dia) = explode("-",$fechanacimiento);
						$edad= date("Y") - $ano;
						if(($edad>=35) && ($edad<=39)&&($ho->sexo=='H'))
						{$h++;}
						
						if(($edad>=35) && ($edad<=39)&&($ho->sexo=='M'))
						{$m++;}
					}
					
					echo"<td width='67px' class='tdle'><b class='ho'>H:</b>$h <b class='mu'>M:</b>$m</td>";
				}
				$h=0;
				$m=0;
				if($i==16)
				{
					
					$totsem="select distinct c.matricula, a.status, a.sexo, a.fecnac from cursa as c, alumnos as a, horario as h where a.matricula=c.matricula and h.idh=c.idh and a.idcar='$ca->idcar' and periodo='$periodo' and a.status='$k';";
					$tots=mysql_query($totsem,$conexion);
					$ts=mysql_num_rows($tots);
					
					while($ho=mysql_fetch_object($tots))
					{
						$fechanacimiento=$ho->fecnac;
						list($ano,$mes,$dia) = explode("-",$fechanacimiento);
						$edad= date("Y") - $ano;
						if(($edad>39)&&($ho->sexo=='H'))
						{$h++;}
						
						if(($edad>39)&&($ho->sexo=='M'))
						{$m++;}
					}
					
					echo"<td width='67px' class='tdle'><b class='ho'>H:</b>$h <b class='mu'>M:</b>$m</td>";
				}
				
			}
        echo"</tr>";
	  }
	 
	
      echo"</table> <p>&nbsp;</p>
	<div class='SaltoDePagina'> </div>";
	  }
	?>
      </div>
    </section>
    
    
    <p>&nbsp;</p>
</div>
</body>
</html>
