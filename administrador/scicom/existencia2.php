<?php  session_start();  ?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
<div  id="cuerpo">  
<header id"header">
<?php
 include "../../conexion.php";
 $conexion=conectar();
 $idacce= strtoupper($_POST[idacce]);
 $cantidad=$_POST[cantidad];
 $precio=$_POST[precio];
  
 
 /*echo"
 $idacce
 $cantidad
 $precio
  ";*/

?>
</header>
	<section id="seccion"> 
	<?php
	if($precio==0 || $cantidad==0)
	{
	 
	print"
	<script language='JavaScript' type='text/javascript'>
      alert(' NO PUEDE  AGREGAR  VALORES  IGUAL A CERO');
	  window.location.href='accesorio.php';
    </script> 
	  "; 
	
	}
	  else
	  {
	 $consulta="select * from accesorio where idacce='$idacce';";
	 $con=mysql_query($consulta,$conexion);
	 $c=mysql_fetch_object($con);
	 $suma=$c->exist + $cantidad;
	 
	 $modi="update accesorio set exist='$suma', precio='$precio' where idacce='$idacce';";
	 $mo=mysql_query($modi,$conexion);
	 if(!$mo)
	 {
	 echo"ERROR EN LA  CONSULTA";
	 } 
	  else 
	  {
	   print"
	<script language='JavaScript' type='text/javascript'>
      alert('AGREGACION  EXITOSA');
	  window.location.href='accesorio.php';
    </script> 
	  "; 
	  }
	 
	  }
	 ?>
	 </section>
</div>
</body>
</html>