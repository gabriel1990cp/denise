<?php
include_once('include/head.php');
include_once('include/nav.php');
?>
<section class="col-md-12">
	<div class="center">
		<h1>Portfolio</h1>

	</div>

	<br/><br/>
</section>

<!--MINIATURAS PORTFOLIO-->
<div class="icon-home">
	<div class="trocar">
		<div class="div_trocar"><a class="link" href="portfolio/portfolio.php">Saiba mais</a></div>
		<div class="front" style="background-image: url('imagens/home_min_1.jpg')"></div>
	</div>
	<div class="trocar">
		<div class="div_trocar"><a class="link" href="portfolio/portfolio.php">Saiba mais</a></div>
		<div class="front" style="background-image: url('imagens/home_min_2.jpg')"></div>
	</div>
	<div class="trocar">
		<div class="div_trocar"><a class="link" href="portfolio/portfolio.php">Saiba mais</a></div>
		<div class="front" style="background-image: url('imagens/home_min_3.jpg')"></div>
	</div>
	<div class="trocar">
		<div class="div_trocar"><a class="link" href="portfolio/portfolio.php">Saiba mais</a></div>
		<div class="front" style="background-image: url('imagens/home_min_4.jpg')"></div>
	</div>
</div>
<!--MINIATURAS PORTFOLIO-->

<div class="clear"></div>

<section class="col-md-12">
	<br/><br/>

	<div class="center">
		<h2 class="sub_titulo center-block">SOBRE</h2>
		<p class="cinza center-block">Denise Polverini</p>
	</div>

	<br/>

	<div>
		<img class="img-responsive center-block img_mobile_home" src="imagens/home_2.jpg" alt="Denise Polverini" width="300" height="353">
	</div>

	<br/>

	<div class="texto_home">
		<p class="cor-texto">Meu nome é Denise Polverini, sou formada em Administração de Empresas e Design de Interiores pela Escola Panamericana de Artes, com esse conhecimento que adquiri, tive muitas experiências com a área de Design de Interiores e com as viagens internacionais que fiz.</p>
		<p class="cor-texto">Já fiz parceria com arquitetos renomados na área, que possuem 20 anos de experiência no mercado.
			Meus projetos visam atender meus clientes com o objetivo de satisfazê-los e surpreendê-los, com qualidade e respeito, porque para mim, cada cliente é único e especial.</p>
	</div>

	<div id="efeito_sobre" style="margin-top: 170px; display: none"></div>

	<div class="transparente">
		<button class="btn-padrao center-block">Leia mais</button>
		<br/><br/>
		<div>
			<div class="center">
				<h3 class="sub_titulo">FALE CONOSCO</h3>
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
		</div>
	</div>
</section>

<div class="center">
	<br/>
	<p class="cinza">Curabitur quis lorem augue phasellus sit amet sagittis: </p>
	<p class="p_email">contato@denisepolverini.com.br </p>
	<p class="p_email">+55 11 97486-8907 </p>
	<br/>
</div>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
	$(".btn-padrao").click(function () {
		$("#efeito_sobre").show(800);
	});

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
		}else {
			$("#nome").removeClass("erro");
		}

		if (assunto == '') {
			$("#assunto").addClass("erro");
			erro = true;
		}else
		{
			$("#assunto").removeClass("erro");
		}

		if (telefone == '') {
			$("#telefone").addClass("erro");
			erro = true;
		}else
		{
			$("#telefone").removeClass("erro");
		}

		if (email == '') {
			$("#email").addClass("erro");
			erro = true;
		}else
		{
			$("#email").removeClass("erro");
		}

		if (erro == false) {
			$.ajax({
				type: "POST",
				url: "cadastro/cadastro.php",
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
include_once('include/footer.php');
?>

