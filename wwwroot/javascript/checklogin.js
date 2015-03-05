var loginValidation = false;

function LoginAttempt(username,password){
  $.post('php/checklogin.php',{ username: username, password:password}, function(data) {
    if (data==0){
      $('#loginStatus').text("Username/Password Incorrect");
      loginValidation=false;
    }
    else{
      loginValidation=true;
    }
    });
  }
function tryLogin(){
  var username   = $("#login").val();
  var password   = $('#password').val();
  LoginAttempt(username,password);
  return loginValidation;
}

