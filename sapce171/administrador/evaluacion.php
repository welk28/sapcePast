<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

<meta charset="UTF-8">
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
		$usuario=$_SESSION['usuario'];
		include "../usuarios.php";	?>
	</header>
	
	
	<section id="seccion">
		<?php
		$periodo2=$_GET[periodo2];
		if(empty($periodo2))
		{
		?>
		
		<form action='evaluacion.php' name='form1' method='get' >
        <table>
            <tr>
                <th colspan="2" class="titulotabla">Seleccione el nuevo periodo </th>
            </tr>
      		<tr>
                <th width="107" align="right" ><br> </th>
				<td width="106" ><br>
          <?php
		  	$evaluando="select  des from control where id='12'";
			$evan=mysql_query($evaluando,$conexion);
			$en=mysql_fetch_object($evan);
		   		
				echo "
				<select name='periodo2' id='periodo2' required>
				<option value='$en->des'>$en->des / Actual</option>";
				$sqle="select * from periodo";
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
		<?php
		}
		else
		{
			//echo"$periodo2";
			$cambiarp="update control set des='$periodo2' where id='12'";
			$cambiando=mysql_query($cambiarp,$conexion);
			print"
				<script language='JavaScript'>
					window.alert('Cambio exitoso');
					window.location='evaluacion.php';
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
