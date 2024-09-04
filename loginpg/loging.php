<?php 

include 'database.php';
 session_start();
if (isset($_POST['submit'])) {

// $name = mysqli_real_escape_string($con,$_POST['username']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$pass = mysqli_real_escape_string($con,md5($_POST['password']));
// $cpass = mysqli_real_escape_string($con,md5($_POST['cpassword']));
 
$select =mysqli_query($con, "SELECT * FROM `logingform` WHERE email='$email' AND password='$pass' ") or die('query failded');


if (mysqli_num_rows($select) > 0) {
  
    $row= mysqli_fetch_assoc($select);
    $_SESSION['id']=$row['id'];
    header('location:index.php');


}
else{
      $message[] = 'incorect email or password!';

}

  

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Catalog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="naws.css">
    <script src="naw.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <?php 

    if (isset($message)) {
       foreach ($message as $message) {
          echo '<div class="message"  onclick="this.remove();">'.$message.' </div>';
       }
    }


     ?>




    
<!-- acount  page -->

<div class="acount">
    <div class="container">
        <div class="row">
            <div class="col2">
                <img src="images/hj.png" alt="">
            </div>
            <div class="col2">

                <div class="fcontainer"  >
                    <div class="fbtn">


                     <!--    <span onclick="login()">Loging</span>
                        --> <!-- <span onclick="registor()">Register</span>
                        <hr id="indic"> -->
                        <center><b>Loging form</b></center>
                    </div>

                  


                   <form action="" method="Post" >

                        
                        <input type="email" placeholder="email" name="email" required>
                        <input type="password" placeholder=" enter password" name="password" required>
                        <input type="submit" class="btn" name="submit" value="loging Now">
                         <p class="regp">Don't have an acount?<a href="acount.php">register Now</p>
                    </form> 



                </div>
            </div>
        </div>
    </div>
</div>
     
  


     
    

<!-- flooter?? -->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col1">
                <h3>Download Our App</h3>
                <p>Download App For Android and Iso Mobile Phones.</p>
                <div class="applogo">
                    <img src="images/play.1-removebg-preview.png" alt="">
                    <img src="images/play.2-removebg-preview.png" alt="">
                </div>
            </div>
            <div class="footer-col2">
                <img src="images/logo.w.png" alt="" width="200px">
                <p>Our Purpose Is To Sustanability Make the Pleasure and 
                    Benefits of Sports Accesibale to the May.</p>
            </div>
            <div class="footer-col3">
                <h3>Usefil Links</h3>
              <ul>
                <li>Couoans</li>
                <li>Blogs Post</li>
                <li>Return Policy</li>
                <li>Join Affiliate</li>
              </ul>
            </div>
            <div class="footer-col4">
                <h3>Follow us</h3>
              <ul>
                <li>Facebook</li>
                <li>Twitter</li>
                <li>Instregram</li>
                <li>Youtube</li>
              </ul>
            </div>

        </div>
        <hr>
        <p  class="copy">Copyright 2020- Group-w</p>
    </div>
</div>




<script>


    var  menuitems=document.getElementById("menuitems");
    menuitems.style.maxHeight="0px";

    function  menutoggle(){

        if( menuitems.style.maxHeight=="0px")
            {
                 menuitems.style.maxHeight="200px";

            }
            else{

                 menuitems.style.maxHeight="0px";
            }

    }

</script>


<!-- loging form Script -->

<script>
    var logingform=document.getElementById("logingform");
    var registerform=document.getElementById("registerform");
    var indic=document.getElementById("indic");

    function  registor(){


        logingform.style.transform="translateX(0px)";
        registerform.style.transform="translateX(0px)";
        indic.style.transform="translateX(100px)";
    }


    function  login(){


    logingform.style.transform="translateX(300px)";
    registerform.style.transform="translateX(300px)";
    indic.style.transform="translateX(0px)";
    

    }


</script>

</body>
</html>