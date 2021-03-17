<html>
<head>
	<title></title>
    <style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo2 {font-family: Arial, Helvetica, sans-serif}
.Estilo3 {
	font-size: 12px;
	font-weight: bold;
	color: #666666;
}
-->
    </style>
</head>
<body>
<?php
 include"../../conexion.php";
 $conexion=conectar();
 $folio=$_GET[folio];
 $numcontrol=$_GET[numcontrol];
 
 $consulta="select * from odtm where folio='$folio' and numcontrol='$numcontrol';";
 $con=mysql_query($consulta);
 $c=mysql_fetch_object($con);
 
 $subconsulta="select * from solicita where folio='$folio';";
 $sub=mysql_query($subconsulta,$conexion);
 $s=mysql_fetch_object($sub);
 
 
 $docente="select *from  docente where idoc='$s->clave';";
 $doc=mysql_query($docente,$conexion);
 $d=mysql_fetch_object($doc);
 
 $personal="select * from personal where idpersonal='$c->asignado';";
 $pe=mysql_query($personal,$conexion);
 $p=mysql_fetch_object($pe);
 
 
 
  
?>
<div style="width: 750px; margin: 10px auto;">
  <table width="753" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
      <td width="132" rowspan="3"><img src="../../img/logodgest.png" width="122" height="70" class="imagen"></td>
      <td width="356"><span class="Estilo1">Formato para Orden de Trabajo de Mantenimiento</span></td>
      <td width="251"><span class="Estilo1">C&oacute;digo:SNEST-AD-PO-001-04</span></td>
    </tr>
    <tr>
      <td rowspan="2"><span class="Estilo1">Referencia al punto de la norma ISO 9001:2008  6.3, 6.4</span></td>
      <td><span class="Estilo1">Revisi&oacute;n: O</span></td>
    </tr>
    <tr>
      <td><span class="Estilo2"><strong>P&aacute;gina </strong><strong>1 de </strong><strong>2</strong></span></td>
    </tr>
  </table>
  
  
  <div>
    <p align="center" class="Estilo2"><strong>ORDEN  DE TRABAJO DE MANTENIMIENTO</strong></p>
  </div>
  
  <div>
    <h3 align="right" class="Estilo2">N&uacute;mero de  control:<u><?php echo"$numcontrol";?></u></h3>
  </div>
  <table width="743" border="1" cellspacing="0" bordercolor="#000000">
  <tr>
    <td height="64"><span class="Estilo2"><strong>Mantenimiento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Interno 
      <label>
      <input name="checkbox" type="checkbox" value="checkbox" checked>
      </label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Externo&nbsp;&nbsp;&nbsp;&nbsp;
      <label>
      <input type="checkbox" name="checkbox2" value="checkbox">
      </label>
    </strong></span>
      <p><span class="Estilo2"><strong>        </strong></span></p>
      </td>
  </tr>
  <tr>
    <td><p class="Estilo2"><strong>Tipo de servicio: </strong><?php echo"$c->tiposervicio";?></p>
      <p class="Estilo2">&nbsp;</p></td>
  </tr>
  <tr>
    <td><p class="Estilo2"><strong>Asignado a:</strong><?php echo"$p->nompersonal"; ?></p>
      <p class="Estilo2">&nbsp;</p></td>
  </tr>
</table>
  <p>&nbsp;</p>
  <table width="743" border="1" cellspacing="0" bordercolor="#000000">
  <tr>
    <td colspan="2"><p class="Estilo2"><strong>Fecha de realizaci&oacute;n:</strong><?php echo"$c->fechafin";?></p>
      </td>
  </tr>
  <tr>
    <td colspan="2"><p class="Estilo2"><strong>Trabajo  Realizado:</strong></p>
      <p><?php echo"$c->trabajo";?></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="388"><p class="Estilo2"><strong>Verificado y Liberado por:</strong></p>
      <p class="Estilo2"><?php echo"$d->nomdoc";?></p></td>
    <td width="345"><span class="Estilo2"><strong>Fecha:</strong><?php echo"$c->fechafin";?><strong>&nbsp;&nbsp; y Firma: </strong></span></td>
  </tr>
  <tr>
    <td><p class="Estilo2"><strong>Aprobado por: </strong></p>
      <p class="Estilo2">&nbsp;</p></td>
    <td><span class="Estilo2"><strong>Fecha:</strong><?php echo"$c->fechafin";?><strong>&nbsp;&nbsp; y Firma: </strong></span></td>
  </tr>
</table>


  <div>
    <p>C.c.p. Departamento de Planeaci&oacute;n Programaci&oacute;n y  Presupuestaci&oacute;n&nbsp; <br>
      C.c.p. &Aacute;rea Solicitante.</p>
  </div>
  
  <div>
    <p class="Estilo3">SNEST-AD-PO-001-04&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rev. O </p>
  </div>
</div>
</body>
</html>