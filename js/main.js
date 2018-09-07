var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password") , confirm_text=document.getElementById("cnf-text");
var boolnull=false;


function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_text.classList.add("d-block");
    confirm_text.classList.remove("d-none");
    btn_submit.classList.add("disabled");
    btn_submit.setAttribute("disabled" , "disabled");


  }
   else {
    confirm_text.classList.add("d-none");
    confirm_text.classList.remove("d-block");
    if (name.value !=null , email.value !=null , password.value !=null) {
      boolnull=true;
    }
    else {
      boolnull=false;
    }
    if (boolnull) {
      btn_submit.classList.remove("disabled");
      btn_submit.removeAttribute("disabled");
    }

  }
}


password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
