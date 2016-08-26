<?php

$conexao = @mysql_connect('mysql.denisepolverini.com.br', 'denisepolverin', 't00016110962');
@mysql_select_db("denisepolverin", $conexao);
@mysql_query("SET NAMES 'utf8'");
@mysql_query('SET character_set_connection=utf8');
@mysql_query('SET character_set_client=utf8');
@mysql_query('SET character_set_results=utf8');

date_default_timezone_set('America/Sao_Paulo');

if ($_POST) {

	$nome = strip_tags($_POST['nome']);
	$assunto = strip_tags($_POST['assunto']);
	$telefone = trim(strip_tags($_POST['telefone']));
	$email = trim(strip_tags($_POST['email']));
	$mensagem = strip_tags($_POST['mensagem']);

	$dataCadastro = date('Y-m-d H:i:s');


	$queryInserir = "INSERT INTO mailing
    (
    nome,
    assunto,
    telefone,
    email,
    mensagem,
    data_cadastro)
VALUES (
    '" . $nome . "',
    '" . $assunto . "',
    '" . $telefone . "',
    '" . $email . "',
    '" . $mensagem . "',
    '" . $dataCadastro . "');";

	$resultInsert = mysql_query($queryInserir);

	if ($resultInsert) {


		$email_remetente = "disparo@denisepolverini.com.br"; // deve ser uma conta de email do seu dominio


		$email_destinatario = "contato@denisepolverini.com.br"; // pode ser qualquer email que receberá as mensagens
		$email_reply = "$email";
		$email_assunto = "Contato - Denise Polverini"; // Este será o assunto da mensagem


		$email_conteudo = "Contato - Denise Polverini \n";
		$email_conteudo = "Nome : $nome \n";
		$email_conteudo .= "Assunto : $assunto \n";
		$email_conteudo .= "Telefone : $telefone \n";
		$email_conteudo .= "Email : $email \n";
		$email_conteudo .= "Mensagem : $mensagem \n";

		$email_headers = implode("\n", array("From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

		if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)) {
			echo 1;
		} else {
			echo 0;
		}

	}
}
?>