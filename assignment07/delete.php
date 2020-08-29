<?php

$conn = new mysqli("localhost", "username", 'password', "database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if(isset($_GET["item"]))
{
    $item=$_GET["item"];
    $stmt = $conn->prepare("INSERT INTO list (name) VALUES (?);");
    $stmt->bind_param("s", $item);
    
    $stmt->execute();
}


//~ $conn->close();

/*

<html>
<head>
    

</head>
<body>

$stmt = $conn->prepare("SELECT * FROM animals");

if(isset($_GET["search"]))$searchTerm="%".$_GET["search"]."%";
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
  







</body>
</html>
*/

?>
