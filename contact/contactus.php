<?php 

include 'database.php';
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if (isset($_GET['logout'])) {
    unset($id);
    session_destroy();
    header('location:loging.php');
}


if (isset($_POST['add_to_cart'])) {
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=$_POST['product_quantity'];

    $select_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE name= '$product_name' AND user_id='$id' ") or die('query faild');

                                  

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] ='product allready added into cart!';

    }
    



    else {
    mysqli_query($con, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES ('$id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
    $message[] = 'Product added to cart successfully';
}


}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = mysqli_real_escape_string($con, $_POST['mname']);
    $user_email = mysqli_real_escape_string($con, $_POST['memail']);
    $message = mysqli_real_escape_string($con, $_POST['mmessage']);
    $subject = mysqli_real_escape_string($con, $_POST['mtexarea']);

    $query = "INSERT INTO messages(username, email, message, subject) VALUES ('$user_name', '$user_email', '$message', '$subject')";
    
    if (mysqli_query($con, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="naws.css">
    
    <link rel="stylesheet" type="text/css" href="sdds.css">

     <script src="naw.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   

</head>

<body>

    <header class="header">
        <div class="container">
            <div class="user-profile">
              

            </div>
            <div class="row v-center">
                <div class="hedder-item item-left">  
                    <div class="logo">
                        <a href="index.php"><img class="imgs"  src="images/logo.png" ></a>
                    </div> 

                </div>
                <div class="hedder-item  item-center"> 
                    <div class="menu-overlay">
                        
                    </div>  
                    
                    <nav class="menu">
                        <div class="mobile-menu-head">
                            <div class="go-back">
                                <i class="fa fa-angle-left" ></i>
                            </div>
                            <div class="current-menu-title"></div>
                            <div class="mobile-menu-close">&times;</div>
                        </div>
                        <ul class="menu-main">

                           
                           
                            <li>
                                <a href="index.php">home</a>
                            </li>
                           
                            



                            <li class="menu-item-has-children">
                                <a href="#">new <i class="fa fa-angle-down" ></i></a>
                                <div class="submenu mega-menu mega-menu-column-4">
                                    <div class="list-item text-center">
                                        <a href="javascript:void(0);" onclick="product1()" >
                                        <img src="images/ss.jpg"  width="400px" height="300px">
                                        <h4  class="title">Product 1</h4></a>
                                    </div>
                                    <div class="list-item text-center">
                                         <a href="javascript:void(0);" onclick="product2()" >
                                        <img src="images/ss8.jpg"  width="400px" height="300px">
                                        <h4  class="title">Product 2</h4></a>
                                    </div>
                                     <div class="list-item text-center">
                                         <a href="javascript:void(0);" onclick="product3()" >
                                        <img src="images/sss5.jpg" alt=" "  width="400px" height="300px">
                                        <h4  class="title">Product 3</h4></a>
                                    </div>
                                    <div class="list-item text-center">
                                         <a href="javascript:void(0);" onclick="product4()" >
                                        <img src="images/sss4.jpg" alt=""  width="400px" height="300px">
                                        <h4  class="title">Product 4</h4></a>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">shop <i class="fa fa-angle-down" ></i></a>
                                <div class="submenu mega-menu mega-menu-column-4">
                                    <div class="list-item">
                                        <h4 class="title">CLOTHING</h4>
                                        <ul>
                                            <li><a href="allclothes.php"  id="allclothing">All clothing</a></li>
                                            <li><a href="T-Shirt&Polos.php" id="t-Shirt&Polos">T-Shirt & Polos</a></li>
                                            <li><a href="Hoodies.php" id="Hoodies">Hoodies</a></li>
                                            <li><a href="CasualPants.php" id="CasualPants">Casual Pants</a></li>
                                            <li><a href="Jeans&Joggers.php" id="jeans&Joggers">Jeans & Joggers</a></li>
                                            <li><a href="CasualShirt.php" id="CasualShirt">Casual Shirt</a></li>
                                            <li><a href="FomalShirt.php" id="Fomalshirt">Fomal Shirt</a></li>
                                            <li><a href="FomalTrousers.php" id="FomalTrousers">Fomal Trousers</a></li>
                                            <li><a href="Shorts.php" id="Shorts">Shorts</a></li>
                                            <li><a href="ActiveWears.php" id="Activewears">Active Wears</a></li>
                                            <li><a href="Pyjmapants.php" id="Pyjmapants">Pyjma pants</a></li>
                                            <li><a href="Plusmenwear.php" id="Plusmenwear">Plus men wear</a></li>
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <h4 class="title">INNERWERE</h4>
                                        <ul>
                                            <li><a href="AllInnerwares.php" id="AllInnerwares">All Innerwares</a></li>
                                            <li><a href="Boxers&Briefs.php" id="Boxers&Briefs">Boxers & Briefs</a></li>
                                            <li><a href="Socks.php" id="shocks">Socks</a></li>
                                            <li><a href="Underwares.php" id="Underwares">Underwares</a></li>
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <h4 class="title">ACCESSORIES</h4>
                                        <ul>
                                            <li><a href="AllAccessories.php" id="AllAccessories">All Accessories</a></li>
                                            <li><a href="Footwear.php" id="Footwear">Footwear</a></li>
                                            <li><a href="Belts.php" id="Belts">Belts</a></li>
                                            <li><a href="watch.php" id="watch">Watch</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <h4 class="title">
                                           <img id="dynamic-image" src="images/aa3.jpg" alt="Dynamic Image">
                                        </h4>
                                    </div>
                                </div>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="contactus.php">contact us</a>
                            
                              

                            </li>

                            </li>
                        </ul>
                    </nav>
                    
                </div>
                  <div class="hedder-item item-right">   
                   <a href="javascript:void(0);" onclick="toggleSearchForm()"><i class="fa fa-search"></i></a>
                   <a href="cart.php"><i class="fa fa-shopping-cart" ></i></a> 
                   <a href="user-profile.php"><i class="fa fa-user" ></i></a> 

                   <div class="mobile-menu-trigger">
                    <span></span>
                    
                   </div>
                    
                </div>
            </div>
              <div id="searchForm" class="search-formp" style="display:none;">
                    <form action="search-results.php" method="GET">
                        <input type="text" name="query" placeholder="Search for products..." required>
                           <button type="submit">Search</button>
                      </form>
            </div>
            </div>


            <!-- --------------------------------------------------------------- -->

            


        <!-- ----------------------------------------------------------------------------- -->



        </div>
    </header>


    <div class="containerr">
    <main class="roww"> 
             <section class="col left">
                 <div class="contacttital">
                    </center> <h2>contact Us</h2>
                     <p>This our website contact page you can any complain to our using our form</p>


                 </div>
                <div class="contactinfo">

                    <div class="icongroup">
                         <div class="icon">
                             <i class="fa fa-phone" ></i>
                         </div>
                         <div class="details">
                             <span>Contact Number</span>
                             <span>+94-125-674-2345 / +94-78-75-0115</span>
                         </div>
                    </div>


                    <div class="icongroup">
                         <div class="icon">
                             <i class="fa fa-envelope-o"></i></i>
                         </div>
                         <div class="details">
                             <span>Email</span>
                             <span>dilshannethmin77@gmail.com</span>
                         </div>
                    </div>

                    <div class="icongroup">
                         <div class="icon">
                            <i class="fa fa-map-marker" ></i></i>
                         </div>
                         <div class="details">
                             <span>Address</span>
                             <span>No.176/o6 Main rode,<br>
                            Galle Road Elpitiya,<br>Ganegoda</span>
                         </div>
                    </div>


                </div>

                <div class="socialmedia">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                   
                </div>
             </section>



             <section class="col right">
                 
                 <form class="messageform" method="post">
                    <div class="inputgroup halfwidth">
                        <input type="text" name="mname" required="required">
                        <label>user name</label>
                    </div>


                     <div class="inputgroup halfwidth">
                        <input type="email" name="memail" required="required">
                        <label>email</label>
                    </div>

                     <div class="inputgroup fullwidth">
                        <input type="text" name="mmessage" required="required">
                        <label>message</label>
                    </div>

                     <div class="inputgroup fullwidth">
                        <textarea required="required" name="mtexarea"></textarea>
                        <label>subject</label>
                    </div>

                     <div class="inputgroup fullwidth">
                        <button>send</button>
                    </div>
                     
                 </form>
             </section>
    </main>
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
      function toggleSearchForm() {
            var searchForm = document.getElementById('searchForm');
            if (searchForm.style.display === "none") {
                searchForm.style.display = "block";
            } else {
                searchForm.style.display = "none";
            }
        }
    </script>
 
</body>
</html>