<?php
require_once('database.php');
$query1 = 'SELECT max(categoryID) FROM categories';
$statement1 = $db->prepare($query1);
$statement1->execute();
$categoryNumber = $statement1->fetch()['max(categoryID)'];
$statement1->closeCursor();
$categoryName = filter_input(INPUT_POST, 'NewCategory');
if ($categoryName != null && $categoryNumber != null) {
    $categoryNumber++;
    $query2 ='INSERT INTO categories (categoryID, categoryName) VALUES (:categoryNumber, :categoryName)';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':categoryNumber', $categoryNumber);
    $statement2->bindValue(':categoryName', $categoryName);
    $statement2->execute();
    $statement2->closeCursor();
    include('index.php');
}
?>