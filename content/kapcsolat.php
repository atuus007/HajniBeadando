<?php
	include("config/connect.php");
	//session_start();
	
	if(isset($_POST['send_contact'])){
		$current_date = date("Y/m/d H:i:s");
		$sql = "INSERT INTO contacts(name, email, comment,arrived) VALUES ('".
		$_POST['nev']."', '".
		$_POST['email']."', '".
		$_POST['comment']."','".
		$current_date."')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		echo "<meta http-equiv='refresh' content=4>";
		exit();
	}
	echo "<h1>Kapcsolat</h1>";
	if(isset($_SESSION["username"])){

		$sql = "select name, email,comment,arrived from contacts";
		if($result = mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result) > 0){
				echo "<table>";
            	echo "<tr>";
                echo "<th>name</th>";
                echo "<th>email</th>";
                echo "<th>comment</th>";
                echo "<th>arrived</th>";
				echo "</tr>";
				while($row = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td><a href=\"mailto:" . $row['email'] . "\">".$row['email']."</a></td>";
					echo "<td>" . $row['comment'] . "</td>";
					echo "<td>" . $row['arrived'] . "</td>";
					echo "</tr>";
				}

				echo "</table>";
			}else{
				echo "No records matching your query were found.";
			}
		}else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
		mysqli_close($conn);






	}else{
		echo"<section class=\"contact_block\">
				<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
					<label>Név: </label><br>
					<input type=text name=\"nev\" size=23 maxlength=255 value=\"\"><br>
					<label>Email: </label><br>
					<input type=email name=\"email\" size=23 maxlength=255 value=\"\"><br>
					<label>Megjegyzés: </label><br>
					<input type=text name=\"comment\" size=23 maxlength=255 value=\"\"><br>
					<input type=submit name=\"send_contact\" value=\"Elküld\">
				</form>
			</section>";
	}
?>