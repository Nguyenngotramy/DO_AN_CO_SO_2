var lastSelectedOption = document.getElementById('description');
var description;
var additionInfor;


function show(option, data) {
  var listOption = document.getElementsByClassName("option");
  if (lastSelectedOption) {
    lastSelectedOption.style.color = "black";
    lastSelectedOption.style.borderBottom = "none";
  }
  for (i = 0; i < listOption.length; i++) {
    listOption[i].style.color = "black";
  }
  var selectedOption = document.getElementById(option);
  lastSelectedOption = selectedOption;

  selectedOption.style.color = "grey";
  selectedOption.style.borderBottom = "1px solid black";
  if (option == "description") {
    document.getElementById("description").style.borderBottom =
      "1px solid black";
    document.getElementById("description").style.color = "grey";
    document.getElementById("show-infor").innerHTML = data;
  } else if (option == "add-inf") {
    document.getElementById("show-infor").innerHTML = data;
  } else if (option == "review") {
    document.getElementById("show-infor").innerHTML =
      '<div class="review">' +
      "<h2>1 reviews for Product's Name</h2><br>" +
      '<div class="rate-star">' +
      '<div class="elements">' +
      '<span style="font-size: 36px; font-weight: bold;">5.0</span>' +
      '<div class="inline">' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      "</div>" +
      '<span style="margin-bottom: 10px;">Based on 1 reviews</span>' +
      "<button>Add a review</button>" +
      "</div>" +
      '<div class="elements">' +
      '<div class="inline" style="margin: 5px 0;">' +
      "<b>5 star</b>" +
      '<div class="char"></div>' +
      '<span style="margin-left: 10px">100%</span>' +
      "</div>" +
      '<div class="inline" style="margin: 5px 0;">' +
      "<b>4 star</b>" +
      '<div class="char"></div>' +
      '<span style="margin-left: 10px">100%</span>' +
      "</div>" +
      '<div class="inline" style="margin: 5px 0;">' +
      "<b>3 star</b>" +
      '<div class="char"></div>' +
      '<span style="margin-left: 10px">100%</span>' +
      "</div>" +
      '<div class="inline" style="margin: 5px 0;">' +
      "<b>2 star</b>" +
      '<div class="char"></div>' +
      '<span style="margin-left: 10px">100%</span>' +
      "</div>" +
      '<div class="inline" style="margin: 5px 0;">' +
      "<b>1 star</b>" +
      '<div class="char"></div>' +
      '<span style="margin-left: 10px">100%</span>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="comment" style="margin-top: 30px;">' +
      '<img src="image/373398291_311101748103167_1757327635046334779_n.jpg" style="margin-right: 50px;">' +
      '<div style="border-bottom: 1px solid lightgrey; display: flex; width: 700px;">' +
      '<div style="width: 80%;">' +
      '<b style="font-size: 20px;">John Ema</b><br>' +
      '<span style="margin-bottom: 20px;">Reviewer</span><br>' +
      '<div class="inline">' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      "</div>" +
      "<p>An evening dress that reveals a woman’s ankles while walking is the most disgusting thing I have ever seen.</p>" +
      "</div>" +
      '<span style="right: 0;">September 3, 2022</span>' +
      "</div>" +
      "</div>" +
      '<div class="comment" style="margin-top: 30px;">' +
      '<img src="image/373398291_311101748103167_1757327635046334779_n.jpg" style="margin-right: 50px;">' +
      '<div style="border-bottom: 1px solid lightgrey; display: flex; width: 700px;">' +
      '<div style="width: 80%;">' +
      '<b style="font-size: 20px;">John Ema</b><br>' +
      '<span style="margin-bottom: 20px;">Reviewer</span><br>' +
      '<div class="inline">' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      '<span class="material-symbols-outlined star">star</span>' +
      "</div>" +
      "<p>An evening dress that reveals a woman’s ankles while walking is the most disgusting thing I have ever seen.</p>" +
      "</div>" +
      '<span style="right: 0;">September 3, 2022</span>' +
      "</div>" +
      "</div>" +
      "</div>";
  }
  
}

function quantity(cal) {
  var currentQuantity = parseInt(document.getElementById("quantity").value);
  if (cal == "plus") {
    document.getElementById("quantity").value = currentQuantity + 1;
  } else if (cal == "minus") {
    if (currentQuantity - 1 < 0) {
      document.getElementById("quantity").value = 0;
    } else {
      document.getElementById("quantity").value = currentQuantity - 1;
    }
  }
}

function getMainImage(image) {
  var imageSrc = document.getElementById(image).src;
  document.getElementById("main-image").innerHTML =
    '<img src="' + imageSrc + '">';
}

function getElement(className, element) {
  var array = document.getElementsByClassName(className);
  for(var i=0; i<array.length; i++) {
    array[i].style.border = 'none';
    array[i].classList.remove('selected');
  }
  element.style.border = '2px solid black';
   element.classList.add('selected');
  // console.log(element.classList);
}
