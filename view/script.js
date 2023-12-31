
function myFunctionFormlogin(choice) {
  // var forms = document.getElementsByClassName("form");
  // formlogin.style.transform = 'translateX(0%)';
  var formlogin = document.getElementById("form-login");
  var formlogin1 = document.getElementById("form-login1");
  var formlogin2 = document.getElementById("form-login2");
  var formlogin3 = document.getElementById("form-login3");
  if (choice == "signin") {
    formlogin.style.transform = "translateX(0%)";
    formlogin1.style.transform = "translateX(-150%)";
    formlogin2.style.transform = "translateX(-150%)";
    formlogin3.style.transform = "translateX(-150%)";
  } else if (choice == "register") {
    formlogin.style.transform = "translateX(-150%)";
    formlogin1.style.transform = "translateX(0%)";
    formlogin2.style.transform = "translateX(-150%)";
    formlogin3.style.transform = "translateX(-150%)";
  } else if (choice == "lostpass") {
    formlogin.style.transform = "translateX(-150%)";
    formlogin1.style.transform = "translateX(-150%)";
    formlogin2.style.transform = "translateX(0%)";
    formlogin3.style.transform = "translateX(-150%)";
  } else if (choice == "submit-login") {
    formlogin.style.transform = "translateX(-150%)";
    formlogin1.style.transform = "translateX(-150%)";
    formlogin2.style.transform = "translateX(-150%)";
    formlogin3.style.transform = "translateX(0%)";
  }
}

function myFunctionLoginForm() {
  var form = document.getElementById("log-in-cart");
  form.style.transform = "translateX(0%)";
  var x = document.getElementById("form-login");
  x.style.transform = "translateX(0%)";
}

function myFunctionCheckout() {
  var x = document.getElementById("cart-div-control");
  x.style.transform = "translateX(0%)";
}
function myFunctionExit() {
  var x = document.getElementById("cart-div-control");
  // x.classList.toggle('hidden');
  x.style.transform = "translateX(100%)";
}

function myFunctionExitLogin() {
  var form = document.getElementById("log-in-cart");
  var formlogin = document.getElementById("form-login");
  var formlogin1 = document.getElementById("form-login1");
  var formlogin2 = document.getElementById("form-login2");
  var formlogin3 = document.getElementById("form-login3");
  form.style.transform = "translateX(-100%)";
  formlogin.style.transform = "translateX(-150%)";
  formlogin1.style.transform = "translateX(-150%)";
  formlogin2.style.transform = "translateX(-150%)";
  formlogin3.style.transform = "translateX(-150%)";
}
