<?php

// ###########################  head  ###################################
// head: função que configura a página e inicializa a tabela
//
function head() 
{
	include('config.php');
	echo "<body topmargin=\"0\" leftmargin=\"0\"><BODY bgcolor=\"#FFFFFF\" link=\"#CCCC00\"";
	echo "vlink=\"#808080\"";
	echo "alink=\"#808080\">";
	echo "<table align=\"center\" width=\"-1\" height=\"-1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" valign=\"top\">
		<tr><td>
		<body background=\"http://www.age4fun.com/home/arquivos/00047.jpg\"><table width=\"137\" height=\"-1\" border=\"0\" valign=\"top\"
		cellpadding=\"0\" cellspacing=\"0\" align=\"center\" valign=\"top\">
		<tr><td>";
} // head

// ###########################  foot  ###################################
// foot: função que finaliza a tabela
//
function foot () 
{
	echo "</td></tr></table></td></tr></table>";
} // foot

// ###########################  record  #################################
// record: grava o endereço ip no arquivo $ip_file
//
function record($REMOTE_ADDR) 
{
	include('config.php');

	// abre o arquivo para escrita após a última linha.
	$fp=fopen("$ip_file", "a+"); 
	
	// envia para o arquivo o ip e a hora
	fputs ($fp,$REMOTE_ADDR."][".time()."\n");
	fclose($fp); // fecha o arquivo
} // record

// ###########################  chech  #################################
// check: função que checa se o ip já está gravado
//
function check($REMOTE_ADDR) 
{
	include('config.php');
	global $valid;
	$ip=$REMOTE_ADDR;
	$data=file("$ip_file");
	$now=time();
	foreach ($data as $record) 
	{
		$subdata=explode("][",$record);
		if ($now < ($subdata[1]+3600*$timeout)) 
		{
			if ($ip == $subdata[0]) 
			{
				$valid=0;
				break;
			}
		}
	}
}// check 

// ###########################  save  ##################################
// save: função que computa o voto
//
function save($opcao)
{
	global $opcao;
	include('config.php');
	$data=file($datafile);
	$subdata=explode("][",$data[$opcao]);
	$subdata[2]+=1;
	$data[$opcao]=implode("][", $subdata);
	$data[$opcao]=$data[$opcao]."\n";
	$fp=fopen($datafile,"w+");
	$a=0;

	do {
		fputs($fp,$data[$a]);
		$a++;
	} while($a<count($data));

	fclose($fp);
}// fim save

// ###########################  form  ##################################
// form: função que cria a tabela para votação
//
function form($PHP_SELF)
{
	include('config.php');
    head(); //inicializa a tabela
    echo "<font size=\"$fontsize\" face=\"$font\" color=\"$textcolor\"><form method=\"post\" action=\"vote.php\"><p align=\"center\">";
    $data=file($datafile);
	$question=$data[0];
 	$nb_options=count($data)-1;
    echo "<b>$question<img border=\"0\" src=\"espaco.gif\" width=\"1\" height=\"1\"></b></p><img border=\"0\" src=\"espaco.gif\" width=\"1\" height=\"1\"><br>";
    for($nb=1;$nb <= $nb_options; $nb++)
	{
		$option=explode("][","$data[$nb]");
		echo "<src=\"bar_sep.gif\"> <input type=\"radio\" name=\"opcao\" value=\"$nb\"> ";
		echo "$option[0]<br>";
	}

	echo "<center><input type=\"hidden\" name=\"save\" value=\"yes\">";
    echo "<input name=\"I7\" type=\"image\" id=\"ok\" src=\"bot_votar.gif\">";
    echo "<font size=\"$fontsize\" face=\"$font\" color=\"$textcolor\">
  <img border=\"0\" src=\"espaco.gif\" width=\"15\" height=\"30\">
  <a href=\"vote.php?action=results\">
		<img border=\"0\" title=\"Resultado Parcial\" src=\"bot_grafc_result.gif\"></center></font></p>";
	foot();// fecha a tabela
}// form

// ###########################  results  ##################################
// results: função que imprime os resultados 
//
function results()
{
	include('config.php');

	head();
	
	$data=file($datafile);
	$nb_answers=count($data);
	$votes=0;
	$a=1;

	do { // calcula o total de votos
		$subdata=explode("][",$data[$a]);
		$votes += $subdata[2];
		$a++;
	} while($a < $nb_answers);

    $a=1;
    $b="answerv";
    if($votes!=0)
		$v=100/$votes; //descobre o valor de 1 voto em %
    echo "<center><p><font size=\"$fontsize\" face=\"$font\"
		color=\"$textcolor\"><b>$data[0]<br><img border=\"0\" src=\"bar_sep.gif\" width=\"100%\" height=\"5\"></center><center>Resultado da enquete</center>
		</b><img border=\"0\" src=\"bar_sep.gif\" width=\"100%\" height=\"5\"><br>";

	do {
		$subdata=explode("][",$data[$a]);
		$av = $subdata[2] * $v; // calcula a porcentagem de cada opção
        echo "<body topmargin=\"0\" leftmargin=\"0\"><font size=\"$fontsize\" face=\"$font\" color=\"$textcolor\">$subdata[0] ";
		echo " - $subdata[2] votos<br>";
		echo "<img src=\"$subdata[1]\" border=\"0\" width=\"$av\"
			height=\"10\">";
        printf(" %01.1f", $av);
		echo"%<br>";
		$a++;
	} while ($a < $nb_answers);

	echo "<img border=\"0\" src=\"bar_sep.gif\" width=\"100%\" height=\"5\"><br><font size=\"$fontsize\">
		Total: $votes votos!";
	echo "<br>";
	foot(); //fecha a tabela
}// results

// ###########################  execução  ################################
// execução da página
//
check($REMOTE_ADDR);

if ($valid=="0")// se já votou, mostra somente os resultados
{ 
	results();
}
elseif ($action=="results") // se clicar para ver os resultados
{ 
	results(); 
}
elseif ($save=="yes" && $valid!="0") // se votou e o ip ainda não foi gravado
{ 
	save($opcao); // computa o voto
	record($REMOTE_ADDR); // grava o ip
	results(); // mostra os resultados
}
elseif ($action=="save" && !empty($valid)) // se enviou o voto, sem
							 // marcar uma opção
{ 
	results(); 
}
elseif ($action!="save" && $valid!="0") // se ainda não enviou o voto,
						    // mas uma opção está marcada
{ 
	form($PHP_SELF); 
}

?>
