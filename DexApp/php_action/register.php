<?php 




//if the submit button is clicked
if($_POST) {
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
        header("Location: /DexApp/register.php");
        
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


        header("Location: /DexApp/logon.php");                
    }

}

?>