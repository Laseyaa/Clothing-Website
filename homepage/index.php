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
       

    }
    



    else {
    mysqli_query($con, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES ('$id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
    
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
                                            <li><a href="allclothes.php" id="allclothing" >All clothing</a></li>
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
                                           <img id="dynamic-image" src="images/aa3.jpg">
                                        </h4>
                                    </div>
                                </div>

                            </li>
                          
                            <li class="menu-item-has-children">
                                <a href="contactus.php">contact us</a>
                            
                              

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
              <div id="searchForm" class="search-form" style="display:none;">
            <form action="search-results.php" method="GET">
                <input type="text" name="query" placeholder="Search for products..." required>
                <button type="submit">Search</button>
            </form>
        </div>
   

            <!-- --------------------------------------------------------------- -->

            <div class="row">
            <div class="col1">
                <h1>
                  World Best branded <br> Fashion Store!  
                </h1><br>
                <p>Welcome to TrendyThreads, your one-stop online destination<br> for the latest in fashion.  
                <br><a href="allclothes.php" class="btn"> Explore now &#8594;</a>
            </div>
            <div class="col2">
                <img src="images\hj.png" alt="">
            </div>

        </div>
        <!-- ----------------------------------------------------------------------------- -->
        </div>
    </header>


  <div class="container-p">
         <div class="product">

        <h2 class="titl">Latest Products</h2>
          <div class="box-container">
              
                                   <?php 

                         $select_product = mysqli_query($con, "SELECT * FROM `products` WHERE `id` IN (26,46,150,88)") or die('Query failed');

                                 if (mysqli_num_rows($select_product) > 0) {
                                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {

                           ?>
                         <div class="box">
                           <a href="productdetails.php?id=<?php echo $fetch_product['id']; ?>">
                               <img src="<?php echo $fetch_product['image']; ?>" alt="<?php echo $fetch_product['name']; ?>">
                                    </a>
                                    <div class="name"><?php echo $fetch_product['name']; ?></div>
                                    <div class="price">$<?php echo $fetch_product['price']; ?></div>
                                    <form action="" method="post">
                                        <input type="number" min="1" name="product_quantity" value="1" class="inp">
                                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn1">
                                    </form>
                                </div>
                                <?php 
                                    }
                                } else {
                                    echo "<p>No products found!</p>";
                                }
                                ?>
            </div>


           </div>       


       </div>
            


     </div>
</div>

<div class="ofer">

    <div class="s-container">
        <div class="row">
            <div class="col2">
                <img src="images/bg.4.png" alt=" "  class="offer-img">
            </div>
            <div class="col2">
                <p>This is the best Smart watch</p>
                <h1>Smart Band 4</h1>
                <small>
                    This is the apple company intreduse new smart watch
                    .This Smart watch powerd by apple hiper os and it display is 
                    suppe amoloid display
                </small><br>
                <a href="javascript:void(0);" class="btn" onclick="buyNow()">Buy Now &#8594;</a>
            </div>
        </div>
    </div>
</div>

<div class="brand">
    <div class="s-container">
        <div class="row">
            <div class="col5">
                <img src="images/brand.8-removebg-preview.png" alt="">
            </div>
            <div class="col5">
                <img src="images/brnd.9-removebg-preview.png" alt="">
            </div>
            <div class="col5">
                <img src="images/brand.4-removebg-preview.png" alt="">
            </div>
            <div class="col5">
                <img src="images/brand.7-removebg-preview.png" alt="">
            </div>
            <div class="col5">
                <img src="images/brn6.png" alt="">
            </div>
            <div class="col5">
                <img src="" alt="">
            </div>
        </div>
    </div>
</div>


<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col1">
                <h3>Download Our App</h3>
                <p>Download App For Android and Iso Mobile Phones.</p>
                <div class="applogo">
                  <a href="www.playstore.com" >  <img src="images/play.1-removebg-preview.png" alt=""></a>
                   <a href="www.appstore.com" > <img src="images/play.2-removebg-preview.png" alt=""><a>
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
                <li><a href="https://web.facebook.com/profile.php?id=61565474546022" style="color:#b5b5b5">Facebook</a></li>
                <li><a href="https://x.com/dandfashiolk" style="color:#b5b5b5" >Twitter</a></li>
                <li><a href="https://www.instagram.com/dand_dfashion?igsh=MTNidDdnam11YW9lNw%3D%3D&utm_source=qr"style="color:#b5b5b5"  >Instregram</a></li>
                <li><a href="https://youtube.com/@brait-e4k?si=V-_BhKyx0P7obSQd"style="color:#b5b5b5" >Youtube</a></li>
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
    <script>function buyNow() {
    window.location.href = "productdetails.php?id=174";
}
</script>
</body>
</html>