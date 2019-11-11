<html>
<head></head>
<body>

<?php
	//checkbutton is either "on" or "" 
	$tableButton = $_POST["tableButton"];
	$rows = $_POST["rows"];
	$columns = $_POST["columns"];
	$paragraph = $_POST["pa"];
	$paButton = $_POST["paButton"];
	$backgroundColor = $_POST["color"];
	$addButtonButton = $_POST["button"];
	$buttonWillDo = $_POST["buttonWillDo"];
	$textColor = $_POST["textC"];
	$imButton = $_POST["imButton"];
	$image = $_POST["image"];
	$titleButton = $_POST["tiButton"];
	$title = $_POST["title"];
	$youtubeButton = $_POST["YoButton"];
	$youtube = $_POST["Youtube"];
	$time = $_POST["timeButton"];
	$date = $_POST["dateButton"];
	$border = $_POST["borderButton"];
	$borderColor = $_POST["borderColor"];
	$ajax = $_POST["ajaxButton"];
	$line = $_POST["lineButton"];
	$linkButton = $_POST["linkButton"];
	$link = $_POST["link"];
	$linkName = $_POST["linkName"];
	$font = $_POST["font"];
	$k = 0;
	$numberOfAtributes = $rows * $columns - 1;

	if($tableButton == "on")
	{
		echo '<form action="./pa5.php" method="post"><table>';
		for($i = 0; $i < $rows; $i++)
		{
			echo '<tr>';
			for($j = 0; $j < $columns; $j++)
			{
				echo'
				<td>
					<input type="text" name="'. $k .'" value="'. $k .'">
				</td>
				';
				$k++;
			}
			echo '</tr>';
		}
		echo '
				</table>

				<input type="hidden" name="pa" value="'. $paragraph .'">
				<input type="hidden" name="paButton" value="'. $paButton .'">
				<input type="hidden" name="color" value="'. $backgroundColor .'">
				<input type="hidden" name="button" value="'. $addButtonButton .'">
				<input type="hidden" name="buttonWillDo" value="'. $buttonWillDo .'">
				<input type="hidden" name="textC" value="'. $textColor .'">
				<input type="hidden" name="imButton" value="'. $imButton .'">
				<input type="hidden" name="image" value="'. $image .'">
				<input type="hidden" name="tiButton" value="'. $titleButton .'">
				<input type="hidden" name="title" value="'. $title .'">
				<input type="hidden" name="YoButton" value="'. $youtubeButton .'">
				<input type="hidden" name="Youtube" value="'. $youtube .'">
				<input type="hidden" name="tableButton" value="done">
				<input type="hidden" name="rows" value="'.$rows.'">
				<input type="hidden" name="columns" value="'.$columns.'">
				<input type="hidden" name="timeButton" value="'.$time.'">
				<input type="hidden" name="dateButton" value="'.$date.'">
				<input type="hidden" name="borderButton" value="'.$border.'">
				<input type="hidden" name="borderColor" value="'.$borderColor.'">
				<input type="hidden" name="ajaxButton" value="'.$ajax.'">
				<input type="hidden" name="lineButton" value="'.$line.'">
				<input type="hidden" name="linkButton" value="'.$linkButton.'">
				<input type="hidden" name="link" value="'.$link.'">
				<input type="hidden" name="linkName" value="'.$linkName.'">
				<input type="hidden" name="font" value="'.$font.'">

				<input type="submit" name="submit" value="submit"> 
			</form>
		';
	}
	else{
		echo '
			<style>
				body{
					background-color : '. $backgroundColor .';
					color : '. $textColor .';
					font-family : '.$font.';
		';
		if($border == "on")
		{
			echo '
				border : 2px solid '.$borderColor.';
			';
		}	
		echo'
				}
				table{
						border:1px solid black;
				}
				tr{
				}
				td{
					border:1px solid black;
				}
			</style>
		';
		if($tiButton == "on")
		{
			echo'
				<title>'. $title .'</title>
			';
		}
		if($paButton == "on")
		{
			echo '
				<p>'. $paragraph .'</p>
			';
		}
		if($addButtonButton == "on")
		{
			echo '
				<script type="text/javascript"> 
					function ()
					{
						'. $buttonWillDo .'
					}
				</script>
				<button type="button" onclick="function()">Button</button>
			';
		}
		if($imButton == "on")
		{
			echo '
				<image src="'. $image .'">
			';
		}
		if($tableButton == "done")
		{
			echo '<table>';
			for($i = 0; $i < $rows; $i++)
			{
				echo '<tr>';
				for($j = 0; $j < $columns; $j++)
				{
					$at = $_POST[''.$k.''];
					echo'
					<td>
						'. $at .'
					</td>
					';
					$k++;
				}
				echo '</tr>';
			}
			echo '</table>';
		}
		if($time == "on")
		{
			echo '
				<div id="times"></div><br/>
				<script>
					window.onload = func();
					function func()
					{
						document.getElementById("times").innerHTML = new Date().getTime();
					}
				</script>
			';
		}
		if($date == "on")
		{
			echo'
				<div id="date"></div><br/>
				<script>
					window.onload = func2();
					function func2()
					{
						document.getElementById("date").innerHTML = new Date().toLocaleString();
					}
				</script>
			';
		}
		if($ajax == "on")
		{
			echo '
				<div id="ajaxdemo">
					 <p>Let AJAX change this text</p>
					 <button type="button" onclick="loadDoc()">Ajax Button</button>
				</div><br/>
				<script>
					function loadDoc() {
						 document.getElementById("ajaxdemo").innerHTML = "The responce was<br/>";
						  var xhttp = new XMLHttpRequest();
						  xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
							 document.getElementById("ajaxdemo").innerHTML += this.responseText;
							}
						  };
						  xhttp.open("GET", "ajax_info.txt", true);
						  xhttp.send();
					}
				</script>
			';
		}
		if($line == "on")
		{
				echo'<hr/>';
		}
		if($linkButton == "on")
		{
			echo'
				<a href="'.$link.'">'.$linkName.'
			';
		}
	}
?>
</body>
</html>