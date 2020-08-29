<?php
//if no session variable set redirect
//
session_start();

if(!isset($_SESSION["page1"]))
{
	header("Location: cheater.html");
}


$right=false;
$fresh=true;
$answer="";

if(isset($_POST["answer"]))
{
	$answer=$_POST["answer"];
	$fresh=false;
	if($_POST["answer"]=="oatmeal chocolate chip")$right=true;
}

if($right)
{
	$_SESSION["page2"] = true;
	header("Location: puzzle3.php");
}

setcookie ("crumbs","oatmeal chocolate chip");

?>


<!--

    # Hints
    - Check the cookies for "crumbs."

    # Answer
    - oatmeal chocalate chip

-->

<html>
	<head>
        <title>Assigment04 &mdash; PHPrison &mdash; Puzzle 2</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://compsci.asmsa.org/goodellt21/assignment01/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>
	<body>
		<div class="body-text">
            <h1 style="margin-bottom:5px">Puzzle #2</h1>
            <h2 style="margin-bottom:5px">It might be wise to look around for clues.</h2>
			<?php if(!$fresh) echo "Wow."; ?>
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class=""> 
				What is Cookie Monster's favourite cookie? <br /><input type="text" class="form-control mb-2 mr-sm-2" name="answer" value="<?php echo $answer;?>" />
				<button type="submit" class="btn btn-outline-primary btn-sm">Submit</button>
			</form>
		
		</div>
        <br />
        <div class="body-text" style="text-align: center">
            <a href="http://compsci.asmsa.org/goodellt21/">Back to Directory</a>
        </div>
	</body>
</html>