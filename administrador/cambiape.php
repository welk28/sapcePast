<?php  session_start();  ?>

<!DOCTYPE html >

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title></head>



<body>

<div id="cuerpo">

	<header>

		<?php 	include "../usuarios.php";	

		$periodo2=$_GET[periodo2];

		

		

	//echo"sesion: $quien <br>usuario: $usuario";

		?>

	</header>

	<section id="seccion">

    <?php

		if(empty($periodo2))

		{

	?>

        <header id="header">

            <div class="subtitulo">Cambio de periodo <?php echo"Periodo: <b>$p->descper /$nh</b>"?></div>

            <br>

        </header>



        <div id="registros" >

        

        

       

		<form action='cambiape.php' name='form1' method='get' >

        <table>

            <tr>

                <th colspan="2" class="titulotabla">Seleccione el nuevo periodo </th>

            </tr>

      		<tr>

                <th width="107" align="right" ><br> </th>

				<td width="106" ><br>

          <?php

		  	

		   		echo "

				<select name='periodo2' id='periodo2' required>

				<option value=''>Seleccionar</option>";

				$sqle="select * from periodo order by periodo desc";

   				$re=mysql_query($sqle,$conexion);

				while ($ca= mysql_fetch_object($re))

				{

			  		echo "<option value='$ca->periodo'>$ca->descper</option>";

			  	}

				echo" </select>";

			?>

        </td>

			</tr>

            

      

            <tr>

                <th width="107" align="right" ></th>

				<td width="106" >

                

                </td>

			</tr>

            <tr>

                <th align="right"> </th>

				<td>

                

                

                </td>

			</tr>

            <tr>

                <td colspan="2" align="center">

                

                	<label>

                  	<input name='enviar' type='submit' id='enviar' value='Continuar' >

                	</label>

                </td>

			</tr>

            

			

        </table>

        </form>

        </div>

        <?php

		}

		else

		{

			//echo"$periodo2";

			$_SESSION['periodo'] = $periodo2;

			print"

				<script language='JavaScript'>

					window.alert('Cambio exitoso');

					window.location='$ip/panel.php';

				</script>";

		}

		?>

	</section>

	<div style="clear: both; width: 100%;"></div>

	<footer >

		<?php	include "../pie.php";	?>

	</footer>

</div>

</body>

</html>