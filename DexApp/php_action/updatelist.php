<?php 



if($_POST) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$contact = $_POST['contact'];

	$id = $_POST['id'];

	$sql  = "UPDATE $username SET fname = '$fname', lname = '$lname', age = '$age', contact = '$contact' WHERE id = {$id}";
	if($link->query($sql) === TRUE) {
		echo "<p>Succcessfully Updated</p>";
		echo "<a href='../edit.php?id=".$id."'><button type='button'>Back</button></a>";
		echo "<a href='../index.php'><button type='button'>Home</button></a>";
	} else {
		echo "Erorr while updating record : ". $link->error;
	}

	$db2->close();

}

?>