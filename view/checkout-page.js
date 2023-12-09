function checkPhone(phoneNumber) {
  return phoneNumber.length === 10;
}

function checkEmail(email) {
  var emailRegex = /\S+@gmail\.com/;
  return emailRegex.test(email);
}

function validateForm() {
  var requiredFields = document.getElementsByName("requiredField");
  var fieldsNotFill = [];
  var k = 0;

  for (var i = 0; i < requiredFields.length; i++) {
    if (requiredFields[i].value.trim() === "") {
      var fieldName = document.querySelector(
        'label[for="' + requiredFields[i].id + '"]'
      ).innerText;
      fieldName = fieldName.replace(" *", "");
      fieldName =
        fieldName.charAt(0).toUpperCase() + fieldName.slice(1).toLowerCase();
      fieldsNotFill[k] = fieldName;
      k++;
    }
  }

  if (fieldsNotFill.length == 0) {
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    if (!checkPhone(phone)) {
      var errorMessage = document.getElementById("error-message");
    errorMessage.style = "display: block";
    document.getElementById("frame").innerHTML = '';
    document.getElementById("frame").innerHTML += `
        <div class="elements">
            <span style="color: red;">Invalid billing phone number</span>
        </div>
    `;
    }
    if (!checkEmail(email)) {
      var errorMessage = document.getElementById("error-message");
    errorMessage.style = "display: block";
    document.getElementById("frame").innerHTML = '';
    document.getElementById("frame").innerHTML += `
        <div class="elements">
            <span style="color: red;">Invalid billing email address</span>
        </div>
    `;
    }
  } else {
    var errorMessage = document.getElementById("error-message");
    errorMessage.style = "display: block";
    document.getElementById("frame").innerHTML = '';

    fieldsNotFill.forEach(function (fieldName) {
      document.getElementById("frame").innerHTML += `
        <div class="elements">
            <span style="font-weight: bold;">Billing ${fieldName} </span>
            <span style="color: red;"> is a required field.</span>
        </div>
    `;
    });
    fieldsNotFill = [];
    
  }
}
