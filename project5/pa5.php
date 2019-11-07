<html>
<head></head>
<body>
<?php
	//checkbutton is either "on" or "" 
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
	$youtube = $_POST["YouTube"];

	echo '
		<style>
			body{
				background-color : '. $backgroundColor .';
				color : '. $textColor .';
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
	if($youtubeButton == "on")
	{
		echo'
			<iframe width="420" height="315"
				src="'. $youtube .'">
			</iframe>
		';
	}
?>
</body>
</html>