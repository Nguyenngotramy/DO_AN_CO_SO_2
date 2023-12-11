
      // function myFunctionFormlogin() {
      //    var x = document.getElementById("form-login");
      //    var y = document.getElementById("form-login1");
      //    if (x.style.display === "none") {
      //       x.classList.toggle('visible');
      //       y.classList.toggle('hidden');
            
      //    }else {
      //       x.classList.toggle('hidden');
      //       y.classList.toggle('visible');
            
      //    }
      //    if (y.style.display === "none") {
      //       x.classList.toggle('hidden');
      //       y.classList.toggle('visible');
      //    }else {
      //       x.classList.toggle('visible');
      //       y.classList.toggle('hidden');
            
      //    }
      //  }

      //  function myFunctionForget() {
      //    var x = document.getElementById("form-login");
      //    var y = document.getElementById("form-login2");
      //    if (x.style.display === "none") {
      //       x.classList.toggle('visible');
      //       y.classList.toggle('hidden');
            
      //    }else {
      //       x.classList.toggle('hidden');
      //       y.classList.toggle('visible');
            
      //    }
      //    if (y.style.display === "none") {
      //       x.classList.toggle('hidden');
      //       y.classList.toggle('visible');
      //    }else {
      //       x.classList.toggle('visible');
      //       y.classList.toggle('hidden');
            
      //    }
         
      // }
      function toggleLoginForm(formId) {
         // Hide all forms
         document.getElementById('form-login').classList.add('hidden');
         document.getElementById('form-login1').classList.add('hidden');
         document.getElementById('form-login2').classList.add('hidden');
         document.getElementById('form-login3').classList.add('hidden');
 
         // Show the selected form
         document.getElementById(formId).classList.remove('hidden');
     }
      function myFunctionLoginForm() {
         var x = document.getElementById("log-in-cart");
       
         if (x.style.display === "none" ) {
            x.classList.toggle('visible');
           
            
         }else {
            x.classList.toggle('hidden');
           
         }
       }
       function myFunctionCheckout(){
         var x = document.getElementById("cart-div-control");
       
         if (x.style.display === "none" ) {
            x.classList.toggle('visible');
           
            
         }else {
            x.classList.toggle('hidden');
           
         }
       }
       function myFunctionExit(){
         var x = document.getElementById("cart-div-control");
         x.classList.toggle('hidden');
       }
       function myFunctionExitLogin(){
         var x = document.getElementById("log-in-cart");
         x.classList.toggle('hidden');
       }


