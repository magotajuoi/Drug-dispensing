<?php
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $SSN = $_POST["SSN"];
    $Address = $_POST["Address"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"];
    $Gender = $_POST["Gender"];


    $conn = new mysqli('localhost','root','','drug dispensing');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO patient(SSN ,FirstName ,LastName ,Email ,Gender , Phone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $SSN ,$FirstName ,$LastName ,$Email ,$Gender , $Phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful.";

		$stmt->close();
		$conn->close();
    }
    ?>