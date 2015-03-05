<?php
session_start();
include "buildingTools.php";
$styleSheets=array("../css/login.css","../css/default.css","../css/forms.css");
createHeader($styleSheets,"Welcome to Technique");
?>
<div class="centerScreen">
<?php
    createLogo();
?>
  <div class="container">
<?php
  echo "<h1> {$_SESSION['error']}: {$_SESSION['errormsg']} </h1>";
?>

</div>
</div>
</body>
</html>
