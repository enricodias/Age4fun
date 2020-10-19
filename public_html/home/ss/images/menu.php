<? include("verifica.php")?>
<?
include("path.php");
include("../include/config.php");
?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="<? echo $corcelula2?>"> 
    <td width="14%" height="15" style="border:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="administrar.php?nivel=<? echo $nivel?>&acao=lista&usuario=<? echo $usuario?>">Administrar 
      Usu&aacute;rios</a></font></td>
    <td width="14%" style="border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../" target="_blank">Ver 
      Galerias</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="listar_galerias.php?nivel=<? echo $nivel?>">Listar 
      Galerias</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="cadastrar.php?nivel=<? echo $nivel?>">Cadastrar 
      Galeria</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="select_pastas.php?nivel=<? echo $nivel?>&usuario=<? echo $usuario?>">Enviar 
      Imagens</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="configurar.php?acao=form&id=1&nivel=<? echo $nivel?>">Configurar 
      </a></font></td>
    <td width="14%" style="border:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="?acao=sair">Logout 
      </a></font></td>
  </tr>
  <tr align="center" bgcolor="<? echo $corcelula2?>"> 
    <td width="14%" height="15" style="border:1px solid <? echo $cortexto?>">&nbsp;</td>
    <td width="14%" style="border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="criar_dir.php">Criar 
      pasta</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="listar_arquivos.php?nivel=<? echo $nivel?>">Listar 
      pastas</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">&nbsp;</td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">&nbsp;</td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">&nbsp;</td>
    <td width="14%" style="border:1px solid <? echo $cortexto?>">&nbsp;</td>
  </tr>
</table>
<br>
<font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>">Olá <b><? echo $usuario?></b>, seja bem vindo!</font>
<hr size="1" noshade color="<? echo $cortexto?>">


