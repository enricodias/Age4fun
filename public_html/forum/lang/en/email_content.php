<?php


$EMAIL['header'] = <<<EOF

EOF;

$EMAIL['footer'] = <<<EOF
Abraços,

Equipe <#BOARD_NAME#>.
<#BOARD_ADDRESS#>

EOF;

$SUBJECT['pm_notify'] = "Você tem uma nova mensagem";

$EMAIL['pm_notify'] = <<<EOF
<#NAME#>,

<#POSTER#> enviou-lhe uma nova mensagem pessoal entitulada "<#TITLE#>".

Você pode ler esta mensagem seguindo o link abaixo:

<#BOARD_ADDRESS#><#LINK#>


EOF;

$EMAIL['send_text'] = <<<EOF
Eu achei que você poderia estar interessado em ler esta página da web:
<#THE LINK#>

Mensagem de <#USER NAME#>

EOF;

$EMAIL['report_post'] = <<<EOF
<#MOD_NAME#>,

Você recebeu este e-mail de <#USERNAME#> através do link "Denuncie este post a um moderador".

------------------------------------------------
Tópico: <#TOPIC#>
------------------------------------------------
Link para o post: <#LINK_TO_POST#>
------------------------------------------------
Denúncia:

<#REPORT#>

------------------------------------------------

EOF;

$EMAIL['pm_archive'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Suas mensagens arquivadas foram compiladas em um único arquivo o qual foi anexado à esta mensagem.
EOF;

$EMAIL['reg_validate'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Você recebeu este e-mail já que você usou este endereço durante o registro em nossos fóruns. Se você não se registrou nos nossos fóruns, desconsidere este e-mail. Você não precisa tomar nenhuma atitude.

------------------------------------------------
Instruções de ativação
------------------------------------------------

Obrigado por se registrar.
Nós exigimos que você "valide" o seu registro para ter certeza de que o endereço de e-mail fornecido estava correto. Isto nos protege contra SPAM e abusos maliciosos.

Para ativar a sua conta, simplesmente clique no link a seguir:

<#THE_LINK#>

(Usuários AOL devem copiar e colar o link no navegador.)

------------------------------------------------
Não funciona?
------------------------------------------------

Se o link não funcionou, visite a página a seguir:

<#MAN_LINK#>

E insira os dados a seguir:

ID do usuário: <#ID#>

Chave de validação: <#CODE#>

Copie e cole, ou digite estes números nos campos correspondentes do formulário.

Se você continua não conseguindo validar a sua conta, é possível que ela tenha sido removida. Neste caso contate um administrador e notifique o problema.

Obrigado por se registrar e aproveite o fórum!
EOF;

$EMAIL['admin_newuser'] = <<<EOF
Olá Admin!

Você recebeu este e-mail pois um novo usuário se registrou!

<#MEMBER_NAME#> completou o registro em <#DATE#>

Você pode desligar este recurso no AdminCP

Tenha um ótimo dia!
EOF;

$EMAIL['lost_pass'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Você recebeu este e-mail já que solicitou a recuperação de sua senha no fórum <#BOARD_NAME#>.

------------------------------------------------
IMPORTANTE!
------------------------------------------------

Se você não requisitou esta mudança de senha, IGNORE e REMOVA este e-mail imediatamente. Somente continue se você deseja que a sua senha seja zerada!

------------------------------------------------
Instruções de ativação
------------------------------------------------

Nós exigimos que você "valide" o seu pedido de recuperação de senha para ter certeza de que você solicitou esta ação. Isto nos protege contra SPAM e abusos maliciosos.

Clique no link abaixo e complete o resto do formulário:

<#THE_LINK#>

(Usuários AOL devem copiar e colar o link no navegador.)

------------------------------------------------
Não funciona?
------------------------------------------------

Se você não consegue validar esta requisição clicando no link, visite esta página:

<#MAN_LINK#>

E informe manualmente os dados abaixo:

ID do usuário: <#ID#>

Chave de validação: <#CODE#>

Copie e cole, ou digite estes numeros nos campos correspondentes do formulário.

------------------------------------------------
Continua não funcionando?
------------------------------------------------

Se você não consegue reativar a sua conta, é possível que ela tenha sido removida ou estar em outro processo de ativação, como registro ou troca de endereço de e-mail.
Neste caso, finalize as ativações anteriores.
Se o problema persistir, contate um administrador.


Endereço IP do visitante: <#IP_ADDRESS#>


EOF;

$EMAIL['newemail'] = <<<EOF
<#NAME#>,
Este e-mail foi enviado por <#BOARD_ADDRESS#>

Você recebeu este e-mail já que requisitou uma troca de e-mail.

------------------------------------------------
Instruções de ativação
------------------------------------------------

Nós exigimos que você "valide" a sua troca de endereço de e-mail para ter certeza de que você solicitou esta ação. Isto nos protege contra SPAM e abusos maliciosos.

Para ativar a sua conta, simplesmente clique no link a seguir:

<#THE_LINK#>

(Usuários AOL devem copiar e colar o link no navegador.)

------------------------------------------------
Não funciona?
------------------------------------------------

Se você não consegue validar esta requisição clicando no link, visite esta página:

<#MAN_LINK#>

E informe manualmente os dados abaixo:

ID do usuário: <#ID#>

Chave de validação: <#CODE#>

Copie e cole, ou digite estes numeros nos campos correspondentes do formulário.

Uma vez que a sua ativação for completada, você poderá precisar efetuar um novo login para atualizar as suas permissões de grupo.

------------------------------------------------
Continua não funcionando?
------------------------------------------------

Se você não consegue reativar a sua conta, é possível que ela tenha sido removida ou estar em outro processo de ativação, como registro ou troca de senha.
Neste caso, finalize as ativações anteriores.
Se o problema persistir, contate um administrador.


EOF;

$EMAIL['forward_page'] = <<<EOF
<#TO_NAME#>


<#THE_MESSAGE#>

---------------------------------------------------
Aviso: <#BOARD_NAME#> não tem
controle sobre o conteúdo desta mensagem.
---------------------------------------------------

EOF;

$SUBJECT['subs_with_post'] = "Notificação de resposta em tópico assinado";

$EMAIL['subs_with_post'] = <<<EOF
<#NAME#>,

<#POSTER#> acabou de postar uma resposta ao tópico que você assinou, entitulado "<#TITLE#>".

---------------------------------------------------------------------
<#POST#>
---------------------------------------------------------------------

O tópico pode ser visto aqui:
<#BOARD_ADDRESS#>?act=ST&f=<#FORUM_ID#>&t=<#TOPIC_ID#>


Pode haver mais respostas a este tópico, mas somente um e-mail é enviado por visita para cada tópico assinado. Este é o máximo de e-mails que este fórum envia à sua caixa de entrada.

Removendo a assinatura:
----------------------------

Você pode remover a assinatura a qualquer momento entrando no seu painel de controle e clicando no link "Tópicos assinados".
EOF;

$SUBJECT['subs_new_topic'] = "Notificação de novo tópico em fórum assinado";

$EMAIL['subs_new_topic'] = <<<EOF
<#NAME#>,

<#POSTER#> acabou de postar um tópico entitulado "<#TITLE#>" no fórum "<#FORUM#>".

O tópico pode ser visto aqui:
<#BOARD_ADDRESS#>?act=ST&f=<#FORUM_ID#>&t=<#TOPIC_ID#>


Para receber notificações a cada novo post neste tópico você deve assiná-lo clicando no link "Assinar tópico" exibido na visualização do mesmo ou clicando no link a seguir:
<#BOARD_ADDRESS#>?act=Track&f=<#FORUM_ID#>&t=<#TOPIC_ID#>

Removendo a assinatura:
----------------------------

Você pode remover a assinatura a qualquer momento entrando no seu painel de controle e clicando no link "Fóruns assinados".

EOF;

$SUBJECT['subs_no_post'] = "Topic Subscription Reply Notification";

$EMAIL['subs_no_post'] = <<<EOF
<#NAME#>,

<#POSTER#> acabou de postar uma resposta ao tópico que você assinou, entitulado "<#TITLE#>".

O tópico pode ser visto aqui:
<#BOARD_ADDRESS#>?act=ST&f=<#FORUM_ID#>&t=<#TOPIC_ID#>


Pode haver mais respostas a este tópico, mas somente um e-mail é enviado por visita para cada tópico assinado. Este é o máximo de e-mails que este fórum envia à sua caixa de entrada.

Removendo a assinatura:
----------------------------

Você pode remover a assinatura a qualquer momento entrando no seu painel de controle e clicando no link "Tópicos assinados".
EOF;

$EMAIL['email_member'] = <<<EOF
<#MEMBER_NAME#>,

<#FROM_NAME#> enviou-lhe este e-mail de <#BOARD_ADDRESS#>.


<#MESSAGE#>

---------------------------------------------------
Aviso: <#BOARD_NAME#> não tem
controle sobre o conteúdo desta mensagem.
---------------------------------------------------

EOF;

$EMAIL['complete_reg'] = <<<EOF
Parabéns!

Um administrador aceitou o seu pedido de registro ou alteração de e-mail em <#BOARD_NAME#>. Você deve efetuar login com os dados escolhidos e acessar a sua conta completa em:
<#BOARD_ADDRESS#>

EOF;


?>