<?php


$EMAIL['header'] = <<<EOF

EOF;

$EMAIL['footer'] = <<<EOF
Abra�os,

Equipe <#BOARD_NAME#>.
<#BOARD_ADDRESS#>

EOF;

$SUBJECT['pm_notify'] = "Voc� tem uma nova mensagem";

$EMAIL['pm_notify'] = <<<EOF
<#NAME#>,

<#POSTER#> enviou-lhe uma nova mensagem pessoal entitulada "<#TITLE#>".

Voc� pode ler esta mensagem seguindo o link abaixo:

<#BOARD_ADDRESS#><#LINK#>


EOF;

$EMAIL['send_text'] = <<<EOF
Eu achei que voc� poderia estar interessado em ler esta p�gina da web:
<#THE LINK#>

Mensagem de <#USER NAME#>

EOF;

$EMAIL['report_post'] = <<<EOF
<#MOD_NAME#>,

Voc� recebeu este e-mail de <#USERNAME#> atrav�s do link "Denuncie este post a um moderador".

------------------------------------------------
T�pico: <#TOPIC#>
------------------------------------------------
Link para o post: <#LINK_TO_POST#>
------------------------------------------------
Den�ncia:

<#REPORT#>

------------------------------------------------

EOF;

$EMAIL['pm_archive'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Suas mensagens arquivadas foram compiladas em um �nico arquivo o qual foi anexado � esta mensagem.
EOF;

$EMAIL['reg_validate'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Voc� recebeu este e-mail j� que voc� usou este endere�o durante o registro em nossos f�runs. Se voc� n�o se registrou nos nossos f�runs, desconsidere este e-mail. Voc� n�o precisa tomar nenhuma atitude.

------------------------------------------------
Instru��es de ativa��o
------------------------------------------------

Obrigado por se registrar.
N�s exigimos que voc� "valide" o seu registro para ter certeza de que o endere�o de e-mail fornecido estava correto. Isto nos protege contra SPAM e abusos maliciosos.

Para ativar a sua conta, simplesmente clique no link a seguir:

<#THE_LINK#>

(Usu�rios AOL devem copiar e colar o link no navegador.)

------------------------------------------------
N�o funciona?
------------------------------------------------

Se o link n�o funcionou, visite a p�gina a seguir:

<#MAN_LINK#>

E insira os dados a seguir:

ID do usu�rio: <#ID#>

Chave de valida��o: <#CODE#>

Copie e cole, ou digite estes n�meros nos campos correspondentes do formul�rio.

Se voc� continua n�o conseguindo validar a sua conta, � poss�vel que ela tenha sido removida. Neste caso contate um administrador e notifique o problema.

Obrigado por se registrar e aproveite o f�rum!
EOF;

$EMAIL['admin_newuser'] = <<<EOF
Ol� Admin!

Voc� recebeu este e-mail pois um novo usu�rio se registrou!

<#MEMBER_NAME#> completou o registro em <#DATE#>

Voc� pode desligar este recurso no AdminCP

Tenha um �timo dia!
EOF;

$EMAIL['lost_pass'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Voc� recebeu este e-mail j� que solicitou a recupera��o de sua senha no f�rum <#BOARD_NAME#>.

------------------------------------------------
IMPORTANTE!
------------------------------------------------

Se voc� n�o requisitou esta mudan�a de senha, IGNORE e REMOVA este e-mail imediatamente. Somente continue se voc� deseja que a sua senha seja zerada!

------------------------------------------------
Instru��es de ativa��o
------------------------------------------------

N�s exigimos que voc� "valide" o seu pedido de recupera��o de senha para ter certeza de que voc� solicitou esta a��o. Isto nos protege contra SPAM e abusos maliciosos.

Clique no link abaixo e complete o resto do formul�rio:

<#THE_LINK#>

(Usu�rios AOL devem copiar e colar o link no navegador.)

------------------------------------------------
N�o funciona?
------------------------------------------------

Se voc� n�o consegue validar esta requisi��o clicando no link, visite esta p�gina:

<#MAN_LINK#>

E informe manualmente os dados abaixo:

ID do usu�rio: <#ID#>

Chave de valida��o: <#CODE#>

Copie e cole, ou digite estes numeros nos campos correspondentes do formul�rio.

------------------------------------------------
Continua n�o funcionando?
------------------------------------------------

Se voc� n�o consegue reativar a sua conta, � poss�vel que ela tenha sido removida ou estar em outro processo de ativa��o, como registro ou troca de endere�o de e-mail.
Neste caso, finalize as ativa��es anteriores.
Se o problema persistir, contate um administrador.


Endere�o IP do visitante: <#IP_ADDRESS#>


EOF;

$EMAIL['newemail'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Voc� recebeu este e-mail j� que requisitou uma troca de e-mail.

------------------------------------------------
Instru��es de ativa��o
------------------------------------------------

N�s exigimos que voc� "valide" a sua troca de endere�o de e-mail para ter certeza de que voc� solicitou esta a��o. Isto nos protege contra SPAM e abusos maliciosos.

Para ativar a sua conta, simplesmente clique no link a seguir:

<#THE_LINK#>

(Usu�rios AOL devem copiar e colar o link no navegador.)

------------------------------------------------
N�o funciona?
------------------------------------------------

Se voc� n�o consegue validar esta requisi��o clicando no link, visite esta p�gina:

<#MAN_LINK#>

E informe manualmente os dados abaixo:

ID do usu�rio: <#ID#>

Chave de valida��o: <#CODE#>

Copie e cole, ou digite estes numeros nos campos correspondentes do formul�rio.

Uma vez que a sua ativa��o for completada, voc� poder� precisar efetuar um novo login para atualizar as suas permiss�es de grupo.

------------------------------------------------
Continua n�o funcionando?
------------------------------------------------

Se voc� n�o consegue reativar a sua conta, � poss�vel que ela tenha sido removida ou estar em outro processo de ativa��o, como registro ou troca de senha.
Neste caso, finalize as ativa��es anteriores.
Se o problema persistir, contate um administrador.


EOF;

$EMAIL['forward_page'] = <<<EOF
<#TO_NAME#>


<#THE_MESSAGE#>

---------------------------------------------------
Aviso: <#BOARD_NAME#> n�o tem
controle sobre o conte�do desta mensagem.
---------------------------------------------------

EOF;

$SUBJECT['subs_with_post'] = "Notifica��o de resposta em t�pico assinado";

$EMAIL['subs_with_post'] = <<<EOF
<#NAME#>,

<#POSTER#> acabou de postar uma resposta ao t�pico que voc� assinou, entitulado "<#TITLE#>".

---------------------------------------------------------------------
<#POST#>
---------------------------------------------------------------------

O t�pico pode ser visto aqui:
<#BOARD_ADDRESS#>?act=ST&f=<#FORUM_ID#>&t=<#TOPIC_ID#>


Pode haver mais respostas a este t�pico, mas somente um e-mail � enviado por visita para cada t�pico assinado. Este � o m�ximo de e-mails que este f�rum envia � sua caixa de entrada.

Removendo a assinatura:
----------------------------

Voc� pode remover a assinatura a qualquer momento entrando no seu painel de controle e clicando no link "T�picos assinados".
EOF;

$SUBJECT['subs_new_topic'] = "Notifica��o de novo t�pico em f�rum assinado";

$EMAIL['subs_new_topic'] = <<<EOF
<#NAME#>,

<#POSTER#> acabou de postar um t�pico entitulado "<#TITLE#>" no f�rum "<#FORUM#>".

O t�pico pode ser visto aqui:
<#BOARD_ADDRESS#>?act=ST&f=<#FORUM_ID#>&t=<#TOPIC_ID#>


Para receber notifica��es a cada novo post neste t�pico voc� deve assin�-lo clicando no link "Assinar t�pico" exibido na visualiza��o do mesmo ou clicando no link a seguir:
<#BOARD_ADDRESS#>?act=Track&f=<#FORUM_ID#>&t=<#TOPIC_ID#>

Removendo a assinatura:
----------------------------

Voc� pode remover a assinatura a qualquer momento entrando no seu painel de controle e clicando no link "F�runs assinados".

EOF;

$SUBJECT['subs_no_post'] = "Topic Subscription Reply Notification";

$EMAIL['subs_no_post'] = <<<EOF
<#NAME#>,

<#POSTER#> acabou de postar uma resposta ao t�pico que voc� assinou, entitulado "<#TITLE#>".

O t�pico pode ser visto aqui:
<#BOARD_ADDRESS#>?act=ST&f=<#FORUM_ID#>&t=<#TOPIC_ID#>


Pode haver mais respostas a este t�pico, mas somente um e-mail � enviado por visita para cada t�pico assinado. Este � o m�ximo de e-mails que este f�rum envia � sua caixa de entrada.

Removendo a assinatura:
----------------------------

Voc� pode remover a assinatura a qualquer momento entrando no seu painel de controle e clicando no link "T�picos assinados".
EOF;

$EMAIL['email_member'] = <<<EOF
<#MEMBER_NAME#>,

<#FROM_NAME#> enviou-lhe este e-mail de <#BOARD_ADDRESS#>.


<#MESSAGE#>

---------------------------------------------------
Aviso: <#BOARD_NAME#> n�o tem
controle sobre o conte�do desta mensagem.
---------------------------------------------------

EOF;

$EMAIL['complete_reg'] = <<<EOF
Parab�ns!

Um administrador aceitou o seu pedido de registro ou altera��o de e-mail em <#BOARD_NAME#>. Voc� deve efetuar login com os dados escolhidos e acessar a sua conta completa em:
<#BOARD_ADDRESS#>

EOF;


?>