<html>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
<meta name='GENERATOR' content='Microsoft FrontPage 4.0'>
<meta name='ProgId' content='FrontPage.Editor.Document'>
<title>X-album - Painel de Controle - Principal</title>
</head>
<body bgcolor='#f5f5f5' topmargin='0' leftmargin='0'>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodu��o ou manipula��o.
// [-http://www.brunoalencar.com-]

include "acesso.php";
if ( $contagem == 1 ) {
$filename = '../instalar.php';

if (file_exists($filename)) {
print "<font size=3 face=Verdana>ATEN��O! VOC� AINDA N�O DELETOU O ARQUIVO INSTALAR.PHP QUE SE ENCONTRA NA PASTA PRINCIPAL DO SCRIPT.</FONT><BR><br>";
print "<font size=3 face=Verdana> � MOTIVO DE SEGURAN�A QUE APAGUE O ARQUIVO O QUANTO ANTES DEPOIS DA INSTALA��O.</FONT>";
} else {
include "..config.php";
    $nome = mysql_query("SELECT * FROM `$tabela2`");
    while($campo = mysql_fetch_array($nome)) {
  ?>
<p><font face='Verdana' size='2'>Ol� <? echo $campo[1]; ?>, seja bem vindo ao Painel de
Controle.</font></p>
<p><font face='Verdana' size='1'>No painel de controle voc� Adiciona, Edita, Remove as suas imagens com muita facilidade e rapidez.</font></p>
<?
}
if  (strpos($HTTP_USER_AGENT,"MSIE") != 0) {
echo "<font face='verdana' size='1'>Navegador sendo usado: Internet Explorer(Recomendado)</font><br>";
} else {
echo "<font face='verdana' size='1'>Navegador an�nimo. N�o recomendado. (Internet Explorer � o recomendado)</font><br>";
}

    $s3 = mysql_query("SELECT * FROM `$tabela3`");
    $n3 = mysql_num_rows($s3);
    if($n3 == "0"){ echo '<font face="verdana" size="2"><b>Nenhuma foto no Banco de Dados</b><br>';
} elseif($n3 == "1") {
echo "<b><font face='verdana' size='2'>Voc� tem $n3 foto no Banco de Dados</font></b><Br>";
} else {
echo "<b><font face='verdana' size='2'>Voc� tem $n3 fotos no Banco de Dados</font></b><Br>";
}
?>
<br><br><center><font size=2 face=verdana>Novidades/Not�cias/Atualiza��es do Script via Internet</font><Br>
<iframe name="newsscript" src="http://www.brunoalencar.com/xalbum/index.php?acao=noticias" width="100%" height="150" borderframe="0" frameborder="0"></iframe>
</center>

<B> <Br><p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0"><font face="Verdana" size="1">X-Album
desenvolvido por Brunoalencar.com</font></p>
<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0"><font face="Verdana" size="1">Todos
os direitos reservados ao autor</font></p></b>

<?
}
  } else {
echo "<font face='Verdana' size='1'>Voc� n�o est� logado.<a href=index.php target=_parent>Logar</a></font>";
include "button.php";
}

// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodu��o ou manipula��o.
// [-http://www.brunoalencar.com-]
?>
</body>
