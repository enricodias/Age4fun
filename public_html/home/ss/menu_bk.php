<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>X-Album - Menu Fotos</title>
</head>
<body background="http://www.age4fun.com/home/arquivos/00009.jpg">
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "config.php";
$sql2 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo2 = mysql_fetch_array($sql2)) {
?>
<body bgcolor="#<? echo $campo2[7]; ?>" topmargin="0" leftmargin="0">

<p align="left"><b><font face="Verdana" size="2" color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font>
<font face="Verdana" color="#FFFFFF">Fotos</b></p>
<?
$sql = mysql_query("SELECT * FROM `$tabela3` ORDER BY ID DESC", $db3);
$n3 = mysql_num_rows($sql);
if($n3 == '0') {
echo "<center><font face=verdana size=1><br><br><b> Sem nenhuma Foto</b></font></center><br><BR>";
} else {
while($campo = mysql_fetch_array($sql)) {
echo "<center><a href='foto.php?foto=$campo[0]' target='principal'><img src='fotos/$campo[3]' width='100' height='75' border='0' style='border: 1 solid #000000'></a><br><font face='Verdana' size='2' color='$campo2[9]'>$campo[2]</font><br><br></center>";
}
}
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?></font>

<p align="left" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">
  <font face="Verdana" size="1" color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Powered by </font>
  </p>



<p align="left" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">
  <font face="Verdana" size="1" color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Age4fun.com<br></font></p>



</body>

</html>