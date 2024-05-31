<h1>Гости:</h1>
<?php
$result = $conn->query("SELECT * FROM `guest` WHERE 1 GROUP BY guest.ID");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header"> ' . 'ID гостя - ' . $row['id'] . '</div>
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-2">  
                        <img src="'.$row['image'].'" alt="Task picture" height="75px">
                    </div>
                    <div class="col-md-8">
                    <a class="nav-link" href="/index.php?page=g" >
                        <h5 class="card-title">' . 'ФИО - ' . $row['full_name'] . '</h5>
                    </a>
                    </div> 
                    <div class="col-md-1">
                        <a href="deleteguest.php?id='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div> 
                </div>
            </div>
            
        </div>
 
    ';

}

?>
