<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>

<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

</head>

<body>
<?php
	unset($_SESSION['usuario']);
	unset($_SESSION['ses']);
	unset($_SESSION['evento']);
	session_destroy();
			print"	<script languaje='JavaScript'>
			window.location.href='http://www.itiztapalapa2.edu.mx/';
			</script>";
?>

</body>
</html>
