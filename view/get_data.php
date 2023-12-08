<?php
include_once("../model/addProductDB.php");
$AddPDB = new AddProductDB();

$n = 2;
for ($i = 2; $i < $n + 1; $i++) { 
    echo '<select name="variants[' . $i . '][material_id]">'; 
    echo '<option>--Material--</option>';
    foreach ($AddPDB->getmaterialitem() as $material) {
        echo '<option style="color: black;" value="' . $material->getIDmaterial() . '">' . $material->getMaterialName() . '</option>';
    }
    echo '</select>';

    echo '<select name="variants[' . $i . '][size_id]">'; 
    echo '<option>--Size--</option>';
    foreach ($AddPDB->getsizeitem() as $size) {
        echo '<option style="color: black;" value="' . $size->getSizeID() . '">' . $size->getSize() . '</option>';
    }
    echo '</select>';

    echo '<select name="variants[' . $i . '][color_id]">'; 
    echo '<option>--Color--</option>';
    foreach ($AddPDB->getcoloritem() as $color) {
        echo '<option style="color: black;" value="' . $color->getIDcolor() . '">' . $color->getColor() . '</option>';
    }
    echo '</select>';
  
    
}
$n++;
?>

