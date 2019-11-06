<!
Daniel Louis
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
							echo 'Hello ' . $username ;

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
				else 
				{
					echo 'Hello ' . $_SESSION['sessionUser'];
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
		<li id = "left" style = "margin-top : 5px;"><a href = "#">Cards</a><li>
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
			<input type="submit" name="submit" value="Create Deck">
		</form>';
		//should now have the rest of the creator 
			//i.e two canvases with drag drop between then. 
		$db = new mysqli("db1.cs.uakron.edu:3306", "dtl29", "Pah8quei", "ISP_dtl29");		
		if ($db->connect_error) 
		{
			print "Error - Could not connect to MySQL";
			exit;
		}
			$query = "SELECT name, image FROM Cards WHERE setName='Homelands'";
			$result = $db->query($query);
			$row = $result->fetch_row();
		echo '
		<canvas id="top" width="900" height="600" style="background-color : #ffeecc; border:1px solid #000000;"
			ondrop="drop(event)" ondragover="allowDrop(event)"></canvas><br/>
		<form action="./MyDecks.php" method="post">
			Card Selecttion : <select type="dropdown" name="format">
				<option value="Standard" selected="selected">Standard</option>
				<option value="Modern">Modern</option>
				<option value="Legacy">Legacy</option>
				<option value="Brwal">Brawl</option>
				<option value="Commander">Commander</option>
				<option value="Pioneer">Pioneer</option>
			</select>
			 <select type="dropdown" name="color">
				<option value="white" selected="selected">White</option>
				<option value="blue">Blue</option>
				<option value="black">Black</option>
				<option value="red">Red</option>
				<option value="green">Green</option>
				<option value="colorless">Colorless</option>
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
		</form>
		';
		//use card selection to format this to select the cards (chang the querry)
				$db = new mysqli("db1.cs.uakron.edu:3306", "dtl29", "Pah8quei", "ISP_dtl29");		
		if ($db->connect_error) 
		{
			print "Error - Could not connect to MySQL";
			exit;
		}
			$query = "SELECT name, image FROM Cards WHERE setName='Ice Age'";
			$result = $db->query($query);
			$row = $result->fetch_row();
		echo '
		<table>
			<tr>
				<td>
					<image src="'.$row[1].'"style="width : 200px; height : 300px;" draggable="true" ondragstart="drag(event)">
					<input type="hidden" value="'.row[0].'">
				</td>';
		$row = $result->fetch_row();
		echo '
				<td>
					<image src="'.$row[1].'"style="width : 200px; height : 300px;" draggable="true" ondragstart="drag(event)">
					<input type="hidden" value="'.row[0].'">
				</td>
			</tr>
		</table>
		';
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
