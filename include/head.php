<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Denise Polverini </title>

		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Jquery -->

		<!-- Bootstrap -->
		<link href="http://denisepolverini.com.br/css/bootstrap.css" rel="stylesheet">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- Bootstrap -->


		<link href="http://denisepolverini.com.br/css/style.css" rel="stylesheet">

		<script type="text/javascript">
			$(document).ready(function () {
				function filterPath(string) {
					return string
							.replace(/^\//, '')
							.replace(/(index|default).[a-zA-Z]{3,4}$/, '')
							.replace(/\/$/, '');
				}

				$('a[href*=#]').each(function () {
					if (filterPath(location.pathname) == filterPath(this.pathname)
							&& location.hostname == this.hostname
							&& this.hash.replace(/#/, '')) {
						var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) + ']');
						var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
						if ($target) {
							var targetOffset = $target.offset().top;
							$(this).click(function () {
								$('html, body').animate({scrollTop: targetOffset}, 400);
								return false;
							});
						}
					}
				});
			});
		</script>
	</head>