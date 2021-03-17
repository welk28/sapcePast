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

		<?php 	include "../usuarios.php";	

		$idmat=$_POST[idmat];
		$nommat=$_POST[nommat];
		$credit=$_POST[credit];

    $idcar=$_POST[idcar];
    $sem=$_POST[sem];
    $cred=$_POST[cred];
		

	//echo"sesion: $quien <br>usuario: $usuario";

		?>

	</header>

    <section id="seccion">

    

    <header id="header">

			<div class="subtitulo">Alta de nueva materia</div>

        <br>

    </header>



<div id="registros" >

    <?php

	if(empty($idmat))
	{
	?>
        <form action='altamat.php' method='post' name='form1'>
    <table>
      <tr>
        <th colspan="10">Complete los siguientes campos<br></th>
      </tr>
      <tr>
      	<td width="96">&nbsp;</td>
        <td width="98">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="108">&nbsp;</td>
        <td width="93">&nbsp;</td>
        <td width="84">&nbsp;</td>
        <td width="78">&nbsp;</td>
        <td width="102">&nbsp;</td>
        <td width="85">&nbsp;</td>
        <td width="90" align="right">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center"><input name="idmat" onKeyUp="this.value=this.value.toUpperCase()" type="text" id="id" size="10" maxlength="10" required></td>
        <td colspan="3" align="center"><input name="nommat" onKeyUp="this.value=this.value.toUpperCase()" type="text" id="des" size="50" maxlength="60" required></td>
        <td align="right">&nbsp;</td>
        <td colspan="2" align="center"><input name="credit" type="text" size="3" maxlength="2" placeholder="total" required></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center">Identificador</td>
        <td colspan="3" align="center">Nombre de materia</td>
        <td>&nbsp;</td>
        <td colspan="2" align="center">Créditos Total</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">Creditos: <input type="text" name="cred" placeholder="2-3-5" size="5" maxlength="5"></td>
        <td colspan="3" align="center">&nbsp;</td>
        <td></td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td colspan="3">Carrera: 
          <?php 
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
           ?>
        </td>
        <td colspan="3" align="center"><input name='Aceptar'  type='submit' id='Aceptar' value='Agregar'></td>
        <td>Semestre<input type="text" name="sem" placeholder="1-9" size="1"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>
    <p>&nbsp;</p>
    </form>
      </div>
      <?php
	}
	else
	{
		$actualiza="insert into materias (idmat, nommat, credit, habil, cred) values ('$idmat', '$nommat', '$credit', '1', '$cred');";
		$act=mysql_query($actualiza,$conexion);

    $poseee="insert into posee (idcar, idmat, sem) values ('$idcar', '$idmat','$sem');";
    $poo=mysql_query($poseee,$conexion);
    
		if($act&&$poo)
		{
			print"
			<script languaje='JavaScript'>
				window.alert('¡Alta Exitosa!');				
				window.location.href='$ip/administrador/materias.php';
			</script>";
		}
		else
		{
		echo"error";
		}

	

	}

	  ?>

    </section>

    

    <p>&nbsp;</p>

    <p>&nbsp;</p>

</div>

</body>

</html>

