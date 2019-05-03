<?php
include('header_other_dirs.html');
?>
	<section id="fh5co-home" style="height:650px;padding-top:50px;" data-section="order_test">
		<div class="core-features">
			<div class="grid2 to-animate" style="background-image: url(images/full_image_5.jpg);">
				<div class="col-md-12 section-heading text-center" style="position: relative;top: 50%;transform: translateY(-50%); ">
					<h2 class="to-animate"><span>14 Tage testen</span></h2>
				</div>
			</div>
			<div class="grid2 fh5co-bg-color">
				<div class="core-f">
					<h2 class="to-animate">Angaben</h2>
			<form class="contact-form" action="manageorder.php" method="post">
				<div class="form-group">
					<label for="name" class="sr-only">Vor- und Nachname</label>
					<input type="text" class="form-control" id="name" name="mt4_name" required placeholder="Vor- und Nachname">
				</div>
				<div class="form-group">
					<label for="street" class="sr-only">Straße</label>
					<input type="text" class="form-control" id="street" name="street" required placeholder="Straße">
				</div>
				<div class="form-group">
					<label for="plz" class="sr-only">PLZ</label>
					<input type="text" class="form-control" id="postcode" name="postcode" required placeholder="PLZ">
				</div>
				<div class="form-group">
					<label for="location" class="sr-only">Ort</label>
					<input type="text" class="form-control" id="location" name="location" required placeholder="Ort">
				</div>
				<div class="form-group">
					<label for="country" class="sr-only">Land</label>
					<select name="country" class="form-control" id="country" name="country" required placeholder="Land">
						<?php
						include("countries.php");
						$lang = strtoupper(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
						foreach($countries as $key => $country) {	
							$selected = "";
							if ($lang !== null && $lang !== "" && $lang === $key) {
								$selected = " selected='selected'";
							}
							if ($country['nativetongue'] !== '') {
								echo "<option value='".$key."'".$selected.">".$country['name']." (".$country['nativetongue'].")</option>";
							} else {
								echo "<option value='".$key."'".$selected.">".$country['name']."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="email" class="sr-only">E-Mail</label>
					<input type="email" class="form-control" id="email" name="customer_email" required placeholder="Email">
				</div>
				<div class="form-group">
					<label for="message" class="sr-only">Metatrader4-Kontonummer</label>
					<input type="number" name="mt4_account" class="form-control" id="message" min="0" step="1" max="999999999" maxlength="10" required placeholder="Metatrader4-Kontonummer"></textarea>
				</div>
				<div class="form-group">
					<label for="btn-submit_test" class="sr-only">Anfragen</label>
					<input type="submit" style="background: #FA5555 !important;" id="btn-submit_test" name="getTrialVersion" class="btn btn-send-message btn-md" value="Anfragen"> 
				</div>
			</form>
			</div>
			</div>
		</div>
	</section>
<?php	
include('footer_other_dirs.html');
?>