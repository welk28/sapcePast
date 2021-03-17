<?php  
echo"
<br><br>
CREATE TABLE `control` ( <br>
  `id` int(11) NOT NULL, <br>
  `des` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  `opcion` int(11) NOT NULL, <br>
  PRIMARY KEY  (`id`) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 <br><br>
 INSERT INTO `control` (`id`, `des`, `opcion`) VALUES
 (6, 'http://localhost', 0),
 (10, 'CONTROL DE EVALUACION DE SERVICIOS', 0);<br><br>
 "; 

	?>
		

