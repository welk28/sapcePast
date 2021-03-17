<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
}
.Estilo5 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo20 {font-family: Arial, Helvetica, sans-serif; font-size: 10; }
.Estilo21 {font-size: 10}
.Estilo26 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.Estilo30 {font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; }
-->
</style>
<link href="file:///C|/wamp/images/tecstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$usuario=$_GET[idoc];
  include("file:///C|/wamp/conexion.php");
  $conexion=conectar();
$periodo=$_SESSION['periodo'];
$basicas="CIENCIAS BASICAS";
$per="select * from periodo where periodo='$periodo'";
$pe=mysql_query($per,$conexion);
$p=mysql_fetch_object($pe);

$prof="select * from docente where idoc='$usuario'";
$pro=mysql_query($prof,$conexion);
$pr=mysql_fetch_object($pro);

//para saber numero de grupos atentidos
$ngpo="select distinct h.idmat, h.idgpo, m.depto from horario as h, materias as m where h.idmat=m.idmat and idoc='$usuario' and periodo='$periodo' and m.depto='$basicas';";
$gpo=mysql_query($ngpo,$conexion);
$g=mysql_num_rows($gpo);
if($g<=0)
{
print"
		<script languaje='JavaScript'>
		alert('NO TIENE MATERIAS EN EL DEPARTAMENTO DE INGENIERIAS');
		window.close();
		</script>";
		
		exit();
}
//para saber numero de grupos atentidos
$nmat="select distinct m.idmat, m.nommat, h.ida, h.idoc from carrera as c, posee as p, materias as m, horario as h where h.periodo='$periodo' and h.idoc='$usuario' and h.idmat=m.idmat and c.idcar=p.idcar and m.idmat=p.idmat and m.depto='$basicas';";



$nma=mysql_query($nmat,$conexion);
$nm=mysql_num_rows($nma);
?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="28%" rowspan="3"><div align="center"><img src="file:///C|/wamp/images/LogoDGEST.jpg" alt="A" width="215" height="122" /></div></td>
    <td width="50%" rowspan="2" valign="top"><span class="Estilo30">Formato para el Reporte Final del Semestre por Competencias</span></td>
    <td width="22%"><strong class="Estilo30">C&oacute;digo:  SNEST-AC-PO-003-02</strong></td>
  </tr>
  <tr>
    <td height="40"><span class="Estilo30">Revisi&oacute;n: 0</span></td>
  </tr>
  <tr>
    <td class="Estilo30">Referencia a la Norma ISO 9001:2008 7.1, 7.2.1, 7.5.1, 7.6, 8.1,  8.2.4</td>
    <td><span class="Estilo30">P&aacute;gina 1 de 1</span></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong><span class="Estilo1">INSTITUTO  TECNOL&Oacute;GICO DE IZTAPALAPA II</span></strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><strong><span class="Estilo1">SUBDIRECCI&Oacute;N  ACAD&Eacute;MICA</span></strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><span class="Estilo20">DEPARTAMENTO DE:</span> <u><?php echo" $basicas";?> </u></td>
  </tr>
  <tr>
    <td colspan="2"><span class="Estilo20">REPORTE FINAL DEL SEMESTRE:<u><?php echo"$p->descper";?></u></span></td>
  </tr>
  <tr>
    <td colspan="2"><span class="Estilo20">PERIODO:</span><span class="Estilo21"><u><?php echo"$p->reporte";?></u></td>
  </tr>
  <tr>
    <td colspan="2"><span class="Estilo20">PROFESOR: </span><u><?php echo"$pr->nomdoc";?> </u></td>
  </tr>
  <tr>
    <td colspan="2"><span class="Estilo21"></span><span class="Estilo21"></span></td>
  </tr>
  <tr>
    <td width="48%"><span class="Estilo20">No. DE GRUPOS ATENDIDOS:</span> <u><?php echo"$nm";?> </u></td>
    <td width="52%"><span class="Estilo20">No DE ASIGNATURAS DIFERENTES:</span> <u><?php echo"$nm";?> </u></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="28%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">ASIGNATURA</div></td>
    <td width="24%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">CARRERA</div></td>
    <td width="6%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">A</div></td>
    <td colspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">B</div></td>
    <td width="6%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">C%</div></td>
    <td width="6%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">D</div></td>
    <td width="6%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">E%</div></td>
    <td width="6%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">F</div></td>
    <td width="6%" rowspan="2" bgcolor="#CCCCCC"><div align="center" class="Estilo5">G%</div></td>
  </tr>
  <tr>
    <td width="4%" bgcolor="#CCCCCC" class="Estilo5"><div align="center">PO</div></td>
    <td width="4%" bgcolor="#CCCCCC" class="Estilo5"><div align="center">SO</div></td>
    
  </tr>
 <?php
/*$mats="select distinct m.idmat, m.nommat, h.ida, c.descar, h.idoc from carrera as c, encarrera as e, posee as p, materias as m, horario as h where h.periodo='$periodo' and h.idoc='$usuario' and h.idmat=m.idmat and c.idcar=p.idcar and m.idmat=p.idmat and m.depto='$basicas' and e.idcar=c.idcar and h.idgpo=e.idgpo;";
*/
$mats="select distinct c.idmat,m.nommat, h.idoc, h.ida, m.depto from cursa as c, horario as h, materias as m where m.idmat=h.idmat and h.idmat=c.idmat and h.periodo=c.periodo and h.periodo='$periodo' and h.idoc='$usuario' and m.depto='$basicas';";

$mts=mysql_query($mats,$conexion);
$tal=0;
$retal=0;
$detal=0;
$suap=0;
$sumseg=0;
$supri=0;
 while ($m=mysql_fetch_object($mts)) 
 {$seg=0; 
//DETERMINAR NUMERO DE APROBADOS EN SEGUNDA OPORTUNIDAD
$sopor="select distinct cu.matricula, al.nomal, op.opor, cu.idmat, cu.idgpo, cu.deser, cu.po1, cu.so1, cu.po2, cu.so2, cu.po3, cu.so3, cu.po4, cu.so4, cu.po5, cu.so5, cu.po6, cu.so6, cu.po7, cu.so7, cu.po8, cu.so8, cu.po9, cu.so9, cu.deser, h.ida, h.idoc from alumnos as al, oportunidad as op, cursa as cu, horario as h where cu.idmat=h.idmat and al.matricula=cu.matricula  and h.periodo=cu.periodo and cu.idgpo=h.idgpo and op.opor=cu.opor  and h.idmat='$m->idmat' and  h.idoc='$usuario' and h.ida='$m->ida' and h.periodo='$periodo' and cu.prom>=70 order by al.nomal ";
$sop=mysql_query($sopor,$conexion);
while($s=mysql_fetch_object($sop))
{
	if(($s->so1>=70) || ($s->so2>=70) || ($s->so3>=70) || ($s->so4>=70) || ($s->so5>=70) || ($s->so6>=70) || ($s->so7>=70) || ($s->so8>=70) || ($s->so9>=70))
	{
		$seg++;
	}	
}

$sumseg+=$seg;
 //saber numero de alumnos en el grupo
$sqlp = "select distinct cu.matricula, al.nomal, op.opor, cu.idmat, cu.idgpo, cu.deser, cu.po1, cu.so1, cu.po2, cu.so2, cu.po3, cu.so3, cu.po4, cu.so4, cu.po5, cu.so5, cu.po6, cu.so6, cu.po7, cu.so7, cu.po8, cu.so8, cu.po9, cu.so9, cu.deser, h.ida, h.idoc from alumnos as al, oportunidad as op, cursa as cu, horario as h where cu.idmat=h.idmat and al.matricula=cu.matricula  and h.periodo=cu.periodo and cu.idgpo=h.idgpo and op.opor=cu.opor  and h.idmat='$m->idmat' and  h.idoc='$usuario' and h.ida='$m->ida' and h.periodo='$periodo' order by al.nomal;";
  $registrosp = mysql_query($sqlp, $conexion); 
  $na=mysql_num_rows($registrosp);
  
  
//saber cuantos alumnos han reprobado
$reprob = "select distinct cu.matricula, al.nomal, op.opor, cu.idmat, cu.idgpo, cu.deser, cu.po1, cu.so1, cu.po2, cu.so2, cu.po3, cu.so3, cu.po4, cu.so4, cu.po5, cu.so5, cu.po6, cu.so6, cu.po7, cu.so7, cu.po8, cu.so8, cu.po9, cu.so9, cu.deser, h.ida, h.idoc from alumnos as al, oportunidad as op, cursa as cu, horario as h where cu.idmat=h.idmat and al.matricula=cu.matricula  and h.periodo=cu.periodo and cu.idgpo=h.idgpo and op.opor=cu.opor  and h.idmat='$m->idmat' and  h.idoc='$usuario' and h.ida='$m->ida' and h.periodo='$periodo' and cu.prom<70 order by al.nomal ;";

  $rep = mysql_query($reprob, $conexion); 
  $re=mysql_num_rows($rep);
  
//saber cuantos alumnos han aprobado
$aprob = "select distinct cu.matricula, al.nomal, op.opor, cu.idmat, cu.idgpo, cu.deser, cu.po1, cu.so1, cu.po2, cu.so2, cu.po3, cu.so3, cu.po4, cu.so4, cu.po5, cu.so5, cu.po6, cu.so6, cu.po7, cu.so7, cu.po8, cu.so8, cu.po9, cu.so9, cu.deser, h.ida, h.idoc from alumnos as al, oportunidad as op, cursa as cu, horario as h where cu.idmat=h.idmat and al.matricula=cu.matricula  and h.periodo=cu.periodo and cu.idgpo=h.idgpo and op.opor=cu.opor  and h.idmat='$m->idmat' and  h.idoc='$usuario' and h.ida='$m->ida' and h.periodo='$periodo' and cu.prom>=70 order by al.nomal  ;";
  $apr = mysql_query($aprob, $conexion); 
  $ap=mysql_num_rows($apr);

//saber cuantos alumnos han desertado

$deser = "select distinct cu.matricula, al.nomal, op.opor, cu.idmat, cu.idgpo, cu.deser, cu.po1, cu.so1, cu.po2, cu.so2, cu.po3, cu.so3, cu.po4, cu.so4, cu.po5, cu.so5, cu.po6, cu.so6, cu.po7, cu.so7, cu.po8, cu.so8, cu.po9, cu.so9, cu.deser, h.ida, h.idoc from alumnos as al, oportunidad as op, cursa as cu, horario as h where cu.idmat=h.idmat and al.matricula=cu.matricula  and h.periodo=cu.periodo and cu.idgpo=h.idgpo and op.opor=cu.opor  and h.idmat='$m->idmat' and  h.idoc='$usuario' and h.ida='$m->ida' and h.periodo='$periodo'  and cu.deser=1 order by al.nomal ;";
  $des = mysql_query($deser, $conexion); 
  $d=mysql_num_rows($des);
  $tal+=$na;
  $retal+=$re;
  $detal+=$d;
  $suap+=$ap;
  $poap=($ap*100)/$na;
  $pore=($re*100)/$na;
  $podes=($d*100)/$na;
  $priop=$na-($seg+$re);
  $supri+=$priop;
  echo"
  <tr>
    <td>$m->nommat</td>
	<td>";
	$carre="select distinct m.idmat, m.nommat, h.ida, c.descar, h.idoc from carrera as c, encarrera as e, posee as p, materias as m, horario as h where h.periodo='$periodo' and h.idoc='$usuario' and h.idmat=m.idmat and c.idcar=p.idcar and m.idmat=p.idmat and m.depto='$basicas' and e.idcar=c.idcar and h.idgpo=e.idgpo and m.idmat='$m->idmat' and h.ida='$m->ida';";
	$car=mysql_query($carre,$conexion);
	while($ca=mysql_fetch_object($car))
	{
    	echo"$ca->descar <br>";
	}
	echo"</td>
    <td align='center'>$na </td>
    <td align='center'>$priop</td>
    <td align='center'>$seg</td>
	
    <td align='center'>"; printf("%0.1f",$poap); echo"</td>
    <td align='center'>$re</td>
    <td align='center'>"; printf("%0.1f",$pore); echo"</td>
    <td align='center'>$d</td>
    <td align='center'>"; printf("%0.1f",$podes); echo"</td>
  </tr>";
 }
 $acred=($suap*100)/$tal;
 $noacred=($retal*100)/$tal;
 $despor=($detal*100)/$tal;
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php echo"$tal";?></td>
    <td align="center"><?php echo"$supri";?></td>
    <td align="center"><?php echo"$sumseg";?></td>
 
    <td align="center"><?php printf("%0.1f",$acred);?></td>
    <td align="center"><?php echo"$retal";?></td>
    <td align="center"><?php printf("%0.1f",$noacred);?></td>
    <td align="center"><?php echo"$detal";?></td>
    <td align="center"><?php printf("%0.1f",$despor);?></td>
  </tr>
</table>
<table width="557" cellpadding="0" cellspacing="0">
  <col width="80" />
  <col width="69" />
  <col width="134" />
  <col width="32" />
  <col width="50" />
  <col width="52" />
  <tr>
    <td colspan="6" width="417"><span class="Estilo26">A    = TOTAL DE ESTUDIANTES POR MATERIA</span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo26">B = No. DE    ESTUDIANTES ACREDITADOS (O=ORDINARIO, R= REGULARIZACI&Oacute;N, EX=EXTRAORDINARIO</span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo26">C = % DE ESTUDIANTES    ACREDITADOS</span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo26">D = No. DE    ESTUDIANTES NO ACREDITADOS&nbsp;</span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo26">E = % DE ESTUDIANTES    NO ACREDITADOS</span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo26">F = No. DE    ESTUDIANTES QUE DESERTARON DURANTE EL SEMESTRE EN LA MATERIA</span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo26">G = % DE ESTUDIANTES    QUE DESERTARON EN LA MATERIA</span></td>
  </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0">
  <col width="80" />
  <col width="69" />
  <col width="134" />
  <col width="32" />
  <col width="50" />
  <col width="52" />
  <col width="66" />
  <col width="50" />
  <col width="57" />
  <tr>
    <td width="982" colspan="9" class="Estilo26">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Los estudiantes que se incluir&aacute;n en la columna D son todos los    estudiantes no acreditados incluyendo los desertores.</td>
  </tr>
  <tr>
    <td colspan="9" class="Estilo26">a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Entendiendo como estudiante desertor al que toma    la decisi&oacute;n de no presentar ex&aacute;menes de segunda oportunidad aun teniendo derecho a ellos.</td>
  </tr>
  <tr>
    <td width="982" colspan="9" class="Estilo26">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Este registro deber&aacute; de acompa&ntilde;arse con sus    respectivos instrumentos de evaluaci&oacute;n y&nbsp;    listas de calificaciones que avalen los datos aqu&iacute; presentados.</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="35%" height="48" class="Estilo5"><div align="center">DOCENTE</div></td>
    <td width="32%" class="Estilo5">&nbsp;</td>
    <td width="33%" class="Estilo5"><div align="center">JEFE DEL AREA ACADEMICA </div></td>
  </tr>
  <tr>
    <td valign="bottom"><hr color="#000000" /></td>
    <td>&nbsp;</td>
    <td valign="bottom"><hr color="#000000" /></td>
  </tr>
  <tr>
    <td align="center"><span class="Estilo20"><?php echo"$pr->nomdoc";?></span></td>
    <td>&nbsp;</td>
    <td><div align="center" class="Estilo20">QU&Iacute;M. CA&Ntilde;EDA GUZM&Aacute;N ENRIQUE </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" class="Estilo5"><div align="left"><strong>SNEST-AC-PO-003-02</strong></div></td>
    <td width="50%" class="Estilo5"><p align="right"><strong>Rev. 0</strong></p></td>
  </tr>
</table>
</body>
</html>
