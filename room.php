<h1>Комнаты:</h1>
<?php
$result = $conn->query("SELECT * FROM `room`,`corpus` WHERE room.corpus_id = corpus.id GROUP BY room.ID");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header"> ' . 'ID комнаты - ' . $row['id'] .'</div>
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=r" >
                        <p class="card-text">' . 'Название корпуса - ' .$row['name']  .'</>
                        <p class="card-text">' . 'Номер комнаты - ' .$row['room_number']  .'</>
                        <p class="card-text">' . 'Количество мест - ' .$row['amount_places']  .'</>
                        <p class="card-text">' . 'Цена - ' .$row['price']  .'</>
                    </a>
                    </div>
                    
                </div>
            </div>
            
        </div>
 
    ';

}
?>