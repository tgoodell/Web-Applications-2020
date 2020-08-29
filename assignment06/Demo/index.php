<?php 
$servername = "localhost";
$username = "username";
$password = "password";

$conn = new mysqli("localhost", "sewardn", "squirrel", "sewardn");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>

<html>
	<head>
	
	</head>
	<body>
		<p>Hello!</p>
		<?php
			//1) Prepared Statement
			$stml = $conn->prepare("SELECT * FROM animals");
			//2) Bind Parameter, no example.
			//3) Fill in Bound Param
			$stml->execute();
			$stml_result = $stmt->get_result();
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				$name=$row["name"];
				echo "$name" . "<br />";
			}
			$stml = $conn->prepare("INSERT INTO animals (name) VALUES (?)");
			$stml->bind_param("s", $animal);
			$animal = "Ocelot";
			$stml->execute();
			//$sql = "INSERT INTO animals (name) VALUES ('$animal')";
			//$conn->query($sql);
			$conn -> close();
		?>
	</body>
</html>
