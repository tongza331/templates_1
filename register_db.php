<?php
    session_start();
    include('server.php');
    $error = array();

    if (isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $psw1 = mysqli_real_escape_string($conn,$_POST['password_1']);
        $psw2 = mysqli_real_escape_string($conn,$_POST['password_2']);
        
        if ($password_1 != $password_2){
            array_push($errors,"The two password is not match");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $query = mysqli_query($conn,$user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result){
            if ($result['username'] === $username){
                array_push($errors,"Username already exists");
            }
            if ($result['email'] === $email){
                array_push($errors,"Email already exists");
            }
        }
        if (count($errors)==0){
            $password = md5($password_1);
            $sql = "INSERT INTO user ('username','email','password') VALUES ('$username','$email','$password_1')";
            mysqli_query($conn,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: #');
        }
    }

?>