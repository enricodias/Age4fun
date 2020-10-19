<?
ob_start();
include "global.php";
$sala = new chat;
$lista=$sala->lista();
?>
<html>
<head>
<LINK href="main.css" type=text/css rel=stylesheet>
<script LANGUAGE="JavaScript">
<!-- inicio
function troca(valor) {

parent.menu.spn1.innerText = valor;
parent.menu.Mensagens.users.value=valor;
}
// fim-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<style>
A { font-family: verdana; font-size: 10px; color: #000000; text-decoration: none }
A:hover { font-family: verdana; font-size: 10px; color: #000000; text-decoration: none }
</style>
<body background="http://www.age4fun.com/home/arquivos/00001.jpg" leftmargin="3" topmargin="3">
<table width=120 cellpadding=0 cellspacing=0 border=0 bgcolor=#990000>
  <tr>
		<td width=100% height=100%>
			<table width=120 cellpadding=1 cellspacing=1 border=0>
			<tr>
				<td height=35 bgcolor=#FFFFFF><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Escolha 
				alguém<br>e clique:</font></div></td>
			</tr>
			<tr>
				<td valign=top bgcolor=#FFFFFF>
				<table width="120" border="0" cellpadding="0" cellspacing="1">
				  <tr> 
					<td width="17" height="17 "align="center" valign="middle" bgcolor="#F0F0F0"><img border=0 src=caretas/todos.gif></td>
					<td align="left" valign="middle" bgcolor="#F0F0F0"><a href="#" onClick="troca('TODOS')"><strong>TODOS</strong></font></a></td>
				  </tr>
				  <? 
						for($i=0;$i < sizeof($lista);$i++){
					?>
				  <tr> 
					<td width="17" height="17 "align="center" valign="middle" bgcolor="#F0F0F0"><img border=0 src=caretas/0.gif></td>
					<td align="left" valign="middle" bgcolor="#F0F0F0"><a href="#" onClick="troca('<?=$lista[$i];?>')"> 
					  <?=$lista[$i];?>
					  </a></td>
				  </tr>
				  <? } ?>
				</table>
				</td>
			</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
<?
ob_end_flush();
?>
