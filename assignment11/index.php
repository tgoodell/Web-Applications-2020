<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Did you know Canada?</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="instantpage.js" type="module"></script>
        <link rel="shortcut icon" href="favicons/favicon.ico">
        <link rel="icon" sizes="16x16 32x32 64x64" href="favicons/favicon.ico">
        <link rel="icon" type="image/png" sizes="196x196" href="favicons/favicon-192.png">
        <link rel="icon" type="image/png" sizes="160x160" href="favicons/favicon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicons/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="favicons/favicon-64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16.png">
        <link rel="apple-touch-icon" href="favicons/favicon-57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicons/favicon-114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicons/favicon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicons/favicon-144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicons/favicon-60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicons/favicon-120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicons/favicon-76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicons/favicon-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicons/favicon-180.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="favicons/favicon-144.png">
        <meta name="msapplication-config" content="favicons/browserconfig.xml">
        <script>
            function openNav() {
                document.getElementById("navbar").style.width = "100%";
            }
            function closeNav() {
                document.getElementById("navbar").style.width = "0%";
            }

            function chooseFact(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    console.log("Error: str=null");
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("welcome").innerHTML = this.responseText;
                    }
                    };
                    xmlhttp.open("GET","getfact.php?q="+str,true);
                    xmlhttp.send();
                }
            }

            function randFact() {
                var xmlhttp = new XMLHttpRequest();
                var min = 1;
                var max = 39;
                var factID = Math.floor(Math.random() * (max - min) ) + min;
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("welcome").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getfact.php?q="+factID,true);
                xmlhttp.send();
            }
        </script>

        <style>
            #rand-fact, #fact-form {
                background-color: #fff;
                display:inline-block;
                border: 1px solid red;
                color: red;
                transition: 0.5s;
                cursor: pointer;
                padding: 8px 10px;
            }

            #rand-fact:hover, #fact-form:hover {
                background-color: red;
                color: #fff;
            }

            #fact-form * {
                background-color: #fff;
                color: #000;
            }
        </style>
    </head>
    <body>
        <nav>
            <div id="navbar" class="overlay" style="box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 3px 10px 0 rgba(0,0,0,0.19);">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <a href="index.php" class="active">Home</a>
                    <a href="../">Directory</a>
                    <a href="http://compsci.asmsa.org/sewardn/landing.html">Seward's Landing Page</a>
                </div>
            </div>
            <div class="nav-logo">
                <span class="menu-button" onclick="openNav()">&#9776; Menu</span>
                <span>
                    <a href="">
                        <img src="logo.svg" alt="DYK Canada?" class="top-logo"></img>
                    </a>
                </span>
            </div>
        </nav>

        <div class="banner" style="border-bottom:3px solid #191923;min-height:60%;"><div style='text-align:center;'><image src="ca.png" class="mugshot" style="visibility: hidden;"></image></div></div>
        <div class="fact-card" style="margin-top:-10%;">
            <div id="welcome">
                <h1><span style="color:#000;">Welcome to <i>Did you know</span> Canada?</i></h1>
                <p style="margin-bottom:10px;">DYK<span style="color:red;">Ca</span> provides facts about prominent Canadians, cool Canadian inventions, geography facts, demographics, statistics, and more!</p>
                <p>Navigate through the facts by using the "Select a Fact" select box below or receive a random fact by clicking the <i class='fa fa-random' style="color:red;" aria-hidden='true'></i> button.</p>
                <br />
            </div>
            <div style="text-align:center">
                <form style="display:inline-block;">
                    <select id="fact-form" name="users" onchange="chooseFact(this.value)">
                        <option value="">Select a fact:</option>
                        <?php
                            $conn = new mysqli("localhost", "goodellt21", 'fR54wFmFvyPA%w#Z$zk#8!vAM#@bz3KW', "goodellt21");

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            
                            $stmt = $conn->prepare("SELECT * FROM canada_facts");
                            $stmt->execute();
                            $stmt_result = $stmt->get_result();
                            while($row = $stmt_result->fetch_assoc())
                            {
                                $id=$row["id"];
                            /*  $id=$row["id"];
                                $checked="";
                                /* if($row["complete"])$checked="CHECKED";
                                echo "<input type='hidden' onclick='toggle($id)' $checked/>$name <a onclick='remove($id);'></a><br />"; */
                                echo "<option value=" . $id . ">" . $id . "</option>";
                            }
                        ?>
                    </select>
            </form>
            <button id="rand-fact" onclick="randFact()"><i class='fa fa-random' aria-hidden='true'></i></button>
        </div>
        </div>
       
        <footer>
            <div class="footer-image"><div style='text-align:center;'><image src="ca.png" class="mugshot"></image></div></div>
            <div class="footer-text">
                <p>&copy; <?php echo date("Y"); ?> Did you know Canada?</p>
            </div>
        </footer>
    </body>
</html>