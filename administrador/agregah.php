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
		$periodo=$_SESSION['periodo'];
		
		$idmat=$_GET[idmat];
		$idoc=$_GET[idoc];
		$idcar=$_GET[idcar];
		$idg=$_GET[idg];
	//echo"sesion: $quien <br>usuario: $usuario";
		?>
	</header>
	<section id="seccion">
    
        <header id="header">
            <div class="subtitulo">Alta de nueva materia en <?php echo"Periodo: <b>$p->descper /$nh</b>"?></div>
            <br>
        </header>

        <div id="registros" >
        <?php
        $quitar="select p.idh, p.idg, h.idmat from hgrupo as p, horario as h where p.idh=h.idh and h.idmat='$idmat' and h.periodo='$periodo'  and p.idg='$idg';";
			$qui=mysql_query($quitar,$conexion);
			$quin=mysql_num_rows($qui);
			if($quin>0)
				{
					echo"<div class='avisono'>Error, no puede dar de alta esta materia, ya lo tiene cargado el grupo $idg </div>";
				}
		?>
        
        <?php
		if((!$idcar)||(!$idg))
        {echo"<form action='agregah.php' name='form1' method='get' >";}
		else
		{echo"<form action='agregah1.php' name='form1' method='get' >";}
		?>
        <table>
            <tr>
                <th colspan="2" class="titulotabla">Complete los siguientes campos: </th>
            </tr>
      		<tr>
                <th width="107" align="right" ><br>Carrera: </th>
				<td width="106" ><br>
          <?php
		  if(empty($idcar))
		  {
			 echo" <select name='idcar' id='idcar' onChange='submit()' required>";
		   $carrera="select * from carrera";
		   $carr=mysql_query($carrera,$conexion);
		   echo "<option value=''>Seleccionar</option>";
			while ($ca= mysql_fetch_object($carr)){
			  echo "<option value='$ca->idcar'>$ca->descar</option>";
			  }
			 echo" </select>";
		 }
		 else
		 {
			 echo"<input name='idcar' type='text' value='$idcar'>";
			 }
	?>
        </td>
			</tr>
            
           <?php 
		   if(!empty($idcar))
		   {
			   if(empty($idg))
			   {
					echo"<tr>
					<th width='107' align='right' >Grupo: </th>
					<td width='106' ><select name='idg' id='idg' onChange='submit()' required>";
					$carrera="select * from encarre where idcar='$idcar';";
					$carr=mysql_query($carrera,$conexion);
					echo "<option value=''>Seleccionar</option>";
					while ($ca= mysql_fetch_object($carr))
					{
						echo "<option value='$ca->idg'>$ca->idg</option>";
					}
					echo"</select></td></tr>";
			   }
			   else
			   {
				  echo"<tr>
				  <th width='107' align='right' >Grupo: </th>
				  <td width='106' ><input name='idg' type='text' value='$idg' > <a href='hexis.php?&idcar=$idcar&idg=$idg' target='_self'>Agregar materia existente en horario</a> /
				  <a href='desas.php?&idcar=$idcar&idg=$idg' target='_self'>DESASIGNADOS (no visibles horario)</a>
				  </td></tr>";
				}
		   }
		echo"
			";
			
          ?>  
            
            <tr>
                <th width="107" align="right" >Materia: </th>
				<td width="106" >
                <label><input name="idmat" type="hidden" id="idmat" value="<?php echo"$idmat";?>" size="5"readonly></label>
                <?php
				 $materia="select * from materias where idmat='$idmat'";
				 $mat=mysql_query($materia,$conexion);
				 $m=mysql_fetch_object($mat);
				  echo"<label><input name='materia' type='text' id='materia' value='$m->nommat' size='40'></label> <a href='buscamateria.php?idoc=$idoc&idcar=$idcar&idg=$idg' target='_parent' >Buscar</a>"; ?></td>
			</tr>
            <tr>
                <th align="right">Docente: </th>
				<td>
                
                <label><input name="idoc" type="hidden" id="idoc" value="<?php echo"$idoc";?>"readonly></label>
                <?php
				$docente="select nomdoc from docente where idoc='$idoc';";
				$doc=mysql_query($docente,$conexion);
				$d=mysql_fetch_object($doc);
                echo"<label><input name='nomdoc' type='text' id='nomdoc' value='$d->nomdoc' size='40'> </label>  <a href='buscadocente.php?idmat=$idmat&idcar=$idcar&idg=$idg' target='_parent' >Buscar</a>"; ?></td>
			</tr>
            
			<tr>
				<th>Cupo: </th>
				<td><input type="text" name="cupo" value="50"></td>
			</tr>
            <tr>
                <td colspan="2" align="center">
                <?php
				if($quin==0)
				{
                	echo"<label>
                  	<input name='enviar' type='submit' id='enviar' value='Continuar' >
                	</label>";
				}
                ?>
                </td>
			</tr>
			
        </table>
        </form>
        </div>
        
	</section>
	<div style="clear: both; width: 100%;"></div>
	<footer >
		<?php	include "../pie.php";	?>
	</footer>
</div>
</body>
</html>