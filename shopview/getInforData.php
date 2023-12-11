<?php
// require_once("../database/connecttemp.php");
// include('../model/productdb.php');

// $productID = $_POST['productID'];
// echo $productID;
// $productInfor = showInforOfProduct($productID);
// $productDetails = showDetails($productID);
// $colors = array();
// $sizes = array();
// foreach ($productDetails as $detail) {
//     $color = $detail['color'];
//     $size = $detail['size'];
//     if (!in_array($color, $colors)) {
//         $colors[] = $color;
//     }

//     if (!in_array($size, $sizes)) {
//         $sizes[] = $size;
//     }
// }

function descriptionProduct($productInfor)
{
    $description = '<div class="description">';
    $description .= '<p>' . $productInfor['description'] . '</p>';
    $description .= '</div>';
    return $description;
}

function additionInfor($colors, $sizes)
{
    $additionInfor = '<table style="border-spacing: 15px">' .
        '<tr>' .
        '<td class="properties">Weight</td>' .
        '<td>10</td>' .
        '</tr>' .
        '<tr>' .
        '<td class="properties">Dimensions</td>' .
        '<td>10 x 11 x 22 cm</td>' .
        '</tr>' .
        '<tr>' .
        '<td class="properties">Color</td>' .
        '<td>';

    for($i=0; $i<sizeof($colors); $i++) {
        if($i!=0) {
            $additionInfor .= ', '. ucfirst($colors[$i]);
        } else {
            $additionInfor .= ucfirst($colors[$i]);
        }
    }

    $additionInfor .= '</td>' .
        '</tr>' .
        '<tr>' .
        '<td class="properties">Sizes</td>' .
        '<td>';


    for($j=0; $j<sizeof($sizes); $j++) {
        if($j!=0) {
            $additionInfor .= ', '. $sizes[$j];
        } else {
            $additionInfor .=  $sizes[$j];
        }
    }

    $additionInfor .= '</td>' .
        '</tr>' .
        '</table>';

    return $additionInfor;
}


function review()
{
    //Mai mốt làm
}

$description = descriptionProduct($productInfor);
$additionInfor = additionInfor($colors, $sizes);

$response = ['description' => $description, 'additionInfor' => $additionInfor];
?>