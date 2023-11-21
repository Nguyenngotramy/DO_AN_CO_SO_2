$(document).ready(function(){
    $(".featured-products").slick({
        slidesToShow: 5,
        prevArrow:
        "<div class=\"slick-prev slick-frame\">"+
        "<span class=\" material-symbols-outlined\" style=\"font-size: 25px\">arrow_back_ios</span>"+
        "</div>",
        nextArrow:
        "<div class=\"slick-next slick-frame\">"+
        "<span class=\" material-symbols-outlined\" style=\"font-size: 25px;\">arrow_forward_ios</span>"+
        "</div>",
    });
});