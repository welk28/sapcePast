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



?>

 </header>

 

 <section id="seccion">

    <?php 

      $planio='109170';
      $ff='-F';
       $horario="select h.idh from horario as h where h.periodo='$periodo';";
       $hora=mysql_query($horario,$conexion);
       $f=106;
       while($h=mysql_fetch_object($hora))
       {
        
         $f++;
         $folio=$planio.$f.$ff;
        $actualiza="update horario set folio='$folio' where idh='$h->idh';";
        $act=mysql_query($actualiza,$conexion);
        
       }
     ?>
       
     
</section>
</body>

</html>

