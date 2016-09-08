<?php
$errorMessage = "Форма заполнена неверно, исправьте";
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
	 if ( preg_match("/^[а-яё]+$/msiu", $_POST["name"])) {
	 	if (preg_match("/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/", $_POST["email"])) {
	 		if ( preg_match("/^[0-9]{9,20}+$/msiu", $_POST["phone"])) {
	 		   $postData = [
    			"name" => $_POST["name"],
    			"email" => $_POST["email"],
    			"phone"   => $_POST["phone"],
				];
				$curl = curl_init("http://synergy.ru/lander/alm/lander.php?r=land/index&unit=synergy&type=test");
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
				$response = curl_exec($curl);
				curl_close($curl);
				echo $response;
			} else {
				echo $errorMessage." Телефон";
			}		
		} else {
	 		echo $errorMessage." Email";
		}
	 } else {
	 	echo $errorMessage." Имя";
	 }	 
}
