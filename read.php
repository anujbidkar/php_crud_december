<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<h1 class="text-center">
    Users Data
</h1>

<table class="table table-bordered table-striped">
        <thead>
                <tr>

                        <th>Id</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Password</th>
                    
                </tr>
        </thead>

        <tbody>
           <?php 
           
           $connection = mysqli_connect('localhost','root','','crud_operations');

           $read_query = "SELECT * FROM users";


           $result_query = mysqli_query($connection,$read_query);

           if($result_query)
           {

                        while($row = mysqli_fetch_array($result_query))
                        {
                            $backend_id = $row['id'];
                            $backend_user_name = $row['user_name'];
                            $backend_user_email = $row['user_email'];
                            $backend_user_password = $row['user_password'];


                            ?>
                           
                           <tr>
                                <td><?php echo $backend_id?></td>
                                <td><?php echo $backend_user_name?></td>
                                <td><?php echo $backend_user_email?></td>
                                <td><?php echo $backend_user_password?></td>
                            </tr>

                            <?php

                        }
               
           }
           else
           {
               echo "error in query";
           }


           
           
           ?>
        </tbody>
</table>
    
</body>
</html>