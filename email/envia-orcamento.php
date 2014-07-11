<!--
****************INSTRUÇÕES PARA USAR O ENVIA.PHP******************
******************************************************************
****CRIAR UM EMAIL NO DOMINIO CHAMADO smtp@seudominio.com.br******
****SENHA OBRIGATORIAMENTE DEVE SER: nachost4682****************** 
****PREENCHER MANUALMENTE O RAMO DA EMPRESA NA VAR $area**********
****em $mailer->AddAddress PREECHER COM O EMAIL DO DESTINATÁRIO***
******************************************************************
-->
<?php


//require_once('class.phpmailer-lite.php');
// require_once('class.phpmailer.php');

extract($_POST);

$site = str_replace("www.", "", $_SERVER['HTTP_HOST']);

if (!validaLocalEnvio($site)) {
	echo "Local de envio inválido<br /><a href=javascript:history.go(-1)>Clique aqui para Voltar</a> ou clique no Botão (Voltar) do seu navegador";
	exit;
}

if ($nome=="") { 
	echo "Favor Digitar o seu nome<br /><a href=javascript:history.go(-1)>Clique aqui para Voltar</a> ou clique no Botão (Voltar) do seu navegador";
	exit;
}

if ($email=="") {
	echo "Favor Digitar o seu email<br /><a href=javascript:history.go(-1)>Clique aqui para Voltar</a> ou clique no Botão (Voltar) do seu navegador";
	exit;
}

if (validaEmail($email)) {
	echo "Digite um email válido<br /><a href=javascript:history.go(-1)>Clique aqui para Voltar</a> ou clique no Botão (Voltar) do seu navegador";
	
	exit;
	
}

if (!validaDominio($email)) {
	echo "Digite um email válido<br /><a href=javascript:history.go(-1)>Clique aqui para Voltar</a> ou clique no Botão (Voltar) do seu navegador";
	exit;
}

if (($telefone=="") || ($telefone=="(  ) ____-____")) {
	echo "Favor Digitar o seu telefone<br /><a href=javascript:history.go(-1)>Clique aqui para Voltar</a> ou clique no Botão (Voltar) do seu navegador";
	exit;
}

$corpo = "Nome: $nome\n";
$corpo .= "Endereco: $endereco\n";
$corpo .= "Bairro: $bairro_orcamento\n";
$corpo .= "Cidade: $cidade\n";
$corpo .= "DDD: $ddd\n";
$corpo .= "Telefone: $telefone\n";
$corpo .= "Email: $email\n";
$corpo .= "Mensagem:\n";
$corpo .= "$mensagem\n";

//******************************************
$area = "Portoes"; //MODIFICAR AQUI - Digite o Ramo da Empresa exemplo: se o site for de uma Transportadora colocar no valor da variável "Transportes"
//******************************************


require_once('class.phpmailer.php');



$mailer = new PHPMailer();
$mailer->SetFrom($email,$nome);

//**************************************************************************
$mailer->AddAddress('vendas@galliport.com.br','Galliport'); //MODIFICAR AQUI - Digite o email para o qual o formulário deve ser enviado e o nome da Empresa
//***************************************************************************

$mailer->AddReplyTo($email,$nome);
$mailer->Subject = 'Orcamento Site '.$site;
$mailer->Body = "$corpo";
$corpo = utf8_decode($corpo);
if(!$mailer->Send())
{
echo "Mensagem não enviada";
echo "Mailer Error: " . $mailer->ErrorInfo; exit; }

// Redireciona para a página obrigado.html
/* header('Location: /obrigado.html'); */
// Descomente a linha abaixo e comente a linha acima caso a funcão header não funcione

echo '<script language= "JavaScript">

location.href="/obrigado.php"

</script>' ;


function validaDominio($email){
	$record = 'MX';
	list($user,$domain) = preg_split('/@/',$email);
    return checkdnsrr($domain,$record);
} 

function validaLocalEnvio($site){
	$url = str_replace("http://", "", getenv('HTTP_REFERER'));
	$url = str_replace("www.", "", $url);
	$pos = strpos($url, '/');
	$url = substr($url, 0, $pos);

	$ip1=gethostbyname($site);
	$ip2=gethostbyname($url);

	if ($ip1 != $ip2){
		return false;
	}
	else{
		return true;
	}
}

function validaEmail($email) {
$conta = "^[a-zA-Z0-9\._-]+@";
$domino = "[a-zA-Z0-9\._-]+.";
$extensao = "([a-zA-Z]{2,4})$";

$pattern = $conta.$domino.$extensao;

if (preg_match('/^$pattern/', $email))
return true;
else
return false;
}

?>