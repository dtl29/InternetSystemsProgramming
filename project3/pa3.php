<!-- Daniel Louis -->
<!DOCTYPE html>
<?php
    //get data from forms
    $operand = $_POST["submit"];
    $curValue = $_POST["curentValue"];
    $newValue = $_POST["newValue"];

    //convert the strings into numbers
    if($newValue == "") {$newValue = 0.0;}
    else if(!(is_numeric($newValue))) {$newValue = 0.0;}
    else {$newValue = (float)$newValue;}
    $curValue = (float)$curValue;

    //perform the action
    if($operand == "+") 
    {
        $curValue = $curValue + $newValue;
    }
    else if($operand == "-") 
    {
        $curValue = $curValue - $newValue;
    }
    else if($operand == "*") 
    {
        $curValue = $curValue * $newValue;
    }
    else if($operand == "/" && $newValue != 0.0) 
    {
        $curValue = $curValue / $newValue;
    }
    else if($operand == "=") 
    {
        $curValue = $newValue;
    }
    

?>
<form action = "http://pausch.cs.uakron.edu/~dtl29/pa3/pa3.php"
          method = "post">
<header>
    <h2>
        Online Calculator
    </h2>
</header>
<body>
Output <input type = "text" name = "curentValue" value = "<?php print($curValue); ?>" 
    readonly><br/>
        Input &nbsp<input type = "text" name = "newValue">
	<br/><br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type = "submit" name = "submit" value = "+">
	<input type = "submit" name = "submit" value = "-">
	<input type = "submit" name = "submit" value = "*">
	<input type = "submit" name = "submit" value = "/">
	<input type = "submit" name = "submit" value = "=">
</body>
</form>	