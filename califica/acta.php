<?php

session_start();

?>

<!DOCTYPE html >

<html >

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php echo"$ip/css/acta.css"; ?>" rel="stylesheet" type="text/css" >

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
$depto1="INGENIERIAS";
$depto2="CIENCIAS BASICAS";
$depto3="CIENCIAS ECONOMICO-ADMINISTRATIVAS";

   $unidad="select unid from materias where idmat='$idmat'";

$uni=mysql_query($unidad,$conexion);

$u=mysql_fetch_object($uni);



$docente="select d.idoc, d.nomdoc, m.idmat, m.nommat, m.credit, h.folio from docente as d, materias as m, horario as h where h.idoc=d.idoc and h.idmat=m.idmat and h.idh='$idh'";

$doce=mysql_query($docente,$conexion);

$do=mysql_fetch_object($doce);

 $sqlp = "select distinct c.matricula, a.app, a.apm, a.nom, c.opor,  a.idcar, c.deser, c.pso, prom from cursa as c, alumnos as a where a.matricula=c.matricula and c.idh='$idh' order by a.app, a.apm, a.nom;";

      $registrosp = mysql_query($sqlp, $conexion); 
	  $nal=mysql_num_rows($registrosp);

?>

 </header>

 

 <section id="seccion">

     <header id="header">

      <div class="subtitulo"> <a href="javascript:window.print()"> Imprimir</a>    </div>
      

                  <div id="logos" class="group">
                    <div id="logo_sep_nombre_tec">  
                        <div id="logo_sep">
                            <img src="<?php echo"$ip/img/logoSEP_hoz.png"; ?>" width="242" height="60" border="0" />                            <img src="<?php echo"$ip/img/separador.png"; ?>" width="12" height="78" />                        
                        </div>  
                        <div id="nombre">
                            <label>INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</label>
                        </div>
                    </div>                         
                    <div id="logo_dgest_tec">
                       <!-- <img src="<?php echo"$ip/img/logodgest.png"; ?>" width="114" height="60" /> -->
                       <img  src="<?php echo"$ip/img/logoregistradotec.png"; ?>" width="81" height="60" /></div>
                    </div>
      
      <br>
      <h1 align="center">ACTA DE CALIFICACIONES</h1><br><br>
      <h3 align="right"> FOLIO: <?php echo"$do->folio"; ?> </h3>
    </header>
   
    <aside id="aside">
     <table>
      
      <tr>
          <th width="300">Carrera o Progama</th>
            <th width="250">Materia</th>
            <th width="100">Clave</th>
            <th width="50">Cred.</th>
            <th width="200">Periodo</th>
      </tr>
      <tr>
        <td><?php
         $carreras="select distinct c.idcar, c.descar from materias as m, carrera as c, posee as p, horario as h where p.idcar=c.idcar and p.idmat=m.idmat and h.idmat=m.idmat and h.periodo='$periodo' and idoc='$idoc' and (m.depto='$depto1' or m.depto='$depto2' or m.depto='$depto3') order by m.nommat;";

                    $carres=mysql_query($carreras,$conexion);

                    while($ca=mysql_fetch_object($carres))

                    {

                      echo"$ca->descar <br>";

                    }
                    ?>
        </td>
        <td><?php echo"$do->nommat"; ?></td>
        <td><?php echo"$idmat"; ?></td>
        
        <td><?php echo"$do->credit"; ?></td>
        <td><?php echo"$p->descper"; ?></td>
      </tr>
      </table><br />

      
       
      <table>
      <tr>
          <th width="200">Catedrático</th>
            <th width="100">Grupo</th>
            <th width="100">Alumnos</th>
            <th width="600">Horario</th>
            
      </tr>
      <tr>
        <td><?php echo"$do->nomdoc"; ?></td>
        <td><?php 
        $grupos="select * from hgrupo where idh='$idh';";
        $gru=mysql_query($grupos,$conexion);
        while($g=mysql_fetch_object($gru))
        {echo"$g->idg "; }
        ?></td>
        <td><?php echo"$nal"; ?></td>
        <td>
          
<!-- INICIA HORARIO -->

<table  width="500">

            <tr>
               <td width="50" align="center">LUNES</td> 
                <td width="50" align="center">MARTES</td>    
                <td width="50" align="center">MIERCOLES</td> 
                <td width="50" align="center">JUEVES</td>    
                <td width="50" align="center">VIERNES</td>   
          </tr>

            <?php
            $horario="select distinct h.idoc, h.idh, h.idmat, m.nommat, m.credit from horario as h, materias as m where h.idmat=m.idmat and h.idoc='$idoc' and h.periodo='$periodo' and h.idh='$idh';";
        $hora=mysql_query($horario,$conexion);
        $q=0;
        while($h=mysql_fetch_object($hora))
        {         

          echo"
          <tr>
            <td align='center'>";
            $lunes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$idh' and i.idia='1';";
            $lu=mysql_query($lunes,$conexion);
            $rlu=mysql_num_rows($lu);
            if($rlu>0)
            {
              while($l=mysql_fetch_object($lu))
              {echo"$l->hora / $l->aula <br>";}
            }

            echo"</td>
            <td align='center'>";
            $martes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$idh' and i.idia='2';";
            $ma=mysql_query($martes,$conexion);
            while($m=mysql_fetch_object($ma))
            {echo"$m->hora / $m->aula <br>";}
            echo"</td>
            <td align='center'>
            ";

            $miercoles="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$idh' and i.idia='3';";
            $mie=mysql_query($miercoles,$conexion);
            while($mi=mysql_fetch_object($mie))
            {echo"$mi->hora / $mi->aula<br>";}
            echo"</td>
            <td align='center'>
            ";

            $jueves="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$idh' and i.idia='4';";
            $ju=mysql_query($jueves,$conexion);
            while($j=mysql_fetch_object($ju))
            {echo"$j->hora / $j->aula<br>";}
            echo"</td>
            <td align='center'>
            ";

            $viernes="select * from imparte as i, reloj as r, aula as a where a.ida=i.ida and r.idr=i.idr and i.idh='$idh' and i.idia='5';";
            $vi=mysql_query($viernes,$conexion);
            while($v=mysql_fetch_object($vi))
            {echo"$v->hora / $v->aula<br>";}
            echo"</td>
          </tr>
          ";
        }
            ?>

        </table>
<!-- TERMINA HORARIO -->

        </td>
        
        
      </tr>
      </table>

</aside>


  

  <div id="registros">

    <table>

      <tr>

        <th width="15px" rowspan="2">No</th>

        <th width="10px" rowspan="2" title="Curso ordinario">C<br>O</th>

        <th width="10px" rowspan="2" title="Curso Repetición">C<br>R</th>

        <th width="10px" rowspan="2" title="Curso Especial">C<br>E</th>

        <th width="10px" rowspan="2" title="Curso Global">C<br>G</th>
        <th width="10px" rowspan="2" title="Curso Semi Presencial">S<br>P</th>

    	  <th width="90px" rowspan="2">Matrícula</th>

        <th width="" rowspan="2">NOMBRE ALUMNO </th>

        <th colspan="2">OPORTUNIDAD</th>

        <th width="35px" rowspan="2">PROM<br>F </th>

        <th width="15px" rowspan="2" title="Desertó">D <br> e <br> s </th>

        <th width="10px" rowspan="2"> </th>

      </tr>

      <tr>

        <th width="35px" height="38" >P O</th>

        <th width="35px" >S O</th>

      </tr>

  

      <?php

     

      $x=0;

      $ord=0;

      $rep=0;

      $esp=0;

      $glo=0;
      $sp=0;
       while ($rp = mysql_fetch_object($registrosp)) 

       {   

        

       $band=0;

       $x=$x+1;

        echo"

        <form id='form1' name='form1' method='get' action='savepro.php'>

        

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
        if($rp->opor==6  )      
        {    
          echo"<td width='20px' align='center'>x</td>";
          $sp++;
        }
        else
            echo"<td width='20px' align='center'></td>";
      	

      	echo"</td>

      	<td align='center'>$rp->matricula</td>

          <td> $rp->app $rp->apm $rp->nom</td>

          <td align='center'>";

          if($rp->pso==1)

            echo"<input type='radio' name='pso' value='1' required checked> ";

          else

            echo"<input type='radio' name='pso' value='1' required> ";

          

          echo"</td>

          <td align='center'>";

          if($rp->pso==2)

            echo"<input type='radio' name='pso' value='2' required checked>";

          else

            echo"<input type='radio' name='pso' value='2' required>";

          echo"</td>  

          <td align='center'><input class='cals' name='prom' type='text' size='4' maxlength='4' onkeypress='javascript:if(event.KeyCode <48 || event.keyCode >57){return false;}' ";

          if($rp->prom==0 && $rp->prom!=NULL) echo"value='' placeholder='NA'"; else  echo"value='$rp->prom'"; echo" required />  </td>

          "; 



      	echo"<td align='center' ><label>

            <input type='checkbox' name='deser' value='deser'"; if($rp->deser==1)echo"checked='checked'"; echo" title='Desertó' />

          </label></td>

      	<td align='center' ><input class='guardacal' type='image' name='Submit' value='Submit' src='$ip/img/hecho.png' width='20' height='20'></td>

        </tr>



        </form>

        

       ";

         

        }

        echo"

        <tr>

        	<td align='center'> $x </td>

      	<td align='center' title='Curso Ordinario'> $ord </td>

      	<td align='center' title='Curso Repetición'> $rep </td>

      	<td align='center' title='Curso Especial'> $esp </td>

      	<td align='center' title='Curso Global'> $glo </td>
        <td align='center' title='Curso Semi Presencial'> $sp </td>
      	<td> </td>

      	<td> </td>

      	<td> </td>

      	<td> </td>

      	<td> </td>

      	<td> </td>

      </tr>

 

      ";

      ?>



    </table>

<div id=''>

  



    <table cellspacing="0" cellpadding="0">

      <col width="27" />

      <col width="16" />

      <tr >

        <td width="30" >CO</span></td>

        <td width="128">CURSO ORDINARIO</span></td>

      </tr>

      <tr >

        <td ><strong>CR</strong></span></td>

        <td><span class="Estilo23">CURSO DE REPETICI&Oacute;N</span></td>

      </tr>

      <tr >

        <td ><strong>CE</strong></span></td>

        <td><span class="Estilo23">CURSO ESPECIAL</span></td>

      </tr>

      <tr >

        <td ><strong>CG</strong></span></td>

        <td><span class="Estilo23">CURSO GLOBAL</span></td>

      </tr>
       <tr >

        <td ><strong>SP</strong></span></td>

        <td><span class="Estilo23">CURSO Semi Presencial</span></td>

      </tr>
    </table>

      <br />

      <br />

  

  

  </div>

  <p>Este documento no es válido si tiene tachaduras o enmendaduras. <br>
  <?php 
$dia=date(d);
$mes=date(m);
$anio=date(y);
  echo" <u>Ciudad de México </u> a <u> $dia / $mes / $anio  </u> "; 
  
  ?> <br>
<br>
Firma del catedrático:
  </p>

</div>

</body>

</html>

