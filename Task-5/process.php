<?php

$comment = $_POST['comment'];

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'TEST';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comments (comment) VALUES ('$comment')";

if (mysqli_query($conn, $sql)) {
echo "Комментарий успешно сохранен!";
} else {
echo "Ошибка: " . $sql . "" . mysqli_error($conn);
}
