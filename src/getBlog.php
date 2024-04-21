<?php
$user = 'root';
$password = 'password';
$pdo = new PDO('mysql:host=mysql; dbname=blog; charset=utf8', $user, $password);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$sql = "SELECT * FROM blogs WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$blog = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($blog);