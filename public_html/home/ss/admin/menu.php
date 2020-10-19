<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Menu</title>
<base target="principal">
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

include "acesso.php";
if ( $contagem == 1 ) {
$data = date("d/m/Y");
$ip = $_SERVER["REMOTE_ADDR"];
$hora = date("H:i:s ");
  ?>
<body bgcolor="#f5f5f5" topmargin="0" leftmargin="0" link="#669900" vlink="#669900" alink="#669900">
<font size=1 face=verdana> Data: <? echo $data; ?><br>
Horas: <? echo $hora; ?><br>
Ip: <? echo $ip; ?><br><Br>
<table border="2" cellpadding="0" width="100%" height="77" bordercolor="#FFFFFF">
    <tr>
    <td width="100%" height="17" align="center"><font face="Verdana" size="1"><a href="../index.php">&#9643;
      Ver seu album</font></td></a>
  </tr>
    <tr>
    <td width="100%" height="1" align="center">
      <p align="center"><font face="Verdana" size="1"><a href="principal.php">&#9643; Home</font></p></a>
    </td>
  </tr>
  <tr>
    <td width="100%" height="1" align="center">
      <p align="center"><font face="Verdana" size="1"><a href="adicionarfoto.php">&#9643; Enviar Fotos</font></p></a>
    </td>
  </tr>
  <tr>
    <td width="100%" height="7" align="center"><font face="Verdana" size="1"><a href="apagarfoto.php">&#9643;
      Apagar Fotos</a></font></td>
  </tr>
  <tr>
    <td width="100%" height="19" align="center"><font face="Verdana" size="1"><a href="editarfoto.php">&#9643;
      Editar Fotos</font></td></a>
  </tr>
  <tr>
    <td width="100%" height="17" align="center"><font face="Verdana" size="1"><a href="palavrao.php">&#9643;
      Controle de Palavrão</font></td></a>
  </tr>
  <tr>
    <td width="100%" height="17" align="center"><font face="Verdana" size="1"><a href="configuracao.php">&#9643;
      Configuração</font></td></a>
  </tr>
    <tr>
    <td width="100%" height="17" align="center"><font face="Verdana" size="1"><a href="../manual.htm">&#9643;
      Ajuda/Manual</font></td></a>
  </tr>
      <tr>
    <td width="100%" height="17" align="center"><font face="Verdana" size="1"><a href="http://www.brunoalencar.com/xalbum">&#9643;
      Relatar Erro/Sugestão</font></td></a>
  </tr>
    <tr>
    <td width="100%" height="17" align="center"><font face="Verdana" size="1"><a href="logout.php" target="_parent">&#9643;
      LogOut</font></td></a>
  </tr>
</table>

<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0"><font face="Verdana" size="1">X-Album
desenvolvido por Brunoalencar.com</font></p>
<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0"><font face="Verdana" size="1">Todos
os direitos reservados ao autor</font></p>

<?
  } else {
echo "<font face='Verdana' size='1'>Você não está logado.<a href=index.php target=_parent>Logar</a></font>"; //aqui que terminamos o IF que iniciamos na página
include "button.php";
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>

</body>

</html>

