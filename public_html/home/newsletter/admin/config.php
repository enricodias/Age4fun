<?
/* WEB - TOOLS - www.web-tools.kit.net [ Caso essa linha seja apagada
o sistema irá parar de funcionar] */

# Em Caso de DUVIDAS consulte o arquivo LEIA-ME.html
# Seus dados
$site = 'http://www.age4fun.com'; // coloque ao lado seu site


# Configuracoes de banco de dados
$host ="localhost"; // Host valor padrao é localhost
$usuariodb="syndi_site"; //Usuario de Conexao com  o MySQL
$senhadb="enrico"; // Senha de Conexao com o MySQL
$db="syndi_home"; //Banco de Dados MySQL


# Tableas NAO ALTERE
$tb1="usuarios";
$tb2="controle";
$tb3="emails";



# Configurações do Remetente e e-mail admin
$autor_email = "Age4fun.com"; // Nome do site
$email_admin = "webmaster@age4fun.com"; // E-mail de contato




# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('Não foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("não foi possivel");
?> 
