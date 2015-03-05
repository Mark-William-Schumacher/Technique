<?php
/**
 *  Returns 0 if the name is not in use
 *  Returns 1 if the name is in use
 */
    include "querys.php";
    $cxn = connectToTechnique();
    if(isset($_POST['username'])){ //if we get the name succesfully
        $username = mysqli_real_escape_string($cxn, $_POST['username']);
        $password = md5(mysqli_real_escape_string($cxn, $_POST['password']));
        if (!empty($username)) {
            $username_query = mysqli_query($cxn, "SELECT email,password,user_id
                                                FROM users
                                                WHERE email='$username' AND password='$password'");
            $username_result = mysqli_fetch_row($username_query);

            if ($username_result) {
                echo $username_result[user_id];
            } else {
                echo 0;
            }
        }
    }

?>
