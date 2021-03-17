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
		//$periodo=$_SESSION['periodo'];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
	
	
	<section id="seccion">
    
        <header id="header">
                <div class="subtitulo">Lista de Docentes registrados</div>
            <br>
        </header>

    <div id="registros" >
    <table>
    	<tr>
        	<th align="center" width="">No</th>
            <th align="center" width="">ID</th>
            <th align="center" width="">Nombre</th>
            <th align="center" width="">Dirección</th>
            <th align="center" width="">tel</th>
            <th align="center" width="">Correo</th>
            <th align="center" width="">Hab</th>
            <th align="center" width="">Modif</th>
        </tr>
        <?php
		$docente="select * from docente order by status desc;";
		$doc=mysql_query($docente,$conexion);
		$x=0;
		while($d=mysql_fetch_object($doc))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td align='center'>$d->idoc</td>
				<td>$d->nomdoc</td>			
				<td>$d->dirdoc</td>
				<td align='right'>$d->teldoc</td>
				<td>$d->maildoc</td>
				<td align='center'>";
				if($d->status==1)
					echo"<img src='$ip/img/hecho.png' alt='habilitado'>"; 
				else
					echo"<img src='$ip/img/no.png' alt='habilitado'>"; 

				echo"</td>
				<td align='center'><a href='$ip/administrador/modoc.php?idoc=$d->idoc'>Modifi</a></td>
			</tr>
			"; 
    	}?>
    </table>
	</div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>