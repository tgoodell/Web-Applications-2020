<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Did you know Canada?</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="instantpage.js" type="module"></script>
        <script>
            function openNav() {
                document.getElementById("navbar").style.width = "100%";
            }
            function closeNav() {
                document.getElementById("navbar").style.width = "0%";
            }
        </script>
    </head>
    <body>
        <nav>
            <div id="navbar" class="overlay" style="box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 3px 10px 0 rgba(0,0,0,0.19);">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <a href="index.php">Home</a>
                    <a href="all-facts.php" class="active">All Facts</a>
                    <a href="about.php">About</a>
                    <a href="credits.php">Credits</a>
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

        <div class="banner" style="border-bottom:3px solid #191923;min-height:40%;"><div style='text-align:center;'><image src="ca.png" class="mugshot" style="visibility: hidden;margin-top:3em;"></image></div></div>
            <?php
                $conn = new mysqli("localhost", "goodellt21", 'fR54wFmFvyPA%w#Z$zk#8!vAM#@bz3KW', "goodellt21");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                            
                $stmt = $conn->prepare("SELECT * FROM canada_facts");
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                while($row = $stmt_result->fetch_assoc()) {
                    $id=$row["id"];
                    $sourceID=$row["source"];
                    $factText = $row["fact"];
                    $category = $row["category"];
                    $dateAdded = $row["dateAdded"];

                    echo "<div class='fact-card' style='margin-top:-4em;margin-bottom:6em;'>";
                    echo "<h1>" . $id . " &mdash; Did you know...</h1>";
                    echo "<p>" . $factText . "</p>";
                    echo "<div class='fact-details'>Source: <i>" . $sourceID . "</i> | Date Added: " . $dateAdded . "</div>"; 
                    echo "</div>";
                }
            ?>
        </div>
       
        <footer>
            <div class="footer-image"><div style='text-align:center;'><image src="ca.png" class="mugshot"></image></div></div>
            <div class="footer-text">
                <p>&copy; <?php echo date("Y"); ?> Did you know Canada?</p>
            </div>
        </footer>
    </body>
</html>