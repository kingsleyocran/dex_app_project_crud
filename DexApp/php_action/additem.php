<?php 



if($_POST) {

    $hf_idnumber = $_POST['hf_idnumber'];
    $hf_fname = $_POST['hf_fname'];
    $hf_lname = $_POST['hf_lname'];
    $hf_oname = $_POST['hf_oname'];
    $hf_email = $_POST['hf_email'];
    $hf_prog = $_POST['hf_prog'];
    $hf_level = $_POST['hf_level'];
    $hf_hall = $_POST['hf_hall'];
    $hf_paddress = $_POST['hf_paddress'];
    $hf_tel = $_POST['hf_tel'];
    $hf_dob = $_POST['hf_dob'];
    $hf_pname = $_POST['hf_pname'];
    $hf_ptel = $_POST['hf_ptel'];
    $hf_ppaddress = $_POST['hf_ppaddress'];
	$hf_pob = $_POST['hf_pob'];
    
    
    //Check this part
    $myNam = "";
    $myNam = $_SESSION['userName'];
    $sql = "INSERT INTO $myNam(hf_idnumber, hf_fname, hf_lname, hf_oname, hf_email, hf_prog, hf_level, hf_hall, hf_paddress, hf_tel, hf_dob, hf_panme, hf_ptel, hf_ppaddress, hf_pob) 
            VALUES( '$hf_idnumber', '$hf_fname', '$hf_lname', '$hf_oname', '$hf_email', '$hf_prog', '$hf_level', '$hf_hall', '$hf_paddress', '$hf_tel', '$hf_dob', '$hf_pname', '$hf_ptel', '$hf_ppaddress', '$hf_pob')";
    
    if(mysqli_query($db2, $sql) === TRUE){
        $_SESSION['success'] = "New Record Successfully Created";
    }

    header("Location: /DexApp/additem.php");

	//  if($link->query($sql) === TRUE){

	// 	echo "<p>New Record Successfully Created</p>";
	// 	echo "<a href='../create.php'><button type='button'>Back</button></a>";
	// 	echo "<a href='../index.php'><button type='button'>Home</button></a>";

	// } else {

	// 	echo "Error " . $sql. ' ' . $db2->connect_error;

	// }

    //if(mysqli_query($db, $sql)){
      //  $var = 1;
	//}
	//refers the query to the connection $db
        //Could also be written as: $result = $db->query($sql);

	
	//$db2->close();
}

?>