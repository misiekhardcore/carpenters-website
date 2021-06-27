<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Meble Na Wymiar Płońsk - Kuchnie, Garderoby, Szafy i Inne | Meblekonopski.pl</title>
	<meta name="description" content="Meble na wymiar w Płońsku. Kuchnie, garderoby, szafy wnękowe i inne. Profesjonalnie, szybko, tanio. Zapoznaj się z ofertą i zobacz realizacje.">
	<script type="application/ld+json">
	{
	  "@context" : "http://schema.org",
	  "@type" : "LocalBusiness",
	  "name" : "Meble na wymiar",
	  "image" : "https://meblekonopski.pl/img/logo.svg",
	  "telephone" : "+48 884 195 984",
	  "email" : "konopek360@wp.pl"
	}
	</script>

	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32">

	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/lightgallery.css">
	<link href="css/lg-transitions.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174135624-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174135624-1');
</script>



</head>
<body class="">
	<header class="navbar">
		<a href="#"><img src="img/logo.svg" alt="" class="logo"></a>
		<nav class="nav">
			<ul class="nav__list">
				<li class="nav__link"><a href="#home">Start</a></li>
				<li class="nav__link"><a href="#offer">Oferta</a></li>
				<li class="nav__link"><a href="#portfolio">Realizacje</a></li>
				<li class="nav__link"><a href="#contact">Kontakt</a></li>
			</ul>
		</nav>
		<button class="nav-toggle">
			<span class="hamburger"></span>
		</button>
	</header>
	<main>
		<section class="welcome" id="home">
			<div class="container">
			<h1 class="title">Meble na wymiar</h1>
			<p class="subtitle">Marzą Ci się nowe meble, które idealnie wpasują się w dostępną w Twoim domu przestrzeń? W takim razie jesteś w dobrych rękach! Od pomiaru aż do finalnego montażu w Twoim domu! Piękne, stylowe meble na wymiar - takie jakich potrzebujesz.</p>
			<div class="buttons">
				<a href="#offer" class="button button-primary">Zobacz ofertę</a>
				<a href="#portfolio" class="button button-secondary">Realizacje</a>
			</div>
		</div>
		</section>

		<section class="offer" id="offer">
			<div class="container">
				<h2 class="title h1">Oferta</h2>
				<div class="items">
					<div class="item">
						<h3 class="h2">Kuchnie</h3>
						<p>Piękne ale przede wszystkim użytkowe. Idealnie dopasowane i wyposażone dokładnie tak jak tego potrzebujesz.</p>
					</div>
					<div class="item">
						<h3 class="h2">Garderoby</h3>
						<p>Dobrze przemyślana i funkcjonalna – taka powinna być garderoba, aby wszystko się zmieściło i miało swoje miejsce i taka właśnie będzie.</p>
					</div>
					<div class="item">
						<h3 class="h2">Szafy wnękowe</h3>
						<p>Drążki, wieszaki, szuflady, koszyki. Drzwi otwierane czy przesuwne? Cokolwiek zechcesz może się znaleźć w Twojej nowej szafie.</p>
					</div>
					<div class="item">
						<h3 class="h2">I inne...</h3>
						<p>Interesują Cię inne, pojedyncze, wolnostojące meble lub zabudowa? To także nie problem. </p>
					</div>
				</div>
			</div>
		</section>

		<section class="portfolio" id="portfolio">
			<div class="container">
				<h2 class="title h1">Realizacje</h2>
				<div class="gallery">
					<ul id="gallery1">
					<div class="row">
						<?php
							@include_once "includes/dbh.inc.php";

							$sql = "SELECT * FROM gallery ORDER BY idGallery ASC";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)){
								echo "SQL statement fail1";
								exit();
							} else{
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);
								
								$rowCount = mysqli_num_rows($result);
								$count = 0;
								while($row = mysqli_fetch_assoc($result)){
									if($count == (ceil($rowCount/2))){
										echo '</div>
										<div class="row">';
									}									

									echo '<li data-src="img/'.$row['imgFullNameGallery'].'">
									<picture>
  									<source type="image/webp" data-srcset="img/img-thumbs/'.$row['orderGallery'].'.webp">
  									<source type="image/jpeg" data-srcset="img/img-thumbs/'.$row['imgFullNameGallery'].'">
									<img class="lazyload" data-src="img/img-thumbs/'.$row['imgFullNameGallery'].'" alt="'.$row['descGallery'].'" />
									</picture>
									</li>';
									$count = $count + 1;
								}
							}	
						?>
						</div>
					  </ul>
				</div>
			</div>

			</div>
		</section>

		<section class="contact" id="contact">
			<div class="container">
				<h2 class="title h1">Kontakt</h1>
					<div class="info">
						<h4>Skontaktuj się przez:</h4>
						<p><i class="fa fa-phone" aria-hidden="true"></i>
							tel.: +48 884 195 984</p>
						<p><i class="fa fa-envelope" aria-hidden="true"></i>
							e-mail: <a href="mailto:">konopek360@wp.pl</a></p>
					</div>
				<form method="POST" action="email.php" class="contact-form">
					<h4>...lub skorzystaj z formularza kontaktowego:</h4>
					<div class="inputs">
						<label for="email">Twój e-mail:
							<input type="email" id="email" name="email" required>
						</label>
						<label for="topic">Temat (dopisz swój numer telefonu):
							<input type="text" id="topic" name="topic" required>
						</label>
					</div>
					<label for="text">Treść wiadomości:
						<textarea name="text" id="text" required></textarea>
					</label>
					<button class="button button-primary" type="submit">Wyślij wiadomość</button>
				</form>
			</div>
		</section>
	</main>

	<footer>
		<p>Copyright ©  <?php echo date("Y")?> Michał Konopski</p>
	</footer>

	<script src="js/nav.js" async></script>
	<script src="js/lightgallery.min.js"></script>
	<script src="js/lg-fullscreen.min.js"></script>
	<script src="js/script.js" async></script>
	<script src="js/lazyload.min.js" async></script>
</body>
</html>
