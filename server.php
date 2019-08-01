<?php
    $email = "";
    $errors = array();
    
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    
    if (isset($_POST['register'])) {
        $email = mysql_real_escape_string($_POST['email']);
        $psw = mysql_real_escape_string($_POST['psw']);
        $psw-repeat = mysql_real_escape_string($_POST['psw-repeat']);
        
        if (empty($email)) {
            array_push($errors, "Email is reguired!");
        }
        if (empty($psw)) {
            array_push($errors, "Password is reguired!");
        }
        if ($psw != $psw-repeat) {
            array_push($errors, "Passwords don't match!");
        }
        
        if (count($errors) == 0) {
            $password = md5($psw);
            $sql = "INSERT INTO users (email, password)
                        VALUES ('$email', '$password')";
            mysqli_query($db, $sql);
        }
        
        
    }

?>
