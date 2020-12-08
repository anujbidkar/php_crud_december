<?php 

ob_start();

?>
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
                        <th>Edit</th>
                        <th>Delete</th>
                    
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
                                <td>
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $backend_id;?>">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="edit<?php echo $backend_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Username <span class="text-danger">*</span></label>
                            <input required type="text" value="<?php echo $backend_user_name?>" class="form-control" name="user_name">
                        </div>
                        <div class="form-group">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input required type="email" value="<?php echo $backend_user_email?>" class="form-control" name="user_email">
                        </div>
                        <div class="form-group">
                            <label for="">Password <span class="text-danger">*</span></label>
                            <input required type="text" value="<?php echo $backend_user_password?>" class="form-control" name="user_password">
                            <input required type="hidden" value="<?php echo $backend_id?>" class="form-control" name="backend_id">
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-success">Update </button>
        </form>
       
      </div>
    </div>
  </div>
</div>
                                
                                </td>

                                <td>
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $backend_id;?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="delete<?php echo $backend_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

      <div class="modal-body">
       Are You Sure Want To Delete This <?php echo $backend_user_name?> ?
       <input type="hidden" name="backend_id" value="<?php echo $backend_id ?>" id="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="delete_btn" class="btn btn-danger">Delete User</button>
      </div>
      </form>
    </div>
  </div>
</div>
                                </td>
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

        <?php 
        if(isset($_POST['update']))
        {
            $updated_username = $_POST['user_name'];
            $updated_user_email = $_POST['user_email'];
            $updated_user_password = $_POST['user_password'];
            $backend_id = $_POST['backend_id'];


            $query_update = "UPDATE users SET user_name='$updated_username' , user_email = '$updated_user_email', user_password = '$updated_user_password' WHERE id='$backend_id' ";

            $result_update = mysqli_query($connection,$query_update);
            if($result_update)
            {
                header("Location:read.php");
            }
            else
            {
                echo "error";   
            }







        }
        
        ?>
        <?php 
        if(isset($_POST['delete_btn']))
        {
           
            $backend_id = $_POST['backend_id'];


            $query_delete = "DELETE FROM users WHERE id = '$backend_id' ";

            $result_delete = mysqli_query($connection,$query_delete);
            if($result_delete)
            {
                header("Location:read.php");
            }
            else
            {
                echo "error";   
            }







        }
        
        ?>
</table>
    
</body>
</html>