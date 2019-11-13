<!
Daniel Louis
HCI - Fall 2019
Term project
>
<!DOCTYPE html>
<html>
<title>MyDeck</title>
<link rel = "stylesheet" href = "term.css">
<header>
<?php session_start(); ?>
	<ul id = "navigation-top">
		<li id = "top"><a href = "./term.php">MyDeck</a></li>
		<li id = "top" style = "margin-right : 15%; margin-left: 15%;">
      <form>
			     <input type = "text" name = "Search" value = "Search Decks" style = "color : grey;">
			     <input type = "submit" name = "submit" value = "magnifinGlass">
		  </form>
    </li>
		<li id = "top" style = "float : right; margin-right : 20px;">
      <form action="./term.php" method="post">
			<?php
				$submit = $_POST["submit"];
				$password = $_POST["password"];
				$username = $_POST["username"];
				if($_SESSION['bool'] == null || $_SESSION['bool'] == false)
				{
					$_SESSION['bool'] = false;
				}

				if($submit == "Login")
				{
					$db = new mysqli("db1.cs.uakron.edu:3306", "dtl29", "Pah8quei", "ISP_dtl29");		
					if ($db->connect_error) {
						print "Error - Could not connect to MySQL";
						exit;
					}
					$stmt = $db->prepare("SELECT password FROM DeckUsers WHERE username = ?");
					$stmt->bind_param("s",$username);
					if($stmt->execute() && $username != "")
					{
						$stmt->bind_result($pas);
						$stmt->fetch();
						if($password == $pas || $_SESSION['bool'] == true)
						{
							$_SESSION['bool'] = true;
							$_SESSION['sessionUser'] = $username;
							echo 'Hello ' . $username .' <br/>
								<form action="term.php"  method="post"><input type="submit" name="submit" value="Logout"> </form>
							';

						}
						else
						{
							echo '
								Failed to log in <br/>
								<input type="text" name="username" value="example name" style="color : grey;"><br/>
								<input type="text" name="password" value="*****" style="color : grey;"><br/>
								<input type="submit" name="submit" value="Login" style="float : right;">
							';
						}
						$stmt->close();
						$db->close();
					}
					else
					{
						$stmt->close();
						$db->close();
						echo '
							Failed to log in <br/>
							<input type="text" name="username" value="example name" style="color : grey;"><br/>
							<input type="text" name="password" value="*****" style="color : grey;"><br/>
							<input type="submit" name="submit" value="Login" style="float : right;">
						';

					}
				}
				else if($_SESSION['bool'] == false)
				{
					echo '
						<input type="text" name="username" value="example name" style="color : grey;"><br/>
						<input type="text" name="password" value="*****" style="color : grey;"><br/>
						<input type="submit" name="submit" value="Login" style="float : right;">
					';
				}
				else if($submit == "Logout")
				{
					$_SESSION['sessionUser'] = "";
					$_SESSION['bool'] = false;
					echo '
						<input type="text" name="username" value="example name" style="color : grey;"><br/>
						<input type="text" name="password" value="*****" style="color : grey;"><br/>
						<input type="submit" name="submit" value="Login" style="float : right;">
					';
				}
				else 
				{
					echo 'Hello ' . $_SESSION['sessionUser'] .' <br/>
						<form action="term.php"  method="post"><input type="submit" name="submit" value="Logout"> </form>
					';
				}
			?>
		</form>
    </li>
    <li id = "top" style = "float : right;">Login:</li>
	</ul>
</header>
<body>
	
	<ul id = "navigation-left">
		<li id = "left" style = "margin-top : 5px;"><a href = "./MyDecks.php">My Decks</a></li>
		<li id = "left" style = "margin-top : 5px;"><a href = "#">Top Decks</a></li>
		<li id = "left" style = "margin-top : 5px;"><a href = "./Cards.php">Cards</a><li>
	</ul>
	<div style = "float : right; margin-top : 80px; margin-right : 30%;">
	<script>
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
		}
	</script>
  <?php
	$submit = $_POST["submit"];
	  if($submit == "")
	  {
		echo '<form action="./MyDecks.php" method="post"><input type="submit" name="submit" value="Create"></form>';
	  }
	  if($submit == "Create" || $submit == "Find Cards")
	  {
	  $decklist;
		echo '<form action="./MyDecks.php" method="post">
			Please provide a deck name: <input type="text" name="deckName" value="name"><br/>
			Please select a format: 
			<select type="dropdown" name="format">
				<option value="Standard">Standard</option>
				<option value="Modern">Modern</option>
				<option value="Legacy">Legacy</option>
				<option value="Brwal">Brawl</option>
				<option value="Commander">Commander</option>
				<option value="Pioneer">Pioneer</option>
			</select><br/>
		</form>';
		//should now have the rest of the creator 

		echo '
		<div id="top" style="width: 600px; height: 500px; padding: 10px; border: 1px solid black;" 
			ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		<form action="./MyDecks.php" method="post"><br/>
			<br/>Card Selecttion : <select type="dropdown" name="format">
				<option value="Standard" selected="selected">Standard</option>
				<option value="Modern">Modern</option>
				<option value="Legacy">Legacy</option>
				<option value="Brwal">Brawl</option>
				<option value="Commander">Commander</option>
				<option value="Pioneer">Pioneer</option>
			</select>
			 <select type="dropdown" name="color">
				<option value="W" selected="selected">White</option>
				<option value="U">Blue</option>
				<option value="B">Black</option>
				<option value="R">Red</option>
				<option value="G">Green</option>
				<option value="">Colorless</option>
			</select>
			 <select type="dropdown" name="type">
				<option value="creature" selected="selected">Creature</option>
				<option value="enchantment">Enchantment</option>
				<option value="instant">Instant</option>
				<option value="sorcery">Sorcery</option>
				<option value="artifact">Artifact</option>
				<option value="land">Land</option>
			</select>
			<input type="submit" name="submit" value="Find Cards">
			<input type="submit" name="submit" value="Create Deck">
		</form>
		';
		//use card selection to format this to select the cards (chang the querry)
		$format = $_POST["format"];
		$color = $_POST["color"];
		$type = $_POST["type"];
		$legal = "legal";
		if($format == "")
		{
			$format = "Standard";
			$color = "W";
			$type = "creature";
		}
		$db = new mysqli("db1.cs.uakron.edu:3306", "dtl29", "Pah8quei", "ISP_dtl29");		
		if ($db->connect_error) 
		{
			print "Error - Could not connect to MySQL";
			exit;
		}
		$stmt;$Ccard;$Cname;
		if($format == "Standard")
		{
			//need to get the % % to have only  a string in it cahng it from a blob again 
			//$stmt = $db->prepare("SELECT name, image FROM Cards WHERE legStandard=? AND color=? AND cardType LIKE '%?%' LIMIT 39");
			//$stmt->bind_param("ssb",$legal,$color,$type);
			echo 'this was standard<br/>';
			$stmt = $db->prepare("SELECT name, image FROM Cards WHERE legStandard=? AND color=? LIMIT 39");
			$stmt->bind_param("ss",$legal,$color);
			if($stmt->execute())
			{
				//needs an argumnet for every argumnet
				$stmt->bind_result($Cname,$Ccard);
				$stmt->fetch();
				echo 'This exectured '.$Cname;
			}
		}
		if($format == "Modern")
		{
			$stmt = $db->prepare("SELECT name, image FROM Cards WHERE legModern=? AND color=? LIMIT 39");
			$stmt->bind_param("ss",$legal,$color);
		}
		if($format == "Legacy")
		{
			$stmt = $db->prepare("SELECT name, image FROM Cards WHERE legLegacy=? AND color=? LIMIT 39");
			$stmt->bind_param("ss",$legal,$color);
		}
		if($format == "Brawl")
		{
			$stmt = $db->prepare("SELECT name, image FROM Cards WHERE legBrawl=? AND color=? LIMIT 39");
			$stmt->bind_param("ss",$legal,$color);
		}
		if($format == "Commander")
		{
			$stmt = $db->prepare("SELECT name, image FROM Cards WHERE legCommander=? AND color=? LIMIT 39");
			$stmt->bind_param("ss",$legal,$color);
		}
		if($format == "Pioneer")
		{
			$stmt = $db->prepare("SELECT name, image FROM Cards WHERE legPioneer=? AND color=? LIMIT 39");
			$stmt->bind_param("ss",$legal,$color);
		}

		if($stmt->execute())
		{
			//needs an argumnet for every argumnet
			$stmt->bind_result($Cname,$Ccard);
			$stmt->fetch();
		}
		else
		{
			echo 'This did not execute';
		}
		echo '
			<table>
		';
		for($j =1; $j < 14; $j=$j+1)
		{
			echo '<tr>';
			for($i =1; $i < 4; $i=$i+1)
			{
				echo '
						<td>
							<image id="'.$Cname.'" src="'.$Ccard.'"
								style="width : 200px; height : 300px;" draggable="true" ondragstart="drag(event)">
						</td>
				';
				$stmt->fetch();
			}
			echo '</tr>';
		}
		echo '
			</table>
		';
		$stmt->close();
		$db->close();
	  }
	  if($submit == "Create Deck")
	  {
	  	  $name = $_POST["deckName"];
		  $format = $_POST["format"];
		  //will check and add the deck if it checks out
	  }
	  $db->close();
  ?>
  </div>
  
</body>
</html>
