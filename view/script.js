
      function myFunctionFormlogin() {
         var x = document.getElementById("form-login");
         var y = document.getElementById("form-login1");
         if (x.style.display === "none") {
            x.classList.toggle('visible');
            y.classList.toggle('hidden');
            
         }else {
            x.classList.toggle('hidden');
            y.classList.toggle('visible');
            
         }
         if (y.style.display === "none") {
            x.classList.toggle('hidden');
            y.classList.toggle('visible');
         }else {
            x.classList.toggle('visible');
            y.classList.toggle('hidden');
            
         }
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


