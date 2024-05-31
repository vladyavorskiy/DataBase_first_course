<h1>Проживание:</h1>
<?php
$result = $conn->query("SELECT * FROM `lodging`,`room`,`guest` WHERE lodging.room_id = room.id and lodging.guest_id = guest.id GROUP BY lodging.ID");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header"> ' . 'ID проживания - ' . $row['id'] .'</div>
            <div class="card-body text-dark">
                <div class="row g-0"> 
                    <div class="col-md-10">
                    <a class="nav-link" href="/index.php?page=l" >                  
                        <p class="card-text">' . 'Номер комнаты - ' .$row['room_number']  .'</>
                        <p class="card-text">' . 'ФИО - ' .$row['full_name']  .'</>
                        <p class="card-text">' . 'Начало проживания - ' .$row['start_date']  .'</>
                        <p class="card-text">' . 'Конец проживания - ' .$row['end_date']  .'</>
                        <p class="card-text">' . 'Количество гостей - ' .$row['amount_people']  .'</>
                        </a>          
                    </div>
                    <div class="col-md-1">
                        <a href="deletelodging.php?ID='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>                    
                </div>             
            </div>           
        </div>
 
    ';

}
?>
