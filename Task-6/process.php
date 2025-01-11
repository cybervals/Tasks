<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
}

if (empty($comment)) {
    $_SESSION['error'] = 'Заполните поле комментария!';
    header('Location: form_validation.php'); // Перенаправляем пользователя обратно к форме
    exit;
}
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']); // Удаляем сообщение из сессии
}



$host = 'localhost';
$username = 'root';
$password = '';
$database = 'TEST';

$conn = mysqli_connect($host, $username, $password, $database);

$sql = "INSERT INTO comments (comment) VALUES ('$comment')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = 'Комментарий успешно сохранен!';
    header('Location: form_validation.php'); // Перенаправляем пользователя обратно к форме
    exit;
} else {
    echo "Ошибка: " . $sql . "" . mysqli_error($conn);
}