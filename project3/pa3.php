<!
Daniel Louis
Internet System Programming - Fall 2019
Project 3
>
<!DOCTYPE html>
<html>
<?php
	//get the inputs from the html 
	$operand = $_POST["button"];
	$curentValue = $_POST["input"];
	$newValue = $_POST["current"];

	//convert the strings into numbers
	if($newValue == ""){$newValue = 0.0;}
	else if(!(is_numeric($newValue))){$newValue = 0.0;}
	else {$newValue = (float)$newValue;}
	$strLength = strlen($curentValue);
	//its either 15 or 16 depending on if the string starts with 
	//0 or not
	$curentValue = substr($curentValue,15,$strLength)
	$curentValue = (float)$curentValue;

	//perform the actions
	if($operand == "+")
	{
		$curentValue += $newValue;
	}
	else if($operand == "-")
	{
		$curentValue -= $newValue;
	}
	else if($operand == "/")
	{
		$curentValue /= $newValue;
	}
	else if($operand == "*")
	{
		$curentValue *= $newValue;
	}
	else
	{
		$curentValue = $newValue;
	}
?>
	<form action = "http://pausch.cs.uakron.edu/~dtl29/pa3/pa3.php" 
		method = "post">
	<head>Daniel Louis <br/>Project 3</head>
	<body>
		<dir></dir>
		<div>
			<div name = "current" style = "margin-left : 0px;">Current value = <?php print($curentValue);?></div>
			<input type = "text" name = "input"></input><br/>
			<table>
				<tr><input type = "submit" name = "button" value = "+"></tr>
				<tr><input type = "submit" name = "button" value = "-"></tr>
				<tr><input type = "submit" name = "button" value = "*"></tr>
				<tr><input type = "submit" name = "button" value = "/"></tr>
				<tr><input type = "submit" name = "button" value = "="></tr>
			</table>
		</div>
		<div></div>
	</body>
</html>

