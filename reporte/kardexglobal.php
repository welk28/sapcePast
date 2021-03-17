<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="cuerpo">
	<header id="cabecera">
		<?php 	include "../usuarios.php";	
		$periodo=$_SESSION['periodo'];
		
    //se selecciona un periodo en especifico para la consulta


		?>    
	</header>
	<section id="seccion">
    <header id="header">
      <div class="subtitulo2" align="center">HISTORIAL DE CALIFICACIONES</div>
      <br>
    </header>
    <div id="registros" >
    <table>
    	<tr>
        <th width="21">NCONTROL</th>
        <th width="104">CLAVEMATERIA</th>
        <th width="58">CALIF</th>
        <th width="58">TIPOCAL</th>
        <th width="57">PERIODO1</th>
        <th width="58">NUMPER1</th>
        <th width="58">PERIODO2</th>
        <th width="58">NUMPER2</th>
        <th width="58">PERIODO3</th>
        <th width="58">NUMPER3</th>
           
      </tr>
      <?php
//consulta referente unicamente a periodo actual
//$generalum="select distinct c.matricula from cursa as c, horario as h where c.idh=h.idh and h.periodo='$periodo';";
 //CONSULTA ENTRE PERIODO 2013-2 AL ACTUAL
 $generalum="select distinct c.matricula from cursa as c, horario as h where c.idh=h.idh and (h.periodo between '2015-2' and '$periodo');";
$general=mysql_query($generalum,$conexion);
while($g=mysql_fetch_object($general))
{
    //acá inicia la muestra de registros
    $alumnosd="select a.idcar from alumnos as a where matricula='$g->matricula';";
    $alud=mysql_query($alumnosd,$conexion);
    $ad=mysql_fetch_object($alud);
  		$matecar="select * from posee where idcar='$ad->idcar' order by sem;";
  		$maca=mysql_query($matecar,$conexion);
  		while($mc=mysql_fetch_object($maca))
  		{
        //esta consulta descarta del periodo actual|
  			//$historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$g->matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' and (h.idmat<>'SS') order by h.periodo;";
        
        //esta consulta incluye a todas las materias en curso tomando en cuenta el periodo actual
        $historia="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$g->matricula' and h.idmat='$mc->idmat' and (h.idmat<>'SS') order by h.periodo;";
  			$his=mysql_query($historia,$conexion);
  			$nm=mysql_num_rows($his);
  			if($nm>1)
  			{
  				//$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$g->matricula' and h.idmat='$mc->idmat' and h.periodo!='$periodo' order by c.idh desc LIMIT 0,1;";
  				$aprobados="select * from horario as h, cursa as c, materias as m where h.idmat=m.idmat and  h.idh=c.idh and matricula='$g->matricula' and h.idmat='$mc->idmat' order by c.idh desc LIMIT 0,1;";
          $his=mysql_query($aprobados,$conexion);
  			}
  				while($h=mysql_fetch_object($his))
  				{					
  					$x++;
  						echo"
  						<tr>
  							<td align='center'>$g->matricula</td>
  							<td align='right'>$h->idmat</td>
                <td align='center'><b>";
                if($h->prom>=70)
                {
                    printf("%0.1f",$h->prom);
                }
                else
                {
                    echo"NA";
                }
                echo"</b>
                </td>
                <td align='center'>";
                  if(($h->opor==1)||($h->opor==4))
                    echo"1";
                  else
                  {
                    if(($h->opor==2)||($h->opor==5))
                      echo"2"; 
                    else
                    {
                      if($h->opor==3)
                        echo"3";
                      else
                      {
                        if($h->opor==4)
                          echo"3";
                      }
                    }
                  } 
                echo"
                </td>
  							<td align='center'>";

                $numeroper="select noper from periodo where periodo='$h->periodo';";
                $numpe=mysql_query($numeroper,$conexion);
                $npe=mysql_fetch_object($numpe);
                  if(($h->opor==1)||($h->opor==4)) echo"$h->periodo"; 
                echo"</td>
                <td align='center'>";
                  if(($h->opor==1)||($h->opor==4)) echo"$npe->noper";  
                echo"</td>
                <td align='center'>";
                if(($h->opor==2)||($h->opor==5))
                  echo"$h->periodo"; 
                echo"</td>
                <td align='center'>"; 
                  if(($h->opor==2)||($h->opor==5))
                  echo"$npe->noper"; 
                echo"</td>
                <td align='center'>";
                if(($h->opor==3)||($h->opor==4))
                  echo"$h->periodo"; 
                echo"</td>
                <td align='center'>"; 
                  if(($h->opor==3)||($h->opor==4))
                  echo"$npe->noper"; 
                echo"</td>
  							
  						</tr>"; 
  				}
  		}
}
    echo"</table>";
    ?>    
	</section>
	<div style="clear: both; width: 100%;"></div>
    <div id="espacio"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>