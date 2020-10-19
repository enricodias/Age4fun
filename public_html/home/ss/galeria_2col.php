<?
include("ss/path.php");
$sql = mysql_query("SELECT * FROM galeria limit 6"); 
?>
<? // Agora exiba o código com a configuração de sua tabela - o cabeçalho dela. ?>
<p><font size="3" face="Verdana, Arial, Helvetica, sans-serif"></font></p>
<table width="24%" border="0" align="left" cellpadding="0" cellspacing="0">
  <?
// Agora vamos montar o código. Pegue o valor total de resultados: 
$total = mysql_num_rows($sql); 
// Defina o número de colunas que você deseja exibir: 
$colunas = "1"; 
// Agora vamos ao "truque": 
if ($total>0) { 
for ($i = 0; $i < $total; $i++) { 
if (($i%$colunas)==0) { 
?>
  <tr> 
    <? }?>
    <?
$dados= mysql_fetch_array($sql) ;
?>
    <td width="506" height="74" align="left" valign="top"><div align="left"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
        <? if($dados[foto01] != ""){?>
        <? }?>
        <span style="text-transform: uppercase"><b><a href="javascript:AbreJanelaGaleria('ss/janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><? echo $dados['nome']?></a></b></span><br>
        <a href="javascript:AbreJanelaGaleria('ss/janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><img src="ss/imagemdimindex.php?imagem=images/galeria/<? echo $dados['pasta']?>/<? echo $dados['foto01']?>" border="1" align="left"></a> 
        <span style="text-transform: uppercase"><b></b></span><strong><? echo $dados['dia'],"/",$dados['mes'],"/",$dados[ano];?></strong><br>
        <strong><? echo $dados['local']?></strong><br>
        <strong> 
        <?
$dir="ss/images/galeria/$dados[pasta]";
$dir1=opendir($dir);
$cont=0;
while ($res=readdir($dir1) ){
$tipo=explode(".",$res);
if ($tipo[1]=="jpg" || $tipo[1]=="JPG"){
$cont=$cont+1;
}
}
print ($cont);
?>
        </strong>Fotos.<br>
        <br>
		<br>
		<br>
		<br>
        </font></div></td>
    <TD width="1"></TD>
    <? }}?>
  </TR>
</table>
<div align="left"></div>
