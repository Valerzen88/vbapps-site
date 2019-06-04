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