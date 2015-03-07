<?php 
include "php/buildingTools.php";
$styleSheets=array("css/default.css");
createHeader($styleSheets, "Sign-up NOW");
?>
<?php
    createLogo();
?>
    <p class= "register-text"> Sign-Up Form </p>
    <form method="post" onsubmit="return validate();" action="php/register.php" class="formA shift-left">

        <p>
            <label for="firstname" >First Name</label>
            <input type="text" required name="firstname" id="firstname" placeholder="">
        </p>
        <p>
            <label for="lastname" >Last Name:</label>
            <input type="text" name="lastname" id="lastname" placeholder="">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" required name="email" id="email" placeholder="">
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" required name="password" id="password" placeholder="">
        </p>

        <p>
            <label for="repassword">Confirm:</label>
            <input type="password" required name="repassword" id="repassword" placeholder="">
        </p>

        <p class="register-submit">
            <button id="submitbutton" type="submit" class="submit-button"></button>
        </p>
    </form>
    <div class="container">
        <div id="email_status" class="alert"> </div>
        <div id="email_exists"  class="alert"> </div>
        <div id="passMatch"  class="alert"> </div>
    </div>
    <script type="text/javascript" src="javascript/checkregistration.js"></script>


</body>
</html>
