<?php
    require('config/def.php');
    require('config/db.php');
    if (isset($_GET) && !empty($_GET)){
        $id = $_GET['m_id'];
    }
?>

<?php
    include("inc/header.php");
?>

<div class="container text-center">
    <h1>Model Specific Page</h1>
    <a href= "<?php echo ROOT_URL ?>/add_vehicles.php?id=<?php echo $id?>" class="btn btn-primary">Add a vehicle</a>
    <br><br>
    <h3> Vehicles List </h3>
    <table class = "table table-striped">
        <thead>
            <tr>
                <th>License</th>
                <th>Taken/Not Taken</th>
                <th>Condition</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql_query = "SELECT * FROM VEHICLES WHERE m_id = $id";
                $res = mysqli_query($conn, $sql_query);
                while ($r = mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $r['license']; ?></th>
                        <td><?php echo ($r['taken'] == 0)?'Not Taken':'Taken'; ?></td>
                        <td><?php echo $r['condn']; ?></td>
                        <td><a href="edit_vehicles.php?license=<?php echo $r['license'];?>">Edit Vehicle</a></td>
                    </tr> <?php
                }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>