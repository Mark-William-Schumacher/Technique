<?php
session_start();
include "php/buildingTools.php";
include "php/querys.php";
include "php/utility.php";
loginCheck(); // From utility.php , sets all session variables and checks for login errors

$_SESSION["currentQuestionID"]  = getCurrentQuestion($_SESSION['user_id']); // If not more questions --> complete.php
$_SESSION['questionTable']      = getQuestionTable($_SESSION["currentQuestionID"]);
$optionsDelimited               = $_SESSION['questionTable']["solution_file"];
$_SESSION['options_HTML']       = explode ("," , $optionsDelimited);
$_SESSION['question_HTML']      = $_SESSION['questionTable']["question_file"];

$styleSheets=array("css/default.css");
createHeader($styleSheets,"Technique");
createLogo();
  echo "<div class='container'>",
          "<form method='post' action='php/logout.php'>",
            "<button type='submit' id='logout'> Logout </button>",
          "</form>",
        "</div>";

  echo  "<div id='questionBox'>\n",
        "<p> Given the following function, give the correct BIG - O notation.",
        "The parameter numbers is an array of integers.",
        "You have two minutes.</p>",
            $_SESSION['question_HTML'],
        "</div>";

  echo  "<div id='answerBox'>",
          "<form method='post' action='php/submit-question.php'>",
          "<label> Pick the Correct Big O Notation </label></br></br>";
          foreach ($_SESSION['options_HTML'] as $value => $entry){
            echo "<span> {$entry}:<input type='radio' name='answer' value={$value} /> </span>";
          }
          if (array_key_exists("lastQuestion",$_SESSION)){
            if ($_SESSION['lastQuestion']){
              echo "<div class='container'><h2> Correct ! </h2>";
            }
            else {
              echo "<div class='container'><h2> Wrong ! </h2>";
            }
          }
          echo "</br> <button type='submit'> Answer </button> </form></div>";

echo "</body></html>";
