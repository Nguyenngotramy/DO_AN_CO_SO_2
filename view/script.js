
<<<<<<< HEAD
      function myFunctionFormlogin(choice) {
         var x = document.getElementById("form-login");
         var y = document.getElementById("form-login1");
         if(choice=='signin') {
            x.style.transform = 'translateX(0%)';
            y.style.transform = 'translateX(-150%)';
         } else if(choice=='register') {
            x.style.transform = 'translateX(-150%)';
            y.style.transform = 'translateX(0%)';
         }

         // if (x.style.display === "none") {
         //    x.classList.toggle('visible');
         //    y.classList.toggle('hidden');
            
         // }else {
         //    x.classList.toggle('hidden');
         //    y.classList.toggle('visible');
            
         // }
         // if (y.style.display === "none") {
         //    x.classList.toggle('hidden');
         //    y.classList.toggle('visible');
         // }else {
         //    x.classList.toggle('visible');
         //    y.classList.toggle('hidden');
            
         // }
       }
=======
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
>>>>>>> b3576621064d51e26432d000fec628896c80468c
      function myFunctionLoginForm() {
         var form = document.getElementById("log-in-cart");
         form.style.transform = 'translateX(0%)';
         var x = document.getElementById("form-login");
         x.style.transform = 'translateX(0%)';
       }
       function myFunctionCheckout(){
         var x = document.getElementById("cart-div-control");
         x.style.transform = 'translateX(0%)';
         
         // x.style.transition = 'opacity 0.25s ease, transform 0.25s ease';

         // if (x.style.display === "none" ) {
         //    x.classList.toggle('visible');
           
            
         // }else {
         //    x.classList.toggle('hidden');
           
         // }
       }
       function myFunctionExit(){
         var x = document.getElementById("cart-div-control");
         // x.classList.toggle('hidden');
         x.style.transform = 'translateX(100%)';
       }
       function myFunctionExitLogin(){
         var form = document.getElementById("log-in-cart");
         form.style.transform = 'translateX(-100%)';
         var x = document.getElementById("form-login");
         x.style.transform = 'translateX(-100%)';
         var y = document.getElementById("form-login1");
         y.style.transform = 'translateX(-100%)';
       }


