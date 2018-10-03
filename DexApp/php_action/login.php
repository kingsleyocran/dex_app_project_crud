<?php 


//logging the user in when button clicked
if($_POST) {
    $email = $_POST['email'];
    $password_3 = $_POST['password_3'];

    //Check empty boxes
    if (empty($email)){
        array_push($errors2, "Email is required");
    }

    if (empty($password_3)){
        array_push($errors2, "Password is required");
    }

    if(count($errors2) > 0){
        header("Location: /DexApp/login.php");
        
    }

    if(count($errors2) == 0){
        $password = md5($password_3); //encrypting password before comparing again
        $qry = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        $execute = mysqli_query($db, $qry);
        $num  = mysqli_num_rows($execute);

        if($num == 1){

            $_SESSION['email'] = $email;
            //search for username and save it to $username.
            $query = "SELECT username FROM users WHERE email = '$email' AND password = '$password' ";
            $ans = mysqli_query($db, $query);
            $num1 = mysqli_num_rows($ans);
            if($num1 == 1){
                $row = mysqli_fetch_assoc($result);
                $username = $row["username"] ;
                $_SESSION['username'] = $username;
            }
            
            header("Location: /DexApp/dashboard.php");
        }else{
            array_push($errors2, "The email and/or password is incorrect ");

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


?>