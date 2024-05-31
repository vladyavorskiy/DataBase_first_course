<?php
require "dbconnect.php";
if ($_POST['full_name'] != NULL){
    try {
        $sql = 'INSERT INTO guest(id, full_name, image) VALUES(NULL, :full_name, :image)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':full_name',$_POST['full_name']);
        $stmt->bindValue(':image', $_POST['image'] );
        $stmt->execute();
        $_SESSION['msg'] = "Гость успешно добавлен";


    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления гостя: " . $error->getMessage();
    }
    header('Location: http://databasecourse/index.php?page=g');
}
else {
    $_SESSION['msg'] = "Ошибка добавления Гостя: Имя не может быть пустым";
    header('Location: http://databasecourse/index.php?page=ag');
}
exit( );