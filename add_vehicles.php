<?php
require('config/def.php');
require('config/db.php');

    $duplicate = false;
    
    if (isset($_GET) && !empty($_GET)){
        $id = $_GET['id'];
    }
    if(isset($_POST['submit'])){

        $license = mysqli_real_escape_string($conn, $_POST['license']);
        $taken = 0;
        $condn = $_POST['condn'];
        $m_id = $_POST['m_id'];

        $error = array();
        if(empty($license) || $license == " "){
            $error[] = 'You forgot to enter the vehicle type!';
        }
        if(empty($condn) || $condn == " "){
            $error[] = 'You forgot to specify the condition!';
        }


        $cap_license = strtoupper($license);
        $cap_condn = strtoupper($condn);

        //Checking for already inserted model with same info
        $result = $conn->prepare("SELECT * FROM Vehicles WHERE UPPER(license) = '$cap_license'");
        $result->execute();
        $tuples = $result->get_result()->fetch_all();

        $duplicate = count($tuples) > 0;

        if(!$duplicate && empty($error)){

            $result = $conn->prepare("INSERT INTO Vehicles VALUES('$license', '$m_id', '$taken', '$condn')");
            if($result->execute()){
                header('Location: msp.php?m_id='.$m_id);
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
        <h1>A New Addition to the Vehicles List</h1>
        <?php if($duplicate): ?>
    		<div class="alert <?php echo 'alert-danger'; ?>"><?php echo 'Vehicle already exists! Enter a new vehicle'; ?></div>
    	<?php endif; ?>
        <?php if(!empty($error)): ?>
    		<div class="alert <?php echo 'alert-danger'; ?>"><?php echo 'You have not filled one or more field(s)! Please fill each field!'; ?></div>
    	<?php endif; ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" name="m_id" value="<?php echo $id;?>">
            <div class="form-group">
                    <label for="vehi-lic">License</label>
                    <input type="text" name="license" id="vehi-lic" class="form-control" aria-describedby="help1">
                    <small id="help1" class="form-text text-muted">License Number of Vehicle</small> 
            </div>
            <div class="row ">
                <div class="col-6 form-group">
                    <label for="vehi-condn">Condition</label>
                    <textarea name="condn" id="vehi-condn" class="form-control" aria-describedby="help2"></textarea>
                    <small id="help2" class="form-text text-muted">Condition of the Vehicle</small> 
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

