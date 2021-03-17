<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="960" border="0">
    <tr>
      <th scope="col">mail:
      <input type="email" name="miemail" id="miemail" require="true" multiple></th>
      <th scope="col">search:
      <input type="search" name="busqueda" id="busqueda" placeholder="escriba su busqueda"></th>
    </tr>
    <tr>
      <th scope="row">url:<input type="url" name="miurl" id="miurl"></th>
      <td>
      <datalist id="informacion">
<option value="123123123" label="Teléfono 1">
<option value="456456456" label="Teléfono 2">
</datalist>
      tel<input type="tel" name="telefono" id="telefono" list="informacion"></td>
    </tr>
    <tr>
      <th scope="row">number<input type="number" name="numero" id="numero" min="0" max="10"
step="5"></th>
      <td>range:<input type="range" name="numero" id="numero" min="0" max="10"
step="5"></td>
    </tr>
    <tr>
      <th scope="row">date:<input type="date" name="fecha" id="fecha"></th>
      <td>month:<input type="month" name="mes" id="mes"></td>
    </tr>
    <tr>
      <th scope="row">week:<input type="week" name="semana" id="semana"></th>
      <td>time: <input type="time" name="hora" id="hora"></td>
    </tr>
    <tr>
      <th scope="row">datetime:<input type="datetime" name="fechahora" id="fechahora"></th>
      <td>datetime-local:<input type="datetime-local" name="tiempolocal" id="tiempolocal"></td>
    </tr>
    <tr>
      <th scope="row">color:<input type="color" name="micolor" id="micolor"></th>
      <td><input name="codigopostal" id="codigopostal"
title="inserte los 5 números de su código postal" size="5" pattern="[0-9]{5}"></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td><input type="submit" name="Submit" value="Enviar"></td>
    </tr>
  </table>
</form>
</body>
</html>
