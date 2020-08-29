<?php
    $conn = new mysqli("localhost", "username", "password", "database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET["nuke"])) {
   
        $stmt = $conn->prepare("UPDATE animals SET tally = 0");
        $stmt->execute();
    
        $_GET["nuke"] = null;
    
    }

    if(isset($_GET["animalID"]))
    {
        $animalid=$_GET["animalID"];
        $stmt = $conn->prepare("UPDATE animals SET tally = tally+1 WHERE animals.ID = ?;");
        $stmt->bind_param("i", $animalid);
        
        $stmt->execute();
    }

    //~ $conn->close();
?>

<html>
    <head>
        <title>Assigment06 &mdash; PHPoll</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://compsci.asmsa.org/goodellt21/assignment01/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            body-text h1, body-text h2 {
                padding: 5px;
                margin: 10px;
            }

            input {
                background-color: #fff;
                border-color: #073763;
                margin: 5px 0 5px 0;
                padding: 5px;
            }

            input:hover {
                background-color: AliceBlue;
            }
        </style>
	</head>
    <body>
        <div class="body-text">
            <h1>Assignment06 &mdash; PHPoll</h1>
            <h2>Vote for the best ice cream!</h2>
            <!--Vote Dropdown-->
            <?php
                $stmt = $conn->prepare("SELECT * FROM animals");

                //if(isset($_GET["search"]))$searchTerm="%".$_GET["search"]."%";
                $stmt->execute();
                $stmt_result = $stmt->get_result();

                echo "<form action='' method='GET'><select name='animalID'>";
                while($row = $stmt_result->fetch_assoc())
                {
                    $name=$row["name"];
                    $id=$row["ID"];
                    echo "<option value=$id>$name</option>";
                }
                echo "</select><input type='submit' /></form>";
            ?>

            <h2>Propose New Item</h2>

            <form action="" method="post">
                <input type="text" name="name" placeholder="Suggestion..." required>
                <button type="submit" name="submit">Submit</button>
            </form>
            <!--New submission-->
            <?php
                if(isset($_POST['submit'])) {
                    $animalName = $_POST['name'];
                    $sql = "INSERT INTO `animals` (`ID`, `name`, `tally`, `tstamp`) VALUES (NULL, '$animalName', '0', CURRENT_TIMESTAMP);";
                    $result = mysqli_query($conn, $sql);
                    
                    if($result)
                    {
                        echo $animalName . " has been added!";
                    }
                    else
                    {
                        echo "Unable to make suggestion.";
                    }
                }
            ?>

            <h2>Data</h2>
            <?php
                $stmt = $conn->prepare("SELECT * FROM animals");

                if(isset($_GET["search"]))$searchTerm="%".$_GET["search"]."%";
                $stmt->execute();
                $stmt_result = $stmt->get_result();

                $sum = 0;       
                while($row = $stmt_result->fetch_assoc()) {
                    $tally=$row["tally"];
                    $sum = $sum + $tally;
                }

                $stmt->execute();
                $stmt_result = $stmt->get_result();

                while($row = $stmt_result->fetch_assoc()) {
                    $name = $row["name"];
                    $tally = $row["tally"];
                    $percent = round(($tally/$sum)*100,2);
                    echo "<p>$name: $tally</p>";
                    echo "<div style='background-color:MidnightBlue;color:MidnightBlue;width:$percent%'>_</div>";
                }
            ?>

            <br />

            <h2>Nuke</h2>
            <form method="get" action='index.php'>
                <input type="submit" value="Launch Nukes" name="nuke"/>
            </form>
        </div>
    </body>
</html>
