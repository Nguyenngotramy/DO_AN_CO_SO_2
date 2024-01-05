<?php
    include('../model/getReview.php');
    $pdID = $_POST['pdID'];
    $star = $_POST['star'];
    $name = $_POST['name'];
    $reviewText = $_POST['reviewText'];
    $list = '';
    addReview($pdID, $star, $name, $reviewText);
    $reviewList = showReview($pdID);
    // echo json_encode(['reviewList' => $reviewList]);
        foreach($reviewList as $review) {
            $list .= '<div class="comment" style="margin-top: 30px; border-top: 1px solid lightgrey; padding: 20px">
            <div style="border-bottom: 1px solid lightgrey; display: flex; width: 700px;">
                <div style="width: 80%;">
                    <b style="font-size: 20px;">'.$review['name'].'</b><br>
                    <span style="margin-bottom: 20px;">Reviewer</span><br>
                    <div class="inline">
                    <input type="hidden" id="star-number">
                        <script>
        var starNumber = document.getElementById(\'star-number\').value;
        var starsContainer = document.querySelector(\'.inline\');
        for (var i = 1; i <= 5; i++) {
            var starSpan = document.createElement(\'span\');
            starSpan.classList.add(\'material-icons\');
            starSpan.textContent = \'star\';
            if (i <= starNumber) {
                starSpan.classList.add(\'active\');
            }
            starsContainer.appendChild(starSpan);
            for(var i = 1; i <= '.$review['star'].' ; i++) {
                starSpan.style.color = \'yellow\';
            }
        </script>
                    </div>
                    <p>'.$review['reviewText'].'</p>
                </div>
                <span style="right: 0;">September 3, 2022</span>
            </div>
        </div>';
        }
        echo json_encode(['list' => $list]);
?>