<!
Daniel Louis
Internet Systems Programing - Fall 2019
Term project: card deck database for magic the gatehring 
>
<!DOCTYPE html>
<html>
<title>MyDeck</title>
<link rel = "stylesheet" href = "term.css">
<?php
	session_start();
?>
<header>
	<ul id="navigation-top">
		<li id="top"><a href="#">MyDeck</a></li>
		<li id="top" style="margin-right : 15%; margin-left: 15%;">
		<form action="" method="post">
			<input type="text" name="Search" value="Search Decks" style="color : grey;">
			<input type="submit" name="submit" value="magnifinGlass">
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
					echo '
						Hello ' . $_SESSION['sessionUser'] .' <br/>
						<form action="term.php"  method="post"><input type="submit" name="submit" value="Logout"> </form>
						';
				}
			?>
		</form>
    </li>
    <li id="top" style="float : right;">Login:</li>
	</ul>
</header>
<body>
	<ul id = "navigation-left">
		<li id="left" style="margin-top : 5px;"><a href="./MyDecks.php">My Decks</a></li>
		<li id="left" style="margin-top : 5px;"><a href="#">Top Decks</a></li>
		<li id="left" style="margin-top : 5px;"><a href="Cards.php">Cards</a><li>
		<li id="left" style="margin-top : 5px;">
			<form action="./term.php" method="post">
				<input type="submit" name="submit" value="Sign Up">
			</form>
		</li>
	</ul>
	<div id="mainBody">
		<div style="float : right; margin-top : 80px; margin-right : 50%;">
		  
			<?php
				$submit = $_POST["submit"];
				$willPrintDefault = true;
	
				if($submit == "Sign Up")
				{
					$willPrintDefault = false;
					echo '
						<br/><br/>
						<style>input{color : grey;}</style>
						<form action="./term.php" method="post">
						<table>
							<tr>
								<td>Username:</td>
								<td><input type="text" name="usernameSU" value="default"><br/><td>
							</tr>
								<td>Password:</td>
								<td><input type="text" name="passwordSU" value="123"><br/></td>
							</tr>
							<tr>
								<td>Confirm Password: </td>
								<td><input type="text" name="passwordConfirmSU" value="123"><br/></td>
							</tr>
							<tr>
								<td>Email:</td>
								<td><input type="text" name="emailSU" value="example@example.com"><br/></td>
							</tr>
							<tr>
								<td><input type="submit" name="submit" value="Create" style="margin-left : 100px"></td>
							</tr>
						</table>
						</form>
					';
				}
				else if($submit == "Create")
				{
					$username = $_POST["usernameSU"];
					$password = $_POST["passwordSU"];
					$email = $_POST["emailSU"];
					$willPrintDefault = false;
					$goodInfor = true;
					//need to email check And password and username check!!!!!!!!!!
					if($goodInfor)
					{
							$db = new mysqli("db1.cs.uakron.edu:3306", "dtl29", "Pah8quei", "ISP_dtl29");		
							if ($db->connect_error)
							{
								print "Error - Could not connect to MySQL";
								exit;
							}
						$query = "SELECT MAX(id) FROM DeckUsers";
						$result = $db->query($query);
						$row = $result->fetch_row();
						$id = (int)$row[0] +1;
						$stmt = $db->prepare("INSERT INTO DeckUsers(id,username,password,email) VALUES(?,?,?,?)");
						$stmt->bind_param("isss",$id,$username,$password,$email);
						if($stmt->execute())
						{
							$stmt->close();
							$db->close();
							$willPrintDefault = true;
							header ( 'refresh:1; url=term.php?id='.$username );
						}
						else
						{
							$stmt->close();
							$db->close();
							echo '
								<br/><br/>
								Sorry the info was invalid please try again. <br/>
								<style>input{color : grey;}</style>
								<form action="./term.php" method="post">
								<table>
									<tr>
										<td>Username:</td>
										<td><input type="text" name="usernameSU" value="default"><br/><td>
									</tr>
										<td>Password:</td>
										<td><input type="text" name="passwordSU" value="123"><br/></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><input type="text" name="emailSU" value="example@example.com"><br/></td>
									</tr>
									<tr>
										<td><input type="submit" name="submit" value="Create" style="margin-left : 100px"></td>
									</tr>
								</table>
								</form>
							';
						}
					}
					else
					{
						echo '
							<br/><br/>
							Sorry the info was invalid please try again. <br/>
							<style>input{color : grey;}</style>
							<form action="./term.php" method="post">
							<table>
								<tr>
									<td>Username:</td>
									<td><input type="text" name="usernameSU" value="default"><br/><td>
								</tr>
									<td>Password:</td>
									<td><input type="text" name="passwordSU" value="123"><br/></td>
								</tr>
								<tr>
									<td>Email:</td>
									<td><input type="text" name="emailSU" value="example@example.com"><br/></td>
								</tr>
								<tr>
									<td><input type="submit" name="submit" value="Create" style="margin-left : 100px"></td>
								</tr>
							</table>
							</form>
						';
					}
				}
				if($willPrintDefault)
				{
					echo "This will print the normal site ";
				}
				$db->close();
			?>
	  </div>
</div>
</body>
</html>