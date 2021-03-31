<?php
require('config/def.php');
require('config/db.php');

    if (isset($_GET) && !empty($_GET)){
        $id = $_GET['mid'];
    }
    $duplicate = false;

    if(isset($_POST['submit'])){

        $v_type = mysqli_real_escape_string($conn, $_POST['v_type']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $model_year = $_POST['model_year'];
        $base = $_POST['base'];
        $rate = $_POST['rate'];
        $id = $_POST['mid'];

        $cap_v_type = strtoupper($v_type);
        $cap_model = strtoupper($model);

        //Checking for already inserted model with same info
        $result = $conn->prepare("SELECT * FROM Model WHERE UPPER(v_type) = '$cap_v_type' AND UPPER(model) = '$cap_model' AND model_year = '$model_year'");
        if(!$result){
            echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
        }
        $result->execute();
        $tuples = $result->get_result()->fetch_all();

        $duplicate = count($tuples) > 0;
        if(!$duplicate){
            $result1 = $conn->prepare("UPDATE Model SET v_type = '$v_type' WHERE m_id = '$id'");
            if($result1->execute()){
                    header('Location: admin_dashboard.php');
            }        
            else{
                echo '<br>MySQLi error: '.mysqli_error($conn);
            }
            $result2 = $conn->prepare("UPDATE Model SET model = '$model' WHERE m_id = '$id'");
            if($result2->execute()){
                    header('Location: admin_dashboard.php');
            }        
            else{
                echo '<br>MySQLi error: '.mysqli_error($conn);
            }
            $result3 = $conn->prepare("UPDATE Model SET model_year = '$model_year' WHERE m_id = '$id'");
            if($result3->execute()){
                    header('Location: admin_dashboard.php');
            }        
            else{
                echo '<br>MySQLi error: '.mysqli_error($conn);
            }
            $result4 = $conn->prepare("UPDATE Model SET rate = '$rate' WHERE m_id = '$id'");
            if($result4->execute()){
                    header('Location: admin_dashboard.php');
            }        
            else{
                echo '<br>MySQLi error: '.mysqli_error($conn);
            }
            $result5 = $conn->prepare("UPDATE Model SET base = '$base' WHERE m_id = '$id'");
            if($result5->execute()){
                    header('Location: admin_dashboard.php');
            }        
            else{
                echo '<br>MySQLi error: '.mysqli_error($conn);
            }
        }
    }  

    //Close sql connection
    mysqli_close($conn);
?>

<?php include('inc/header.php');?>

<?php $_POST['submit'] = null;?>

    <div class="container">
        <h1>Edit Model</h1>
        <?php if($duplicate): ?>
    		<div class="alert <?php echo 'alert-danger'; ?>"><?php echo 'Model already exists! Enter a new model'; ?></div>
    	<?php endif; ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" name='mid' value="<?php echo $id;?>">
            <div class="form-group">
                    <label for="vehi-type">Vehicle Type</label>
                    <input type="text" name="v_type" id="vehi-type" class="form-control" aria-describedby="help1">
                    <small id="help1" class="form-text text-muted">Vehicle type (car, motorcycle etc.)</small> 
            </div>
            <div class="row ">
                <div class="col-6 form-group">
                    <label for="vehi-model">Model Name</label>
                    <input type="text" name="model" id="vehi-model" class="form-control" aria-describedby="help2">
                    <small id="help2" class="form-text text-muted">Vehicle model (Swift, Honda City etc.)</small> 
                </div>
                <div class="col-6 form-group">
                    <label for="vehi-year">Model Year</label>
                    <input type="number" name="model_year" min="1900" max="2200" step="1" id="vehi-year" class="form-control" aria-describedby="help3">
                    <small id="help3" class="form-text text-muted">Model year</small> 
                </div>
            </div>
            <div class="row ">
                <div class="col-6 form-group">
                    <label for="vehi-base">Base Price</label>
                    <input type="number" step= "0.01" min="0" name="base" id="vehi-base" class="form-control" aria-describedby="help4">
                    <small id="help4" class="form-text text-muted">Base price for the vehicle</small> 
                </div>
                <div class="col-6 form-group">
                    <label for="vehi-rate">Rate (per day)</label>
                    <input type="number" step= "0.01" min="0" name="rate" id="vehi-rate" class="form-control" aria-describedby="help4">
                    <small id="help4" class="form-text text-muted">Rate for the vehicle</small> 
                </div>
            </div>
            <div>
                <input type = "submit" name="submit" class="btn btn-primary" value="submit">
            </div>
        </form>
    </div>
    <?php require('inc/footer.php');?>
</body>
</html>

