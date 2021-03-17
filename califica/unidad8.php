<?php
session_start();
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Impresi&oacute;n de listas</title>
</head>

<body>
<div id="cuerpo">
	<header id="cabecera">
    
<?php 
include "../usuarios.php";
  $idoc=$_GET[idoc];
  $nomdoc=$_GET[nomdoc];
  $idmat=$_GET[idmat];
  $nommat=$_GET[nommat];
  $idh=$_GET[idh];
$matricula=$_GET[matricula];
$calif=$_GET[calif];
   
   $unidad="select unid from materias where idmat='$idmat'";
$uni=mysql_query($unidad,$conexion);
$u=mysql_fetch_object($uni);

$docente="select d.idoc, d.nomdoc, m.idmat, m.nommat from docente as d, materias as m, horario as h where h.idoc=d.idoc and h.idmat=m.idmat and h.idh='$idh'";
$doce=mysql_query($docente,$conexion);
$do=mysql_fetch_object($doce);

?>
 </header>
 
 <section id="seccion">
     <header id="header">
     <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>    </div>
      <table>
           
              <tr>
                <td>Docente:</td>
                <td><u><?php echo"$do->nomdoc"; ?></u></td>
                <td width="21%">PERIODO:</td>
                <td width="24%"><u><?php echo"$p->descper"; ?></u></td>
              </tr>
              <tr>
                <td width="24%">Materia:</td>
                <td width="31%"><u><?php echo"$do->nommat"; ?></u></td>
                <td>Grupo:</td>
                <td><u><?php 
				$grupos="select * from hgrupo where idh='$idh';";
				$gru=mysql_query($grupos,$conexion);
				while($g=mysql_fetch_object($gru))
				{
					echo"$g->idg "; 
				}
				?></u></td>
              </tr>
              
            </table><br>
      </header>
<br><br><br><br><br>
<BR />
  <div class="subtitulo">ACTA DE CALIFICACIONES</div>
<div id="calificareg">
<table>
  <tr>
    <th width="15px" rowspan="2" height="38" >N<br>o</th>
    <th width="10px" rowspan="2" title="Curso ordinario">C<br>O</th>
    <th width="10px" rowspan="2" title="Curso Repetición">C<br>R</th>
    <th width="10px" rowspan="2" title="Curso Especial">C<br>E</th>
    <th width="10px" rowspan="2" title="Curso Global">C<br>G</th>
	<th width="90px" rowspan="2">Matrícula</th>
    <th width="" rowspan="2">NOMBRE ALUMNO </th>
    <th colspan="2">UNIDAD 1 </th>
    <th colspan="2">UNIDAD 2 </th>
    <th colspan="2">UNIDAD 3 </th>
    <th colspan="2">UNIDAD 4 </th>
    <th colspan="2">UNIDAD 5 </th>
    <th colspan="2">UNIDAD 6 </th>
    <th colspan="2">UNIDAD 7 </th>
    <th colspan="2">UNIDAD 8 </th>

    <th width="35px" rowspan="2">CAL<br>F </th>
    <th width="15px" rowspan="2" title="Desertó">D <br> e <br> s </th>
    <th width="10px" rowspan="2"> </th>
  </tr>
  <tr>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>
    <th width="35px" >P O</th>
    <th width="35px" >S O</th>

  </tr>
  
  <?php
  $sqlp = "select distinct c.matricula, a.app, a.apm, a.nom, c.opor,  a.idcar, c.deser, c.po1, c.so1, c.po2, c.so2, c.po3, c.so3, c.po4, c.so4, c.po5, c.so5, c.po6, c.so6, c.po7, c.so7, c.po8, c.so8, c.po9, c.so9, prom from cursa as c, alumnos as a where a.matricula=c.matricula and c.idh='$idh' order by a.app, a.apm, a.nom;";
  $registrosp = mysql_query($sqlp, $conexion); 
  $x=0;
  $ord=0;
  $rep=0;
  $esp=0;
  $glo=0;
 while ($rp = mysql_fetch_object($registrosp)) 
 {   
  
 $band=0;
 $x=$x+1;
  echo"
  <form id='form1' name='form1' method='get' action='calificar2.php'>
  
  <tr>
    <td align='center'>$x</td>
    <td>
	<input name='idmat' type='hidden' id='idmat' value='$do->idmat'/>
	<input name='idh' type='hidden' id='idh' value='$idh'/>
	<input name='idoc' type='hidden' id='idoc' value='$do->idoc'/>
	<input name='matricula' type='hidden' id='matricula' value='$rp->matricula'/>
	";
	//desplegar cantidad en ordinario, repeticion, especial, global
	if($rp->opor == 1)
	{
		echo"<center>x</center>";
		$ord+=1;
	} 
	echo"</td>
    <td>";
	if($rp->opor == 2)
	{
		echo"<center>x</center>";
		$rep+=1;
	} 
	echo"</td>
    <td>";
	if($rp->opor == 3)
	{
		echo"<center>x</center>";
		$esp+=1;
	} 
	echo"</td>
    <td>";
	if($rp->opor == 4)
	{
		echo"<center>x</center>";
		$glo+=1;
	} 
	
	echo"</td>
	<td align='center'>$rp->matricula</td>
    <td> $rp->app $rp->apm $rp->nom</td> 
    <td align='center'><input class='cals' name='po1' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po1==0 && $rp->po1!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po1'"; echo"  />  </td>";
	
	
	//_________________________________________________________________________________________
	//VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
	if($rp->po1==NULL || $rp->po1!=0 )
	{echo"   
    <td align='center' >
		<input class='cals' name='so1' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so1==0 && $rp->so1!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so1'";echo" disabled='disabled'/>
		</td>";
	}
	else
	{echo"   
    <td align='center' ><input class='cals' name='so1' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so1==0 && $rp->so1!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so1'";echo"class='cals'  /></td>";
	}
	
	//______________________________________________________________________________________________________________________
   /*PARA SEGUNDA UNIDAD*/
    echo"<td align='center'><input class='cals' name='po2' type='text'  id='po2' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po2==0 && $rp->po2!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po2'"; echo" />  </td>";
	
	
	//_________________________________________________________________________________________
	//VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
	if($rp->po2==NULL || $rp->po2!=0 )
	{echo"   
    <td align='center' >
		<input class='cals' name='so2' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so2==0 && $rp->so2!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so2'";echo"  disabled='disabled'/>
		</td>";
	}
	else
	{echo"   
    <td align='center' ><input class='cals' name='so2' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so2==0 && $rp->so2!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so2'";echo"  /></td>";
	}
	
	
	//______________________________________________________________________________________________________________________
   /*PARA tercera UNIDAD*/
    echo"<td align='center'><input class='cals' name='po3' type='text'  id='po3' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po3==0 && $rp->po3!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po3'"; echo" />  </td>";
	
	
	//_________________________________________________________________________________________
	//VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
	if($rp->po3==NULL || $rp->po3!=0 )
	{echo"   
    <td align='center' >
		<input class='cals' name='so3' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so3==0 && $rp->so3!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so3'";echo"  disabled='disabled'/>
		</td>";
	}
	else
	{echo"   
    <td align='center' ><input class='cals' name='so3' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so3==0 && $rp->so3!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so3'";echo"  /></td>";
	}
	
	
	//______________________________________________________________________________________________________________________
   /*PARA cuarta UNIDAD*/
    echo"<td align='center'><input class='cals' name='po4' type='text'  id='po4' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po4==0 && $rp->po4!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po4'"; echo" />  </td>";
	
	
	//_________________________________________________________________________________________
	//VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
	if($rp->po4==NULL || $rp->po4!=0 )
	{echo"   
    <td align='center' >
		<input class='cals' name='so4' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so4==0 && $rp->so4!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so4'";echo"  disabled='disabled'/>
		</td>";
	}
	else
	{echo"   
    <td align='center' ><input class='cals' name='so4' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so4==0 && $rp->so4!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so4'";echo"  /></td>";
	}


/*PARA quinta UNIDAD*/
    echo"<td align='center'><input class='cals' name='po5' type='text'  id='po5' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po5==0 && $rp->po5!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po5'"; echo" />  </td>";
	
	
	//_________________________________________________________________________________________
	//VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
	if($rp->po5==NULL || $rp->po5!=0 )
	{echo"   
    <td align='center' >
		<input class='cals' name='so5' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so5==0 && $rp->so5!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so5'";echo"  disabled='disabled'/>
		</td>";
	}
	else
	{echo"   
    <td align='center' ><input class='cals' name='so5' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so5==0 && $rp->so5!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so5'";echo"  /></td>";
	}

/*PARA SEXTA UNIDAD*/
    echo"<td align='center'><input class='cals' name='po6' type='text'  id='po6' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po6==0 && $rp->po6!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po6'"; echo" />  </td>";
  
  
  //_________________________________________________________________________________________
  //VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
  if($rp->po6==NULL || $rp->po6!=0 )
  {echo"   
    <td align='center' >
    <input class='cals' name='so6' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so6==0 && $rp->so6!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so6'";echo"  disabled='disabled'/>
    </td>";
  }
  else
  {echo"   
    <td align='center' ><input class='cals' name='so6' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so6==0 && $rp->so6!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so6'";echo"  /></td>";
  }

/*PARA SEPTIMA UNIDAD*/
    echo"<td align='center'><input class='cals' name='po7' type='text'  id='po7' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po7==0 && $rp->po7!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po7'"; echo" />  </td>";
  
  
  //_________________________________________________________________________________________
  //VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
  if($rp->po7==NULL || $rp->po7!=0 )
  {echo"   
    <td align='center' >
    <input class='cals' name='so7' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so7==0 && $rp->so7!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so7'";echo"  disabled='disabled'/>
    </td>";
  }
  else
  {echo"   
    <td align='center' ><input class='cals' name='so7' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so7==0 && $rp->so7!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so7'";echo"  /></td>";
  }

  /*PARA OCTAVA UNIDAD*/
    echo"<td align='center'><input class='cals' name='po8' type='text'  id='po8' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";if($rp->po8==0 && $rp->po8!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->po8'"; echo" />  </td>";
  
  
  //_________________________________________________________________________________________
  //VERIFICAR SI OPORTUNIDAD 1 ES NULO O DIFERENTE DE 0, DESACTIVAR SEGUNDA OPORTUNIDAD
  if($rp->po8==NULL || $rp->po8!=0 )
  {echo"   
    <td align='center' >
    <input class='cals' name='so8' type='text'  size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so8==0 && $rp->so8!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so8'";echo"  disabled='disabled'/>
    </td>";
  }
  else
  {echo"   
    <td align='center' ><input class='cals' name='so8' type='text' size='3' maxlength='3' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' "; if($rp->so8==0 && $rp->so8!=NULL)echo"value='' placeholder='NA'"; else echo"value='$rp->so8'";echo"  /></td>";
  }
	
	//MUESTRA promedio
	echo"
	<td align='center' ><input class='cals' name='final' type='text' id='final' size='4' value='"; 
  if ($rp->prom==NULL)
  {
    echo"";
  }
  else
  {
      if ($rp->prom==0)
      {
        echo"NA";
      }
      else
      {
        printf("%0.1f",$rp->prom);
      }
    
  } 
  echo"' maxlength='3' disabled='disabled' /></td>
	<td align='center' ><label>
      <input type='checkbox' name='deser' value='deser'"; if($rp->deser==1)echo"checked='checked'"; echo" title='Desertó' />
    </label></td>
	<td align='center' ><input class='guardacal' type='image' name='Submit' value='Submit' src='$ip/img/hecho.png' width='20' height='20'></td>
  </tr>

  </form> ";
   
  }
  echo"
  <tr>
  	<td align='center'> $x </td>
	<td align='center' title='Curso Ordinario'> $ord </td>
	<td align='center' title='Curso Repetición'> $rep </td>
	<td align='center' title='Curso Especial'> $esp </td>
	<td align='center' title='Curso Global'> $glo </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>
	<td> </td>

  </tr>
 
  "
  ?>

</table>

<table cellspacing="0" cellpadding="0">
  <col width="27" />
  <col width="16" />
  <tr height="17">
    <td width="30" height="17"><span class="Estilo21">CO</span></td>
    <td width="128"><span class="Estilo23">CURSO ORDINARIO</span></td>
  </tr>
  <tr height="17">
    <td height="17"><span class="Estilo23"><strong>CR</strong></span></td>
    <td><span class="Estilo23">CURSO DE REPETICI&Oacute;N</span></td>
  </tr>
  <tr height="17">
    <td height="17"><span class="Estilo23"><strong>CE</strong></span></td>
    <td><span class="Estilo23">CURSO ESPECIAL</span></td>
  </tr>
  <tr height="17">
    <td height="17"><span class="Estilo23"><strong>CG</strong></span></td>
    <td><span class="Estilo23">CURSO GLOBAL</span></td>
  </tr>
</table>
<br />
  <br />
 
  
  </div>
  <table class="sinmarge">
    <tr>
      <td width="400px" valign="bottom"><hr color="#000000" /></td>
      <td width="200px">&nbsp;</td>
      <td width="400px" valign="bottom"><hr color="#000000" /></td>
    </tr>
    <tr>
      <td align="center"><span class="Estilo20"><?php echo"$nomdoc";?></span></td>
      <td>&nbsp;</td>
      <td><div align="center" class="Estilo20">LIC. CASTILLO CASTILLO PABLO </td>
    </tr>
    <tr>
      <td align="center">DOCENTE</td>
      <td>&nbsp;</td>
      <td align="center">DEPTO. DE SERVICIOS ESCOLARES</td>
    </tr>
  </table>
</body>
</html>
