<?php
session_start();
//kjo ktu m duket e perseritur shum her...me mir ta vendosim ne nje file tjt dhe i japim include
		
	include "functions/DBconnection.php"; 
		

		$numberOfBooksLimited=10;

		$sql="SELECT `ISBN`, title, cover_photo FROM book ORDER BY publication_year DESC LIMIT ".$numberOfBooksLimited;
		$libratSipasDates=$connection->query($sql);	
		$sql="SELECT `ISBN`, title, cover_photo FROM book ORDER BY likes DESC LIMIT ".$numberOfBooksLimited;
		$libratSipasPelqimeve=$connection->query($sql);
		$sql="SELECT `id`, title, cover_photo FROM online_books ORDER BY likes DESC LIMIT ".$numberOfBooksLimited;
		$libratOnlineSipasPelqimeve=$connection->query($sql);
		$sql="SELECT `id`, title, cover_photo FROM online_books ORDER BY publish_date DESC LIMIT ".$numberOfBooksLimited;
		$libratOnlineSipasDates=$connection->query($sql);
		$sql="SELECT `ISBN`, title, cover_photo FROM book WHERE reservation_points!=0 ORDER BY reservation_points DESC LIMIT ".$numberOfBooksLimited;
		$libratPremium=$connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/BibliotekaOnline/Styles/home.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<?php  include 'header.php'; ?>

			<!-- Book sliders -->
			<?php
				include "functions/bookSlider.php";
				createSlider("Librat me te fundit",$libratSipasDates,"offline",3,1);
				createSlider("Librat me te pelqyer",$libratSipasPelqimeve,"offline",3,2);
				createSlider("Librat online me te pelqyer",$libratOnlineSipasPelqimeve,"online",3,3);
				createSlider("Librat online me te fundit",$libratOnlineSipasDates,"online",3,4);
				createSlider("Librat Premium",$libratPremium,"offline",3,5);
			?>

	<!-------------Ktu do vendoset Footeri----------->		

</body>
<script type="text/javascript" src="../scripts/home.js"></script>
<script type="text/javascript" src="../scripts/bookSlider.js"></script>
</html>