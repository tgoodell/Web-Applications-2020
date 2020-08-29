<?php
$right=false;
$fresh=true;
$answer="";

if(isset($_POST["answer"]))
{
	$answer=$_POST["answer"];
	$fresh=false;
	if($_POST["answer"]=="cyberterrorists")$right=true;
}

if($right)
{
	session_start();
	$_SESSION["page1"] = true;
	header("Location: puzzle2.php");
}
?>

<!--

    # Hints
    - https://torontosun.com/news/local-news/power-play-from-squirrel-population
    - https://twitter.com/Nicholas_Seward/status/1122880767015649281

    # Answer
    - cyberterrorists

-->

<html>
	<head>
        <title>Assigment04 &mdash; PHPrison &mdash; Puzzle 1</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://compsci.asmsa.org/goodellt21/assignment01/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>
	<body>
		<div class="body-text">
            <h1 style="margin-bottom:5px">Puzzle #1</h1>
            <h2 style="margin-bottom:5px">An easy warm-up question.</h2>
			<?php if(!$fresh) echo "You are not a true Seward fan."; ?>
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class=""> 
				What are squirrels more dangerous than? <br /><input type="text" class="form-control mb-2 mr-sm-2" name="answer" value="<?php echo $answer;?>" />
				<button type="submit" class="btn btn-outline-primary btn-sm">Submit</button>
			</form>
		
		</div>
        <br />
        <div class="body-text" style="text-align: center">
            <a href="http://compsci.asmsa.org/goodellt21/">Back to Directory</a>
        </div>
	</body>
</html>