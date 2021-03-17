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
    <header>
		<?php 	
		
include "../conexion.php";
$conexion=conectar();
		$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
    <section id="seccion">
    
    <header id="header">
			<div class="subtitulo">Alta de aspirante</div>
        <br>
    </header>

<div id="registros" >
    
        <form action='alumnosalta2.php' method='post' name='form1'>
    <table>
      <tr>
        <th colspan="10">Complete los siguientes campos<br>
          Datos personales</th>
      </tr>
      
      <tr>
      	<td width="96">&nbsp;</td>
        <td width="98">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="108">&nbsp;</td>
        <td width="78">&nbsp;</td>
        <td width="99">&nbsp;</td>
        <td width="78">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="85">&nbsp;</td>
        <td width="90" align="right">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="app"  onkeyup="this.value=this.value.toUpperCase()"  type="text" id="app" size="25" maxlength="60" placeholder="Apellido Paterno" required></td>
        <td colspan="2" align="center"><input name="apm"  onkeyup="this.value=this.value.toUpperCase()"  type="text" id="apm" size="25" maxlength="60" placeholder="Apellido Materno" required></td>
        <td colspan="2" align="center"><input name="nomal"  onkeyup="this.value=this.value.toUpperCase()"  type="text" id="nomal" size="25" maxlength="60" placeholder="Nombre(s)" required></td>
        <td align="right">Sexo:</td>
        <td><select name="sexo" id="sexo" required>
        <option value='' selected>SELECCIONE</option>
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
        <td colspan="2"><input type="date" name="fecnac" id="fecnac" require="true" required></td>
        <td>Edo. Civil:</td>
        <td><select name="edociv" id="edociv">
          <option value="Soltero(a)" selected>Soltero(a)</option>
          <option value="Casado (a)">Casado(a)</option>
          <option value="otro">otro</option>
        </select></td>
        <td align="right">E-mail:</td>
        <td colspan="3"><input name="email" type="email" id="email" onKeyUp="this.value=this.value.toUpperCase()" size="40" placeholder="micorreo@dominio.com"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Especificar:</td>
        <td><input name="otro" type="text" id="otro" size="16" onKeyUp="this.value=this.value.toUpperCase()" placeholder="otro edo civil"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Teléfono:</td>
        <td><input name="tel" type="tel" id="tel" size="15" maxlength="15" placeholder="Teléfono"></td>
        <td align="right">CURP:</td>
        <td colspan="2"><input name="curp" type="text" id="curp" onKeyUp="this.value=this.value.toUpperCase()" size="20" maxlength="18" placeholder="Indique su CURP" required></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2" align="right">Con alguna discapacidad:</td>
        <td><select name="discap" id="discap" required>
          <option value='' selected>SELECCIONE</option>
          <option value='1'>S&iacute;</option>
          <option value='2'>No</option>
        </select></td>
        <td colspan="2" align="right">Alguna lengua/dialecto:</td>
        <td><select name="dialecto" id="dialecto" required>
          <option value='' selected>SELECCIONE</option>
          <option value='1'>S&iacute;</option>
          <option value='2'>No</option>
        </select></td>
        <td colspan="2" align="right">Ciudad de procedencia(natal):</td>
        <td colspan="2"><select name='proc' id='proc' required>
          <?php  
		 
		 echo"<option value='' selected>Seleccione</option>";
   
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
        <td colspan="3" align="center"><input name="calle" type="text" onKeyUp="this.value=this.value.toUpperCase()" id="calle"  size="50" placeholder="Indique la calle" required/></td>
        <td>&nbsp;</td>
        <td colspan="3" align="center"><input name="colonia" type="text" onKeyUp="this.value=this.value.toUpperCase()" id="colonia" size="50" placeholder="Indique la colonia" required/></td>
        <td>&nbsp;</td>
        <td align="center"><input name="cp" id="cp"
title="inserte los 5 números de su código postal"  size="5" maxlength="5"  pattern="[0-9]{5}" placeholder="CP" required></td>
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
		 
		 echo"<option value='' selected>Seleccione</option>";
   
   		$sqle="select * from estado";
   		$re=mysql_query($sqle,$conexion);
		while ($regta = mysql_fetch_object($re)){
	  		echo "<option value='$regta->idedo'>$regta->edo</option>";
	  	}
 ?>
            </select>
          </label></td>
        <td colspan="3" align="center"><input name="ciudad" type="text" onKeyUp="this.value=this.value.toUpperCase()" id="ciudad" size="50" placeholder="Indique la ciudad" required/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">Estado</td>
        <td colspan="3" align="center">Ciudad(Delegación)</td>
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
  $sqle="select * from procedencia";
   $re=mysql_query($sqle,$conexion);
   echo"<option value='' selected>Seleccione</option>";
	while ($regta = mysql_fetch_object($re)){
	  echo "<option value='$regta->idesc'>$regta->escuela</option>";
	  }
	?> 
    </select>
        </td>
        <td colspan="2"><label>
          <input name='otesc' onKeyUp="this.value=this.value.toUpperCase()" type='text' id='otesc' size='30' placeholder="otra escuela" />
        </label></td>
        <td colspan="3" align="center"><input name='prepa' type='text' onKeyUp="this.value=this.value.toUpperCase()" id='prepa' size='50' placeholder="Nombre de medio superior de procedencia" required/></td>
        <td>&nbsp;</td>
        <td align="center"><input name='propre' type='text' id='propre' size='4' maxlength='4' required/></td>
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
        <td colspan="3" align="center"><input name='secu' type='text' onKeyUp="this.value=this.value.toUpperCase()" id='secu' size='60' placeholder="Nombre de secundaria de procedencia" required/></td>
        <td>&nbsp;</td>
        <td colspan="2" align="center"><input name='prose' type='text' id='prose' size='4' maxlength='4' required/></td>
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
        <td colspan="3" align="center"><input name='nomtut' type='text' onKeyUp="this.value=this.value.toUpperCase()" id='nomtut' size='50' maxlength='50' placeholder="Nombre del tutor (opcional)"/></td>
        <td colspan="3" align="center"><input name='dirtut' type='text' onKeyUp="this.value=this.value.toUpperCase()" id='dirtut' size='50' maxlength='50' placeholder="Dirección del tutor (opcional)"/></td>
        <td>&nbsp;</td>
        <td align="center">
        <input name="teltut" type="tel" id="teltut" size="15" maxlength="15" placeholder="Tel(opcional)" /></td>
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
        <td colspan="3" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Siguiente'></td>
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
