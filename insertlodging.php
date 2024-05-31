<?php
require "dbconnect.php";
if ($_POST['end_date'] != NULL and $_POST['start_date'] != NULL){
    try {
        $sql = 'INSERT INTO lodging(id, room_id, guest_id, start_date, end_date, amount_people) VALUES(NULL, :room_id, :guest_id, :start_date, :end_date, :amount_people)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':room_id',$_POST['room_id']);
        $stmt->bindValue(':guest_id',$_POST['guest_id']);
        $stmt->bindValue(':start_date',$_POST['start_date']);
        $stmt->bindValue(':end_date',$_POST['end_date']);
        $stmt->bindValue(':amount_people',$_POST['amount_people']);
        $stmt->execute();
        $_SESSION['msg'] = "Проживание успешно добавлено";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления проживания: " . $error->getMessage();
    }
    header('Location: http://databasecourse/index.php?page=l');
}
else {
    $_SESSION['msg'] = "Ошибка добавления Проживания: Не указаны даты";
    header('Location: http://databasecourse/index.php?page=al');
}
exit( );