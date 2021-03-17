<!DOCTYPE html>
<head>
	<title>imagen</title>
	<link rel="stylesheet" type="text/css" href="../../css/proweb.css">
</head>
<body>
	<div>
	<?php
	 include "../../conexion.php";
	 $imagen=$_GET['imagen'];
	 echo"
	 <img src='$imagen'/>";
	?>
	</div>
</body>
</html>