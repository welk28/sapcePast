
create table certificado(
matricula varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL primary key,
numero varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
libro varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
foja varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
fecha varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
inicial varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
periodo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
fechaexp varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--AGREGA UN ATRIBUTO SIN BORRAR LA TABLA Y VOLVER A COMPILAR --
alter table certificado add inicial varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci not null;

INSERT INTO `encarga` (`iddepto`, `idoc`,`status`) VALUES
('DIR', 'CUELLAR', 1),
('SE', 'CACP850919UE5', 1);

-- BORRAR TABLA CERTIFICADO --
drop table certificado;