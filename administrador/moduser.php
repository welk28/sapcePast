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
		include "../usuarios.php";	
		$tabla=$_GET[tabla];
		$nombre=$_GET[nombre];
		$id=$_GET[id];
		$idt=$_GET[idt];
		$atributo=$_GET[atributo];
		$contra=strtoupper($_POST[contra]);
		?>
	</header>
	<section id="seccion"> 
	
        <header id="header">
                <div class="subtitulo">Lista USUARIOS a modificar:  </div><br><br><br>
                <div class="subtitulo"><?php  echo"$tabla";  ?></div>
            <br>
        </header>
    <div id="registros" >
    	<?php  
    	
	if(empty($contra))
	{
	?>
	<form method="post" name="formula" action="moduser.php">
	    <table>
	    	<tr>
	            <th align="center" width="">Nombre</th>    
	            <th align="center" width="">Editar Pass</th>  
	        </tr>
	        <?php
				$x++;
				echo"
				<tr>
					<td align='center'>
						<input type='hidden' value='$id' name='id' >
						<input type='hidden' value='$idt' name='idt'>
						<input type='hidden' value='$nombre' name='nombre'>
						<input type='hidden' value='$tabla' name='tabla'>
						<input type='hidden' value='$atributo' name='atributo'>
						$nombre
					</td>			
					<td align='center'><input type='password' required name='contra'></td>
					<td align='center'><input type='submit' name='Guardar'></td>
				</tr>
				"; 
	    	?>
	    </table>
	 </form>
	<?php  
		} 
		else
		{
			$tabla=$_POST[tabla];
			$nombre=$_POST[nombre];
			$id=$_POST[id];
			$idt=$_POST[idt];
			$atributo=$_POST[atributo];

			echo"
				tabla: $tabla nombre: $nombre id: $id contra: $contra atributo: $atributo idt: $idt <br>
				update $tabla set $atributo=sha1('$contra') where $idt='$id' <br><br><br><br>
			";

			$modifica="update $tabla set $atributo=sha1('$contra') where $idt='$id';";
			$mod=mysql_query($modifica,$conexion);
			if(!$mod)
			{
				print"
				<script languaje='JavaScript'>
				alert('¡FATAL ERROR!');
				window.location.href='cuentasus.php';
				</script>
				";
			}
			else
			{
				if($ses!=12)
				{
					print"
					<script languaje='JavaScript'>
					alert('¡ACTUALIZACION EXITOSA!');
					window.location.href='cuentasus.php';
					</script>
				";	
				}
				else
				{
					print"
					<script languaje='JavaScript'>
					alert('¡ACTUALIZACION EXITOSA!');
					window.location.href='$ip';
					</script>
				";
				}
				
			}
			
		}
	?>
	</div>
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>