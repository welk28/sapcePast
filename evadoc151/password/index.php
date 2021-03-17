<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../../css/proweb.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cuerpo">
	<header>
		<div id="sistema"> RECUPERA TU CONTRASEÑA :: SAPCE: Evaluación Docente</div>
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
		
	</footer>
</div>

</body>
</html>
