<?php  session_start();  
include "conexion.php";
$conexion=conectar();

//seleccionar el periodo de evaluacion predeterminado
$periodoe="select des from control where id='12'"; 
$pred=mysql_query($periodoe,$conexion);
$pe=mysql_fetch_object($pred);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generando evadoc</title>
</head>
<body>
    <p>use evadoc;</p> 
    <p>-- volcado para periodo</p>
<?php

    $per="select * from periodo where periodo='$pe->des'"; 
    $pr=mysql_query($per,$conexion);
    $p=mysql_fetch_object($pr);

    echo"
    update periodo set predet=0; <br>
    delete from periodo where periodo='$pe->des'; <br>
    insert into periodo (periodo, descper, predet) values ('$p->periodo', '$p->descper', '1');
    ";
?>

<p>-- volcado para Alumnos que cursan en periodo <br> </p>
<?php

    $alumnos="select distinct c.matricula, a.nom, a.app, a.apm, a.fecnac, a.idcar, a.status from alumnos as a, cursa as c, horario as h where a.matricula=c.matricula and h.idh=c.idh and h.periodo='$pe->des' order by a.matricula"; 
    $alum=mysql_query($alumnos,$conexion);
    
    while($a=mysql_fetch_object($alum))
    {
        echo"delete from alumnos where matricula='$a->matricula'; <br>";
        echo" insert into alumnos (matricula, nom, app, apm, fecnac, idcar, status) values 
        ('$a->matricula', '$a->nom', '$a->app', '$a->apm', '$a->fecnac', '$a->idcar', '$a->status'); <br> 
    ";
    }
?>








<p>-- volcado para docente <br> -- primero se borra contenido de tabla</p>
<?php

    $docente="select * from docente"; 
    $doc=mysql_query($docente,$conexion);
    echo"
    delete from docente; <br>";
    while($d=mysql_fetch_object($doc))
    {
        echo" insert into docente (idoc, nomdoc) values ('$d->idoc', '$d->nomdoc'); <br> 
    ";
    }
?>
<p>-- volcado para materias <br> -- primero se borra contenido de tabla</p>
<?php

    $materias="select * from materias"; 
    $mate=mysql_query($materias,$conexion);
    echo"
    delete from materias; <br>";
    while($m=mysql_fetch_object($mate))
    {
        echo" insert into materias (idmat, nommat) values ('$m->idmat', '$m->nommat'); <br> 
    ";
    }
?>

<p>-- volcado para horario <br> -- primero se borra contenido de tabla</p>
<?php

    $horario="select * from horario where periodo='$pe->des'"; 
    $hora=mysql_query($horario,$conexion);
    echo"
    delete from horario where periodo='$pe->des'; <br>";
    while($h=mysql_fetch_object($hora))
    {
        echo" insert into horario (idh, idoc, idmat, periodo, num) values 
                                    ('$h->idh', '$h->idoc', '$h->idmat', '$h->periodo', '$h->num'); <br> 
    ";
    }
?>

<p>-- volcado para cursa <br> -- primero se borra contenido de tabla</p>
<?php

    $cursa="select h.idh, c.matricula, c.eval from cursa as c, horario as h where h.idh=c.idh and h.periodo='$pe->des'"; 
    $cur=mysql_query($cursa,$conexion);
    
    while($c=mysql_fetch_object($cur))
    {   
        echo"delete from cursa where idh='$c->idh' and matricula='$c->matricula';  <br>";
        echo" insert into cursa (idh, matricula, eval) values 
                                    ('$c->idh', '$c->matricula', '$c->eval'); <br> 
    ";
    }
?>
</body>
</html>

