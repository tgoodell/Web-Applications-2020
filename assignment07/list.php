<?php

$conn = new mysqli("localhost", "username", 'password', "database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


echo "<div id='inprogress'>";
$stmt = $conn->prepare("SELECT * FROM list WHERE complete=0");
$stmt->execute();
$stmt_result = $stmt->get_result();
while($row = $stmt_result->fetch_assoc())
{
    $name=$row["name"];
   /*  $id=$row["id"];
    $checked="";
    /* if($row["complete"])$checked="CHECKED";
    echo "<input type='hidden' onclick='toggle($id)' $checked/>$name <a onclick='remove($id);'></a><br />"; */
    echo "<p class='my-3 p-1 shadow bg-white rounded text-dark'>$name</p>";
}
echo "</div>";

/* echo "<div id='done'>";
$stmt = $conn->prepare("SELECT * FROM list WHERE complete=1");
$stmt->execute();
$stmt_result = $stmt->get_result();
while($row = $stmt_result->fetch_assoc())
{
    $name=$row["name"];
    $id=$row["id"];
    $checked="";
    if($row["complete"])$checked="CHECKED";
    echo "<input type='hidden' onclick='toggle($id)' $checked/>$name <a onclick='remove($id);'></a><br />";
}
echo "</div>"; */

?>
