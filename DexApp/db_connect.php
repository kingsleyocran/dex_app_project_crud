<?php 
session_start();

$username = "";
$userName="";
$email = "";
$password_1 = "";
$password_2 = "";
$password_3 = "";
$errors = array();
$errors2 = array();

$db = mysqli_connect('localhost', 'root', '');
mysqli_select_db( $db, "registration" );


$db2 = mysqli_connect('localhost', 'root', ''); 
mysqli_select_db( $db2, 'student_datatable');


//if the submit button is clicked
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //Check empty boxes
    if (empty($username)){
        array_push($errors, "Username is required");
    }
    if (empty($email)){
        array_push($errors, "Email is required");
    }
    if (empty($password_1)){
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2){
        array_push($errors, "The two passwords do no match");
    }

    if(count($errors2) > 0){
        header("Location: register.php");
        
    }

    if(count($errors) == 0){
        $password = md5($password_1); //encrypting password
        $sql = "INSERT INTO users (username, email, password) 
                    VALUES('$username','$email','$password')";
        if(mysqli_query($db, $sql) === TRUE){
            $_SESSION['username'] = $username;
        }
     
        //create a table for that particular registered user
        $sql = "CREATE TABLE $username(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            hf_idnumber VARCHAR(255) NOT NULL,
            hf_fname VARCHAR(255) NOT NULL,
            hf_lname VARCHAR(255) NOT NULL,
            hf_oname VARCHAR(255) NOT NULL,
            hf_email VARCHAR(255) NOT NULL UNIQUE,
            hf_prog VARCHAR(255) NOT NULL,
            hf_level VARCHAR(255) NOT NULL,
            hf_hall VARCHAR(255) NOT NULL,
            hf_paddress VARCHAR(255) NOT NULL,
            hf_tel VARCHAR(255) NOT NULL,
            hf_dob VARCHAR(255) NOT NULL,
            hf_pname VARCHAR(255) NOT NULL,
            hf_ptel VARCHAR(255) NOT NULL,
            hf_ppaddress VARCHAR(255) NOT NULL,
            hf_pob VARCHAR(255) NOT NULL
        )";
        mysqli_query($db2, $sql);
        header("Location: logon.php");                
    }

}

//logging the user in when button clicked
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password_3 = $_POST['password_3'];

    // $email = mysqli_real_escape_string($db,$_POST['email']);
    // $password_3 = mysqli_real_escape_string($db,$_POST['password']);

    //Check empty boxes
		// ensuring that the form is filled properly
		if (empty($email)) {
			array_push($errors2, "Email is required");
		}
		if (empty($password_3)) {
			array_push($errors2, "Password is required");
		}

    if(count($errors2) > 0){
        header("Location: login.php");
    }

    if(count($errors2) == 0){
        $password = md5($password_3); //encrypting password before comparing again
        $qry = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        $execute = mysqli_query($db, $qry);
        $num  = mysqli_num_rows($execute);
        if($num == 1){
            $row = mysqli_fetch_assoc($execute);
            $username = $row["username"];
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
        }else{
            array_push($errors2, "The email and/or password is incorrect ");
        }
    }
}

//adding an item to $db2
if(isset($_POST['additem'])) {

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

if(isset($_POST['logout'])) {
    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 

    header('location: /DexApp/login.php');
}

?>


