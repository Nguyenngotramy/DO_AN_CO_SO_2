var lastSelectedOption = document.getElementById("description");
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
    document.getElementById("show-infor").innerHTML = `
  <div class="review">
    <h2>1 reviews for Product's Name</h2><br>
    <div class="rate-star" style="z-index: 1;">
        <div class="elements">
            <span style="font-size: 36px; font-weight: bold;">5.0</span>
            <div class="inline">
                <span class="material-icons">star </span>
                <span class="material-icons">star </span>
                <span class="material-icons">star </span>
                <span class="material-icons">star </span>
                <span class="material-icons">star </span>
            </div>
            <span style="margin-bottom: 10px;">Based on 1 reviews</span>
            <button id="add-review" onclick="addReview()">Add a review</button>
        </div>
        <div class="elements">
            <div class="inline" style="margin: 5px 0;">
                <b>5 star</b>
                <div class="char"></div>
                <span style="margin-left: 10px">100%</span>
            </div>
            <div class="inline" style="margin: 5px 0;">
                <b>4 star</b>
                <div class="char"></div>
                <span style="margin-left: 10px">100%</span>
            </div>
            <div class="inline" style="margin: 5px 0;">
                <b>3 star</b>
                <div class="char"></div>
                <span style="margin-left: 10px">100%</span>
            </div>
            <div class="inline" style="margin: 5px 0;">
                <b>2 star</b>
                <div class="char"></div>
                <span style="margin-left: 10px">100%</span>
            </div>
            <div class="inline" style="margin: 5px 0;">
                <b>1 star</b>
                <div class="char"></div>
                <span style="margin-left: 10px">100%</span>
            </div>
        </div>
    </div>

    <div id="form-review" style="margin-top: 30px;">
        <div>
            <label>Your name</label>
            <input id="name" type="text" style="width: 515px; height: 30px; margin-left: 20px; border: 1px solid lightgrey">
        </div>
        <div style="display: flex; margin: 20px 0">
            <label style="margin-right: 20px">Rating </label>
            <ul>
                <li class="form-star" value="1" onclick="rating(this)"><span class="material-icons">star</span></li>
                <li class="form-star" value="2" onclick="rating(this)"><span class="material-icons">star</span></li>
                <li class="form-star" value="3" onclick="rating(this)"><span class="material-icons">star</span></li>
                <li class="form-star" value="4" onclick="rating(this)"><span class="material-icons">star</span></li>
                <li class="form-star" value="5" onclick="rating(this)"><span class="material-icons">star</span></li>
                <input type="hidden" id="inputHidden">
            </ul>
        </div>
        <label>Your review:</label><br>
        <textarea style="width: 626px; height: 150px; border: 1px solid lightgrey" id="review-text"></textarea><br>
        <button style="margin-left: 565px; padding: 3px 7px; background-color: black; color: white" onclick="submitReview()">Submit</button>
    </div>
    <div id="commentsOfReviewers">
      <?php
        include('../model/getReview.php');
        $reviewList = showReview($productID);
        foreach($reviewList as $review) {
      ?>
      <div class="comment" style="margin-top: 30px; border-top: 1px solid lightgrey; padding: 20px">
            <div style="border-bottom: 1px solid lightgrey; display: flex; width: 700px;">
                <div style="width: 80%;">
                    <b style="font-size: 20px;"><?php echo $review['name'] ?></b><br>
                    <span style="margin-bottom: 20px;">Reviewer</span><br>
                    <div class="inline">
                    <input type="hidden" id="star-number">
                    <ul class="stars-list" style="display: flex; list-style: none">
                    <li class="form-star"><span class="material-icons">star</span></li>
                    <li class="form-star"><span class="material-icons">star</span></li>
                    <li class="form-star"><span class="material-icons">star</span></li>
                    <li class="form-star"><span class="material-icons">star</span></li>
                    <li class="form-star"><span class="material-icons">star</span></li>
                    </ul>

                    </div>
                    <p>'.$review['reviewText'].'</p>
                </div>
                <span style="right: 0;">September 3, 2022</span>
            </div>
        </div>
      <?php }?>
    </div>
  </div>`;
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
  for (var i = 0; i < array.length; i++) {
    array[i].style.border = "none";
    array[i].classList.remove("selected");
  }
  element.style.border = "2px solid black";
  element.classList.add("selected");
  // console.log(element.classList);
}

function addReview() {
  var formReview = document.getElementById("form-review");
  formReview.style.opacity = "1";
  formReview.style.transform = "translateY(0%)";
  formReview.style.height = "auto";
}

function rating(clickedItem) {
  var listItems = document.querySelectorAll("#form-review .form-star");
  var index = clickedItem.getAttribute("value");
  listItems.forEach((item) => item.style.color = 'grey');
  if (index > 0) {
    for (let i = 0; i < index; i++) {
      listItems[i].style.color = 'yellow';
    }
  }
  document.getElementById('inputHidden').value = index;
}

// function submitReview() {
//   let $pdID = $(this).data('page');
//   let $star = document.getElementById('inputHidden').value;
//   let $name = document.getElementById('name').value;
//   let $reviewText = document.getElementById('review-text').value;
//   console.log($pdID, $star, $name, $reviewText);
//   $.ajax({
//     type: "POST",
//     url: "../view/review.php",
//     data: {
//       pdID: $pdID,
//       star: $star,
//       name: $name,
//       reviewText: $reviewText
//     },
//     dataType: 'json',
//     success: function (data) {
//       var reviewList = data.reviewList;
//       $('#commentsOfReviewers').html(data);
//     }
// });
// }