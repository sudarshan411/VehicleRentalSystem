<?php

require("config/def.php");
require("config/db.php");
require("inc/header.php");
require("inc/modals.php");

//Fetching all vehicle records to diplay to the user
$query = "SELECT * FROM Vehicles JOIN Model USING (m_id) WHERE taken <> 1 ORDER BY model";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
if(!$result){

    echo 'MySQLi error:- '.mysqli_error($conn);
}

$vehicles = $result->fetch_all($resulttype=MYSQLI_ASSOC);
$count = count($vehicles)

?>

    <div class= "container">
        <br>
        <h1>Catalogue Page</h1>

        <div class="container mt-4">
            <div class="row">
                <?php foreach($vehicles as $vehicle) : ?>
                    <div class="col-auto mb-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $vehicle['model']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $vehicle['license'];?></h6>
                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo 'Model Year: '.$vehicle['model_year'];?></li>
                                    <li class="list-group-item"><?php echo 'Price for one day: '.$vehicle['base'];?></li>
                                    <li class="list-group-item"><?php echo 'Daily rate for more than a day: '.$vehicle['rate'];?></li>
                                    <li class="list-group-item"><?php echo 'State: '.$vehicle['state'];?></li>
                                </ul>
                                <a href="" class="btn btn-success book_now" id= "<?php echo $vehicle['license'];?>">Book Now!</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); 
    require('inc/book_scripts.php');?>


</body>
</html>