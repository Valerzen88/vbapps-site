<?php
$d_lang='de_DE';
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);
$acceptLang = ['de_DE', 'en_US'];
$lang = in_array($lang, $acceptLang) ? $lang : 'en_US';

session_start();

if(isset($_GET['lang'])){
	$lang=$_GET['lang'];
	$_SESSION['lang']=$lang;
}
else{
	$lang=$d_lang;
}

if(isset($_SESSION['lang'])){
	$lang=$_SESSION['lang'];
}

function t($txt){
	global $lang,$d_lang;
	if($d_lang!=$lang){//si la langue par défaut n'est pas la langue choisie
	if(strpos($_SERVER["REQUEST_URI"],'site')!==false) {
		$file="lang/$lang/translated.json";
		$dir="lang/$lang/";
	}else {
		$file="site/lang/$lang/translated.json";
		$dir="site/lang/$lang/";
	}		

		if(!is_dir($dir)){//si il n'y a pas de dossier cela veut dire pas de traduction
			return($txt);	
		}
		$translated=fopen($file, "a+");
		
		if(filesize($file)>0){
			$file_text=fread($translated, filesize($file));
			$output_array=(array)json_decode($file_text);
			
			foreach ($output_array as $key => $value) {
				if($key==$txt){
					fclose($translated);
					return($value);
				}
			}

			$output_array[$txt]="...$lang...";
			
			$json_output="{";

			$size=sizeof($output_array);
			$count=0;
			
			foreach ($output_array as $valeur => $traduction) {
				$count++;
				if($size==$count){
					$json_output=$json_output.json_encode($valeur).":".json_encode($traduction)."\n";
				}
				else{
					$json_output=$json_output.json_encode($valeur).":".json_encode($traduction).",\n";
				} 
			}
			$json_output=$json_output."}";
			ftruncate($translated, 0);

			fwrite($translated,$json_output);
			fclose($translated);
			return($txt);
			}
		else{
			fwrite($translated,json_encode(array($txt =>"...$lang...")));
			return($txt);
		}
		
		fclose($translated);
	}
	else{
		return($txt);
	}
}

?>