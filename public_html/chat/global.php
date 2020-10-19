<?
session_start();
include ("config.php");
class chat{
   var $dbh;
   
    function chat ()
	{
	$this->dbh = mysql_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]) or 
				 die('ERRO ao se conectar a base de dados');
	mysql_select_db($GLOBALS["db"], $this->dbh);
	}
	
   function cont($nome){
      if($nome=="TODOS"){
         $consulta=mysql_query("SELECT COUNT(*) AS DIG FROM users",$this->dbh);
	  }else{
	     $consulta=mysql_query("SELECT COUNT(*) AS DIG FROM users WHERE nome='$nome'",$this->dbh);
	  }	 
	  $row = mysql_fetch_array($consulta);
	  mysql_free_result($consulta);
	  return $row["DIG"];   
   }

   function removeuser($nome){
      $str = $this->perfil($nome)." sai da sala";
      $this->addmsgs($str,$nome,"TODOS","saida","pub");
      mysql_query("DELETE FROM users WHERE nome ='$nome'",$this->dbh);
   }

   function perfil($nome){
      $consulta=mysql_query("SELECT perfil FROM users WHERE nome ='$nome'",$this->dbh);
	  $row = mysql_fetch_array($consulta);
	  mysql_free_result($consulta);
	  return addslashes ($row["perfil"]);
   }

   function lista(){
      $consulta=mysql_query("SELECT nome FROM users",$this->dbh);
	  while($row = mysql_fetch_array($consulta)){
	     $nomes[]=$row["nome"];
	  }
	  mysql_free_result($consulta);
	  sort($nomes);
	  reset($nomes);
	  return $nomes;
   }

   function adduser($nome){
         mysql_query("DELETE FROM users WHERE sessionid = '".session_id()."'",$this->dbh);
		 mysql_query("INSERT INTO users VALUES ('$nome', '".addslashes ($_SESSION["perfil"])."', now(), '".session_id()."')",$this->dbh);
         $str=$this->perfil($nome)." entra na sala";
         $this->addmsgs($str,$nome,"TODOS","entra","pub");
   }

   function addmsgs($str,$rem,$dest,$som,$tipo){
       mysql_query("INSERT INTO msg VALUES ('$str', NOW(), '$rem', '$dest','$som','$tipo')",$this->dbh);
   }
   
   function msgs(){
      $i=0;
	  $nome=$_SESSION["nome"];
      $consulta=mysql_query("SELECT * FROM msg where (rem = '$nome' OR dest='$nome' OR tipo ='pub') AND date > '".$_SESSION["date"]."' ORDER by date ASC",$this->dbh);
	  while($row = mysql_fetch_array($consulta)){
	     $msgs[$i]["msg"]=$row["msg"];
		 $msgs[$i]["som"]=$row["som"];
		 $msgs[$i]["dest"]=$row["dest"];
		 $msgs[$i]["rem"]=$row["rem"];
		 $i++;
		 $_SESSION["date"]=$row["date"];
	  }
	  mysql_free_result($consulta);
	  return $msgs;   
   }

   function atualiza(){
      $nome=$_SESSION["nome"];
      mysql_query("DELETE FROM msg WHERE date < DATE_SUB(now(),INTERVAL ".$GLOBALS["purge"]." SECOND)",$this->dbh);
	  mysql_query("DELETE FROM users WHERE date < DATE_SUB(now(),INTERVAL ".$GLOBALS["purge"]." SECOND)",$this->dbh);
	  mysql_query("UPDATE users SET date= now() WHERE nome='$nome'",$this->dbh); 
   }
}
?>
