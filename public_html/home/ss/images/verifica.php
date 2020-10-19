<?
// Sistema para verificar se o usuário já está logado ou não
if(!$_COOKIE["usuario"] && !$_COOKIE["nivel"]){
header("Location: administrar.php");
}
if($acao == sair){
setcookie("usuario");
setcookie("nivel");
header("location: login.php");
}
?>