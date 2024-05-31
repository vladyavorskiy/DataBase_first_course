<h1>Бронирование:</h1>
<?php
$result = $conn->query("SELECT * FROM `booking`,`room`,`guest` WHERE booking.room_id = room.id and booking.guest_id = guest.id GROUP BY booking.ID");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header"> ' . 'ID бронирования - ' . $row['id'] .'</div>
            <div class="card-body text-dark">
                <div class="row g-0"> 
                    <div class="col-md-10">
                    <a class="nav-link" href="/index.php?page=b" >                  
                        <p class="card-text">' . 'Номер комнаты - ' .$row['room_number']  .'</>
                        <p class="card-text">' . 'ФИО - ' .$row['full_name']  .'</>
                        <p class="card-text">' . 'Начало бронирования - ' .$row['start_date']  .'</>
                        <p class="card-text">' . 'Конец бронирования - ' .$row['end_date']  .'</>
                        <p class="card-text">' . 'Количество гостей - ' .$row['amount_people']  .'</>
                       </a>          
                    </div>
                    <div class="col-md-1">
                        <a href="deletebooking.php?ID='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>                    
                </div>             
            </div>           
        </div>
 
    ';

}
?>

