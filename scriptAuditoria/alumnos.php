<?php  session_start(); $periodo=$_SESSION['periodo'];
$matriculas="select distinct a.matricula from alumnos a, cursa c, horario h where h.idh=c.idh and c.matricula=a.matricula and h.periodo='$periodo'";
$matri=mysql_query($matriculas,$conexion);
$fin=mysql_num_rows($matri);
echo"
<br>-- periodo: $periodo <br>
-- $fin registros <br>

CREATE TABLE alumnos (
  matricula varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  nom varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  app varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  apm varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  sexo varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  curp varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  dialecto int(11) , <br>
  fecnac date default NULL, <br>
  edociv varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  otro varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  calle varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  colonia varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  idedo int(11) default NULL, <br>
  ciudad varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  cp varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  telal varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  email varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  idesc int(11) default NULL, <br>
  otesc varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  prepa varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  propre float default NULL, <br>
  secu varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  prose float default NULL, <br>
  idcar varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  passal varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  status int(11) default NULL, <br>
  nomtut varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  dirtut varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  teltut varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  insc tinyint(4) NOT NULL, <br>
  bandera int(11) default NULL, <br>
  fecalta date default NULL, <br>
  discap int(11) default NULL, <br>
  proc varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci, <br>
  PRIMARY KEY  (matricula), <br>
  KEY matricula (matricula), <br>
  KEY idcar (idcar) <br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 <br><br>"; 
while($ma=mysql_fetch_object($matri)){
      $consulta="select * from alumnos where matricula='$ma->matricula'";
      $cons=mysql_query($consulta,$conexion);
      $x=0;
      $y=0;
        while($c=mysql_fetch_object($cons)){
          $x++;
          $y++;
          if($x==1){
            echo"<br>INSERT INTO alumnos (matricula, nom, app, apm, sexo, curp, dialecto, fecnac, edociv, otro, calle, colonia, idedo, ciudad, cp, telal, email, idesc, otesc, prepa, propre, secu, prose, idcar, passal, status, nomtut, dirtut, teltut, insc, bandera, fecalta, discap, proc) VALUES <br>";}

          echo"('$c->matricula', '$c->nom', '$c->app', '$c->apm', '$c->sexo', '$c->curp', '$c->dialecto', '$c->fecnac', '$c->edociv', '$c->otro', '$c->calle', '$c->colonia', '$c->idedo', '$c->ciudad', '$c->cp', '$c->telal', '$c->email', '$c->idesc', '$c->otesc', '$c->prepa', '$c->propre', '$c->secu', '$c->prose', '$c->idcar', '$c->passal', '$c->status', '$c->nomtut', '$c->dirtut', '$c->teltut', '$c->insc', '$c->bandera', '$c->fecalta', '$c->discap', '$c->proc');";
        }

	}
	?>
		

