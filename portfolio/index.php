<?php
include_once('../include/head.php');
include_once('../include/nav.php');
?>

<section class="col-md-12">
	<div class="center">
		<h1>Portfolio</h1>
<!--		<p class="cinza">Curabitur quis lorem augue</p>-->
	</div>


	<br/><br/>
	<!--MINIATURAS PORTFOLIO-->
	<div class="icon-home">
		<div class="trocar">
			<div class="div_trocar"><a class="link" href="portfolio.php">Saiba mais</a></div>
			<div class="front" style="background-image: url('../imagens/home_min_1.jpg')"></div>
		</div>
		<div class="trocar">
			<div class="div_trocar"><a class="link" href="portfolio.php">Saiba mais</a></div>
			<div class="front" style="background-image: url('../imagens/home_min_2.jpg')"></div>
		</div>
		<div class="trocar">
			<div class="div_trocar"><a class="link" href="portfolio.php">Saiba mais</a></div>
			<div class="front" style="background-image: url('../imagens/home_min_3.jpg')"></div>
		</div>
		<div class="trocar">
			<div class="div_trocar"><a class="link" href="portfolio.php">Saiba mais</a></div>
			<div class="front" style="background-image: url('../imagens/home_min_4.jpg')"></div>
		</div>
	</div>
	<!--MINIATURAS PORTFOLIO-->


	<div class="clear"></div>

	<br/><br/><br/>


</section>

<script>
	$(function () {
		$('.trocar').hover(
				function () {
					$(this).children('.front').stop().animate({"top": '300px'}, 700); //Trabalha no hoverIn
				},
				function () {
					$(this).children('.front').stop().animate({"top": '0'}, 400); //Trabalha no hoverOut
				});
	});

</script>


<?php
include_once('../include/footer.php');
?>

