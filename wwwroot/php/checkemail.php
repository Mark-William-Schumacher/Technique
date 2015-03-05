<?php
/**
 *  Returns 0 if the name is not in use
 *  Returns 1 if the name is in use
 * Post must be done with 'username'
 */
    include "querys.php";
    $cxn = connectToTechnique();
    if(isset($_POST['username'])){ //if we get the name succesfully
        $username = mysqli_real_escape_string($cxn, $_POST['username']);
        if (!empty($username)) {
            $username_query = mysqli_query($cxn, "SELECT COUNT(`email`) FROM `users` WHERE `email`= '$username'");
            $username_result = mysqli_fetch_row($username_query);

            if ($username_result[0] == '0') {
                echo 0;
            } else {
                echo 1;
            }
        }
    }

?>
