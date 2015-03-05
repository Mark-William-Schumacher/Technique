<?php
include "utility.php";
session_start();
include "querys.php";
if (!array_key_exists("answer",$_POST)){
    header("Location: ../index.php");
    exit();
}
$user_id          = $_SESSION["user_id"];
$question_id      = $_SESSION["questionTable"]["question_id"];
$answer_id        = $_POST["answer"];
$submitSuccessful = answerQuestion($user_id, $question_id, $answer_id);

if ($submitSuccessful){
  header("Location: ../main.php");
  exit();
}
else{
  $_SESSION['error'] = 1;
  $_SESSION['errormsg']="Answer Question failed from submit";
  header("Location: ../error.php");
}
?>
