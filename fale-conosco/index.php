<?php
include_once('../include/head.php');
include_once('../include/nav.php');
?>
<section class="col-md-12">
	<div class="center">
		<h1 class="sub_titulo">FALE CONOSCO</h1>
		<p class="cinza">Curabitur quis lorem augue</p>
	</div>

	<form id="cadastro" name="cadastro" class="center">
		<div class="control-group">
			<input type="text" class="input_form" placeholder="Nome" id="nome" name="nome"/>
			<input type="text" class="input_form" placeholder="Assunto" id="assunto" name="assunto"/>
			<div class="clear"></div>
			<input type="text" class="input_form" id="telefone" name="telefone" placeholder="Telefone"/>
			<input type="text" class="input_form" placeholder="Email" id="email" name="email"/>
			<div class="clear"></div>
			<br/>
			<textarea rows="4" cols="41" class="textarea_form" placeholder="  Mensagem" id="mensagem" name="mensagem"></textarea>
		</div>
		<button class="btn-enviar" id="enviar_form" name="enviar_form" type="button">Enviar</button>
	</form>
	<br/>
	<div style="display: none;" id="sucesso_cadastro" class="sucesso_cadastro center">
		<p>Cadastro realizado com sucesso!</p>
	</div>
	<div style="display: none;" id="erro_cadastro" class="erro_cadastro center">
		<p>Ocorreu um erro tente novamente!</p>
	</div>
	<div class="center">
		<br/>
		<p class="p_email">contato@denisepolverini.com.br </p>
		<p class="p_email">+55 11 97486-8907 </p>
		<br/>
	</div>
</section>
<script src="http://denisepolverini.com.br/js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test($email);
	}

	$(function () {
		$('.trocar').hover(
				function () {
					$(this).children('.front').stop().animate({"top": '350px'}, 600); //Trabalha no hoverIn
				},
				function () {
					$(this).children('.front').stop().animate({"top": '0'}, 400); //Trabalha no hoverOut
				});
	});

	$(function ($) {
		$("#telefone").mask("(99) 9999-9999");

	});


	$("#enviar_form").click(function (event) {
		var nome = $("#nome").val();
		var assunto = $("#assunto").val();
		var telefone = $("#telefone").val();
		var email = $("#email").val();
		var mensagem = $("#mensagem").val();

		var erro = false;

		if (nome == '') {
			$("#nome").addClass("erro");
			erro = true;
		} else {
			$("#nome").removeClass("erro");
		}

		if (assunto == '') {
			$("#assunto").addClass("erro");
			erro = true;
		} else {
			$("#assunto").removeClass("erro");
		}

		if (telefone == '') {
			$("#telefone").addClass("erro");
			erro = true;
		} else {
			$("#telefone").removeClass("erro");
		}

		if (email == '') {
			$("#email").addClass("erro");
			erro = true;
		} else {
			$("#email").removeClass("erro");
		}

		if (erro == false) {
			$.ajax({
				type: "POST",
				url: "/cadastro/cadastro.php",
				data: {
					nome: nome,
					assunto: assunto,
					telefone: email,
					email: email,
					mensagem: mensagem
				},

				success: function (retorno) {
					if (retorno == 1) {
						$("input[type='text']").val('');
						$("#mensagem").val('');
						$("#sucesso_cadastro").show();
					} else {
						$("#erro_cadastro").show();
					}
				}
			});
		} else {
			return false;
		}

	});


</script>
<?php
include_once('../include/footer.php');
?>
