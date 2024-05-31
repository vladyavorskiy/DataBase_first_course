<?php
require "dbconnect.php";
try {
    $sql = 'DELETE FROM guest WHERE guest.ID=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Гость успешно удалён";
} catch (PDOexception $error) {
    if ($error->getCode() == '23000') {
        $_SESSION['msg'] = "Ошибка удаления гостя: данный гость используется в другой таблице и не может быть удалён";
    }else{
    $_SESSION['msg'] = "Ошибка удаления Гостя: " . $error->getMessage();
    }
}
header('Location: http://databasecourse/index.php?page=g');
exit( );