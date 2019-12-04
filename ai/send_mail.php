<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_MONETARY, 'de_DE');

if (isset($_POST["send_inquiry"])) {
    $message_text = "<u>Kundendaten:</u><br>
	<ul>
	<li>Vorname: " . $_POST['first_name'] . "</li>
	<li>Name: " . $_POST['last_name'] . "</li>
	<li>Telefonnummer: " . $_POST['phone_number'] . "</li>
	<li>Investmentsumme: " . $_POST['investment_sum'] . "</li>
	<li>E-Mail: " . $_POST['lead_email'] . "</li>
	<li>Nachricht: " . $_POST['lead_message'] . "</li>
	</ul><br>";

    mail($_POST['lead_mail'] . ", info@vbapps.co", "Neue Anfrage zu AMZ.Invest",
        "Sehr geehrter Kunde,<br><br>Sie haben eine Anfrage zu AMZ.Invest mit folgendem Inhalt: <b>" .
        $message_text . "</b> gesendet. <br><br>Das ist nur eine Kopie der Nachricht für Sie.
        <br><br>Mit freundlichen Grüßen,<br><br>Ihr AMZ.Invest-Team<br><br>", $headers);

}

?>