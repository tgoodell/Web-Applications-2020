<?php

$count=rand(4,50);

if(isset($_GET["count"]) && is_numeric($_GET["count"]))
{
	$count=$_GET["count"];
}

$color="azure";
if(isset($_GET["color"]))
{
	$color=$_GET["color"];
}


?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href="http://compsci.asmsa.org/goodellt21/assignment01/style.css"/>
        <title>Assignment03 - PHParty</title>
		<style>
			img {
				padding: 5px;
			}

			.fast {
				animation-iteration-count: infinite;
				animation-name: fast-changes;
				animation-duration: 3s;
			}

			.hue {
				animation-iteration-count: infinite;
				animation-name: hue-rotate;
				animation-duration: 1s;
			}

			.fuzzy {
				animation-iteration-count: infinite;
				animation-name: fuzzy;
				animation-duration: 2s;
			}

			.turn {
				animation-iteration-count: infinite;
				animation-name: rotate;
				animation-duration: 1s;
			}
			
			.left
			{
				animation-iteration-count: infinite;
				animation-name: example;
				animation-duration: 1s;
			}
			.right
			{
				animation-iteration-count: infinite;
				animation-name: example2;
				animation-duration: 1s;
			}
			.fancy
			{
				animation-iteration-count: infinite;
				animation-name: example3;
				animation-duration: 1s;
			}

            .saturate { filter: saturate(3); }
            .grayscale { filter: grayscale(100%); }
            .contrast { filter: contrast(160%); }
            .brightness { filter: brightness(0.25); }
            .blur { filter: blur(3px); }
            .invert { filter: invert(100%); }
            .sepia { filter: sepia(100%); }
            .huerotate { filter: hue-rotate(180deg); }
            .rss.opacity { filter: opacity(50%); }
			
			@keyframes fast-changes {
              0% {filter: none;}  
			  11% {filter: saturate(3);}
			  22% {filter: grayscale(100%);}
			  33% {filter: contrast(160%);}
              44% {filter: brightness(0.25);}
              55% {filter: blur(3px);}
              66% { filter: invert(100%);}
              77% {filter: sepia(100%);}
              88% {filter: hue-rotate(180deg);}
              99% {filter: opacity(50%);}
			}

			@keyframes hue-rotate {
				0% {filter: hue-rotate(0deg);}
				50% {filter: hue-rotate(120deg);}
				75% {filter: hue-rotate(240deg);}
				100% {filter: hue-rotate(360deg);}
			}
			
			@keyframes fuzzy {
				0% {filter: blur(0px);}
				25% {filter: blur(1px);}
				50% {filter: blur(2px);}
				75% {filter: blur(3px);}
				100% {filter: blur(4px);}
			}

			@keyframes rotate {
				0% {transform: rotate(0deg)}
				10% {transform: rotate(36deg)}
				20% {transform: rotate(72deg)}
				30% {transform: rotate(108deg)}
				40% {transform: rotate(144deg)}
				50% {transform: rotate(180deg)}
				60% {transform: rotate(216deg)}
				70% {transform: rotate(252deg)}
				80% {transform: rotate(288deg)}
				90% {transform: rotate(324deg)}
				100% {transform: rotate(360deg)}
			}

            @keyframes example {
			  0% {transform: scaleX(1);}
			  50% {transform: scaleX(-1);}
			  100% {transform: scaleX(1);}
			}
			@keyframes example2 {
			  0% {transform: scaleX(-1);}
			  50% {transform: scaleX(1);}
			  100% {transform: scaleX(-1);}
			}
			@keyframes example3 {
			  0% {transform: scaleY(-1);}
			  50% {transform: scaleY(1);}
			  100% {transform: scaleY(-1);}
			}
			
			body {
				background-color: <?php echo $color; ?>
			}
		</style>
	</head>
	<body>
		<div class="body-text">
			<h1>Change Background Color:</h1>
			<?php
				$color="tomato";
				echo "<a href='index.php?count=$count&color=$color'>Tomato</a> - ";
				$color="azure";
				echo "<a href='index.php?count=$count&color=$color'>Azure</a> - ";
				$color="AliceBlue";
				echo "<a href='index.php?count=$count&color=$color'>Alice Blue</a> - ";
				$color="AntiqueWhite";
				echo "<a href='index.php?count=$count&color=$color'>Antique White</a> - ";
				$color="CadetBlue";
				echo "<a href='index.php?count=$count&color=$color'>CadetBlue</a> - ";
				$color="Chartreuse";
				echo "<a href='index.php?count=$count&color=$color'>Chartreuse</a> - ";
				$color="CornflowerBlue";
				echo "<a href='index.php?count=$count&color=$color'>Cornflower Blue</a> - ";
				$color="Crimson";
				echo "<a href='index.php?count=$count&color=$color'>Crimson</a> - ";
				$color="Coral";
				echo "<a href='index.php?count=$count&color=$color'>Coral</a> - ";
				$color="DarkCyan";
				echo "<a href='index.php?count=$count&color=$color'>Dark Cyan</a> - ";
				$color="DarkOliveGreen";
				echo "<a href='index.php?count=$count&color=$color'>Dark Olive Green</a>";
			?>
		</div>
		<br />
		<div class="body-text">
			<h1 style="margin-bottom: 3px;">Assignment 03 &mdash; PHParty</h1>
			<h2>How much Canada is too much Canada?</h2>
			<div style="text-align:center">
				<?php
					for($i=0;$i<$count;$i++)
					{
						$dir="hue";
						if(rand(1,7)==1)$dir="left hue";
						if(rand(1,7)==2)$dir="right";
						if(rand(1,7)==3)$dir="fancy";
						if(rand(1,7)==4)$dir="left";
						if(rand(1,7)==5)$dir="hue";
						if(rand(1,7)==6)$dir="fuzzy";
						if(rand(1,7)==7)$dir="turn";
						echo "<img class='$dir' src='canada.png' alt='canada' style='width:100px'/>";
					}
				?>
			</div>
			<br />
			<div style="text-align:center;margin-top: 5px;">
			<?php
				$count--;
				if($count>=0) echo "<a href='index.php?count=$count&color=$color'>LESS CANADA! </a>";
				echo "|";
				$count+=2;
				echo "<a href='index.php?count=$count&color=$color'> More Canada!</a>";	
			?>
			</div>
			
		</div>
		<br />
		<div class="body-text" style="text-align:center">
			<a href="http://compsci.asmsa.org/goodellt21/">Return to Directory</a>
		</div>
	</body>


</html>



<?php

//~ $GLOBALS["count"]=5;
//~ function calculate_count()
//~ {
	//~ global $count;
	//~ // will print 0 and increment global variable
	//~ echo $GLOBALS["count"] . "<br/>"; 
//~ }
//~ calculate_count();
//~ setcookie ("contents","chocolate chip");
//$_COOKIE["contents"]="chocolate chip";
//~ foreach($_GET as $key=>$val)
//~ {
	//~ echo "$key = $val<br>";
//~ }


?>