<?php
ob_start();
include "global.php";
$sala=new chat;
?>
<html>
<head>
<title></title>
</head>
<body> 
<?php
$str="";
$msgs=$sala->msgs();
$cont=$sala->cont("TODOS");
for($i=0;$i < sizeof($msgs);$i++){
   $rem=$msgs[$i]["rem"];
   $dest=$msgs[$i]["dest"];
   if(empty($_SESSION["ignora"][$rem]) AND empty($_SESSION["ignora"][$dest])){
      if($msgs[$i]["dest"] == $_SESSION["nome"]){
         $str.="parent.principal.document.writeln(\"<link href=barra.css type=text/css rel=stylesheet><table with=100% border=0><tr><td bgcolor=#F0F0F0>".$msgs[$i]["msg"]."</td></tr><table>\");\ntop.playsound(\"".$msgs[$i]["som"]."\");\n";
      }else{
         $str.="parent.principal.document.writeln(\"<link href=barra.css type=text/css rel=stylesheet><table><tr><td>".$msgs[$i]["msg"]."</td></tr></table>\");\ntop.playsound(\"".$msgs[$i]["som"]."\");\n";
      }
   }  
   if(($msgs[$i]["som"] == "entra") OR ($msgs[$i]["som"] == "saida") OR ($_SESSION["cont"] > $cont) ){
      $str.="parent.nomes.location.reload();\n";
	  $_SESSION["cont"]=$cont;
   }
}
$sala->atualiza();

if (strlen($str) > 0) {
?> 
<script>
<?=$str;?>
</script> 
<?php
}
?> 
<script language="JavaScript">
<!--
setTimeout('delayReload()', <?=1000*$refresh;?>);
function delayReload()
{
   if(navigator.userAgent.indexOf("MSIE") != -1){
   	history.go(0);
   }else{
   	window.location.reload();
   }
}
//-->
</script> 
</body>
</html>
<?
ob_end_flush();
?>
