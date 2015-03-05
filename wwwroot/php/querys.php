<?php
/**
 * Connects to the technique database
 * Please remember to close the cxn in functions that use this
 * @return mysql connection to technique
 * * since header calls exist , this should be called before any html
 */
function connectToTechnique(){
    $host       = "127.0.0.1";
    $user       = "root";
    $password   = "jan1378";
    $dbname     = "technique";
    $cxn        = mysqli_connect($host, $user, $password, $dbname);
    if (!$cxn){
        $message = mysqli_error($cxn);
        $_SESSION['error'] = 1;
        $_SESSION['errormsg'] = "Couldn't connect: {$message}";
        header("Location: php/error.php");
        mysqli_close($cxn);
        exit();
    }
    return $cxn;
}

/**
 * Adds user into database
 * @param [type] $firstname
 * @param [type] $lastname
 * @param [type] $email
 * @param [type] $password
 */
function addUser($firstname,$lastname,$email,$password){
  $cxn = connectToTechnique();
  $firstname = mysqli_real_escape_string ($cxn,$firstname);
  $lastname = mysqli_real_escape_string ($cxn,$lastname);
  $email = mysqli_real_escape_string ($cxn,$email);
  $password = md5(mysqli_real_escape_string ($cxn,$password));
  $date=date('Y-m-d H:i:s' ,strtotime("now"));

  $query1 = "   INSERT INTO users (email,password,join_date,first_name,last_name,score)
                VALUES ('$email','$password','$date','$firstname','$lastname',0);
            ";

  $query1Result = mysqli_query($cxn, $query1)
        or die("Sorry, User Name Exists! Try again");
  $idNumber=mysqli_insert_id ($cxn);

  $query2 = " INSERT INTO users_roles (role_id, user_id)
              VALUES (1,$idNumber);
          ";
  $query2Result = mysqli_query($cxn, $query2)
    or die("Error Creating User Role");
  mysqli_close($cxn);
}

/**
 * Logs the user into the session and sets the session variable for login
 * @param  $websiteUser     email address of the user
 * @param  $websiteUserpass  password for DB
 * @return returns userID  for DB
 */
function loginUser($websiteUser, $websiteUserpass){
    $cxn              = connectToTechnique();
    $websiteUser      = mysqli_real_escape_string($cxn, $websiteUser);
    $websiteUserpass  = md5(mysqli_real_escape_string($cxn, $websiteUserpass));
    $loginQuery       = " SELECT first_name,last_name,email,password,user_id
                          FROM users
                          WHERE email='$websiteUser'
                          AND password='$websiteUserpass'";
    $username_query   = mysqli_query($cxn, $loginQuery);
    $username_result  = mysqli_fetch_assoc($username_query);
    if ($username_result) {
        $_SESSION ['login']=1;
        mysqli_close($cxn);
        return $username_result;
    } else {
        $_SESSION ['login']=0;
        mysqli_close($cxn);
        return 0;
    }
}

/**
 * Finds a question that has not yet been answered by the user,
 * Assigns that question in the question interaction table
 * If we have time later we can add some cool ways to
 * assign questions based on previous difficulty
 * If their are no more questions the user is redirected to complete.php
 * since header calls exist , this should be called before any html
 * @param  $user_id
 * @return $question_id  question which is not in previous answered questions
 */
function assignCurrentQuestion($user_id){
  $cxn              = connectToTechnique();
  $user_id          = $user_id;
  $findQuestion     ="SELECT question.question_id as question_id,
                      question.question_file as question_file,
                      question.solution_file as solution_file,
                      question.difficulty as difficulty
                      FROM question
                      WHERE question.question_id NOT IN
                         (SELECT question_interaction.question_id
                          FROM question_interaction
                          WHERE question_interaction.user_id='$user_id')";

  $findQuestionResult= mysqli_query($cxn, $findQuestion);
  $row               = mysqli_fetch_assoc($findQuestionResult);
  if (!$row){
    $_SESSION['complete']=1;
    header("Location: complete.php");
    mysqli_close($cxn);
    exit();
  }

  $question_id       = $row["question_id"];
  $assignQuestion    = "INSERT INTO question_interaction (user_id, question_id, current, got_correct)
                      VALUES ('$user_id', '$question_id', '1', '0')";
  $hasCurrentResult  = mysqli_query($cxn, $assignQuestion);
  if (!$hasCurrentResult) {
    $_SESSION['error'] = 1;
    $_SESSION['errormsg'] = "Error Assigning Question";
    header("Location: php/error.php");
    exit();
  }
  mysqli_close($cxn);
  return $question_id;
}
/**
 * Gets the current question of the user
 * or if none , the user is assigned one
 * @param  $user_id
 * @return $question_id
 */
function getCurrentQuestion($user_id){
  $cxn              = connectToTechnique();
  $user_id          = $user_id;
  $hasCurrent       ="SELECT question_id
                      FROM question_interaction
                      WHERE '$user_id'=question_interaction.user_id
                      AND current=1";

  $hasCurrentResult = mysqli_query($cxn, $hasCurrent);
  $row              = mysqli_fetch_assoc($hasCurrentResult);
  if (!$row){
    $questionId = assignCurrentQuestion($user_id);
  }
  else{
    $questionId = intval($row['question_id']);
  }
  mysqli_close($cxn);
  return $questionId;
}
/**
 * Returns the row of the question column for the specifed id
 * @param  $question_id
 * @return $array         Array of key values for the question table
 */
function getQuestionTable($question_id){
  $cxn              = connectToTechnique();
  $questionQuery    ="SELECT question_id,solution_file,question_file
                      FROM question
                      WHERE question_id='$question_id'";
  $questionResult   = mysqli_query($cxn, $questionQuery);
  $row              = mysqli_fetch_assoc($questionResult);
  mysqli_close($cxn);
  return $row;
}

/**
 * Checks the solution for the question_id
 * Checks it against _POST solution
 * Updates the appropriate solution and current row for the question interaction table
 * Note if anything in this interaction fails we will move to error page
 * since header calls exist , this should be called before any html
 * @param  $user_id
 * @param  $question_id
 * @param  $user_answer           What the user clicked
 * @return Bool                   returns true if everthing went right
 */
function answerQuestion($user_id,$question_id,$user_answer){
  $cxn              = connectToTechnique();
  $questionQuery    ="SELECT solution
                      FROM question
                      WHERE question_id='$question_id'";
  $questionResult   = mysqli_query($cxn, $questionQuery);
  $row              = mysqli_fetch_assoc($questionResult);
  if (!$row){
    $_SESSION['error'] = 1;
    $_SESSION['errormsg']="No Question in database";
    header("Location: error.php");
    mysqli_close($cxn);
    exit();
  }
  $answer           = $row['solution'];
  $_SESSION['lastQuestion']= False;
  if ($user_answer == $answer){
    $_SESSION['lastQuestion']= True;
    addOneToScore($user_id);
    $gotCorrectQuery  ="UPDATE question_interaction
                        SET got_correct = '1'
                        WHERE user_id = '$user_id'
                        AND question_id = '$question_id'";
    $questionResult   = mysqli_query($cxn, $gotCorrectQuery);
    if (!$questionResult){
      $_SESSION['error'] = 1;
      $_SESSION['errormsg']="Updating database with got correct failed";
      header("Location: error.php");
      mysqli_close($cxn);
      exit();
    }
  }
  $notCurrentQuery  ="UPDATE question_interaction
                      SET current = '0'
                      WHERE user_id = '$user_id'
                      AND question_id = '$question_id'";
  $notCurrentResult = mysqli_query($cxn, $notCurrentQuery);
  if (!$notCurrentResult){
      $_SESSION['error'] = 1;
      $_SESSION['errormsg']="Couldnt update current";
      header("Location: error.php");
      mysqli_close($cxn);
      exit();
  }
  mysqli_close($cxn);
  return true;
}

/**
 * Adds 1 to the users score column
 * @param $user_id
 * NOTE this function can redirect with header , so call before and html
 */
function addOneToScore($user_id){
  $cxn              = connectToTechnique();
  $addOneQuery      ="UPDATE users
                      SET score = score+1
                      WHERE user_id = '$user_id'";
  $questionResult   = mysqli_query($cxn, $addOneQuery);
  if (!$questionResult){
      $_SESSION['error'] = 1;
      $_SESSION['errormsg']="Couldnt update current";
      header("Location: error.php");
      mysqli_close($cxn);
      exit();
  }
}
function getTop20(){
  $cxn              = connectToTechnique();
  $top20Query       ="SELECT first_name, last_name, score
                      FROM users
                      ORDER BY score DESC
                      LIMIT 20";
  $top20Result      = mysqli_query($cxn, $top20Query);
  mysqli_close($cxn);
  return $top20Result;
}
?>
