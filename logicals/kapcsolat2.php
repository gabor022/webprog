<?php	
	//szerver oldali ellenőrzés 
	$ujra=false;
	$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
	if(!isset($_POST['nev']) || strlen($_POST['nev']) < 5){
		$uzenet = "Hibás név!";                     
		$ujra = true;
	}
	if((!isset($_POST['email']) || !preg_match($re,$_POST['email']))&&!$ujra){
		$uzenet = "Hibás email!";                     
		$ujra = true;
	}
	if((!isset($_POST['uzenet']) || empty($_POST['uzenet']))&&!$ujra)
	{
		$uzenet = "Hibás szöveg!";                     
		$ujra = true;
	}
//Adatbázisba bevitel
	if(!$ujra){
		try {
			// Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=webdata', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$sqlInsert = "insert into uzenetek(nev,email,uzenet)
							  values(:nev,:email,:uzenet)";
				$stmt = $dbh->prepare($sqlInsert); 
				$stmt->execute(array(':nev' => $_POST['nev'],':email' => $_POST['email'],':uzenet' => $_POST['uzenet'])); 
				if($count = $stmt->rowCount()) {
					$uzenet = "Az üzenetet sikeresen elküldtük. Kérjük szíves türelmét, míg a munkatársaink válaszolnak!";                     
					$ujra = false;
				}
		}
		catch (PDOException $e) {
			$errormessage = "Hiba: ".$e->getmessage();
			$ujra = true;
		}
	}