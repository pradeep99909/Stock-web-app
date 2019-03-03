
function input_focus(value){
  var input=document.getElementById(value);
  input.style.borderBottom="1.7px solid #008db1";
}

function input_blur(value){
  var input=document.getElementById(value);
  input.style.border="1.7px solid white";
}


function register_submit_disable(){
var register_fname=document.getElementById('register_firstname');
var register_lname=document.getElementById('register_lastname');
var register_phone=document.getElementById('register_phone');
var register_gender=document.getElementById('register_gender');
var register_dob=document.getElementById('register_dob');
var register_password=document.getElementById('register_password');
var register_cpassword=document.getElementById('register_cpassword');
var register_email=document.getElementById('register_email');
var register_terms=document.getElementById('register_terms');
var register_otp=document.getElementById('register_otp');
var otp_mess=document.getElementById('otp_message').innerHTML.trim();


if(register_fname.value=="" || register_lname.value=="" || register_phone.value == ''  || register_dob.value == '' || register_password.value == '' || register_cpassword.value == '' || register_email.value == ''  || register_otp.value=='' || register_terms.checked==false ){

  var register_submit=document.getElementById('register_submit');
  register_submit.disabled=true;
  register_submit.style.backgroundColor='grey';
  register_submit.style.cursor='not-allowed';
}
else{
  if(register_cpassword.value == register_password.value){
  var register_submit=document.getElementById('register_submit');
  register_submit.disabled=false;
  register_submit.style.backgroundColor='#008db1';
  register_submit.style.cursor='pointer';
}
}
}

setInterval(register_submit_disable,1);



function register_match_password(){
  var register_password=document.getElementById('register_password');
  var register_cpassword=document.getElementById('register_cpassword');
  var register_password_text=document.getElementById('password_match');
  if(register_password.value != ''){
    if(register_cpassword.value != ''){
      if(register_cpassword.value == register_password.value){
        register_password_text.innerHTML="Password matched!";
        register_password_text.style.color="green";
      }
      else{
        register_password_text.innerHTML="Password do not match";
        register_password_text.style.color="red";
      }
    }
    else{
      register_password_text.innerHTML="";
    }
  }
  else{
    register_password_text.innerHTML="";
  }
}

setInterval(register_match_password,10);

function capital(id) {
  var a=document.getElementById(id);
  a.value=a.value.charAt(0).toUpperCase() + a.value.slice(1);
}

function get_email(){
  var email=document.getElementById('register_email');
  var otp_email=document.getElementById('otp_email');
  otp_email.value=email.value;
}

function checkemail(value){
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200){
            if(this.responseText=="Valid Email"){
              document.getElementById("invalid_email").innerHTML =
              this.responseText;
              document.getElementById("invalid_email").style.color='green';
            }
            else{
            document.getElementById("invalid_email").innerHTML =
            this.responseText;
            document.getElementById("invalid_email").style.color='red';
            }
          }

    }
    xhttp.open("GET", "checkemail.php?email="+value+"", true);
   xhttp.send();
}
