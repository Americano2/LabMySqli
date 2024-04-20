<?php
    include "conn/conn.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    	$mysqli = new mysqli($servername, $username, $password, $dbase);

    	$tablenum = $_POST['tablenum'];
    	
	switch($tablenum){
	case 1:
    		$prof = $_POST['prof'];
    		$salary = $_POST['salary'];
    		$tax = $_POST['tax'];
   	 	$check = $_POST['check'];
		$country = $_POST['country'];

    		// Підготовлений запит для вставки нового рядка
   	 	$insertQuery = "INSERT INTO $table (Професія, Зарплата, `Додатковий податок`, Державна, Країна) VALUES (?, ?, ?, ?, ?)";

    		// Підготовка та виконання запиту
    		$stmt = $mysqli->prepare($insertQuery);
    		$stmt->bind_param("sddis", $prof, $salary, $tax, $check, $country);
	break;
	case 2:
		$name = $_POST['name'];
		$prof = $_POST['prof'];
		$prof2 = $_POST['prof2'];
		$country = $_POST['country'];

		$insertQuery = "INSERT INTO $residents (full_name, profession, country_of_residence, profession2) VALUES (?,?,?,?)";

		$stmt = $mysqli->prepare($insertQuery);
		$stmt->bind_param("ssss", $name, $prof, $country, $prof2);
	break;
	case 3:
		$countryname = $_POST['country'];
		$tax = $_POST['tax'];

		$insertQuery = "INSERT INTO $country (name_country, tax) VALUES (?,?)";

		$stmt = $mysqli->prepare($insertQuery);
		$stmt->bind_param("sd", $countryname, $tax);
	break;
	}

	$stmt->execute();

	$stmt->close();

	$mysqli->close();
    }
?>

