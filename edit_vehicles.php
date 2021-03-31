<?php
require('config/def.php');
require('config/db.php');

    $duplicate = false;
    
    if (isset($_GET) && !empty($_GET)){
        $license = $_GET['license'];
        $license_check = $conn->prepare("SELECT m_id FROM Vehicles WHERE license = '$license'");
        $license_check->execute();
        $lic_tuples = $license_check->get_result()->fetch_all($resulttype = MYSQLI_ASSOC);
        $lic_check = count($lic_tuples) == 1;
    }
    if(isset($_POST['submit'])){
        
        $license = $_POST['license'];
        $condn = $_POST['condn'];
        
        $license_check = $conn->prepare("SELECT m_id FROM Vehicles WHERE license = '$license'");
        $license_check->execute();
        $lic_tuples = $license_check->get_result()->fetch_all($resulttype = MYSQLI_ASSOC);
        $lic_check = count($lic_tuples) == 1;
        if($lic_check){
            $m_id = $lic_tuples[0]['m_id'];
        }

        $error = array();

        if(empty($condn) || $condn == " "){
            $error[] = 'You forgot to specify the condition!';
        }

        if(empty($error) && $lic_check){

            $result = $conn->prepare("UPDATE Vehicles SET state = '$condn' WHERE license = '$license'");
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
        <h1>Edits to the Vehicles List</h1>
        <?php if(!empty($error)): ?>
    		<div class="alert <?php echo 'alert-danger'; ?>"><?php echo 'You have not filled one or more field(s)! Please fill each field!'; ?></div>
    	<?php endif; ?>
        <?php if(!$lic_check): ?>
    		<div class="alert <?php echo 'alert-danger'; ?>"><?php echo 'Error with the license!'; ?></div>
    	<?php endif; ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="row ">
                <div class="col-6 form-group">
                    <input type="hidden" name="license" value="<?php echo $license;?>">
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