<?php
/**
 * Plugin Name: Product Category and Cart
 * Description: This plugin allows you to add a category and cart to your WordPress products
 * Version: 0.1
 * */


    $plugin_name = 'Discount Offerings';


    function discountofferingsplugin()
    {
    add_menupage('Product Categories & Discounts', 'Product Categories & Discounts', 'manageoptions', 'productcategories', 'discountofferingspage_settings');
    }


// Add plugin to WordPress
add_action('adminmenu', 'discountofferingsplugin');

function discountofferingspagesettings()
{
    $categoryfordiscountinput = '';
    $numberofproducts_input = '';
    $categoryoffreeproductsinput = '';
    $products_list = '';
}

$args = array(
    'posttype' => 'product',
    'taxquery' => array(
        array(
            'taxonomy' => 'productcat',
            'field'    => 'slug',
            'terms'    => $categoryfor_discount,
        ),
    ),
);


$products = get_posts($args);

$products_list = array();

// Get the products from the database
$products = get_posts(array(
 'post_type' => 'product',
));

// Loop through each product
foreach($products as $product) {
    // Create a list item for each product
    $products_list .= '<li>' . $product->post_title . '<input type="button" name="add_product" value="Add"></li>';
}

// Output the products list
echo '<ul>' . $products_list . '</ul>';

?>
