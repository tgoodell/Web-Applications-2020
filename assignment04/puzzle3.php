<?php
//if no session variable set redirect
//
session_start();

if(!isset($_SESSION["page2"]))
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
	if($_POST["answer"]=="10.32.60.56")$right=true;
}

if($right)
{
	$_SESSION["page3"] = true;
	header("Location: win.php");
}

?>


<!--

    # Hints
    - Message uses 256 bit AES encryption. 
    - https://aesencryption.net
    - https://www.youtube.com/watch?v=Mh4exnkIVVE
    - Use the AES key "Crater Lake" to decrypt the AES key.
    - Answer the decrypted question.

    # Answer
    - 10.32.60.56

-->

<html>
	<head>
        <title>Assigment04 &mdash; PHPrison &mdash; Puzzle 3</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://compsci.asmsa.org/goodellt21/assignment01/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>
	<body>
		<div class="body-text">
            <h1 style="margin-bottom:5px">Puzzle #3</h1>
            <h2 style="margin-bottom:5px">Key: where did Seward perform a "cliff backflip?"</h2>
            <p>Use this tool: <a href="https://aesencryption.net">https://aesencryption.net</a></p>
			<?php if(!$fresh) echo "You are not a true Seward fan."; ?>
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class=""> 
                AES Message: 0XFjS9pN+J3j5D65f6wUB2yzd80jCgq7O7uItF0ig6pPtRW4m+58Rrt9reLiS0ai <br /><input type="text" class="form-control mb-2 mr-sm-2" name="answer" value="<?php echo $answer;?>" />
				<button type="submit" class="btn btn-outline-primary btn-sm">Submit</button>
			</form>
		
		</div>
        <br />
        <div class="body-text" style="text-align: center">
            <a href="http://compsci.asmsa.org/goodellt21/">Back to Directory</a>
        </div>
	</body>
</html>