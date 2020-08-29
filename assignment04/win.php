<?php
    session_start();

    if(!isset($_SESSION["page3"]))
    {
        header("Location: cheater.html");
    }
?>

<html>
	<head>
        <title>Assigment04 &mdash; PHPrison &mdash; You won!</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://compsci.asmsa.org/goodellt21/assignment01/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>
	<body>
		<div class="body-text">
            <h1 style="margin-bottom:5px">You won!</h1>
            <h2 style="margin-bottom:5px">Congrats!</h2>
			<p>I am a bit shocked that you survived. Bravo!</p>
            <a href="destroy.php"><button class="btn btn-outline-secondary" type="button">Restart</button></a>
		</div>
        <br />
        <div class="body-text" style="text-align: center">
            <a href="http://compsci.asmsa.org/goodellt21/">Back to Directory</a>
        </div>
	</body>
</html>