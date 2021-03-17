<html>
<head>
	<title></title>
    <style type="text/css">
<!--
.Estilo9 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.Estilo10 {font-family: Arial, Helvetica, sans-serif}
.Estilo15 {
	color: #333333;
	font-weight: bold;
}
.Estilo16 {font-size: 12px}
-->
    </style>
</head>
<body>
<?php
 include"../../conexion.php";
 $conexion=conectar();
 $folio=$_GET[folio];
 
 $consulta="select * from solicita where folio='$folio';";
 $con=mysql_query($consulta,$conexion); 
 $c=mysql_fetch_object($con);
 
 $subconsulta="select * from docente where idoc='$c->clave';";
 $sub=mysql_query($subconsulta,$conexion);
 $s=mysql_fetch_object($sub);
 
 $otra="select * from depto where iddepto='$c->area';";
 $ot=mysql_query($otra,$conexion);
 $o=mysql_fetch_object($ot);
?>
<div style="width: 750px; margin: 10px auto;">
  <table width="750" height="114" border="2" align="center" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
    <tr>
      <td width="122" rowspan="3"><img src="../../img/logodgest.png" width="122" height="70" class="imagen"></td>
      <td width="315" bordercolor="#000000"><div align="justify" class="Estilo10"><strong>Formato para &nbsp;Solicitud de Mantenimiento Correctivo</strong></div></td>
      <td width="268"><div align="justify" class="Estilo10"><strong>C&oacute;digo:SNEST-AD-PO-001-02</strong></div></td>
    </tr>
    <tr>
      <td rowspan="2"><span class="Estilo10"><strong>Referencia al punto de la norma ISO 9001:2008  6.3, 6.4</strong></span></td>
      <td><div align="justify" class="Estilo10"><strong>Revisi&oacute;n: O</strong></div></td>
    </tr>
    <tr>
      <td><div align="justify"><span class="Estilo10"><strong>P&aacute;gina 1 de </strong><strong>1</strong></span></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center" style="width: 750px; margin: 10px auto;">
    <p align="center"><strong>SOLICITUD  MANTENIMIENTO CORRECTIVO</strong></p>
    <table width="278" height="81" border="1" align="right" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="239" height="25"><div align="justify" class="Estilo9">
          <div align="justify" class="Estilo9">Recursos  Materiales y Servicios</div>
        </div></td>
        <td width="23"><?php
		
		if($c->departamento=='RECUMAT')
		{
		 echo"X";
		} 
		?></td>
      </tr>
      <tr>
        <td><div align="justify"><span class="Estilo9">Mantenimiento&nbsp; de Equipo</span></div></td>
        <td><div align="center">
		<?php
		if($c->departamento=='MANTENIMIENTO')
		{
		echo"X";
		}
		?>
		</div></td>
      </tr>
      <tr>
        <td><div align="justify"><span class="Estilo9">Centro  de C&oacute;mputo</span></div></td>
        <td>
		<?php
		if($c->departamento=='CCOMPUTO')
		{
		echo"X";
		}
		?>
		</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div>
      <div align="right"><span class="Estilo9">FOLIO:<u><?php echo"$folio";?></u></span></div>
    </div>
	<p>&nbsp;</p>
    <table width="743" border="1" cellspacing="0" bordercolor="#000000">
      <tr>
        <td class="Estilo10"><strong>&Aacute;rea Solicitante:</strong><?php echo"$o->nombre";?></td>
      </tr>
    </table>
    <table width="743" border="1" cellspacing="0" bordercolor="#000000">
      <tr>
        <td><p class="Estilo10"><strong>Nombre y Firma del Solicitante: </strong><?php echo"$s->nomdoc";?><strong>&nbsp;&nbsp;&nbsp; FIRMA  </strong></p>
        </td>
      </tr>
      <tr>
        <td><strong class="Estilo10">Fecha de Elaboraci&oacute;n:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php 
          $consulta="select * from solicita where folio='$folio';";
          $con=mysql_query($consulta,$conexion); 
          $c=mysql_fetch_object($con);?>
		</strong><?php echo"$c->fecha"; ?></td>
      </tr>
      <tr>
        <td class="Estilo10"><strong>Descripci&oacute;n del servicio solicitado o falla a  reparar:</strong></td>
      </tr>
      <tr>
        <td><p> 
		<?php 
         $consulta="select * from solicita where folio='$folio';";
         $con=mysql_query($consulta,$conexion); 
         $c=mysql_fetch_object($con);
		echo"$c->descripcion ";?>
		</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        <p>&nbsp;</p>
		<p>&nbsp;</p>
        <p>&nbsp;</p>
		</td>
      </tr>
    </table>
	 <p>&nbsp;</p>
	 <div>
      <p align="justify">c.c.p. Departamento de  Planeaci&oacute;n Programaci&oacute;n y Presupuestaci&oacute;n&nbsp; <br>
        c.c.p. &Aacute;rea Solicitante.</p>
		 <div>
    <p align="left" class="Estilo3 Estilo10 Estilo16"><span class="Estilo15">SNEST-AD-PO-001-02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Rev. O </span></p>
  </div>
    </div>
  </div>
</div>
</body>
</html>