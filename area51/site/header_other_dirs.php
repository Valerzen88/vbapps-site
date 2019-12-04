
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

	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<script>
function change_lang(lang) {
	if(lang=='en'){
		location.replace("?lang=en_US");
	}
	else if(lang=='de'){
		location.replace("?lang=de_DE");
	}
	
}
</script>
</head>
<body>

<header role="banner" id="fh5co-header">
	<div class="fluid-container">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
			<!-- Mobile Toggle Menu Button -->
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" 
				data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
				<a class="navbar-brand" href="./../"><i class="icon-graph"></i> AreaFiftyOne Expert Advisor</a> 
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="./../" class="external"><span><?php echo t("Home");?></span></a></li>			
					<li><a href="./../#fh5co-services" class="external"><span><?php echo t("Produkt");?></span></a></li>
					<li><a href="./../#fh5co-pricing" class="external"><span><?php echo t("Preise");?></span></a></li>
					<li><a href="./../#fh5co-faq" class="external"><span><?php echo t("FAQ");?></span></a></li>
					<li><a href="./../#fh5co-aboutus" data-nav-section="about_us"><span><?php echo t("Über uns");?></span></a></li>
					<li class="call-to-action">
						<a class="external" style="border: 2px solid #088A29;background: #088A29;" href="./../#fh5co-pricing" data-nav-section="pricing">
						<span><?php echo t("Mieten");?></span></a></li>
					<!--<li class="call-to-action">
						<a class="external" style="border: 2px solid #00ADB5;background: #00ADB5;" href="users/manage_account.php">
						<span>Kundenlogin</span></a></li>-->
                    <div class="divglobal">
                    <button class="buttonFrance" ahref="lang"onclick="change_lang('en')">
                                <img src="images/en.png" class="drapoFrance">
                                <p class="plangues">EN</p>
                            </button>
        
                            <button class="buttonAllemagne" onclick="change_lang('de')">
                                <img src="images/de.png" class="drapoAllemagne" >
                                <p class="plangues">DE</p>
                            </button>
        
</div>
				</ul>
			</div>
		</nav>
	</div>
</header>