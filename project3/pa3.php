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
	$curentValue = $_POST["curent"];
	$newValue = $_POST["new"];

	//convert the strings into numbers
	if($newValue == ""){$newValue = 0.0;}
	else if(!(is_numeric($newValue))){$newValue = 0.0;}
	else {$newValue = (float)$newValue;}
	$curentValue = (float)$curentValue;

	//perform the actions
	if($operand == "+")
	{
		$curentValue = $curentValue + $newValue;
	}
	else if($operand == "-")
	{
		$curentValue = $curentValue - $newValue;
	}
	else if($operand == "/")
	{
		$curentValue = $curentValue / $newValue;
	}
	else if($operand == "*")
	{
		$curentValue = $curentValue * $newValue;
	}
	else
	{
		$curentValue = $newValue;
	}

?>

<form action = "http://pausch.cs.uakron.edu/~dtl29/php/pa3.php"	method = "post">
	<head>Daniel Louis <br/>Project 3</head>
	<body>
		<dir></dir>
		<div>
			<div style = "margin-left : 0px;">Current Value: <?php print("$curentValue"); ?></div>
			<input type = "hidden" name = "curent" value = "<?php print($curentValue); ?>"><br/>
			<input type = "text" name = "new"></input><br/>
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


