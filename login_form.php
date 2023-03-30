<?php

    if(isset($_POST['login'])){
        //var_dump($_POST);

        require_once "user.php";
        $user = new User();
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->SetPassword($_POST['password']);
        $user->ShowUser();


        $errors = $user->ValidateUser();

        if(count($errors) == 0){
            echo "login validate bad";            
        }
        else{
            echo "login validate bad";
        }
        
        if(count($errors) > 0){
            $message = "";
            foreach($errors as $error){
                $message .= $error . "\\n";
            }
            echo "<script>alert('$message');</script>";
        }

        if (isset($_GET['check login'])) {
            $sessionmsg = "<script>alert('$message');</script>";
            echo $sessionmsg;
        }

        if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
            $user->LogoutUser();
            echo "<script>alert('You are now logged out');</script>";
        }
    }

?>


<!DOCTYPE html>
<html>
<body>
    <h3>Log In</h3>
    <hr/>
    <form action="" method="POST">
        <h4>login here</h4>

        <label>Username</label>
        <input type="text" name="username" placeholder="Username">

        <br>

        <label>Email</label>
        <input type="email" name="email" placeholder="Email">

        <br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password">

        <br>

        <input type="submit" name="login" value="Login">
        <button type="submit" name="logout">Logout</button>
        <button type="submit" name="check login">Check Login</button>

    </form>
    <br>

</body>