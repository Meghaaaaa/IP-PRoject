<!DOCTYPE HTML>
<html>
<head>
<title>AJAX</title>    
</head>
    <body>
   <form action="ajax2.php"method="post">
       <input type="text" name="mobile_no" placeholder="Enter your Mobile no :">
       <input type="submit" name="gen" value="click">
           </form>
       <div id="reload" align="centre"><input type="text" name="ans">
        
       </div>
        
       <?php
        if(isset($_POST["gen"])){
            $mn=$_POST["mobile_no"];
        }
        
        ?>
        <script>
            var mn = <?php echo json_encode($mn); ?>
                var xhttp = new XMLHttpRequest();
      
            
            xhttp.onreadystatechange = function(){
            if(this.readyState == 4  && this.status == 200){
                var myObj = JSON.parse(this.responseText);
                for(i=0;i<myObj.mobile.length;i++){
                    if(myObj.mobile[i]==mn){
                document.getElementById("reload").innerHTML = "Bill Amount :" +myObj.bill[i]+ "<br> Email ID : " +myObj.email[i];
                    }
                }
            }
        };
         xhttp.open("GET","demo2.json",true);
            xhttp.send();
        
            
        </script>
    </body>
</html>