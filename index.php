<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Tristan Goodell &mdash; Web Applications</title>
		<link rel="stylesheet" href="http://compsci.asmsa.org/goodellt21/assignment01/style.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1 class="main-title">Web Apps &mdash; Directory</h1>
		<div class="body-card body-text">
			<h1>Assignments:</h1>
			<ul>
				<li><a href="assignment00/index.html">Assignment 00</a> - HTML</li>
				<li><a href="assignment01/index.html">Assignment 01</a> - CSS</li>
				<li><a href="assignment02/index.html">Assignment 02</a> - Bootstrap</li>
				<li><a href="assignment03/index.php">Assignment 03</a> - PHParty</li>
				<li><a href="assignment04/index.php">Assignment 04</a> - PHPrison</li>
				<li><a href="">Assignment 05</a> - Google Sheets</li>
				<li><a href="assignment06/index.php">Assignment 06</a> - PHPoll</li>
				<li><a href="assignment07/index.html">Assignment 07</a> - PHPrate</li>
				<li><a href="assignment08/login_form.php">Assignment 08</a> - Simple Login Page</li>
				<li><a href="assignment11/index.php">Assignment 11 (Final)</a> - Did you know Canada?</li>
			</ul>
			<br/>
			<?php
				echo 'Current PHP version: ' . phpversion();
				echo "<br>";
				echo "Today is " . date("Y/m/d") . "<br>";
				echo "<br>";
				echo "The time is " . date("h:i:sa");
			?>
		</div>
	</body>
	<footer class="footer-box body-text">
		<p><a href="https://tgoodell.com">Tristan Goodell</a> &copy; 2020</p>
	</footer>
</html>