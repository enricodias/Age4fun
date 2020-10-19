<?
ob_start();
include "global.php";
$sala=new chat;
$sala->removeuser($_SESSION["nome"]);
?>
<?
ob_end_flush();
?>
