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

                <div class="subtitulo">Lista USUARIOS para modificación de acceso</div>
            <br>

        </header>



    <div id="registros" >


    	<br><br><br>
        <div class="subtitulo">Administrador</div>
	    <table>
	    	<tr>
	        	<th align="center" width="">No</th>
	            <th align="center" width="">ID</th>
	            <th align="center" width="">Nombre</th>    
	            <th align="center" width="">Editar Pass</th>  
	        </tr>

	        <?php
			$administrador="select * from administrador where adm!='VICTOR';";
			$adm=mysql_query($administrador,$conexion);
			$x=0;
			while($a=mysql_fetch_object($adm))
			{
				$x++;
				echo"
				<tr>
					<td>$x</td>
					<td align='center'>$a->adm</td>
					<td>$a->nomadm</td>			
					<td align='center'><a href='$ip/administrador/moduser.php?id=$a->adm&nombre=$a->nomadm&tabla=administrador&atributo=passadm&idt=adm'>Modifi</a></td>
				</tr>
				"; 
	    	}?>
	    </table>

	    <br><br>
        <div class="subtitulo">academicos</div>

	    <table>
	    	<tr>
	        	<th align="center" width="">No</th>
	            <th align="center" width="">ID</th>
	            <th align="center" width="">Nombre</th>    
	            <th align="center" width="">Editar Pass</th>  
	        </tr>

	        <?php
			$academico="select * from academico;";
			$acad=mysql_query($academico,$conexion);
			$x=0;
			while($c=mysql_fetch_object($acad))
			{
				$x++;
				echo"
				<tr>
					<td>$x</td>
					<td align='center'>$c->idacad</td>
					<td>$c->nomacad</td>			
					<td align='center'><a href='$ip/administrador/moduser.php?id=$c->idacad&nombre=$c->nomacad&tabla=academico&atributo=passacad&idt=idacad'>Modifi</a></td>
				</tr>
				"; 
	    	}?>
	    </table>


	    <br><br>
        <div class="subtitulo">Coordinador</div>

	    <table>
	    	<tr>
	        	<th align="center" width="">No</th>
	            <th align="center" width="">ID</th>
	            <th align="center" width="">Nombre</th> 
	            <th align="center" width="">Carrera</th>   
	            <th align="center" width="">Editar Pass</th>  
	        </tr>

	        <?php
			$coordina="select c.idcor, c.nomcor, co.idcar from coordinador as c, coordina as co where c.idcor=co.idcor;";
			$coord=mysql_query($coordina,$conexion);
			$x=0;
			while($co=mysql_fetch_object($coord))
			{
				$x++;
				echo"
				<tr>
					<td>$x</td>
					<td align='center'>$co->idcor</td>
					<td>$co->nomcor</td>
					<td>$co->idcar</td>			
					<td align='center'><a href='$ip/administrador/moduser.php?id=$c->idcor&nombre=$co->nomcor&tabla=coordinador&atributo=passcor&idt=idcor'>Modifi</a></td>
				</tr>
				"; 
	    	}?>
	    </table>

	     <br><br>
        <div class="subtitulo">Division</div>

	    <table>
	    	<tr>
	        	<th align="center" width="">No</th>
	            <th align="center" width="">ID</th>
	            <th align="center" width="">Nombre</th> 
	            
	            <th align="center" width="">Editar Pass</th>  
	        </tr>

	        <?php
			$division="select * from division;";
			$divi=mysql_query($division,$conexion);
			$x=0;
			while($di=mysql_fetch_object($divi))
			{
				$x++;
				echo"
				<tr>
					<td>$x</td>
					<td align='center'>$di->idiv</td>
					<td>$di->nomd</td>
							
					<td align='center'><a href='$ip/administrador/moduser.php?id=$di->idiv&nombre=$di->nomd&tabla=division&atributo=passd&idt=idiv'>Modifi</a></td>
				</tr>
				"; 
	    	}?>
	    </table>


	    <br><br>
        <div class="subtitulo">Subdirección</div>

	    <table>
	    	<tr>
	        	<th align="center" width="">No</th>
	            <th align="center" width="">ID</th>
	            <th align="center" width="">Nombre</th> 
	            
	            <th align="center" width="">Editar Pass</th>  
	        </tr>

	        <?php
			$tablas="select * from subdireccion;";
			$tab=mysql_query($tablas,$conexion);
			$x=0;
			while($t=mysql_fetch_object($tab))
			{
				$x++;
				echo"
				<tr>
					<td>$x</td>
					<td align='center'>$t->idsub</td>
					<td>$t->nomsub</td>
					<td align='center'><a href='$ip/administrador/moduser.php?id=$t->idsub&nombre=$t->nomsub&tabla=subdireccion&atributo=passub&idt=idsub'>Modifi</a></td>
				</tr>
				"; 
	    	}?>
	    </table>

 <br><br>
        <div class="subtitulo">Departamentos</div>

	    <table>
	    	<tr>
	        	<th align="center" width="">No</th>
	            <th align="center" width="">ID</th>
	            <th align="center" width="">Nombre</th> 
	            <th align="center" width="">Departamento</th> 
	            <th align="center" width="">Editar Pass</th>  
	        </tr>

	        <?php
			$tablas="select e.iddepto, e.idoc, d.nomdoc from encarga as e, docente as d where d.idoc=e.idoc and e.status='1' ;";
			$tab=mysql_query($tablas,$conexion);
			$x=0;
			while($t=mysql_fetch_object($tab))
			{
				$x++;
				echo"
				<tr>
					<td>$x</td>
					<td align='center'>$t->idoc</td>
					<td>$t->nomdoc</td>
					<td>$t->iddepto</td>
					<td align='center'><a href='$ip/administrador/moduser.php?id=$t->idoc&nombre=$t->nomdoc&tabla=encarga&atributo=passd&idt=idoc'>Modifi</a></td>
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