<?php

//
// password do administrador
//
$password="576118";

//
// se o password está errado ou ainda não foi digitado
//
if(!isset($passwd) or $passwd!=$password)
	{
	echo "<table width=\"303\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" height=\"169\" 		align=\"center\"><tr><td height=\"110\">
		<table width=\"311\" border=\"0\" cellspacing=\"1\"
		cellpadding=\"0\" height=\"136\">
		<body background=\"http://www.age4fun.com/home/arquivos/00001.jpg\"><title>Age4fun.com - Enquete</title><tr><td height=\"175\"><div align=\"center\"><font
		face=\"Verdana, Arial, Helvetica, sans-serif\"><b>
		<font size=\"1\">
		Entre com o password do administrador.
		</font></b></font><br>
		</div><form name=\"form1\" method=\"post\" 	action=\"admin.php\"><div align=\"center\">
		<input type=\"password\" name=\"passwd\"><br><input type=\"submit\" name=\"Submit\" value=\"Entrar\">
		</div></form></td></tr></table></td></tr></table>";
	} // fim do if
//
// se o password digitado for correto
//
elseif ($passwd==$password)
	{
	//
	// se o password esta correto e foi submetido as novas configurações
	//
	if (isset($submit))
		{
		$fp=fopen($datafile, "w"); // abre arquivo para escrita
		fputs($fp, $questao."\n"); // envia a questão para a 1ª linha
		for($i=1; $i <=10; $i++)
			{
			if($opcao[$i]=="") // se não possui mais opção para
				{
				break;
				}

			$input=$opcao[$i]."][".$imagem[$i]."][".$votos[$i]."\n";
			fputs($fp, $input); // envia cada linha para o arquivo
			}
		fclose($fp); // fecha o arquivo

		$config="<?php\n";
		$config.="\$textcolor='$textcolor';\n";
		$config.="\$linkcolor='#FFFFFF';\n";
		$config.="\$bgcolor='$bgcolor';\n";
		$config.="\$tableborder='$tableborder';\n";
		$config.="\$timeout='$timeout';\n";
		$config.="\$ip_file='$ip_file';\n";
		$config.="\$font='$font';\n";
		$config.="\$fontsize='$fontsize';\n";
		$config.="\$datafile='$datafile';\n";
		$config.="?>";

		$fp=fopen($ip_file, "w"); // abre o arquivo para escrita
		fclose($fp); // fecha o arquivo

		$fp=fopen("config.php", "w"); // abre o arquivo para escrita
		fputs($fp, $config); //envia as configurações para o arquivo
		fclose($fp); // fecha o arquivo

		echo "<div align=\"center\"><b><font face=\"Verdana, Arial, 			Helvetica, sans-serif\" color=\"#00CC00\">
			Configurações alteradas com sucesso</font></b></div>";
		}

	include('config.php');
	$data=file($datafile);
	$nb=count($data);
?>

<html>
<head>
<title>Age4fun.com - Enquete</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body background="http://www.age4fun.com/home/arquivos/00001.jpg" topmargin="0" leftmargin="0">
<body bgcolor="#FFFFFF" text="#000000" link="#FFFFFF" vlink="#CCCCCC" alink="#CCCCCC">

<table width="760" border="0" cellspacing="1" cellpadding="0" align="center" height="566">
  <tr>
    <td height="6"><font face="Verdana, Arial,
	Helvetica, sans-serif" size="2" color="#000000">
	<b>Administração</b><font size="1">
      ( 	<a> Age4fun.com</a>
      )</font></font></td>
  </tr>
  <tr>
    <td bgcolor="#" height="221">
      <table width="100%" border="0" cellspacing="1" cellpadding="5" height="634">
        <tr>
          <td bgcolor="#f7f7f7" height="463" valign="top">
            <form name="APP" method="post" action="">
              <p><font face="Verdana, Arial, Helvetica, sans-serif"
			size="2"><b><i>Campos da enquete:
                </i></b><br>
                <br>
                </font></p>
              <table width="753" border="0" cellspacing="1" cellpadding="3" 			height="396" align="center">
                <tr>
                  <td width="116" height="15"><font face="Verdana, Arial,
			Helvetica, sans-serif" size="2">
		<b>Questão</b></font></td>
                  <td colspan="3" height="15"> <font face="Verdana, Arial, 			Helvetica, sans-serif" size="2">
                    <input type="text" name="questao" size="100" 			maxlength="150"
			value="<?php echo $data[0]; //primeira linha do arquivo
				?>">
                    </font></td>
                </tr>
                <tr>
                  <td colspan="4" height="10">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4"><font face="Verdana, Arial, Helvetica,
			sans-serif" size="2">
			Entre com as modificações nos campos abaixo.
			</font></td>
                </tr>
                <tr>
                  <td width="116">&nbsp;</td>
                  <td width="246">
                    <div align="center"><font face="Verdana, Arial,
				Helvetica, sans-serif" 	size="2">
				<b>Opções</b></font>
			  </div>
                  </td>
                  <td width="181">
                    <div align="center"><font face="Verdana, Arial,
				Helvetica, sans-serif" size="2">
				<b>Arquivo de imagem</b></font>
			  </div>
                  </td>
			  <td>
                    <div align="center"><font face="Verdana, Arial,
				Helvetica, sans-serif" size="2">
				<b>Votos</b></font>
			  </div>
                  </td>

<?
for($i=1; $i<=10; $i++)
	{
	//
	// subdata recebe três valores, o php determina
	// o fim de uma variável a cada ][, subdata[0] corresponde
	// as opções, subdata[1] ao arquivo de imagem e subdata[2]
	// ao número de votos
	//
	$subdata=explode("][",$data[$i]);
	echo "<tr><td width=\"116\">
		<font face=\"Verdana, Arial, Helvetica,
		sans-serif\" size=\"2\">
		<b>Opção $i</b></font></td>
		<td width=\"246\">
		<div align=\"center\">
		<font face=\"Verdana, Arial, Helvetica,
		sans-serif\" size=\"2\">
		<input type=\"text\" name=\"opcao[$i]\"
		size=\"40\" maxlength=\"40\" 		value=\"$subdata[0]\"></font></div>
		</td><td width=\"181\">
		<div align=\"center\">
		<font face=\"Verdana, Arial, Helvetica,
		sans-serif\" size=\"2\" >
		<input type=\"text\" name=\"imagem[$i]\"
		size=\"25\" maxlength=\"50\"
		value=\"$subdata[1]\">
		</font></div></td><td width=\"181\">
		<div align=\"center\">
		<font face=\"Verdana, Arial, Helvetica,
		sans-serif\" size=\"2\">
		<input type=\"text\" name=\"votos[$i]\"
		size=\"4\" maxlength=\"4\"
		value=\"$subdata[2]\">
		</font></div></td></tr>";
	}// fim do for
?>

               </table>
              <hr width="95%" size="1" align="center" noshade>
              <table width="753" border="0" cellspacing="1" 			cellpadding="1">
                <tr bgcolor="#f7f7f7">
                  <td width="154" height="22"><font face="Verdana, Arial,
				Helvetica, sans-serif"
				size="2"><b>Cores</b></font>
			</td>
                  <td width="148" height="22">&nbsp;</td>
                  <td width="22" height="22">&nbsp;</td>
                  <td colspan="2" height="22"><font face="Verdana, Arial,
			Helvetica, sans-serif" size="2">
			<b>Outras configurações</b></font></td>
                </tr>
                <tr bgcolor="#f7f7f7">
                  <td width="154"><font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">Text</font></td>
                  <td width="148"> <font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">
                    <input type="text" name="textcolor" maxlength="10" 				size="10" value="<?php echo $textcolor; ?>">
                    </font></td>
                  <td width="22">&nbsp;</td>
                  <td width="218"><font face="Verdana, Arial, Helvetica,
			sans-serif" size="2">Duração (horas)</font></td>
                  <td width="205"> <font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">
                    <input type="text" name="timeout" size="3" 				maxlength="3" value="<?php echo $timeout; ?>">
                    </font></td>
                </tr>
                <tr bgcolor="#f7f7f7">
                  <td width="154"><font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">Bgcolor</font></td>
                  <td width="148"> <font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">
                    <input type="text" name="bgcolor" size="10" 				maxlength="10" value="<?php echo $bgcolor; ?>">
                    </font></td>
                  <td width="22">&nbsp;</td>
                  <td width="218"><font face="Verdana, Arial, Helvetica, 			sans-serif" size="2">
			Arquivo que armazena os dados</font></td>
                  <td width="205"> <font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">
                    <input type="text" name="datafile" size="25" 			maxlength="50" value="<?php echo $datafile; ?>">
                    </font></td>
                </tr>
                <tr bgcolor="#f7f7f7">
                  <td width="154"><font face="Verdana, Arial, Helvetica, 			sans-serif" size="2">Border</font></td>
                  <td width="148"> <font face="Verdana, Arial, Helvetica, 			sans-serif" size="2">
                    <b>
                    <input type="text" name="tableborder" size="10" 			maxlength="10" value="<?php echo $tableborder; ?>">
                    </b> </font></td>
                  <td width="22"><font face="Verdana, Arial, Helvetica, 			sans-serif" size="2"></font></td>
                  <td width="218"><font face="Verdana, Arial, Helvetica, 			sans-serif" size="2">
			Arquivo que armazena os IP</font></td>
                  <td width="205"> <font face="Verdana, Arial, Helvetica, 			sans-serif" size="2">
                    <input type="text" name="ip_file" size="25" 				maxlength="50" value="<?php echo $ip_file; ?>">
                    </font></td>
                </tr>
                <tr bgcolor="#f7f7f7">
                  <td width="154"><font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">Font</font></td>
                  <td width="148"> <font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">
                    <input type="text" name="font" size="20" 				maxlength="100" value="<?php echo $font; ?>">
                    </font></td>
                  <td width="22"><font face="Verdana, Arial, Helvetica, 				sans-serif" size="2"></font></td>
                  <td width="218"><font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">Font-Size</font></td>
                  <td width="205"> <font face="Verdana, Arial, Helvetica, 				sans-serif" size="2">
                    <input type="text" name="fontsize"
				value="<?php echo $fontsize; ?>"
				size="1" maxlength="1">
                    </font></td>
                </tr>
              </table>
              <div align="center">
                <input type="hidden" name="passwd"
			value="<?php echo $password; ?>">
                <hr width="95%" size="1" align="center" noshade>
	                <input type="submit" name="submit"
				value="Salvar as modificações">
                <input type="reset" name="Submit2" value="Limpar">
              </div>
            </form>
            <p>&nbsp; </p>
            </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?php
}
?>
