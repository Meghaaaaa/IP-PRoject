<!DOCTYPE html>
<html lang="en">
<?php
    include_once("admin/functions.php");
    ?>
<?php
    $title = "Register Yourself";
     include_once("includes/db.php");
    include_once("includes/header.php");
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $emailid = $_POST['emailid'];
//        echo $username . "" . $firstname . "" . $lastname . "" . $password . "" . $emailid ;
        
        $username = mysqli_real_escape_string($connection, $username);
        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $password = mysqli_real_escape_string($connection, $password);
        $emailid = mysqli_real_escape_string($connection, $emailid);
        
    
     $query = "SELECT * FROM users WHERE username = '$username' ";
    $select_user = mysqli_query($connection,$query);
    if(mysqli_num_rows($select_user) > 0){
        echo"username already exists";
    }else{
        //cost tells you kitne baar hashing ka loop chalega
        
        //echo password_hash("meg1234", PASSWORD_BCRYPT);

        $hashedpass = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users(username,user_password, user_firstname,user_lastname,user_email,user_image,user_role) VALUES('$username','$hashedpass','$firstname','$lastname','$emailid',' ','subscriber')";
        
        $insert_user_query = mysqli_query($connection, $query);
        confirmQuery($insert_user_query);
        echo "User Registration Successful!";
    }
    }
    ?>

<body>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST" role="form">
                <legend>Form title</legend>
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Enter your first name" name="firstname">
                </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Enter your last name" name="lastname">
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your Desired Username" name="username">
                </div>
                
                   <div class="form-group">
                    <label for="emailid">Email</label>
                    <input type="text" class="form-control" id="emailid" placeholder="someone@example.com" name="emailid">
                </div>
                
                   <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Please Provide some Strong Password!" name="password">
                </div>
                
                
                <button name="register" type="submit" class="btn btn-lg btn-primary">Submit</button>
                </form>

        
            </div> 
                
             <!-- START OF BLOG POST -->



               <!-- END OF BLOG POST -->


        <?php
        include_once("includes/footer.php");
        ?>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    


</body>

</html>

