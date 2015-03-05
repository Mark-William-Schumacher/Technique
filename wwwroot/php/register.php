<?php
  include "utility.php";
  include "buildingTools.php";
  include "querys.php";
  if(isset($_POST['firstname'])){
    extract($_POST);
    adduser($firstname,$lastname,$email,$password);
  }
  else{
    header("Location: ../index.php");
    exit();
  }
  $styleSheets=array("../css/default.css");
  createHeader($styleSheets,"Thank you for Registering");
  createLogo();
  header( "refresh:5; ../index.php" );
?>
<script src="../javascript/canvasloader.js"></script>
</br></br></br>
<div id="canvasloader-container" class="wrapper container">
  <div id="canvasLoader" style="display: block; position: absolute; top: -37px; left: -37px;">
    <canvas width="74" height="74"></canvas>
    <canvas width="74" height="74" style="display: none;"></canvas>
  </div>
</div>
<script>
    var cl = new CanvasLoader('canvasloader-container');
    cl.setColor('#ffa538'); // default is '#000000'
    cl.setDiameter(160); // default is 40
    cl.setDensity(138); // default is 40
    cl.setRange(0.8); // default is 1.3
    cl.setSpeed(3); // default is 2
    cl.setFPS(45); // default is 24
    cl.show(); // Hidden by default
</script>
<div class="logo logo-subtext"> Thanks for Registering</br> You will automatically be redirected in 5 seconds</div>
</body>
</html>
