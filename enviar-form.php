<?php
$date = date("d/m/Y h:i");
// ****** ATENÇÃO ********
// ABAIXO ESTÁ A CONFIGURAÇÃO DO SEU FORMULÁRIO.
// ****** ATENÇÃO ********

$destino = 'zekromg@gmail.com'; //

$nome = isset( $_POST['nome'] ) ? $_POST['nome'] : false;
$telefone = isset( $_POST['telefone'] ) ? $_POST['telefone'] : false;
$email = isset( $_POST['e-mail'] ) ? $_POST['e-mail'] : false;
$site = isset( $_POST['site'] ) ? $_POST['site'] : false;

// if (isset($_POST['g-recaptcha-response'])) {
//     $captcha_data = $_POST['g-recaptcha-response'];
// }

// // Se nenhum valor foi recebido, o usuário não realizou o captcha
// if (!$captcha_data) {
//     echo "<script>alert('Por favor, confirme o captcha! (Selecione a caixa: Não sou um robô) ');</script>";
//     echo "<script>javascript:window.location='../index.php#contato';</script>";
//     exit;
// }

// $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeW8hwUAAAAAM7G570kKQu0qvnI7rpE8LFNLF0t&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);

$nome_enviado = $nome;
$email_enviado = $email;

//CABEÇALHO - ONFIGURAÇÕES SOBRE SEUS DADOS E SEU WEBSITE
$nome_do_site="Landing Page Sinnapse";
$email_para_onde_vai_a_mensagem = "zekromg@gmail.com";
$nome_de_quem_recebe_a_mensagem = "Sinnapse";
// $exibir_apos_enviar='rw-send.php';

//MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
$headers  = "MIME-Version: 1.0 \n";
$headers .= utf8_decode("From: $nome <$email> \n");
$headers .= "Content-type: text/html; charset=utf-8 \n";

$assunto_da_mensagem_original="Cadastro para EFD-REINF";

// FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
$configuracao_da_mensagem_original="

<html>
<head>
 <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
 <title></title>
</head>
<body style='font: normal 18px Lato; font-weight: 300;'>

  <table border='0' cellpadding='3' cellspacing='3' style='font: normal 18px Lato; font-weight: 300;'>
    <tr>
      <td colspan='2'><strong>Nome:</strong> $nome</td>
    </tr>
    <tr>
      <td colspan='2'><strong>Telefone:</strong> $telefone</td>
    </tr>
    <tr>
      <td colspan='2'><strong>E-mail:</strong> $email</td>
    </tr>
    <tr>
      <td colspan='2'><strong>Site:</strong> $site</td>
    </tr>
  </table>
</body>
</html>
";


// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE NÃO ALTERE O SCRIPT PARA QUE O SISTEMA FINCIONE CORRETAMENTE
// ****** IMPORTANTE ********

//ESSA VARIAVEL DEFINE SE É O USUARIO QUEM DIGITA O ASSUNTO OU SE DEVE ASSUMIR O ASSUNTO DEFINIDO
//POR VOCÊ CASO O USUARIO DEFINA O ASSUNTO PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME
//'assunto' NO FORMULARIO DE ENVIO
$assunto_digitado_pelo_usuario="s";

// //ENVIO DA MENSAGEM ORIGINAL
if ($assunto_digitado_pelo_usuario=="n")
{
$assunto = utf8_decode("$assunto_da_mensagem_original");
}
$destino = "$email_para_onde_vai_a_mensagem";
$mensagem = "$configuracao_da_mensagem_original";

if(mail($destino,$assunto,$mensagem,$headers)){
  header("Location: ");
 die();
}
else{
  echo "email nao enviado";
}

?>