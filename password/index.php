<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RECUPERA TU CONTRASEÑA :::SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="http://itiztapalapa2.edu.mx/sapce/css/proweb.css" rel="stylesheet" type="text/css">
<!-- JS para control de menu-->      
    	<script type="text/javascript" src="http://localhost/js/jquery-1.8.1.min.js"></script>   
        <script type="text/javascript" src="http://localhost/js/approot.js"></script>    
        <!-- FIN DEL JS-->
</head>

<body>
<div id="cuerpo">
	<header>
		<?php 	
		?>
	</header>
	
	
	<section id="seccion">
    
  

    <div id="registros" >
    
    <form action="siguiente.php" method="post" name="buscar">
    <table>
    	<tr>
        	<th>Ingresa tu número de control: </th>
            <td><label>
                  <input name="matricula" type="text" id="matricula" size="12" >
                </label>
            </td>
        </tr>
        <tr>
        	<th colspan="2" scope="row" align="center"><label>
                  <input name="enviar" type="submit" id="enviar" value="enviar" >
                </label></th>
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
