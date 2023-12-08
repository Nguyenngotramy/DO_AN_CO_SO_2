<?php
require('../model/categorydb.php');
require('../model/productdb.php');
require('../database/connecttemp.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

// if ($action == 'list_products') {
//     $category_id = filter_input(INPUT_GET, 'category_id', 
//             FILTER_VALIDATE_INT);
//     if ($category_id == NULL || $category_id == FALSE) {
//         $category_id = 1;
//     }
//     $categories = get_categories();
//     $category_name = get_category_name($category_id);
//     $products = get_products_by_category($category_id);
//     include('product_list.php');
// }

?>