
   
        <?php
    include_once("includes/db.php");
    $title = "Contact US!";
    ?>
    <?php
        if(isset($_POST['submit'])){
            
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: StudyLink <enquiry@studylinkclasses.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $to = $_POST['emailid'];
            $subject = $_POST['subject'];
            
            $body = $_POST['comments'];
            
            mail($to, $subject, $body, $headers);
            header("Location: contact.php");
        }
?>
    <html>
    <?php
        include_once("includes/header.php"); ?>
     <body>
     <?php include_once("includes/navigation.php"); ?>
    
    <div class="col-md-6 col-md-offset-3">
      
            <form action="" method="POST" role="form">
	<legend>Contact US!</legend>

	<div class="form-group">
		<label for="emailid">Email Id</label>
		<input type="text" class="form-control" id="emailid" name="emailid" placeholder="Your Email">
	</div>
		<div class="form-group">
		<label for="subject">Subjects</label>
		<input type="text" class="form-control" id="subject" name="subject" placeholder="Your Subject">
	</div>
		<div class="form-group">
		<label for="comments">Comments</label>
            <textarea class="form-control" id="comments" name="comments" placeholder="Your Comments" rows="10"> </textarea>
	</div>

<!--//SMTP/MIME = 25 -->

	<button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
</form>

            </div>
        
    </body>
</html>