<?php
require('database.php');
$categoryName = filter_input(INPUT_POST, 'categoryName');


if ($categoryName != false) {
    $query = 'DELETE FROM products
    WHERE categoryId = (SELECT categoryId FROM categories WHERE categoryName = :categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $success = $statement->execute();
    $query = 'DELETE FROM categories
              WHERE categoryName = :categoryName';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $success = $statement->execute();
    $statement->closeCursor();    
}

include('category_list.php');
?>