-- ALTA DE USUARIOS EN TABLA SUBDIRECCION
insert subdireccion values ('SADMIN','MONTES RIVERA ARMANDO', sha1('ADMINISTRATIVO'));
insert subdireccion values ('SACAD','LOPEZ CELAYA MICHEL', sha1('ACADEMICO'));
--ACTUALIZACION DE DATOS DE LA CUENTA SUBDIRECCION DE PLANEACION
UPDATE subdireccion set nomsub='MERLO RODRIGUEZ ATZIRI YERALDIN', passub=sha1('PLANEACION'), idsub='SPLAN' where idsub='PLANEACION';

--ARCHIVOS MODIFICADOS
--administrador/moduser.php
--usuarios.php

--MODIFICACION DEL NOMBRE DE COORDINADOR DE TICS
update coordinador set nomcor='VACA PARRA MARIA' where idcor='VICTOR';




mysql> select * from subdireccion;
+------------+-----------------------+------------------------------------------+
| idsub      | nomsub                | passub                                   |
+------------+-----------------------+------------------------------------------+
| PLANEACION | WILLIAM JIMENEZ LOPEZ | 7532245603dfd6d243855243e587a44393d7df54 |
+------------+-----------------------+------------------------------------------+
1 row in set (0.00 sec)

mysql> insert subdireccion values ('SUBACAD','LOPEZ CELAYA MICHEL', sha1('ACADEMICO'));
Query OK, 1 row affected (0.09 sec)

mysql> UPDATE subdireccion set nomsub='MERLO RODRIGUEZ ATZIRI YERALDIN', passub=sha1('PLANEACION'), idsub='SPLA
Query OK, 1 row affected (0.03 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from subdireccion;
+---------+---------------------------------+------------------------------------------+
| idsub   | nomsub                          | passub                                   |
+---------+---------------------------------+------------------------------------------+
| SPLAN   | MERLO RODRIGUEZ ATZIRI YERALDIN | 8f52bc84e861805ee7b59e5f9442b11d4a0f2240 |
| SUBACAD | LOPEZ CELAYA MICHEL             | bc23f97d06d778111531773c32740c8c3b8c37ca |
+---------+---------------------------------+------------------------------------------+
2 rows in set (0.00 sec)

mysql> UPDATE subdireccion set idsub=SACAD where idsub='SUBACAD';
ERROR 1054 (42S22): Unknown column 'SACAD' in 'field list'
mysql> UPDATE subdireccion set idsub='SACAD' where idsub='SUBACAD';
Query OK, 1 row affected (0.03 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> UPDATE subdireccion set idsub=SACAD where idsub='SUBACAD';
ERROR 1054 (42S22): Unknown column 'SACAD' in 'field list'
mysql> UPDATE subdireccion set nomsub='MERLO RODRIGUEZ ATZIRI YERALDIN', passub=sha1('PLANEACION'), idsub='SPLA
Query OK, 0 rows affected (0.00 sec)
Rows matched: 0  Changed: 0  Warnings: 0

mysql> select * from subdireccion;
+-------+---------------------------------+------------------------------------------+
| idsub | nomsub                          | passub                                   |
+-------+---------------------------------+------------------------------------------+
| SACAD | LOPEZ CELAYA MICHEL             | bc23f97d06d778111531773c32740c8c3b8c37ca |
| SPLAN | MERLO RODRIGUEZ ATZIRI YERALDIN | 8f52bc84e861805ee7b59e5f9442b11d4a0f2240 |
+-------+---------------------------------+------------------------------------------+
2 rows in set (0.00 sec)

mysql> insert subdireccion values ('SADMIN','MONTES RIVERA ARMANDO', sha1('ADMINISTRATIVO'));
Query OK, 1 row affected (0.03 sec)

mysql> select * from subdireccion;
+--------+---------------------------------+------------------------------------------+
| idsub  | nomsub                          | passub                                   |
+--------+---------------------------------+------------------------------------------+
| SACAD  | LOPEZ CELAYA MICHEL             | bc23f97d06d778111531773c32740c8c3b8c37ca |
| SADMIN | MONTES RIVERA ARMANDO           | 14394075233827c1ec27804a338cd905e7671801 |
| SPLAN  | MERLO RODRIGUEZ ATZIRI YERALDIN | 8f52bc84e861805ee7b59e5f9442b11d4a0f2240 |
+--------+---------------------------------+------------------------------------------+
3 rows in set (0.00 sec)

mysql> select * from coordinador;
+---------+-----------------------------+------------------------------------------+-----------------+---------
| idcor   | nomcor                      | passcor                                  | dircor          | telcor
+---------+-----------------------------+------------------------------------------+-----------------+---------
| CINTHIA | CINTHYA ARAIZA              | 13e47666aeb1620ce1a81fead825fc6795293b0f |                 |
| ENRIQUE | DOTOOOOR                    | 13e47666aeb1620ce1a81fead825fc6795293b0f | NULL            | NULL
| MANUEL  | RINCON REAL JOSE MANUEL     | 8ec36c54f7c0c6b22ee2b51c14ee8b0ab38c8ed0 |                 |
| MARIA   | MARY VACA                   | e4a63a6cd587d75d14c25256b3c71e3bc7c3c71b | NULL            | NULL
| MICHEL  | MICHEL                      | a0b4d6ab305c2a27f1f619817d5dac754a70d409 | NULL            | NULL
| ROBERTO | ROBERTO OROZCO CELAYA       | 13e47666aeb1620ce1a81fead825fc6795293b0f |                 |
| VICTOR  | VICENTE JIMENEZ VICTOR IVAN | 13e47666aeb1620ce1a81fead825fc6795293b0f | SEPTIMA SECCION | 97158745
+---------+-----------------------------+------------------------------------------+-----------------+---------
7 rows in set (0.00 sec)

mysql> select * from coordina;
+---------+---------------+
| idcor   | idcar         |
+---------+---------------+
| MICHEL  | IADM-2010-213 |
| ROBERTO | ILOG-2009-202 |
| VICTOR  | ITIC-2010-225 |
+---------+---------------+
3 rows in set (0.00 sec)

mysql> update coordinador set nomcor='VACA PARRA MARIA' where idcor='VICTOR';
Query OK, 1 row affected (0.03 sec)
Rows matched: 1  Changed: 1  Warnings: 0


--VERIFICAR NUMERO DE ALUMNOS EN SEMIPRESENCIAL
select distinct c.matricula from cursa c, horario h where h.idh=c.idh and h.periodo='2020-1' and c.opor=6;


--MODIFICACION Y ALTA DE ENCARGADO DE DEPARTAMENTO
mysql> update encarga set status='0', fechafin='20200202' where iddepto='VIN';
Query OK, 1 row affected (0.05 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from encarga;
+---------+---------------+------------+--------+------------+------------------------------------------+
| iddepto | idoc          | fecha      | status | fechafin   | passd                                    |
+---------+---------------+------------+--------+------------+------------------------------------------+
| CI      | AAHC8205301RA | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| DEP     | FOLE820216Q45 | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| RF      | SOGC8411097R7 | 0000-00-00 |      1 | 0000-00-00 | 8c671ffb31233173087013d6b67980bca90fb60a |
| VIN     | MERA881111NY7 | 0000-00-00 |      0 | 2020-02-02 | d7a7daa9f4599837145d352102ee3fd8bdc178a9 |
+---------+---------------+------------+--------+------------+------------------------------------------+
4 rows in set (0.00 sec)

mysql> insert encarga values ('VIN', 'ITZEL', '20200302','1','',sha1('VINCULACION'));
Query OK, 1 row affected, 1 warning (0.05 sec)

mysql> select * from encarga;
+---------+---------------+------------+--------+------------+------------------------------------------+
| iddepto | idoc          | fecha      | status | fechafin   | passd                                    |
+---------+---------------+------------+--------+------------+------------------------------------------+
| CI      | AAHC8205301RA | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| DEP     | FOLE820216Q45 | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| RF      | SOGC8411097R7 | 0000-00-00 |      1 | 0000-00-00 | 8c671ffb31233173087013d6b67980bca90fb60a |
| VIN     | ITZEL         | 2020-03-02 |      1 | 0000-00-00 | 46cd9c64af37b2dc7f097209a95408d0d950bdf4 |
| VIN     | MERA881111NY7 | 0000-00-00 |      0 | 2020-02-02 | d7a7daa9f4599837145d352102ee3fd8bdc178a9 |
+---------+---------------+------------+--------+------------+------------------------------------------+
5 rows in set (0.00 sec)

mysql>




mysql> update encarga set status='0' where iddepto='VIN';
Query OK, 1 row affected (0.03 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> update encarga set status='0', fechafin='20200202' where iddepto='VIN';
Query OK, 1 row affected (0.05 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from encarga;
+---------+---------------+------------+--------+------------+------------------------------------------+
| iddepto | idoc          | fecha      | status | fechafin   | passd                                    |
+---------+---------------+------------+--------+------------+------------------------------------------+
| CI      | AAHC8205301RA | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| DEP     | FOLE820216Q45 | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| RF      | SOGC8411097R7 | 0000-00-00 |      1 | 0000-00-00 | 8c671ffb31233173087013d6b67980bca90fb60a |
| VIN     | MERA881111NY7 | 0000-00-00 |      0 | 2020-02-02 | d7a7daa9f4599837145d352102ee3fd8bdc178a9 |
+---------+---------------+------------+--------+------------+------------------------------------------+
4 rows in set (0.00 sec)

mysql> insert encarga values ('VIN', 'ITZEL', '20200302','1','',sha1('VINCULACION'));
Query OK, 1 row affected, 1 warning (0.05 sec)

mysql> select * from encarga;
+---------+---------------+------------+--------+------------+------------------------------------------+
| iddepto | idoc          | fecha      | status | fechafin   | passd                                    |
+---------+---------------+------------+--------+------------+------------------------------------------+
| CI      | AAHC8205301RA | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| DEP     | FOLE820216Q45 | 0000-00-00 |      1 | 0000-00-00 | 2ab9e73848a9934560caf045e0c8ef672008c6c6 |
| RF      | SOGC8411097R7 | 0000-00-00 |      1 | 0000-00-00 | 8c671ffb31233173087013d6b67980bca90fb60a |
| VIN     | ITZEL         | 2020-03-02 |      1 | 0000-00-00 | 46cd9c64af37b2dc7f097209a95408d0d950bdf4 |
| VIN     | MERA881111NY7 | 0000-00-00 |      0 | 2020-02-02 | d7a7daa9f4599837145d352102ee3fd8bdc178a9 |
+---------+---------------+------------+--------+------------+------------------------------------------+
5 rows in set (0.00 sec)


-- jue 22 10 2020
--agregar a alumno al sistema desde comando
 insert into alumnos (matricula, idcar) values ('matriculanueva','identificador de la materia');

 --posteriormente modificar datos desde visual al buscar 

 --modificados a esta fecha
 --raiz
 	usuarios.php
 
 --administrador
	 administrador/buscalumno.php
	 administrador/certificado.php
	 administrador/formcertificado.php

--script
 	script/index.php
 	script/01parte.php
 	script/02parte.php
 	script/03parte.php
 	script/04parte.php

 	script/certificado.php