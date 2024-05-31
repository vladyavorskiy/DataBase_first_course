
<h1>Корпуса:</h1>
<?php
$result = $conn->query("SELECT * FROM `corpus` WHERE 1 GROUP BY corpus.ID");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header"> ' . 'ID корпуса - ' . $row['id'] . '</div>
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=c" >
                        <h6 class="card-text">' . 'Название корпуса - ' . $row['name'] . '</h6>
                    </a>
                    </div>
                    
                </div>
            </div>
            
        </div>
 
    ';

}
?>