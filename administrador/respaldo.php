<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>respaldo</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
</head>

<body>
<p>CREATE DATABASE sapce; <br>
  USE sapce; <br>
  DROP TABLE IF EXISTS `control`; <br>
  CREATE TABLE control( <br>
  id int not null, <br>
  des varchar(50) not null, <br>
  opcion int not null, <br>
  primary key(id) <br>
  )type=innodb;
</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `periodo`; <br>
  CREATE TABLE periodo( <br>
  periodo varchar(6) not null, <br>
  noper int, <br>
  descper varchar(60) not null, <br>
  reporte varchar(50), <br>
  predet tinyint, <br>
  primary key(periodo) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `carrera`; <br>
  CREATE TABLE carrera( <br>
  idcar varchar(20) not null, <br>
  descar varchar(100) not null, <br>
  status tinyint, <br>
  primary key(idcar) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `materias`; <br>
  CREATE TABLE materias( <br>
  idmat varchar(10) not null, <br>
  nommat varchar(60), <br>
  credit int, <br>
  habil tinyint, <br>
  depto varchar(50), <br>
  unid int, <br>
  cred varchar(6), <br>
  primary key(idmat) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `posee`; <br>
  CREATE TABLE posee( <br>
  idcar varchar(20) not null, <br>
  idmat varchar(10) not null, <br>
  sem int, <br>
  primary key(idcar,idmat), <br>
  foreign key(idcar) references carrera(idcar) on update cascade, <br>
  foreign key(idmat) references materias(idmat) on update cascade <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>drop table if exists `liga`; <br>
  create table liga( <br>
  idcar varchar(20) not null, <br>
  idmat1 varchar(15) not null, <br>
  idmat2 varchar(15) not null, <br>
  primary key(idcar,idmat1,idmat2), <br>
  foreign key(idcar) references carrera(idcar) on update cascade, <br>
  foreign key(idmat1) references materias(idmat) on update cascade, <br>
  foreign key(idmat1) references materias(idmat) on update cascade <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>drop table if exists `aula`; <br>
  create table aula( <br>
  ida int not null, <br>
  aula varchar (10), <br>
  primary key(ida) <br>
); </p>
<p>&nbsp;</p>
<p>create table grupo(<br>
  idg varchar(12),<br>
  descgpo varchar(30),<br>
  primary key(idg)<br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>create table encarre(<br>
  idg varchar(12) not null,<br>
  idcar varchar(20) not null,<br>
  primary key(idg, idcar),<br>
  foreign key(idg) references grupo(idg) on update cascade on delete cascade,<br>
  foreign key(idcar) references carrera(idcar) on update cascade on delete cascade<br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `semana`; <br>
  CREATE TABLE semana( <br>
  idia int not null, <br>
  dia varchar(10), <br>
  primary key(idia) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `reloj`; <br>
  CREATE TABLE reloj( <br>
  idr int not null, <br>
  hora varchar(11) not null, <br>
  primary key(idr) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `oportunidad`; <br>
  CREATE TABLE oportunidad( <br>
  opor int not null, <br>
  descopor varchar(20), <br>
  primary key(opor) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `docente`; <br>
  CREATE TABLE docente( <br>
  idoc varchar(10) not null, <br>
  nomdoc varchar(60), <br>
  passdoc varchar(40), <br>
  dirdoc varchar(60), <br>
  teldoc varchar(15), <br>
  maildoc varchar(40), <br>
  primary key(idoc) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>drop table if exists `horario`; <br>
  create table horario( <br>
  idh int not null, <br>
  idoc varchar(10), <br>
  idmat varchar(10), <br>
  periodo varchar(6), <br>
  primary key(idh), <br>
  foreign key(idoc) references docente(idoc) on update cascade, <br>
  foreign key(idmat) references materias(idmat) on update cascade, <br>
  foreign key(periodo) references periodo(periodo) on update cascade <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>drop table if exists `hgrupo`;<br>
  create table hgrupo(<br>
  idh int,<br>
  idg varchar(12),<br>
  primary key(idh,idg),<br>
  foreign key (idg) references grupo(idg) on update cascade on delete cascade,<br>
  foreign key(idh) references horario(idh)on update cascade on delete cascade<br>
)type=innodb;</p>
<p>create table imparte(<br>
  idh int not null,<br>
  idia int not null, <br>
  idr int not null,<br>
  ida int not null, <br>
  primary key(idh,idia,idr,ida),<br>
  index(idh),<br>
  foreign key(idh) references horario (idh) on update cascade on delete cascade,<br>
  foreign key(idia) references semana (idia) on update cascade on delete cascade,<br>
  foreign key(idr) references reloj (idr) on update cascade on delete cascade,<br>
  foreign key(ida) references aula (ida) on update cascade on delete cascade<br>
  )type=innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `administrador`; <br>
  CREATE TABLE administrador( <br>
  adm varchar(10) not null, <br>
  nomadm varchar(60), <br>
  passadm varchar(40), <br>
  primary key(adm) <br>
  )type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `academico`; <br>
  CREATE TABLE academico( <br>
  idacad varchar(10) not null, <br>
  nomacad varchar(60), <br>
  passacad varchar(40), <br>
  primary key(idacad) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `division`; <br>
  CREATE TABLE division( <br>
  idiv varchar(10) not null, <br>
  nomd varchar(60), <br>
  passd varchar(40), <br>
  primary key(idiv) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `coordinador`; <br>
  CREATE TABLE coordinador( <br>
  idcor varchar(10) not null, <br>
  nomcor varchar(60), <br>
  passcor varchar(40), <br>
  dircor varchar(60), <br>
  telcor varchar(15), <br>
  mailcor varchar(40), <br>
  primary key(idcor) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `coordina`; <br>
  CREATE TABLE coordina( <br>
  idcor varchar(10) not null, <br>
  idcar varchar(20) not null, <br>
  primary key(idcor,idcar), <br>
  foreign key (idcor) references coordinador(idcor) on update cascade, <br>
  foreign key (idcar) references carrera(idcar) on update cascade <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `estado`; <br>
  CREATE TABLE estado( <br>
  idedo int not null, <br>
  edo varchar(30) not null, <br>
  primary key(idedo) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `procedencia`; <br>
  CREATE TABLE procedencia( <br>
  idesc int not null, <br>
  escuela varchar(50), <br>
  primary key(idesc) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `alumnos`; <br>
  CREATE TABLE alumnos( <br>
  matricula varchar(9) not null, <br>
  nom varchar(40), <br>
  app varchar(20), <br>
  apm varchar(20), <br>
  sexo varchar(2), <br>
  curp varchar(25), <br>
  dialecto int, <br>
  fecnac date, <br>
  edociv varchar(30), <br>
  otro varchar(30), <br>
  calle varchar (50), <br>
  colonia varchar(50), <br>
  idedo int, <br>
  ciudad varchar(50), <br>
  cp varchar(5), <br>
  telal varchar(15), <br>
  email varchar(50), <br>
  idesc int, <br>
  otesc varchar(60), <br>
  prepa varchar(50), <br>
  propre float, <br>
  secu varchar(50), <br>
  prose float, <br>
  idcar varchar(20), <br>
  passal varchar(40), <br>
  status int, <br>
  nomtut varchar(50), <br>
  dirtut varchar(60), <br>
  teltut varchar(15), <br>
  insc tinyint not null, <br>
  bandera int, <br>
  fecalta date, <br>
  discap int, <br>
  proc varchar(50), <br>
  primary key(matricula), <br>
  index (matricula), <br>
foreign key(idcar) references carrera(idcar) on update cascade )type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS `cursa`; <br>
  CREATE TABLE cursa( <br>
  idh int not null, <br>
  matricula varchar(9) not null, <br>
  opor int, <br>
  fecing date, <br>
  asigna varchar (10), <br>
  eval int, <br>
  po1 float, <br>
  so1 float, <br>
  po2 float, <br>
  so2 float, <br>
  po3 float, <br>
  so3 float, <br>
  po4 float, <br>
  so4 float, <br>
  po5 float, <br>
  so5 float, <br>
  po6 float, <br>
  so6 float, <br>
  po7 float, <br>
  so7 float, <br>
  po8 float, <br>
  so8 float, <br>
  po9 float, <br>
  so9 float, <br>
  deser int, <br>
  prom float, <br>
  primary key(idh,matricula,opor), <br>
  index (idh,matricula), <br>
  foreign key(idh) references horario(idh) on update cascade, <br>
  foreign key(matricula) references alumnos(matricula) on update cascade, <br>
  foreign key(opor) references oportunidad(opor) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS marca;<br>
  CREATE TABLE marca( <br>
  idmarca varchar(15) not null, <br>
  nombre varchar(20) , <br>
  primary key(idmarca) <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS accesorio; <br>
  CREATE TABLE accesorio ( <br>
  idacce varchar(15) not null, <br>
  descrip longtext,<br>
  modelo varchar (30),<br>
  exist int,<br>
  idmarca varchar(10),<br>
  precio decimal(6,2),<br>
  primary key(idacce),<br>
  foreign key(idmarca) references marca(idmarca) on update cascade <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS equipo; <br>
  CREATE TABLE equipo( <br>
  idequipo varchar(15) not null,<br>
  recumat varchar(15), <br>
  fechalt date,<br>
  descrip longtext,<br>
  status int,<br>
  fechbaja date,<br>
  imagen varchar(100),<br>
  obser varchar (50),<br>
  primary key(idequipo)<br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS depto; <br>
  CREATE TABLE depto( <br>
  iddepto varchar(15) not null, <br>
  nombre varchar(100) not null,<br>
  primary key(iddepto,nombre)<br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS oficina ; <br>
  CREATE TABLE oficina( <br>
  idoficina varchar(15) not null, <br>
  nombre varchar(100) ,<br>
  iddepto varchar(15),<br>
  primary key(idoficina,nombre),<br>
  foreign key(iddepto) references depto(iddepto) on update cascade <br>
)type=innodb; </p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS asigna;<br>
  CREATE TABLE asigna(<br>
  idequipo varchar(15) not null,<br>
  fecha date not null,<br>
  clave varchar(15) not null,<br>
  area varchar(15),<br>
  observacion varchar (50),<br>
  status int,<br>
  fechafin date,<br>
  primary key(idequipo,clave,fecha),<br>
  foreign key(idequipo) references equipo(idequipo) on update cascade <br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS dirige;<br>
  CREATE TABLE dirige(<br>
  idoficina varchar(15) not null,<br>
  idoc varchar(15) not null,<br>
  fecha date not null,<br>
  status int,<br>
  fechafin date,<br>
  primary key (idoficina,idoc,fecha),<br>
  foreign key(idoficina) references oficina(idoficina) on update cascade,<br>
  foreign key(idoc) references docente(idoc) on update cascade <br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS encarga;<br>
  CREATE TABLE encarga(<br>
  iddepto varchar(15) not null,<br>
  idoc varchar (15)not null,<br>
  fecha date not null,<br>
  status int,<br>
  fechafin date,<br>
  primary key(iddepto,idoc,fecha),<br>
  foreign key(iddepto) references depto(iddepto) on update cascade,<br>
  foreign key(idoc) references docente(idoc) on update cascade <br>
)type=innodb;</p>
<p><br>
</p>
<p>DROP TABLE IF EXISTS tiene;<br>
  CREATE TABLE tiene(<br>
  idequipo varchar(15) not null,<br>
  idacce varchar(15) not null,<br>
  descrip varchar(50),<br>
  status int,<br>
  fecha datetime  not null,<br>
  observacion varchar(50),<br>
  fechafin date,<br>
  primary key(idequipo,idacce,fecha),<br>
  foreign key(idequipo) references equipo(idequipo) on update cascade,<br>
  foreign key(idacce) references accesorio(idacce) on update cascade <br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS areas;<br>
  CREATE TABLE areas(<br>
  idarea varchar(30),<br>
  nombrearea varchar(40),<br>
  primary key(idarea)<br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS solicita;<br>
  CREATE TABLE solicita(<br>
  folio varchar(15) not null,<br>
  fecha date not null,<br>
  clave varchar(15),<br>
  area varchar(15),<br>
  departamento varchar(15),<br>
  descripcion longtext,<br>
  primary key(folio,clave,fecha)<br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS genera;<br>
  CREATE TABLE genera(<br>
  folio varchar(15) not null,<br>
  numcontrol varchar(15),<br>
  fecha date ,<br>
  status int,<br>
  fechafin date,<br>
  asignado varchar(15) ,<br>
  primary key (folio,numcontrol),<br>
  foreign key (folio) references solicita(folio) on update cascade<br>
)type=innodb;</p>
<p><br>
</p>
<p>DROP TABLE IF EXISTS odtm;<br>
  CREATE TABLE odtm(<br>
  numcontrol varchar(15) not null,<br>
  folio varchar(15) not null,<br>
  fecha date not null,<br>
  tiposervicio varchar(30),<br>
  tipomantenimiento varchar(30),<br>
  trabajo longtext,<br>
  status  int,<br>
  fechafin date,<br>
  asignado varchar(15),<br>
  primary key(numcontrol,folio),<br>
  foreign key (folio) references solicita(folio) on update cascade<br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>drop table if exists controlmantenimiento;<br>
  create table controlmantenimiento(<br>
  idcont int not null,<br>
  descrip varchar (100) not null,<br>
  valor  int,<br>
  primary key (idcont)<br>
) type= innodb;</p>
<p>&nbsp;</p>
<p>DROP TABLE IF EXISTS personal;<br>
  CREATE TABLE personal(<br>
  idpersonal varchar(15) not null,<br>
  nompersonal varchar(40),<br>
  fechainicio date,<br>
  status int,<br>
  fechafin date,<br>
  primary key(idpersonal)<br>
)type=innodb;</p>
<p>&nbsp;</p>
<p>GRANT ALL PRIVILEGES ON sapce.* TO tecnologico@localhost IDENTIFIED BY 'PASSTEC';</p>
</body>
</html>