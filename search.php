<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Megha's Blog! | search";
    include_once("includes/header.php");
      include_once("includes/db.php");
    ?>

<body>

  <?php
    include_once("includes/navigation.php");
    ?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                  SEARCH RESULT
                    
                </h1>
                
                <?php
                 if(isset($_POST['submit'])){
     $search = $_POST['search'];
         $query = "SELECT * FROM posts WHERE post_tags like '%$search' AND post_status = 'published'";
         $search_query = mysqli_query($connection, $query);
         if(!$search_query){
             //there was some error in processing query
             die("QUERY FAILED: ". mysqli_error($connection));
         }
$count = mysqli_num_rows($search_query);
         if($count == 0)
         {
             echo"<h2>NO RESULT FOUND!</h2>";
         }else{
             echo"SOME RESULTS WERE FOUND!";
             while($row = mysqli_fetch_assoc($search_query)){
                                //row is 1D assoc array,
                                $post_title = $row['post_title'];
                                 $post_author = $row['post_author'];
                                 $post_date = $row['post_date'];
                                 $post_image = $row['post_image'];
                                 $post_content = $row['post_content'];
                     ?>
                       <!-- START OF BLOG POST -->
                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="<?php echo $post_title;?>">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               <!-- END OF BLOG POST -->
               <?php
                 //end ofwhile
         }
     }// end of else
      }//end of isset
                ?>
                          
                                
                               
                          
                
                
            
                
                
           
             
            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php
            include_once("includes/sidebar.php");
            ?>
        </div>
        <!-- /.row -->

        <hr>

        <?php
        include_once("includes/footer.php");
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

