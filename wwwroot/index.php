<?php
session_start();
if (array_key_exists('login',$_SESSION)){
  if ($_SESSION['login']==1){
    header("Location: main.php");
  }
}
if (!array_key_exists('login',$_SESSION)){
  $_SESSION['login']=0;
}

include "php/buildingTools.php";
include "php/utility.php";
$styleSheets=array("css/default.css", "css/login.css");
createHeader($styleSheets,"Welcome to Technique");
?>
<div class="centerScreen">
<?php
    createLogo();
?>
  <div class="container">
    <form method="post" id="loginform" action="main.php" class="login" onsubmit="return tryLogin();">
      <p>
        <label for="login" autocomplete="off">Email:</label>
        <input type="text" name="login" id="login" placeholder="">
      </p>

      <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="">
      </p>

      <p class="login-submit">
        <button type="submit" class="submit-button"></button>
      </p>
    </form>
  <div class = "logo logo-subtext"> <a href="registerForm.php">Sign-up!</a></div>
  </div>
  </br>
<?php
  if (array_key_exists("error",$_SESSION)){
    echo  "<div id='errorStatus' class='alert'> {$_SESSION['errormsg']} </div> \n";
  }
?>
  <div id="loginStatus" class="alert"> </div>
</div>
<script type="text/javascript" src="javascript/checklogin.js"></script>
</body>
</html>
