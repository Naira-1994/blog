<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Code to Fetch All Data from MySQL Database and Display in html Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php include 'msg.php';  ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="float-left">
                <h2>Customers List</h2>
            </div>
            <div class="float-right">
                <a href="add.php" class="btn btn-success">Add New Customer Record</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include 'mydbCon.php';
                $query="select * from customers limit 200"; // Fetch all the data from the table customers
                $result=mysqli_query($dbCon,$query);
                ?>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                            <th scope="row"><?php echo $array[0];?></th>
                            <td><?php echo $array[1];?></td>
                            <td><?php echo $array[2];?></td>
                            <td><?php echo $array[3];?></td>
                            <td>
                                <a href="edit.php?custId=<?php echo $array[0];?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?custId=<?php echo $array[0];?>" class="btn btn-danger">Delete</a>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" rowspan="1" headers="">No Data Found</td>
                    </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
