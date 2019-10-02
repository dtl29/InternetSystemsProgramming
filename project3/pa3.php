<!
Daniel Louis
Internet System Programming - Fall 2019
Project 3
>
<!DOCTYPE html>
<html>
<style type="text/css">
	div{
		width: 33%;
		float: left;
		margin-right: 33%;
		margin-left: 33%;
	}
</style>
<?php

	//get the inputs from the html 
	$operand = $_POST["button"];
	/*
	//curent has no value and need some
	$curentValue = $_POST["current"];
	$newValue = $_POST["input"];

	//convert the strings into numbers
	if($newValue == ""){$newValue = 0.0;}
	else if(!(is_numeric($newValue))){$newValue = 0.0;}
	else {$newValue = (float)$newValue;}
	if($curentValue == ""){$curentValue = 0.0;}
	else
	{
		$strLength = strlen($curentValue);
		//its either 15 or 16 depending on if the string starts with 
		//0 or not
		$curentValue = substr($curentValue,15,$strLength)
		$curentValue = (float)$curentValue;
	}
	if($newValue = ""){$newValue = "=";}

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
	}*/

?>

	<form action = "http://pausch.cs.uakron.edu/~dtl29/php/pa3.php" 
		method = "post">
	<head>Daniel Louis <br/>Project 3</head>
	<body>
		<dir></dir>
		<div>
			<div name = "current" style = "margin-left : 0px;">Current value = <?php print("3"); ?></div>
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


