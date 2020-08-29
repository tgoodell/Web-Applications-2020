<!-- <?php
    /* $conn = new mysqli("localhost", "username", "password", "database");

    $fact=intval($_GET['q']);

    $stmt = $conn->prepare("SELECT * FROM canada_facts WHERE id=$fact");
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    $row = $stmt_result->fetch_assoc();
    $factText = $row["fact"];
    $category = $row["category"];
    $source = $row["source"];
    $dateAdded = $row["dateAdded"];

    echo "<p>" . $factText . "</p>";
    echo "<div class='fact-details'>Source: <i>" . $source . " | Date Added: " . $dateAdded . "</div>"; */
?> -->

<!DOCTYPE html>
<html>
<head>
    <style>
        
    </style>
</head>
<body>

<?php
/* DB Prep */
$fact = intval($_GET['q']);
$conn = new mysqli("localhost", "username", "database", "database");

/* Get sourceID and convert it to a source */
$stmt = $conn->prepare("SELECT * FROM canada_facts WHERE id = '".$fact."'");
$stmt->execute();
$stmt_result = $stmt->get_result();
$row = $stmt_result->fetch_assoc();
$sourceID = $row["source"];
$stmt = $conn->prepare("SELECT * FROM canada_fact_sources WHERE id = '".$sourceID."'");
$stmt->execute();
$stmt_result = $stmt->get_result();
$row = $stmt_result->fetch_assoc();
$source = $row["source"];

/* Set other variables */
$stmt = $conn->prepare("SELECT * FROM canada_facts WHERE id = '".$fact."'");
$stmt->execute();
$stmt_result = $stmt->get_result();
$row = $stmt_result->fetch_assoc();
$factText = $row["fact"];
$category = $row["category"];
$dateAdded = $row["dateAdded"];

echo "<h1>" . $fact . " &mdash; Did you know...</h1>";
echo "<p>" . $factText . "</p>";
echo "<div class='fact-details'>Source: <i>" . $source . " | Date Added: " . $dateAdded . "</div>"; 
?>
</body>
</html>
