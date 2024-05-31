<?php
require "dbconnect.php";
try {
    $sql = 'DELETE FROM lodging WHERE lodging.ID=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Проживание успешно удалёно";
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка удаления Проживания: " . $error->getMessage();
}
header('Location: http://databasecourse/index.php?page=l');
exit( );