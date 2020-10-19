<?
/* WEB - TOOLS - www.web-tools.kit.net [ Caso essa linha seja apagada
o sistema irá parar de funcionar] */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Newsletter :: Age4fun.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="778" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td colspan="3"><img src="newsletter_logo.jpg"</td>
  </tr>
  <tr> 
    <td colspan="3"><img src="barra.jpg" width="778" height="20"></td>
  </tr>
  <tr> 
    <td width="17" bgcolor="#F7F7F7">&nbsp;</td>
    <td width="613" bgcolor="#F7F7F7">&nbsp;</td>
    <td width="148" bgcolor="#F7F7F7">&nbsp;</td>
  </tr>
  <tr> 
    <td width="17" height="200"> 
      <? include "menu.php"; ?>
    </td>
    <td><table border="0" cellpadding="0" cellspacing="0">
<tr>
          <td width="600" height="200">
<div align="center">
<? 
include "config.php";
$sql= mysql_query("SELECT * FROM $tb3");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Não foi possivel a conexao";}
else{
if ($linhas==0){
echo "<font face=verdana size=2 color=red>Não há E-mails Cadastrados</font>";
{ exit; }
}
echo "<table>";
echo "<td  bgcolor=#F8F8F8><font face=verdana size=1><b>E-mail:</b></font>";
echo "<td  bgcolor=#F8F8F8> <font face=verdana size=1><b>Deletar:</b></font>";
echo "<td  bgcolor=#F8F8F8> <font face=verdana size=1><b>Contato:</b></font>";
while ($reg = mysql_fetch_array($sql)){
$email = $reg['email'];

echo "<tr>";
echo "<td width=\"200\"><font face=verdana size=1>$email</font></td>";
echo "<td> <font face=verdana size=1 color=red><strong><a href=excluimail.php?action=excluir&email=$email><p align=\"center\"><img src=trash.gif border=0></p></a></strong></font></td>";
echo "<td> <font face=verdana size=1 color=red><strong><a href=\"#\" onClick=\"window.open('contactos.php?action=mandar&email=$email','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=150'); return false;\">Enviar uma Mensagem</a></strong></font></td>";
echo "</tr>";
}
}

echo "</table>";
?>
</div></td>
        </tr>
      </table></td>
    <td width="160" bgcolor="#F7F7F7"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Updates 
      Web-Tools</strong></font><br> 
      <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Age4fun.com <br> Enrico Dias </font> 
    </td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#F7F7F7">&nbsp;</td>
    <td bgcolor="#F7F7F7">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3"><img src="barra.jpg" width="778" height="20"></td>
  </tr>
  <tr> 
    <td colspan="3"><img src="redape.jpg" width="778" height="100"></td>
  </tr>
</table>
</body>
</html>
