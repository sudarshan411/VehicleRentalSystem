<?php
require('config/def.php');
require('config/db.php');

    //Calculate smallest free index for new entry
    $query = 'SELECT v_id FROM Vehicles';
    $results = mysqli_query($conn, $query);
    echo mysqli_error($conn).'<br>';
    $existing_indices = mysqli_fetch_array($results, MYSQLI_ASSOC);

    print_r($existing_indices);

    // Check For Submit
	/*if(filter_has_var(INPUT_POST, 'submit')){
		// Get form data
		$v_type = $_POST['v_type'];
		$model = $_POST['model'];
        $model_year = $_POST['model_year'];
        $license = $_POST['license'];
        $rate = $_POST['rate'];
        $available = $_POST['available'];

        //Calculate smallest free index for new entry
        $query = 'SELECT v_id FROM Vehicles';
        $result = mysqli_query($conn, $query);
        $existing_indices = mysqli_fetch_array($result, MYSQLI_NUM);

                
	}*/

    //Close SQL connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicles</title> 
</head>
<body>
    <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div>
                <label>Vehicle Type</label>
                <select name="v_type">
                    <option value="car">Car</option>
                    <option value="2-wheeler">2-wheeler</option>
                </select>
            </div>

            <div>
                <label>Model Name</label>
                <input type="text" name="model">
            </div>

            <div>
                <label>Model Year</label>
                <input type="number" name="model_year" step="1">
            </div>

            <div>
                <label>License</label>
                <input type="text" name="license">
            </div>

            <div>
                <label>Rental Rate</label>
                <input type="number" name="rate" step="0.01">
            </div>

            <div>
                <button type="submit" name="submit">
            </div>
        </form>
    </div>
</body>
</html>

