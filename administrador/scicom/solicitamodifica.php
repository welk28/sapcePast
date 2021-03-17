<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title>SAPCE:: SCICOM::MODIFICA SOLICITUD</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
	<script language="JavaScript" type="text/javascript">
function validar()
{
if((document.solicitamodifica.fecha.value!=="")&&(document.solicitamodifica.descripcion.value!==""))
{
var pregunta= confirm("ESTA SEGURO  DE LA MODIFICACION ")

if (pregunta==true)
{
document.solicitamodifica.submit();
		/*alert('REGISTRO  EXITOSO');
		 window.location.href='accesorio.php';*/   /*IGNORA ESTA ALERTA*/
}
else
{
		document.location.href='solicita.php';
}

}
else{
alert(" ALGUNOS CAMPOS NO PUEDE QUEDAR VACIOS");
}

}

</script>
</head>
<body>
	<div id="cuerpo">
		<header>
		<?php  include "../../usuarios.php";
		$folio=$_GET[folio];
		
		$consulta="select * from solicita where folio='$folio';";
		$con=mysql_query($consulta,$conexion);
		$c=mysql_fetch_object($con);
		$subconsulta="select * from docente where idoc='$c->clave';";
		$sub=mysql_query($subconsulta,$conexion);
		$s=mysql_fetch_object($sub);
		
		$oficina="select * from depto where iddepto='$c->area';";
		$of=mysql_query($oficina,$conexion);
		$o=mysql_fetch_object($of);
		
		$for="select * from areas where idarea='$c->departamento';";
		$fo=mysql_query($for,$conexion);
		$f=mysql_fetch_object($fo);
		?>
		</header>
		<section id="seccion">
			<header id="header">
				<div class="subtitulo">Modifica la Solicitud:</div>
			</header>
			<article id="form">
				<div align="center">
				<form id="solicitamodifica" name="solicitamodifica" action="solicitamodifica2.php" method="post">
				<table width="512" border="1">
  <tr>
    <td width="154">FOLIO</td>
    <td width="342"><label>
      <input type="text"  value="<?php echo"$c->folio";?>" disabled="disabled">
	    <input type="hidden" name="folio" id="folio" value="<?php echo"$c->folio";?>">
    </label></td>
  </tr>
  <tr>
    <td>DOCENTE</td>
    <td><label>
      <input type="hidden" name="clave" id="clave" value="<?php echo"$c->clave";?>">
	  <input  type="text" value="<?php echo"$s->nomdoc";?>" disabled="disabled" size="50">
    </label></td>
  </tr>
  <tr>
    <td>*FECHA</td>
    <td><label>
      <input type="date" name="fecha" id="fecha" value="<?php echo"$c->fecha";?>">
    </label></td>
  </tr>
  <td>�DEPARTAMENTO AQUIEN LO DIRIGE?</td>
    <td><label>
      <?php
     echo"<select name='departamento' id='departamento' onchange='habilitar()'>";
     $combo=" select * from areas where idarea='$idarea'";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"<option value='$c->departamento' selected>DESCRIPCION ACTUAL: $f->nombrearea </option>";
     $combo1="select * from areas";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->idarea'> $com1->nombrearea </option>";

      } 
    
     echo "</select>";
    ?>
    </label></td>
  </tr>
  <tr>
    <td>�AREA A LA QUE PERTENECE? </td>
    <td>
	 <?php
     echo"<select name='area'  id='area' onchange='habilitar()'>";
     $combo=" select * from depto where iddepto='$iddepto'";
     $comb=mysql_query($combo,$conexion);
     $com=mysql_fetch_object($comb);
	echo"<option value='$c->area' selected> AREA ACTUAL: $o->nombre </option>";
     $combo1="select * from depto";
     $comb1=mysql_query($combo1,$conexion);
     while ($com1=mysql_fetch_object($comb1)) {
      echo "<option value='$com1->iddepto'> $com1->nombre </option>";

      } 
    
     echo "</select>";
    ?>
	</td>
  </tr>
  <tr>
    <td>*DESCRIPCION:</td>
    <td><label>
      <textarea name="descripcion" cols="40" rows="6" id="descripcion" ><?php echo"$c->descripcion";?></textarea>
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="button"  name="aceptar" value="ACEPTAR" onClick="validar()">
    </div>
      <label></label></td>
    </tr>
</table>

				</form>
				</div>
			</article>
		</section>
			<div style="clear: both; width: 100%;"></div>
		<footer>
			<?php include "../../pie.php";?>
		</footer>
	</div>

</body>
</html>