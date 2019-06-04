
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="de">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo t(".:. AreaFiftyOne Handelsroboter von VBApps .:."); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="shortcut icon" href="favicon.ico">
	
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

<script src="js/slider.js"></script>


<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
	<header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="/"><i class="icon-graph"></i> <?php echo t("AreaFiftyOne Expert Advisor");?></a> 
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#" data-nav-section="home"><span><?php echo t("Home");?></span></a></li>			
						<li><a href="#" data-nav-section="services"><span><?php echo t("Produkt");?></span></a></li>
						<li><a href="#" data-nav-section="pricing"><span><?php echo t("Preise");?></span></a></li>
						<li><a href="#" data-nav-section="faq"><span><?php echo t("FAQ");?></span></a></li>
						<li><a href="#" data-nav-section="about_us"><span><?php echo t("Über uns");?></span></a></li>
						<li class="call-to-action">
							<a class="sign-up" style="border: 2px solid #088A29;background: #088A29;" href="#" data-nav-section="pricing">
							<span><?php echo t("Mieten");?></span></a></li>
						<li class="call-to-action">
							<a class="log-in" style="border: 2px solid #00ADB5;background: #00ADB5;" href="/users/manage_account.php">
							<span><?php echo t("Kundenlogin");?></span></a></li>
                        <div class="divglobal">
        
                            <button class="buttonFrance" ahref="lang" onclick="change_lang('en')">
                                <img src="images/en.png" class="drapoFrance">
                                <p class="plangues">EN</p>
                            </button>
        
                            <button class="buttonAllemagne" onclick="change_lang('de')">
                                <img src="images/de.png" class="drapoAllemagne" >
                                <p class="plangues">DE</p>
                            </button>
        <script>
function change_lang(lang) {
	if(lang=='en'){
		location.replace("?lang=en_US")
	}
	else if(lang=='de'){
		location.replace("?lang=de_DE")
	}
	
}
</script>

            </div>
					</ul>
				</div>
			</nav>
	  </div>
	</header>
	<section id="fh5co-home" data-section="home" style="background-image: url(images/full_image_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="gradient"></div>
		<div class="container">
            <div class="text-wrap">
				<div class="text-inner">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
                            <h1 class="to-animate"><span>AreaFiftyOne</span><?php echo t(" Expert Advisor");?></h1>
							<h2 class="to-animate"><?php echo t("für MQL4 Terminals mieten.");?></h2>
							<div class="call-to-action">
								<!--<a href="/users/manage_account.php" class="download to-animate"><i class="icon-login"></i><?php echo t(" Kundenlogin");?></a>
								<a href="#" data-nav-section="pricing" class="green to-animate"><i class="icon-user-follow"></i><?php echo t(" Mieten");?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
		<section id="fh5co-services" data-section="services">
		<div class="fh5co-services">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span><?php echo t("Über das Produkt");?></span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate"><?php echo t("Mit kleinen Schritten zum Ziel!");?></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-graph"></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("Devisenmarkt");?></h3>
								<p><?php echo t("Der Handelsroboter ist für eine Handvoll geprüfte Währungspaare, wie Euro/Dollar, Dollar/Schweizer Franken und andere, entworfen welche einen stabilen Zuwachs ohne großen Drawdowns ermöglichen*.");?></p>
							</div>
						</div>

						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-energy"></i></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("ECN-Account");?></h3>
								<p><?php echo t("Ein ");?><a href="https://alpari.com/en/faq/trading_terms/ecn_technology/"><?php echo t("ECN-Account");?></a><?php echo t(" mit kleinsten Spread wird empfohlen um die besten Ergebnisse erzielen zu können.");?></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-rocket"></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("Exponentielles Wachstum");?></h3>
								<p><?php echo t("Durch die automatische Anpassung der Lot-Größe ist ein exponentielles Wachstum möglich.");?><br><br><br><br></p>
							</div>
						</div>

						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-globe"></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("Virtueller Server");?></h3>
								<p><?php echo t("Ein virtueller Server mit einer kleinen Latenz zu Ihrem Broker wird empfohlen. Je schneller die Ausführung, desto besser für Sie!");?></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-wallet"></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("30% angestrebter Gewinn");?></h3>
								<p><?php echo t("Mit nur 2 Währungspaaren auf 4H Timeframe können Sie bis zu 30% der Anlagesumme erreichen.");?><br><br><br><br></p>
							</div>
						</div>

						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-support"></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("Neue Versionen");?></h3>
								<p><?php echo t("Während des Mietzeitraumes haben Sie einen Anspruch auf aktualisierte Versionen. Diese stehen Ihnen in Ihrem Kundenbereich zur Verfügung.");?></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-lock"></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("Sichere Abwicklung &amp; Transparenz");?></h3>
								<p><?php echo t("Sie können jederzeit über Ihren persönlichen Dashboard sich über den Stand Ihrer Einlage informieren und Transaktionen ausführen.");?><br><br></p>
							</div>
						</div>

						<div class="box-services">
							<div class="icon to-animate">
								<span><i class="icon-paper-plane"></i></span>
							</div>
							<div class="fh5co-post to-animate">
								<h3><?php echo t("E-Mail für Fragen");?></h3>
								<p><?php echo t("Sie können uns natürlich zu Fragen bzgl. des Produkts kontaktieren.");?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="core-features">
			<div class="grid2 to-animate" style="background-image: url(images/full_image_5.jpg);">
				<div class="col-md-12 section-heading text-center" style="position: relative;top: 50%;transform: translateY(-50%); ">
						<h2 class="to-animate"><span><?php echo t("Features");?></span></h2>
						</div>
			</div>
			<div class="grid2 fh5co-bg-color">
				<div class="core-f">
					<h2 class="to-animate"><?php echo t("Wichtigste Features im Überblick");?></h2>
					<div class="row">
						<div class="col-md-6">
							<div class="core">
								<i class="icon-like to-animate-2"></i>
								<div class="fh5co-post to-animate">
									<h3><?php echo t("Trendbestimmung");?></h3>
									<p><?php echo t("Sofern sich ein Trend bildet, wird der Expert Advisor eine Position öffnen und diese mit Stop Loss verfolgen.");?><br></p>
								</div>
							</div>
							<div class="core">
								<i class="icon-like to-animate-2"></i>
								<div class="fh5co-post to-animate">
									<h3><?php echo t("Mehrere Timeframes");?></h3>
									<p><?php echo t("Möglichkeit mehrere Timeframes eines Währungspaares zu benutzen, ermöglicht ein schnelleres Wachstum.");?></p>
								</div>
							</div>
							<div class="core">
								<i class="icon-like to-animate-2"></i>
								<div class="fh5co-post to-animate">
									<h3><?php echo t("Zwei Indikatoren");?></h3>
									<p><?php echo t("In dem Expert Advisor sind zwei Indikatoren eingebaut, welche gleichzeitig oder einzeln benutzt werden könnten.");?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="core">
								<i class="icon-like to-animate-2"></i>
								<div class="fh5co-post to-animate">
									<h3><?php echo t("Weniger ist mehr");?></h3>
									<p><?php echo t("Dadurch, dass der Expert Advisor auf höheren Timeframes genutzt wird, liegt die Rate der fehlerhaften Trades praktisch bei 0!");?></p>
								</div>
							</div>
							<div class="core">
								<i class="icon-like to-animate-2"></i>
								<div class="fh5co-post to-animate">
									<h3><?php echo t("Kalkulierbares Risiko");?></h3>
									<p><?php echo t("Es besteht die Möglichkeit entwerder mit einer festen Lot-Größe zu arbeiten oder mit einem prozentuallen Anteil der aktuell zur Verfügung stehen liquiden Mitteln.");?></p>
								</div>
							</div>
							<div class="core">
								<i class="icon-like to-animate-2"></i>
								<div class="fh5co-post to-animate">
									<h3><?php echo t("Jede Kontogröße");?></h3>
									<p><?php echo t("Das Produkt eignet sich für jede Kontogröße ab ca. 500€.");?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="fh5co-faq" class="fh5co-bg-color" data-section="faq">
		<div class="fh5co-faq">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span><?php echo t("Fragen");?></span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate"><?php echo t("Wir haben eine Sammlung der Fragen für Sie zusammengestellt.");?></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3><?php echo t("Kann man den Expert Advisor auf mehreren Währungspaaren gleichzeitig einsetzen?");?></h3>
								<p><?php echo t("Ja, der Expert Advisor ist nicht an bestimmte Währungspaare gebunden.");?></p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3><?php echo t("Bekomme ich eine Anleitung zur Einrichtung? ");?></h3>
								<p><?php echo t("Ja, in der Bestätigungs-E-Mail bekommen Sie eine Installationsroutine, welche den Experten in den entsprechenden Ordner bei Ihrem MetaTrader4-Terminal installiert und eine Anleitung im PDF-Format ablegt.");?></p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3><?php echo t("Welche Broker wird empfohlen?");?></h3>
								<p><?php echo t("Wir empfehlen einen ECN-Broker mit kleinen Spread z.B. ");?><a href="http://alpari-forex.com/en/?partner_id=1238918" target="_blank">
								Alpari</a><?php echo t(" oder ");?><a href="https://www.icmarkets.com/?camp=26550"  target="_blank" id="referal_link">IC Markets</a>.</p>
							</div>
						</div>
					</div>

					<!--<div class="col-md-6">
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>What language are available?</h3>
								<p>.</p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>Can I have a username that is already taken?</h3>
								<p>.</p>
							</div>
						</div>
						<div class="box-faq to-animate-2">
							<i class="icon-check2"></i>
							<div class="desc">
								<h3>Is Twist free?</h3>
								<p>.</p>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</section>

	<section id="fh5co-pricing" data-section="pricing">
		<div class="fh5co-pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span><?php echo t("Preise");?></span></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate"><?php echo t("Nachfolgend finden Sie die Preise für die Miete.");?></h3>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan"><?php echo t("Monatlich");?></h2>
							<div class="price"><sup class="currency">€</sup>40,60</div>
							<p><?php echo t("Optimal zum Reinschnuppern oder beim kleineren Depot.");?></p>
							<hr>
							<br>
							<p><a href="orderpage.php?orderCount=1" class="btn btn-primary"><?php echo t("bestellen");?></a></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="price-box to-animate">
							<h2 class="pricing-plan"><?php echo t("Quartalweise");?></h2>
							<div class="price"><sup class="currency">€</sup>103,60</div>
							<p><?php echo t("Für regelmäßige Zahler. ");?><font color="red">15%</font><?php echo t(" günstiger!");?></p>
							<hr>
							<br>
							<br>
							<p><a href="orderpage.php?orderCount=3" class="btn btn-primary"><?php echo t("bestellen");?></a></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 to-animate">
					<div class="price-box to-animate">
					<h2 class="pricing-plan"><?php echo t("Halbjährlich");?></h2>						
							<div class="price"><sup class="currency">€</sup>192</div>
							<p><?php echo t("Nur zwei Mal im Jahr zahlen und jeweils ");?><font color="red">20%</font><?php echo t(" sparen!");?></p>
							<hr>
							<br>
							<br>
							<p><a href="orderpage.php?orderCount=6" class="btn btn-primary"><?php echo t("bestellen");?></a></p>
							</div>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6">
					<div class="price-box popular">
						<div class="popular-text"><?php echo t("Bestes Angebot!");?></div>
						<div class="price-box to-animate">
							<h2 class="pricing-plan"><?php echo t("1 Jahr");?></h2>
							<div class="price"><sup class="currency">€</sup>350</div>
							<p><?php echo t("Nur einmal im Jahr zahlen und ");?><font color="red">28%</font> <?php echo t("sparen!");?></p>
							<hr>
							<p><a href="orderpage.php?orderCount=12" class="btn btn-primary"><?php echo t("bestellen");?></a></p>
						</div> 
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate"><span><?php echo t("Testen");?></span></h2>
					</div>
					<div class="col-md-12 col-md-offset-1 to-animate">
						<p><?php echo t("Möchten Sie vor dem Kauf den AreaFiftyOne Expert Advisor in Ihrem MetaTrader4-Terminal Strategie Tester ausprobieren? ");?><a href="produkt_test.php"><?php echo t("Ehrfahren Sie hier mehr.");?></a></p>
					</div>
				</div>

			</div>
		</div>
	</section>
	
	<!-- FOOTER -->
	<section id="fh5co-services" data-section="about_us">
		<div id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-4 to-animate">
					<h3 class="section-title"><?php echo t("Über uns");?></h3>
					<p><?php echo t("AreaFiftyOne Expert Advisor ist ein von uns entworfenes deutsches Qualitätsprodukt. Dieses Produkt wird mit Bedacht entwickelt und getestet.");?></p>
					<p class="copy-right">&copy; 2017 VBApps <br><?php echo t("Alle Rechte vorbehalten.");?><br></p>
				</div>

				<div class="col-md-4 to-animate">
					<h3 class="section-title"><?php echo t("Unsere Adresse");?></h3>
					<ul class="contact-info">
						<li><i class="icon-map-marker"></i>VBApps<br>Jahnstr. 17<br>D-85276 Pfaffenhofen</li>
						<li><i class="icon-envelope"></i><a href="mailto:info@vbapps.co">info@vbapps.co</a></li>
						<li><i class="icon-globe2"></i><a href="/">vbapps.co</a></li>
					</ul>
				</div>
				<div class="col-md-4 to-animate">
					<h3 class="section-title"><?php echo t("Rechtliches");?></h3>
					<ul class="contact-info">
						<li><a href="impressum.php" class="dribbble"><i class="icon-pin"></i><?php echo t("Impressum");?></a></li>
						<li><a href="dataprotectin.php" class="github"><i class="icon-pin"></i><?php echo t("Datenschutz");?></a></li>
						<li><a href="termsofuse.php" class="github"><i class="icon-pin"></i><?php echo t("AGB");?></a></li>
					</ul>
				</div>
				<div class="col-md-4 to-animate">
					<h3 class="section-title"><?php echo t("Nachricht hinterlassen:");?></h3>
					<form class="contact-form" action="send_mail.php" method="post">
						<div class="form-group">
							<label for="name" class="sr-only"><?php echo t("Vor- und Nachname");?></label>
							<input type="name" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">E-Mail</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="message" class="sr-only"><?php echo t("Nachricht");?></label>
							<textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
						</div>
					</form>
				</div>
			</div>
			<div style="font-size:10px;"><?php echo t("Risikohinweis: Der Handel mit Differenzkontrakten (CFDs) birgt ein hohes Risiko für Ihr eingesetztes Kapital. Verwenden Sie daher nur Gelder, deren Verlust Sie sich auch leisten können. Da diese Produkte nicht für alle Anleger geeignet sind, stellen Sie bitte sicher, dass Sie die damit verbundenen Risiken vollkommen verstanden haben und lassen Sie sich gegebenenfalls von unabhängiger Seite beraten. Anlageerfolge der Vergangenheit garantieren keine Erfolge in der Zukunft.");?></div>
		</div>
	</div>
	</section>
	<!-- FOOTER END -->
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

</body>
</html>