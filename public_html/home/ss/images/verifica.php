<?
// Sistema para verificar se o usu�rio j� est� logado ou n�o
if(!$_COOKIE["usuario"] && !$_COOKIE["nivel"]){
header("Location: administrar.php");
}
if($acao == sair){
setcookie("usuario");
setcookie("nivel");
header("location: login.php");
}
?>