<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
//TODO: 
//	- Check if params are not empty or not complete -> history back
//	- Get params of order and save it to DB
// 	- Check params for validation
//	- Copy&Rename MQL CodePage of AreaFiftyOne with order params
//	- Set license params in the new file
//	- Generate new .ex4
//	- Send E-Mail to customer and me
//	- Set info in DB, that product was sent

setlocale(LC_MONETARY, 'de_DE');
$priceArr = array(1 => 40.6, 3 => 103.6, 6 => 192, 12 => 350, 24 => 740.54, 36 => 935.42, 48 => 1236);

$totalPrice = toMoney($priceArr[$_POST['orderCount']],"€");

//echo $priceArr[$_POST['orderCount']];
include('header_other_dirs.html');
$reference = "RF".time()."_".$_POST['orderCount'];

if (isset($_POST["submit_bank_transfer"])) {
	$headers = 'From: payment@vbapps.co' . "\r\n" .
    'Reply-To: payment@vbapps.co' . "\r\n" .
	// To send HTML mail, the Content-type header must be set
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	if($_POST['orderCount']==1) {
	$month_amount_text = $_POST['orderCount']." Monat";}
	else {$month_amount_text = $_POST['orderCount']." Monate";}

mail($_POST['customer_email'].", info@vbapps.co","AreaFiftyOne Expert Advisor Miete",
	"Sehr geehrter Kunde,<br><br>Sie haben den AreaFiftyOne Expert Advisor für <b>".
	$month_amount_text."</b> erworben. Bitte überweisen Sie folgenden Betrag <u>".
	$totalPrice."</u> and das unten angegebene Konto mit der Referenz. Die Software wird an die E-Mail-Addresse nach der Eingang der Zahlung versendet.<br><br>
	<u>Ihre Daten:</u><br>
	<ul>
	<li>Metatrader-Account: ".$_POST['mt4_account']."</li>
	<li>Metatrader-Kontoinhaber: ".$_POST['mt4_name']."</li>
	</ul>
	<ul>
	<li>Vor- und Nachname: ".$_POST['name_billing']."</li>
	<li>Straße: ".$_POST['street']."</li>
	<li>Ort: ".$_POST['location']."</li>
	<li>PLZ: ".$_POST['postcode']."</li>
	<li>Land: ".$_POST['country']."</li>
	</ul>
	<br>
	Bei Fragen kontaktieren Sie uns unter info@vbapps.co.<br><br>
	<u>Kontodaten</u><br>Kontonummer: DE36 2009 0500 0002 6562 21<br>BIC: GENODEF1S15<br>Empfänger: VBApps<br>Verwendungszweck: ".$reference."<br>
	<br><br>Mit freundlichen Grüßen<br>Ihr VBApps Team", $headers);

?>
<section id='fh5co-home' style='background-image: url(images/full_image_3.jpg);' 
data-section='manageorder' data-stellar-background-ratio='0.5'>
	<div class='gradient'></div>
		<div class='container'>
			<div class='text-wrap'>
				<div class='text-inner'>
					<div class='row'>
						<div class='col-md-8 col-md-offset-2 text-center'>
							<h1 class='to-animate'><span>Sehr geehrter Kunde,</span></h1><h2>vielen Dank für Ihre Bestellung. Ihre Bestellung ist bei uns eingegangen und 
								wird derzeit verarbeitet. Anschließnd erhalten Sie die Überweisungsdaten. Bitte überprüfen Sie Ihren Postfach.</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
} else if (isset($_POST['getTrialVersion'])) {
	$name = "AreaFiftyOne_trial_".time();
	$source='../Temp/AreaFiftyOne_orig.mq4';
	$target='../Temp/'.$name.'.mq4';

	// copy operation
	$sh=fopen($source, 'r');
	$th=fopen($target, 'w');
	
	// Add each line to an array
	if ($sh) {
		$array = explode("\n", fread($sh, filesize($source)));
		$tempstr = getStringForMQLLicense("true", date('Y.m.d', strtotime("+15 days")), "false", date('Y.m.d'), "0", "");
		echo $tempstr;
		$array[44] = $tempstr;
		$newArr = implode("\n",$array);
		fwrite($th, $newArr);
	}

	fclose($sh);
	fclose($th);
	
	exec('C:\\xampp1\\htdocs\\areafiftyone\\Temp\\create_trial_ea.exe '.$name);
	
	$headers = 'From: payment@vbapps.co' . "\r\n" .
    'Reply-To: payment@vbapps.co' . "\r\n" .
	// To send HTML mail, the Content-type header must be set
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

mail("info@vbapps.co","AreaFiftyOne Expert Advisor Trial",
	"Sehr geehrter Admin,<br><br>Sie haben eine Bestellung für den AreaFiftyOne Expert Advisor Trial Version für <b>".
	$month_amount_text."</b> bekommen. Bitte erstelle das Produkt und versende es an die E-Mail-Addresse ".$_POST['customer_email'].".<br><br>
	<u>Bestelldaten:</u><br>
	<ul>
	<li>Metatrader-Account: ".$_POST['mt4_account']."</li>
	<li>Metatrader-Kontoinhaber: ".$_POST['mt4_name']."</li>
	</ul>
	<ul>
	<li>Straße: ".$_POST['street']."</li>
	<li>Ort: ".$_POST['location']."</li>
	<li>PLZ: ".$_POST['postcode']."</li>
	<li>Land: ".$_POST['country']."</li>
	</ul>
	<br><br>Mit freundlichen Grüßen<br>Ihr VBApps Team", $headers);

} else if (isset($_POST['btn-submit_paypal'])) {
	$totalSumWithPPFees =  $priceArr[$_POST['orderCount']] * 1.019+0.35;
	$link = "Location: http://www.paypal.me/VBApps/".$totalSumWithPPFees;
	$headers = 'From: payment@vbapps.co' . "\r\n" .
    'Reply-To: payment@vbapps.co' . "\r\n" .
	// To send HTML mail, the Content-type header must be set
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	if($_POST['orderCount']==1) {
	$month_amount_text = $_POST['orderCount']." Monat";}
	else {$month_amount_text = $_POST['orderCount']." Monate";}

mail("info@vbapps.co","AreaFiftyOne Expert Advisor Miete",
	"Sehr geehrter Admin,<br><br>Sie haben eine Bestellung für den AreaFiftyOne Expert Advisor für <b>".
	$month_amount_text."</b> bekommen. Bitte erstelle das Produkt und versende es an die E-Mail-Addresse ".$_POST['customer_email'].".<br><br>
	<u>Bestelldaten:</u><br>
	<ul>
	<li>Metatrader-Account: ".$_POST['mt4_account']."</li>
	<li>Metatrader-Kontoinhaber: ".$_POST['mt4_name']."</li>
	<li>Bestellsumme: ".$totalSumWithPPFees."
	</ul>
	<ul>
	<li>Vor- und Nachname: ".$_POST['name_billing']."</li>
	<li>Straße: ".$_POST['street']."</li>
	<li>Ort: ".$_POST['location']."</li>
	<li>PLZ: ".$_POST['postcode']."</li>
	<li>Land: ".$_POST['country']."</li>
	</ul>
	<br><br>Mit freundlichen Grüßen<br>Ihr VBApps Team", $headers);
	header($link);
}

include('footer_other_dirs.html');

function toMoney($val,$symbol='$',$r=2)
{
    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = $i.length) > 3) ? $j % 3 : 0; 

	return  $symbol." ".$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j));
}

function getStringForMQLLicense($trial, $trialExpiryDate, $rent, $rentExpiryDate, $rentAccountNumber, $rentCustomerName) {

$str = "
bool trial_lic=".$trial.";
datetime expiryDate=D'".$trialExpiryDate." 00:00';
bool rent_lic=".$rent.";
datetime rentExpiryDate=D'".$rentExpiryDate." 00:00';
int rentAccountNumber=".$rentAccountNumber.";
string rentCustomerName=\"".$rentCustomerName."\";
";
return $str;
	
}

?>