<?php
require_once('database.php');

// Get IDs
$productCode = filter_input(INPUT_POST, 'product_code');
// $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($productCode != false) {
    $query = 'DELETE FROM products
              WHERE productCode = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $productCode);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('index.php');