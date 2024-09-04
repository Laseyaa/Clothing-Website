<?php 
include 'database.php';
session_start();
$id=$_SESSION['id'];


if (!isset($id)) {
    header('location:loging.php');
};

if (isset($_GET['logout'])) {
    unset($id);
    session_destroy();
     header('location:loging.php');

};

if (isset($_POST['add_to_cart'])) {
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=$_POST['product_quntity'];

    $select_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE name= '$product_name' AND user_id='$id' ") or die('query faild');

                                  

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] ='product allready added into cart!';

    }
   


    else {
    mysqli_query($con, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES ('$id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
    $message[] = 'Product added to cart successfully';
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
    <!-- <link rel="stylesheet"  href="prds.css"> -->

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
    <header class="header">
        <div class="container">
        

            
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


            


        </div>
    </header>
 
     <br>

     <div class="user-profil">

                <?php 

                $select_user= mysqli_query($con,"SELECT * FROM `logingform` WHERE id ='$id' " ) or die('query failded');

                    if (mysqli_num_rows($select_user) > 0) {
                        
                        $fetch_user = mysqli_fetch_assoc( $select_user);

                    };


                 ?>


                 <div class="system">
                             <p class="pp">User Details</p><hr>
                    <div class="pra">

                         <b><p>username : <span> <?php echo  $fetch_user['username']; ?> </span></p></b>
                         <b><p>email : <span> <?php echo  $fetch_user['email']; ?> </span></p></b>
                     </div>
                         <div class="flex">
                            <a href="loging.php" class="btns"><b>loging</b></a>
                             <a href="acount.php" class="btns1"><b>register</b></a>
                            <a href="loging.php?logout=<?php echo $id;  ?>" onclick="return confirm('are you sure log out?');"  class="btns2"><b>logout</b></a>
                          </div>

                     </div>


       



<br>    <br>





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