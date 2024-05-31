<?php
require "dbconnect.php";
try {
    $sql = 'DELETE FROM booking WHERE booking.ID=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Бронирование успешно удалёно";
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка удаления Бронирования: " . $error->getMessage();
}
header('Location: http://databasecourse/index.php?page=b');
exit( );