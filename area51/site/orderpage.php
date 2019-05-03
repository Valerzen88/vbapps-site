<?php include('header_other_dirs.html'); ?>

	<section id="fh5co-home" style="height:930px;padding-top:50px;" data-section="order">
		<div class="core-features">
			<div class="grid2 to-animate" style="background-image: url(images/full_image_5.jpg);">
				<div class="col-md-12 section-heading text-center" style="position: relative;top: 50%;transform: translateY(-50%); ">
					<h2 class="to-animate"><span>Bestellen</span></h2>
				</div>
			</div>
			<div class="grid2 fh5co-bg-color">
				<div class="core-f">
					<h2 class="to-animate">Angaben</h2>
			<form class="contact-form" action="manageorder.php" method="post">
				<div class="form-group">
					<label for="orderCount" class="sr-only">Anzahl der Monate</label>
					<select name="orderCount" class="form-control" id="orderCount" required>
						<option value=1 <?php if ($_GET['orderCount'] == 1) echo 'selected="selected"'; ?>>1 Monat</option>
						<option value=3 <?php if ($_GET['orderCount'] == 3) echo 'selected="selected"'; ?>>3 Monate</option>
						<option value=6 <?php if ($_GET['orderCount'] == 6) echo 'selected="selected"'; ?>>6 Monate</option>
						<option value=12 <?php if ($_GET['orderCount'] == 12) echo 'selected="selected"'; ?>>12 Monate</option>
						<option value=24 <?php if ($_GET['orderCount'] == 24) echo 'selected="selected"'; ?>>24 Monate</option>
						<option value=36 <?php if ($_GET['orderCount'] == 36) echo 'selected="selected"'; ?>>36 Monate</option>
						<option value=48 <?php if ($_GET['orderCount'] == 48) echo 'selected="selected"'; ?>>48 Monate</option>
					</select>
				</div>
				<p style="color:black;">Bitte geben Sie in das folgende Feld den Namen des Metatrader4-Kontobesitzers (wie im Terminal angezeigt) an. 
				Dieser Name wird in der Lizenz verwendet.</p>
				<div class="form-group">
					<label for="mt4_name" class="sr-only">Vor- und Nachname des Metatrader4-Kontoinhabers</label>
					<input type="name" required class="form-control" name="mt4_name" id="name" maxlength="150" placeholder="Vor- und Nachname des MT4-Kontobesitzers">
				</div>
				<div class="form-group">
					<label for="name" class="sr-only">Vor- und Nachname für die Rechnung</label>
					<input type="name" required class="form-control" name="name_billing" id="name" maxlength="150" placeholder="Vor- und Nachname für die Rechung">
				</div>
				<div class="form-group">
					<label for="street" class="sr-only">Straße</label>
					<input type="text" required class="form-control" id="street" name="street" maxlength="150" placeholder="Straße">
				</div>
				<div class="form-group">
					<label for="postcode" class="sr-only">PLZ</label>
					<input type="text" required class="form-control" id="postcode" name="postcode" maxlength="8" placeholder="PLZ">
				</div>
				<div class="form-group">
					<label for="location" class="sr-only">Ort</label>
					<input type="text" required class="form-control" id="location" name="location" placeholder="Ort" maxlength="150">
				</div>
				<div class="form-group">
					<label for="country" class="sr-only">Land</label>
					<select name="country" class="form-control" id="country" required placeholder="Land">
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
					<label for="customer_email" class="sr-only">E-Mail</label>
					<input type="email" required class="form-control" id="customer_email" name="customer_email" maxlength="150" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="mt4_account" class="sr-only">Metatrader4-Kontonummer</label>
					<input type="number" required class="form-control" id="mt4_account" name="mt4_account" min="0" step="1" max="999999999" placeholder="Metatrader4-Kontonummer">
				</div>
				<input type="hidden" name="s_p_a_m_c_h_e_c_k" value="">
				<!--<div class="form-group">
					<label for="agb_accept" class="sr-only">Bestellbedienungen</label>
					<p><input type="checkbox" required id="agb_accept" value="false"><font color="black">&nbsp;Das oben ausgewählte Abo verlängert sich automatisch um jeweils einen Monat, wenn vor Ablauf der Bezugsperiode keine Kündigung eingeht.&nbsp;<b>Ich habe die oben angegebenen Bestellbedingungen gelesen und akzeptiert.</b></input></font></p>
				</div>-->
				<div class="form-group">
					<label for="revocation" class="sr-only">Widerruf</label>
					<p><input type="checkbox" required id="revocation" value="false"><font color="black">&nbsp;Ich habe das Recht, diese Bestellung innerhalb von 14 Tagen ohne Angaben von Gründen,
					beginnend einen Tag nach Datum meiner Bestellung, schriftlich per E-Mail 
					an <a href='mailto:widerruf@vbapps.co'><font color="black">widerruf@vbapps.co</font></a> zu widerrufen. 
					Zur Wahrung der Frist genügt die rechtzeitige Absendung des Widerrufs.</font></input></p>
				</div>
				<div class="form-group">
					<label for="btn-submit_paypal" class="sr-only">Verbindlich kaufen über PayPal</label>
					<button type="submit" id="btn-submit_paypal" name="btn-submit_paypal" style="background-color:transparent; border-color:transparent;">
					<img src="pp/checkout-logo-large-de.png"/>(<font color="black">(+2% PayPal-Gebühr)</font></button> 
					<font color="black"><b>&nbsp;oder&nbsp;</b></font>
					<label for="btn-submit_bank_transfer" class="sr-only">Überweisungsdaten anfordern</label>
					<input type="submit" id="btn-submit_bank_transfer" style="background: #FA5555 !important;" name="submit_bank_transfer" 
					class="btn btn-send-message btn-md" style="background-color:blue;color:black;" value="Überweisungsdaten">
				</div>
			</form>
			</div>
			</div>
		</div>
	</section>

<?php include('footer_other_dirs.html'); ?>