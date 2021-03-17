<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../images/tecstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../conexion.php";
  $conexion=conectar();
?>
<form id="form1" name="form1" method="post" action="ligaalumnos.php">
  <table border="0" align="center">
    <tr>
      <td colspan="2">Seleccione materias a verificar: </td>
    </tr>
    <tr>
      <td>Materia 1: </td>
      <td><label>
        <?php  
		 echo"<select name='matuno' id='matuno'>";
      
//Llena el combo
     $sqle="select * from materias;";
   $re=mysql_query($sqle,$conexion);
	while ($regta = mysql_fetch_object($re)){
	  echo "<option value='$regta->idmat'>$regta->idmat / $regta->nommat</option>";
	  }
	 
    echo"</select>";
 ?>
        </td>
    </tr>
    <tr>
      <td>Materia 2: </td>
      <td><?php  
		 echo"<select name='matdos' id='matdos'>";
      
//Llena el combo
     $sqle="select * from materias;";
   $re=mysql_query($sqle,$conexion);
	while ($regta = mysql_fetch_object($re)){
	  echo "<option value='$regta->idmat'>$regta->idmat / $regta->nommat</option>";
	  }
	 
    echo"</select>";
 ?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="Submit" value="Enviar" />
        </label>
      </div>        <div align="center"></div></td>
    </tr>
  </table>
</form>
</body>
</html>
