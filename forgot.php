
   
        <?php
    include_once("includes/db.php");
 include_once("admin/functions.php");
    $title = "Forgot Password";
    ?>
<?php
if(!isset($_GET['forgot']))
{
    header("Location: forgot.php");
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        
        //check whether the email exists or not!
        $query = "SELECT * FROM users WHERE user_email = '$email'";
        $user = mysqli_query($connection, $query);
        if(mysqli_num_rows($user) == 1){
            //U can say that email exists
            //now if the email exists then just update the token
            $query = "UPDATE users SET token = '$token' WHERE user_email='$email'";
            $updateToken = mysqli_query($connection, $query);
            confirmQuery($updateToken);
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: StudyLink <enquiry@studylinkclasses.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $to = $email;
            $subject = "Megha's Blog change Password";
            
            $body = "Please Click the below link to reset your Password : <br/> 
            <a href='http://localhost/Blog/reset.php?email=$email&token=$token'>http://localhost/Blog/reset.php?email=$email&token=$token</a>";
            
            mail($to, $subject, $body, $headers);
            //header("Location: contact.php");
        }else{
            echo "Some issue with email ID! or no such user found!";
        }
    }
}

?>
    <html>
    <?php
        include_once("includes/header.php"); ?>
     <body>
     <?php include_once("includes/navigation.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your Password here!</p>
                            <div class="pane-body">
                                <form method="POST" action="" role="form" id="forgot-password">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input class="form-control" type="email" id="eamil" name="email" placeholder="Please Enter your email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="reset-submit" value="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>