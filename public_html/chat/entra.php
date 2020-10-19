<?
ob_start();
include "global.php";
$sala=new chat;
$sala->atualiza();
if(!isset($_POST["apelido"])){
   $_POST["apelido"]="GUEST";
}
if(empty($_POST["apelido"])){
   $_POST["apelido"]="Anonimo";
}
if($sala->cont("TODOS") == 30){
  $msg="Sala Lotada";
  header("Location: index.php?msg=$msg");
}else{
  if($sala->cont($_POST["apelido"]) > 0){
     $msg="Esse nick já está na sala";
     header("Location: index.php?msg=$msg");
  }else{
     if(strlen($_POST["apelido"]) >= 11){
        $msg="O nick não pode ter mais de 10 caracteres";
        header("Location: index.php?msg=$msg");
     }else{
        if($_POST["careta"] != 69){
           $_SESSION["perfil"]="<img border=0 src=caretas/".$_POST["careta"].".gif align='middle'>&nbsp;<font color=".$_POST["cor"]."><b>".$_POST["apelido"]."</b></font>";
        }
        else{
           $_SESSION["perfil"]="<img border=0 src=caretas/0.gif align='middle'><font color=".$_POST["cor"]."><b>".$_POST["apelido"]."</b></font>";
        }
        $sala->adduser($_POST["apelido"]);
		$_SESSION["nome"]=$_POST["apelido"];
		$_SESSION["date"]=0;
		$_SESSION["cont"]=$sala->cont("TODOS");
?>
<html>
<head>
<title>BATE PAPO</title>
<LINK href="main.css" type=text/css rel=stylesheet>
<script language="JavaScript">
   function playsound (som){
     if (parent.titulo.document.TCheck.som.checked){
       if(navigator.userAgent.indexOf("MSIE") != -1){
          parent.principal.document.writeln('<bgsound src=sound/'+som+'.wav loop=1 autostart=true>');
       }else{
          parent.principal.document.writeln('<embed src=sound/'+som+'.wav loop=1 autostart=true>');
       }
     }
   } // fim da func playsond

//
// Esta opção não abre a janela PopUp
// dando a mensagem: SAINDO...
//
function sair(){
	apelido='<?echo $_GET["apelido"]?>';
	time='<?echo $_GET["time"]?>';
	url='sair.php?apelido='+ apelido +'&time='+ time;
	window.top.location = url;
  }
//
</script>
</head>
<frameset cols="*,150" framespacing="1" frameborder="no" border="1" onbeforeUnload="sair();" onUnload="sair();">
  <frameset rows="90,*,85,0" frameborder=0>
    <frame name="titulo" src="titulo.php?apelido=<?=$_GET["apelido"];?>&time=<?=time();?>" SCROLLING="no">
    <frame name="principal" src="princ.php?apelido=<?=$_GET["apelido"];?>&time=<?=time();?>">
    <frame name="menu" src="menu.php?apelido=<?=$_GET["apelido"];?>&time=<?=time();?>" noresize SCROLLING="no">
    <frame name="inferior" src="inferior.php?apelido=<?=$_GET["apelido"];?>&time=<?=time();?>">
    <noframes>
    <body> 
    <p>Esta página usa quadros mas seu navegador não aceita quadros.</p> 
    </body>
    </noframes>
  </frameset>
  <frame name="nomes" src="nomes.php">
</frameset>
</html>
<?
     }
  }
}
ob_end_flush();
?>
