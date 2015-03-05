<?php
function betterVarDump($string, $item){
    echo "<pre><h1>{$string}</h1>",
    var_dump($item),
    "</pre>";
}

/**
 * This just simple checks that main.php to make sure the user belongs on that page
 * It also sets the session variables with the values from the user table
 * $_SESSION[] for first_name,last_name,email,password,user_id are now set
 */
function loginCheck(){
  if (!array_key_exists("login",$_SESSION)){
    header("Location: index.php");
    exit();
  }

  if (!array_key_exists("login",$_POST)){
    if ($_SESSION["login"]==0){
      header("Location: index.php");
      exit();
    }
  }

  if ($_SESSION['login'] == 0){
    $username_result=loginUser($_POST["login"],$_POST["password"]);
    if ($username_result==0){
      $_SESSION['error']=1;
      $_SESSION['errormsg']="Error Logging in";
      header("Location: index.php");
      exit();
    }
    foreach ($username_result as $key => $value){
      $_SESSION[$key]=$value;
    }
  }
  $_SESSION ['error']=0;
  $_SESSION ['login']=1;
}

?>
