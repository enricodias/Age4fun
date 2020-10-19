<?
ob_start();
include "global.php";
$sala = new chat;
if(isset($_POST["mensagem"])){
   if(isset($_POST["sigilo"]) AND $_POST["sigilo"] == 1){
      $res="reservadamente";
   }else{
      $res ="";
   }
   if($_POST["imagem"] != "vazio") {
      $img="<br><center><img src=exp/".$_POST["imagem"].".gif border=0></center>";
   }else{
      $img="";
   }
   $hora="<b>".date("(H:i:s)")."</b>";
   $_POST["mensagem"]=strip_tags($_POST["mensagem"]); //Retira os tags
   $_POST["mensagem"]=trim($_POST["mensagem"]);//Retira as espaços em branco
   $perfila=$sala->perfil($_SESSION["nome"]);
   $perfilb=$sala->perfil($_POST["users"]);
   $perfilb= ($perfilb != "") ? $perfilb : "TODOS";
   $_POST["mensagem"] = eregi_replace("([ \\t]|^)www."," http://www.",$_POST["mensagem"]);
   $_POST["mensagem"] = eregi_replace("([ \\t]|^)ftp\\."," ftp://ftp.",$_POST["mensagem"]);
   $_POST["mensagem"] = eregi_replace("(http://[^ )\r\n]+)","<A href='\\1\\' target='_blank'>\\1</A>",$_POST["mensagem"]);
   $_POST["mensagem"] = eregi_replace("(https://[^ )\r\n]+)","<A href='\\1\\' target='_blank'>\\1</A>",$_POST["mensagem"]);
   $_POST["mensagem"] = eregi_replace("(ftp://[^ )\r\n]+)","<A href='\\1' target='_blank'>\\1</A>",$_POST["mensagem"]);
   $_POST["mensagem"] = eregi_replace("([-a-z0-9_]+(\\.[_a-z0-9-]+)*@([a-z0-9-]+(\\.[a-z0-9-]+)+))","<A HREF='mailto:\\1'>\\1</A>",$_POST["mensagem"]);
   $_POST["mensagem"].=$img;
   $_POST["mensagem"]="<small>$hora</small> $perfila <i>$res ".$_POST["falas"]."</i> $perfilb : ".$_POST["mensagem"];
   unset($_SESSION["ignora"][$_POST["users"]]);
   if($_POST["falas"] == "ignora"){
       $_SESSION["ignora"][$_POST["users"]] = time();
	   $sala->addmsgs("<b>Mensagem do sitema :</b> Você está ignorado todas as mensagens de ".$_POST["users"]." .Caso deseje conversar com ele ,basta enviar uma nova mensagem .Ele será desbloqueado.",$_SESSION["nome"],$_SESSION["nome"],$_POST["som"],"res");
       unset($_POST["users"]);  
   }else{
      $sala->addmsgs(addslashes($_POST["mensagem"]),$_SESSION["nome"],$_POST["users"],$_POST["som"],($res == "")? "pub" : "res");
   }
}
$marca=($sala->cont($_POST["users"]) == 1 )? $_POST["users"] : "TODOS";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body background="http://www.age4fun.com/home/arquivos/00001.jpg" leftmargin="0" topmargin="0" onLoad="document.Mensagens.mensagem.focus()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form name=Mensagens action="menu.php?timer=<?=time();?>" method=post>
    <input type="hidden" name="users" value="<?=$marca;?>">
    <tr> 
      <td width="108">&nbsp;</td>
      <td width="511" align="left"><input type="checkbox" value="1" name="sigilo" <?if(isset($_POST["sigilo"] ) AND $_POST["sigilo"] == 1){echo "CHECKED";}?>> 
        <font size="1" face="Verdana, Arial, Helvetica, sans-serif">reservadamente</font></td>
      <td width="101">&nbsp;</td>
      <td width="65">&nbsp;</td>
    </tr>
    <tr> 
      <td rowspan="2" align="center" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <?
echo $sala->perfil($_SESSION["nome"]);
?>
        </font> </td>
      <td width="511"> <select name="falas" size="1" style="border-color: #000000; border-width: 1; border-style: solid; background-color:#ffffff; font-size: 10; font-family: verdana;" >
          <option value="fala para" selected>fala para</option>
          <option value="pergunta para">pergunta para</option>
          <option value="responde para">responde para</option>
          <option value="concorda com">concorda com</option>
          <option value="discorda de">discorda de</option>
          <option value="murmura para">murmura para</option>
          <option value="sorri para">sorri para</option>
          <option value="suspira por">suspira por</option>
          <option value="flerta com">flerta com</option>
          <option value="ri de">ri de</option>
          <option value="d&aacute; um fora em">d&aacute; um fora em</option>
          <option value="briga com">briga com</option>
          <option value="grita com">grita com</option>
          <option value="xinga">xinga</option>
          <option value="ignora">ignora as mensagens de </option>
        </select>&nbsp;&nbsp;<strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><span id="spn1"> 
        <?=$marca;?>
        </span></font></strong></td>
      <td width="101"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><select name="som" size="1" style="border-color: #000000; border-width: 1; border-style: solid; background-color:#ffffff; font-size: 10; font-family: verdana;" >
          <option selected value="nada">enviar som :</option>
          <option value="brinde">brinde</option>
          <option value="acelera">acelera</option>
          <option value="assobio">assobio</option>
          <option value="despertador">despertador</option>
          <option value="latido">latido</option>
          <option value="miado">miado</option>
          <option value="mugido">mugido</option>
          <option value="grito">grito</option>
          <option value="vaia">vaia</option>
          <option value="gargalhada">gargalhada</option>
          <option value="ronco">ronco</option>
          <option value="beijo">beijo</option>
          <option value="aplausos">aplauso</option>
          <option value="arroto">arroto</option>
        </select> &nbsp;&nbsp; <select name="imagem" size="1" style="border-color: #000000; border-width: 1; border-style: solid; background-color:#ffffff; font-size: 10; font-family: verdana;" >
          <option value="vazio" selected>enviar imagem:</option>
          <option value="01">Beijo</option>
          <option value="02">Envergonhado</option>
          <option value="03">Feliz</option>
          <option value="04">Zangado</option>
          <option value="07">Pirata</option>
          <option value="08">Alegre</option>
          <option value="09">Dorminhoco</option>
          <option value="10">Louco</option>
          <option value="11">Surpreso</option>
          <option value="13">Triste</option>
          <option value="14">Sol</option>
          <option value="16">Nerd</option>
          <option value="19">Mostrando a Língua</option>
        </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input maxlength="500" size="55" name="mensagem" style="border-color: #000000; border-width: 1; border-style: solid; background-color:#ffffff; font-size: 12; font-family: verdana;"> 
        &nbsp;&nbsp; &nbsp; <input type="submit" name="Submit2" value="Enviar" style="font-size: 10px; font-family: verdana; cursor: hand;"> 
      </td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Botao" value="Sair" onClick="top.close();" style="font-size: 10px; font-family: verdana; cursor: hand;"></td>
    </tr>
  </form>
</table>
</body>
</html>
<?
ob_end_flush();
?>
