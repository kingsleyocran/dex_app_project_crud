<?php































//Starts a session
session_start();


$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
$password_3 = "";
$errors = array();
$errors2 = array();

//$db = mysqli_connect('localhost','root','','registration');

//if the submit button is clicked
if(isset($_POST['register'])){
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

    if(count($errors) == 0){
        $password = md5($password_1); //encrypting password
        $sql = "INSERT INTO users (username, email, password) 
                    VALUES('$username','$email','$password')";

        mysqli_query($db, $sql); //refers the query to the connection $db
        //Could also be written as: $result = $db->query($sql);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        
        //create a table for that particular registered user
        $sql = "CREATE TABLE $username(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            hf_fname VARCHAR(30) NOT NULL,
            hf_lname VARCHAR(30) NOT NULL,
            hf_oname VARCHAR(30) NOT NULL,
            hf_idnumber VARCHAR(30) NOT NULL,
            hf_email VARCHAR(30) NOT NULL UNIQUE,
            hf_prog VARCHAR(30) NOT NULL,
            hf_level VARCHAR(30) NOT NULL,
            hf_hall VARCHAR(30) NOT NULL,
            hf_paddress VARCHAR(30) NOT NULL,
            hf_tel VARCHAR(30) NOT NULL,
            hf_dob VARCHAR(30) NOT NULL,
            hf_pname VARCHAR(30) NOT NULL,
            hf_ptel VARCHAR(30) NOT NULL,
            hf_ppaddress VARCHAR(30) NOT NULL,
            hf_pob VARCHAR(30) NOT NULL
        )";
        mysqli_query($db, $sql);

        header("Location: logon.php");                
    }

}

//logging the user in when button clicked
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password_3 = $_POST['password_3'];

    //Check empty boxes
    if (empty($email)){
        array_push($errors2, "Email is required");
    }

    if (empty($password_3)){
        array_push($errors2, "Password is required");
    }

    if(count($errors2) == 0){
        $password = md5($password_3); //encrypting password before comparing again
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
        $result = $db -> query($sql);
        if($result -> num_rows == 1){
            array_push($errors2, "The email/password is incorrect ");
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;

            header("Location: dashboard.php");
            
        }
        

        /*if(!$row = $result -> fetch_assoc()){
            array_push($errors2, "The email/password is incorrect ");
        }else{
            header("Location: DashboardDex.html");
        }*/


        /*$result = mysqli_query($db,$query);
		if (mysqli_num_rows($result) == 1) {
         //log user in
            header("Location: DashboardDex.html");
                            
        }else{
            array_push($errors2, "The email/password is incorrect ");
            header("Location: login.php");
        }*/
    }
}

    //logout
    /*if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header("Location : login.php");
    }



    */


    //logout
    /*if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header("Location : login.php");
    }



    */


if(isset($_POST['additem'])){
    $var = 0;
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


    
    $sql = "INSERT INTO dolly(hf_idnumber, hf_fname, hf_lname, hf_oname, hf_email, hf_prog, hf_level, hf_hall, hf_paddress, hf_tel, hf_dob, hf_panme, hf_ptel, hf_ppaddress, hf_pob) 
            VALUES( '$hf_idnumber', '$hf_fname', '$hf_lname', '$hf_oname', '$hf_email', '$hf_prog', '$hf_level', '$hf_hall', '$hf_paddress', '$hf_tel', '$hf_dob', '$hf_pname', '$hf_ptel', '$hf_ppaddress', '$hf_pob')";
        
    if(mysqli_query($db, $sql)){
        $var = 1;
    } //refers the query to the connection $db
        //Could also be written as: $result = $db->query($sql);


    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
   
               
  
    
}



?>