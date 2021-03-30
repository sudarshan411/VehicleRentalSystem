<?php
require('config/def.php');
require('config/db.php');

$queryi = "SELECT * FROM Model ORDER BY m_id ";
$result = $conn->query($queryi);
$conn->close(); 
?>

<?php include('inc/header.php');?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Vehicle Model Details</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            margin-top:30px;
            margin-left:20px ;
        }
  
        h1 {
            text-align: center;
            color: #000000;
            font-size: xx-large;
            font-family: "Times New Roman", Times, serif;
        }
  
        td {
            background-color: peachpuff;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <div class="container text-center">
        <h1>Vehicle Models</h1>
        <br>
        <a href= "<?php echo ROOT_URL ?>/add_models.php" class="btn btn-primary" style="margin-bottom: 20;">Add a model</a>
        <table style="margin: 20 auto;">
            <tr>
                <th>Vehicle Type</th>
                <th>Model Name</th>
                <th>Model Year</th>
                <th>Base Rate</th>
                <th>Rate</th>
                <th>Edit Model</th>
                <th>Delete Model</th>
            </tr>
            
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['v_type'];?></td>
                <td><?php echo $rows['model'];?></td>
                <td><?php echo $rows['model_year'];?></td>
                <td><?php echo $rows['base'];?></td>
                <td><?php echo $rows['rate'];?></td>
                <td> <a href="edit_model.php?mid=<?php echo $rows['m_id'];?>">Edit Model</a></td>
                <td><a href="delete_model.php?mid=<?php echo $rows['m_id'];?>">Delete Model</a></td>
            </tr>
           
            <?php
                }
                ?>
                
             
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
  
</html>
