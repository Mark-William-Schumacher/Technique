var emailInDataBase = true;

$("#email").keyup(function() {
    validate();
});

$("#repassword").keyup(function() {
    validate();
});

$("#password").keyup(function() {
    validate();
});

function validate(){
  var email      = $("#email").val();
  var password   = $('#password').val();
  var repassword = $('#repassword').val();

  if (!emailOkay(email)) {
    $('#email_status').text("This is not a valid email");
    return false;
  }
  $('#email_status').text("");
  emailExists(email); // Async call to database
  if (emailInDataBase){
    $('#email_exists').text("This email is in use");
  }
  $('#email_exists').text("");

  if (!passwordsMatch(repassword,password)){
    $('#passMatch').text("Passwords do not match");
    return false;
  }
  $('#passMatch').text('');
}

function emailOkay(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function emailExists(username){
  if(username != ''){
    $.post('php/checkemail.php',{username: username}, function(data) {
        if (data==0){
          emailInDataBase=false;
        }
        else{
          emailInDataBase=true;
        }
      });
  }
}

function passwordsMatch (password1, password2){
    if(password1 != password2){
      return false;
    }
    else{
      return true;
  }
}
