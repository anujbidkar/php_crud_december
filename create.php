<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATIONS</title>
    <style>
        body
        {
            background-color: bisque;
        }
        .div1
        {
            background-color: powderblue;
            width: 600px;
            height: 600px;
            margin-left:350px;
            margin-top:100px;
            padding: 20px;
        }
    </style>
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body style=" background-color: bisque;">

<div class="div1">
    <form action="" method="POST">


                <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="Enter Your User Name" id=""> 
   
                </div>
                
                <div class="form-group">
                       
                        <label for="">User Email</label>
                        <input type="email" name="user_email" class="form-control" placeholder="Enter Your User Name" id="">
                    
   
                </div>



                <div class="form-group">
                       
                <label for="">User Password</label><br>
                     <input type="password" name="user_password" class="form-control" placeholder="Enter Your User Name" id=""> <br> <br>

   
                </div>

            <button type="submit" name="register_btn" class="btn btn-success mx-auto d-block">
                Register 
            </button>


    </form>


        <?php 

            if(isset($_POST['register_btn']))
            {


               $name = $_POST['user_name'];
              
               $email = $_POST['user_email'];
              
               $password = $_POST['user_password'];
              

               $connection = mysqli_connect('localhost','root','','crud_operations');

               if($connection)
               {


                    $query_insert = "INSERT INTO users(user_name,user_email,user_password)  VALUES('$name','$email','$password')";

                    $result_insert_query = mysqli_query($connection,$query_insert);   //query execute 

                    if($result_insert_query)
                    {
                            echo "Data Insert Successfully";
                    }
                    else
                    {   
                        echo "Error In Insertion".mysqli_error($connection);

                    }        
               }
               else
               {
                   echo "error in connection";
               }
               

               

            }


        ?>


</div>


    
</body>
</html>