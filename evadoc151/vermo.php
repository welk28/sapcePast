<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function validar()
{   
	if(document.form1.edociv.value=="otro")
	{
		if(document.form1.otro.value=="")
			window.alert("FALTA SU ESTADO CIVIL");
	}
}
</script>
</head>

<body>
<div id="cuerpo">
    <header>
		<?php 	
    if($ses==1)
    {
      include "../evadoc142/usuarios.php";  
    }
    else
    {
      include "usuarios.php";	
    }
		$periodo=$_SESSION['periodo'];
		$quien=$_SESSION['quien'];
		$matricula=$_GET[matricula];
		$datos="select * from alumnos where matricula='$matricula';";
		$da=mysql_query($datos,$conexion);
		$d=mysql_fetch_object($da);
	//echo"sesion: $quien <br>usuario: $usuario <br>  ";
    echo"sesion: $ses ";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Consulta/modificacion de datos de <br><?php echo"<b>matricula: $matricula $d->app $d->apm $d->nom</b> <a href='boleta.php?matricula=$matricula' target='_self' >Boleta</a>"; ?></div>
        <br>
    </header>

<div id="registros" >
    
        <form action='vermo2.php' method='post' name='form1'>
    <table>
      <tr>
        <th colspan="10">Complete los siguientes campos<br>
          Datos personales</th>
      </tr>
      
      <tr>
      	<td colspan="2" align="right">Número de control:</td>
        <td colspan="2"><input name="matricula"    type="text" id="matricula" size="10" maxlength="10" placeholder="Apellido Paterno" required value="<?php echo"$matricula"; ?> " readonly></td>
        <td width="78">&nbsp;</td>
        <td width="99" align="right">Semestre:</td>
        <td width="78">
        
          
          	<?php 
			if($ses==1)
			{
				echo"<select name='status' id='status'>";
				if(!$d->status)
				{
					echo"<option value=''>Selec</option>";
				}
				else
				{
					echo"<option value='$d->status'>$d->status Sem</option>";
				}
			
				echo"
			  </select>";
			}
			else
			{
				echo"<select name='status' id='status'>";
				if(!$d->status)
				{
					echo"<option value=''>Selec</option>";
				}
				else
				{
					echo"<option value='$d->status'>$d->status Sem</option>";
				}
			
				echo"<option value='0 Sem'>0</option>
				<option value='1'>1 Sem</option>
				<option value='2'>2 Sem</option>
				<option value='3'>3 Sem</option>
				<option value='4'>4 Sem</option>
				<option value='5'>5 Sem</option>
				<option value='6'>6 Sem</option>
				<option value='7'>7 Sem</option>
				<option value='8'>8 Sem</option>
				<option value='9'>9 Sem</option>
				<option value='10'>10 Sem</option>
				<option value='11'>11 Sem</option>
				<option value='12'>12 Sem</option>
			  </select>";
			}
			?>
		</td>
        <td width="102">&nbsp;</td>
        <td width="85">&nbsp;</td>
        <td width="90" align="right">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="app"  onkeyup="this.value=this.value.toUpperCase()"  type="text" id="app" size="25" maxlength="60" placeholder="Apellido Paterno" required value="<?php echo"$d->app";  ?>"></td>
        <td colspan="2" align="center"><input name="apm"  onkeyup="this.value=this.value.toUpperCase()"  type="text" id="apm" size="25" maxlength="60" placeholder="Apellido Materno" required value="<?php echo"$d->apm"; ?>"></td>
        <td colspan="2" align="center"><input name="nomal"    type="text" id="nomal" size="25" maxlength="60" placeholder="Nombre(s)" required value="<?php echo"$d->nom"; ?>"></td>
        <td align="right">Sexo:</td>
        <td><select name="sexo" id="sexo" required>
        <?php 
		if(!$d->sexo)
		{
			echo"<option value='' selected>?</option>";
		}
		else
		{
			if($d->sexo=='H')
				echo"<option value='H' selected>Masculino</option>";
			else
				echo"<option value='M' selected>Femenino</option>";
		}
		?>
          <option value="H">Masculino</option>
          <option value="M">Femenino</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center">Apellido paterno</td>
        <td colspan="2" align="center">Apellido materno</td>
        <td colspan="2" align="center">Nombre(s)</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     
      <tr>
        <td colspan="2" align="right">Fecha de nacimiento:</td>
        <td colspan="2"><input type="date" name="fecnac" id="fecnac" require="true" required value="<?php echo"$d->fecnac"; ?>"></td>
        <td>Edo. Civil:</td>
        <td><select name="edociv" id="edociv" required>
        <?php
		if(!$d->edociv)
		{
			echo"<option value''>Selec</option>";
		}
		else
		{
			echo"<option value='$d->edociv' selected>$d->edociv</option>";
		}
		
			/*if(($d->edociv=="Soltero(a)")||($d->edociv=="SOLTERO (A)") )
				
			else
				echo"<option value='Casado (a)' selected>Casado(a)</option>";*/
		?>
          <option value="Soltero(a)">Soltero(a)</option>
          <option value="Casado (a)">Casado(a)</option>
          <option value="otro">otro</option>
        </select></td>
        <td align="right">E-mail:</td>
        <td colspan="3"><input name="email" type="email" id="email" size="40" placeholder="micorreo@dominio.com" value="<?php echo"$d->email"; ?>"></td>
      </tr>
      <tr>
        <td width="96">&nbsp;</td>
        <td width="98">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="108">&nbsp;</td>
        <td>Especificar:</td>
        <td><input name="otro" type="text" id="otro" size="16" placeholder="otro edo civil" value="<?php echo"$d->otro"; ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Teléfono:</td>
        <td><input name="tel" type="tel" id="tel" size="15" maxlength="15" placeholder="Teléfono" value="<?php echo"$d->telal"; ?>"></td>
        <td align="right">CURP:</td>
        <td colspan="2"><input name="curp" type="text" id="curp" size="20" maxlength="18" placeholder="Indique su CURP" required value="<?php echo"$d->curp"; ?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2" align="right">Con alguna discapacidad:</td>
        <td><select name="discap" id="discap" required>
        <?php 
		if(!$d->discap)
		{echo"<option value='' selected>SELECCIONE</option>";
		}
		else
		{
			if($d->discap==1)
				echo"<option value='1' selected>S&iacute;</option>";
			else
				echo"<option value='2' selected>No</option>";
		}
		?>
          <option value='1'>S&iacute;</option>
          <option value='2'>No</option>
        </select></td>
        <td colspan="2" align="right">Alguna lengua/dialecto:</td>
        <td><select name="dialecto" id="dialecto" required>
         <?php 
		 if(!$d->dialecto)
		 {echo" <option value='' selected>SELECCIONE</option>";
		 }
		 else
		 {
			if($d->dialecto==1)
				echo"<option value='1' selected>S&iacute;</option>";
			else
				echo"<option value='2' selected>No</option>";
		 }
		?>
          <option value='1'>S&iacute;</option>
          <option value='2'>No</option>
        </select></td>
        <td colspan="2" align="right">Ciudad de procedencia(natal):</td>
        <td colspan="2"><select name='proc' id='proc' required>
          <?php  
			$estado="select * from estado where idedo='$d->proc'";
   		$edo=mysql_query($estado,$conexion);
		$ed=mysql_fetch_object($edo);
		if(!$d->proc)
		{
			 echo"<option value='' selected>Seleccione</option>";
		}
		else
		{
   		echo "<option value='$d->proc' selected>$ed->edo</option>";
		}
   		$sqle="select * from estado";
   		$re=mysql_query($sqle,$conexion);
		while ($regta = mysql_fetch_object($re)){
	  		echo "<option value='$regta->idedo'>$regta->edo</option>";
	  	}
 ?>
        </select></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th colspan="10">DOMICILIO (actual)</th>
        </tr>
      <tr>
        <td colspan="3" align="center"><input name="calle" type="text" id="calle"  size="50" placeholder="Indique la calle" required value="<?php echo"$d->calle"; ?>"/></td>
        <td>&nbsp;</td>
        <td colspan="3" align="center"><input name="colonia" type="text" id="colonia" size="50" placeholder="Indique la colonia" required value="<?php echo"$d->colonia"; ?>"/></td>
        <td>&nbsp;</td>
        <td align="center"><input name="cp" id="cp"
title="inserte los 5 números de su código postal" size="5" maxlength="5" pattern="[0-9]{5}" placeholder="CP" required value="<?php echo"$d->cp"; ?>" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">Calle</td>
        <td>&nbsp;</td>
        <td colspan="3" align="center">Colonia</td>
        <td>&nbsp;</td>
        <td align="center">Código Postal</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">
        <label>
        <select name='edo' id='edo' required>
		  <?php  
		   
			$esta="select * from estado where idedo='$d->proc'";
   		$edos=mysql_query($esta,$conexion);
		$e=mysql_fetch_object($edos);
		if(!$e->idedo)
		{ echo"<option value='' selected>Seleccione</option>";
		}else
		{
   		echo "<option value='$e->idedo' selected>$ed->edo</option>";
		}
   
   		$sqle="select * from estado";
   		$re=mysql_query($sqle,$conexion);
		while ($regta = mysql_fetch_object($re)){
	  		echo "<option value='$regta->idedo'>$regta->edo</option>";
	  	}
 ?>
            </select>
          </label></td>
        <td colspan="3" align="center"><input name="ciudad" type="text" id="ciudad" size="50" placeholder="Indique la ciudad" required value="<?php echo"$d->ciudad"; ?>"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">Estado</td>
        <td colspan="3" align="center">Ciudad</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th colspan="10">Antecedente Escolar</th>
        </tr>
      <tr>
        <td colspan="2" align="center">
        <select name='idesc' id='idesc' required>
      <?php
	  $procede="select * from procedencia where idesc='$d->idesc'";
   		$proc=mysql_query($procede,$conexion);
		$pr=mysql_fetch_object($proc);
		if(!$d->idesc)
		{
		echo"<option value='' selected>Seleccione</option>";
		}
		else
		{
			echo "<option value='$d->idesc'>$pr->escuela</option>";
		}
   		
	  
  $sqle="select * from procedencia";
   $re=mysql_query($sqle,$conexion);
   
	while ($regta = mysql_fetch_object($re)){
	  echo "<option value='$regta->idesc'>$regta->escuela</option>";
	  }
	?> 
    </select>
        </td>
        <td colspan="2"><label>
          <input name='otesc' type='text' id='otesc' size='30' placeholder="otra escuela" value="<?php echo"$d->otesc"; ?>"/>
        </label></td>
        <td colspan="3" align="center"><input name='prepa' type='text' id='prepa' size='50' placeholder="Nombre de medio superior de procedencia" required value="<?php echo"$d->prepa"; ?>"/></td>
        <td>&nbsp;</td>
        <td align="center"><input name='propre' type='text' id='propre' size='4' maxlength='4' required value="<?php echo"$d->propre"; ?>"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center">Escuela de procedencia</td>
        <td>otro</td>
        <td>&nbsp;</td>
        <td colspan="3" align="center">Nombre de la escuela</td>
        <td>&nbsp;</td>
        <td align="center">Promedio</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" align="center"><input name='secu' type='text' id='secu' size='60' placeholder="Nombre de secundaria de procedencia" required value="<?php echo"$d->secu"; ?>"/></td>
        <td>&nbsp;</td>
        <td colspan="2" align="center"><input name='prose' type='text' id='prose' size='4' maxlength='4' required value="<?php echo"$d->prose"; ?>"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td colspan="3" align="center">Secundaria de procedencia</td>
        <td>&nbsp;</td>
        <td colspan="2" align="center">Promedio secundaria</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th colspan="10">Tutor</th>
        </tr>
      <tr>
        <td colspan="3" align="center"><input name='nomtut' type='text' id='nomtut' size='50' maxlength='50' placeholder="Nombre del tutor (opcional)" value="<?php echo"$d->nomtut"; ?>"/></td>
        <td colspan="3" align="center"><input name='dirtut' type='text' id='dirtut' size='80' maxlength='80' placeholder="Dirección del tutor (opcional)" value="<?php echo"$d->dirtut"; ?>"/></td>
        <td>&nbsp;</td>
        <td align="center">
        <input name="teltut" type="tel" id="teltut" size="15" maxlength="15" placeholder="Tel(opcional)" value="<?php echo"$d->teltut"; ?>"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">Nombre del tutor</td>
        <td colspan="3" align="center">Dirección del tutor</td>
        <td>&nbsp;</td>
        <td align="center">Teléfono</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" align="center">
        <?php
		if($ses==1)
		{
			echo"<select name='idcar' id='idcar' required>";
		  	$carri="select * from carrera where idcar='$d->idcar';";
			$ejec=mysql_query($carri,$conexion);
			$ej=mysql_fetch_object($ejec);
			echo "<option value='$d->idcar'>$ej->descar</option>";
			
			echo"</select>";
		}
		else
		{
			echo"<select name='idcar' id='idcar' required>";
		  	$carri="select * from carrera where idcar='$d->idcar';";
			$ejec=mysql_query($carri,$conexion);
			$ej=mysql_fetch_object($ejec);
			echo "<option value='$d->idcar'>$ej->descar</option>";
			
			$carrera="select * from carrera";
			$carr=mysql_query($carrera,$conexion);
	   
			while ($ca= mysql_fetch_object($carr))
			{
				echo "<option value='$ca->idcar'>$ca->descar</option>";
			}
			echo"</select>";
		}
	?>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3" align="center">Carrera en curso(cambiar)</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Actualizar'></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>
    <p>&nbsp;</p>
    </form>
      </div>
    </section>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
