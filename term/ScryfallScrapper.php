<!
Daniel Louis
Internet Systems Programing - Fall 2019
Term project: card deck database for magic the gatehring 
>
<!DOCTYPE html>
<html><head>
<title>Scraper</title>
</head>
<body>
<?php
	$submit = $_POST["submit"];
	$name = $_POST["name"];
	$cmc = $_POST["cmc"];
	$cardType = $_POST["cardType"];
	$color = $_POST["color"];
	$legBrawl = $_POST["legBrawl"];
	$legCommander = $_POST["legCommander"];
	$legDuel = $_POST["legDuel"];
	$legFuture = $_POST["legFuture"];
	$legHistoric = $_POST["legHistoric"];
	$legLegacy = $_POST["legLegacy"];
	$legModern = $_POST["legModern"];
	$legOlderschool = $_POST["legOlderschool"];
	$legPauper = $_POST["legPauper"];
	$legPenny = $_POST["legPenny"];
	$legPioneer = $_POST["legPioneer"];
	$legStandard = $_POST["legStandard"];
	$legVintage = $_POST["legVintage"];
	$power = $_POST["power"];
	$rarity = $_POST["rarity"];
	$setName = $_POST["setName"];
	$toughness = $_POST["toughness"];
	$image = $_POST["image"];
	session_start();
	$_SESSION['number'] = $_SESSION['number'] + 1;
	$submitBool = false;
	$bool = false;


	if($power == "undefined")
	{
		$power = null;
		$toughness = null;
	}
	else
	{
		$power = (int)$power;
		$toughness = (int)$toughness;
	}

	$db = new mysqli("db1.cs.uakron.edu:3306", "dtl29", "Pah8quei", "ISP_dtl29");		
	if ($db->connect_error) {
		print "Error - Could not connect to MySQL";
		exit;
	}
	$stmt = $db->prepare("INSERT INTO Cards(name, cmc, cardType, color,
legBrawl,legCommander, legDuel, legFuture, legHistoric, legLegacy, 
legModern,legOlderschool, legPauper, legPenny, legPioneer, 
legStandard, legVintage,
power, rarity, setName, toughness, image)
VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssssssssssssssissis",$name,$cmc,$cardType,$color,$legBrawl,$legCommander,$legDuel,
	$legFuture,$legHistoric,$legLegacy,$legModern,$legOlderschool,$legPauper,$legPenny,$legPioneer,$legStandard,
	$legVintage,$power,$rarity,$setName,$toughness,$image);
	
	if($stmt->execute())
	{
		echo '<div>Entered into database correctly </div>';
		console.log(mysqli_stmt_error( $stmt ));
	}
	else
	{
		echo '<div>The entery failed. </div>';
		console.log(mysqli_stmt_error( $stmt ));
	}
?>
<!DOCTYPE html>
<html>
    <head>

        <br/>
        <script src="./ScryfallScapper.js"></script>
    </head>
    <body onload="scrap('<?php print($_SESSION['number']); $bool = true; ?>')">
        <div id="demo"></div>
    </body>
</html>