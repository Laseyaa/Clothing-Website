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
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_image = mysqli_real_escape_string($con, $_POST['product_image']);
    $product_quantity = mysqli_real_escape_string($con, $_POST['product_quantity']);

    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$id'") or die('Query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart!';
    } else {
        mysqli_query($con, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES ('$id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('Query failed');
        $message[] = 'Product added to cart successfully';
    }
}

$order_by = "id ASC"; 
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

switch ($sort) {
    case 'price':
        $order_by = "price DESC";
        break;
    case 'popularity':
        $order_by = "solditems DESC";
        break;
    case 'sale':
        $order_by = "rating DESC";
        break;
    case 'mostliked':
        $order_by = "rating DESC";
        break;
    default:
        $order_by = "id ASC";
}

$items_per_page = 15; 
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
if ($current_page < 1) { $current_page = 1; }
$offset = ($current_page - 1) * $items_per_page; 

$total_items_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM `products` WHERE `category` = 'Pyjma-pants'") or die('Query failed');
$total_items_result = mysqli_fetch_assoc($total_items_query);
$total_items = $total_items_result['total'];
$total_pages = ceil($total_items / $items_per_page);


$select_product_query = "SELECT * FROM `products` WHERE `category` = 'Pyjma-pants' ORDER BY $order_by LIMIT $offset, $items_per_page";
$select_product = mysqli_query($con, $select_product_query) or die('Query failed');

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
    foreach ($message as $msg) {
        echo '<div class="message" onclick="this.remove();">'.$msg.'</div>';
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


<div class="container-p">
    <div class="product">
        <div class="row row-2">
            <h2>Pyjma pants</h2>
         <form method="GET" action="">
                <select name="sort" id="sort" onchange="this.form.submit()">
                    <option value="" <?php if(empty($sort)) echo 'selected'; ?>>Default Sorting</option>
                    <option value="price" <?php if($sort == 'price') echo 'selected'; ?>>Sort by Price</option>
                    <option value="popularity" <?php if($sort == 'popularity') echo 'selected'; ?>>Sort by Popularity</option>
                    <option value="sale" <?php if($sort == 'sale') echo 'selected'; ?>>Sort by Sale</option>
                    <option value="mostliked" <?php if($sort == 'mostliked') echo 'selected'; ?>>Sort by Most Liked</option>
                </select>
            </form>
        </div>
        <div class="box-container">
            <?php 
            if (mysqli_num_rows($select_product) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_product)) {
            ?>
            <div class="box">
                <a href="productdetails.php?id=<?php echo $fetch_product['id']; ?>">
                    <img src="<?php echo $fetch_product['image']; ?>" alt="<?php echo htmlspecialchars($fetch_product['name'], ENT_QUOTES, 'UTF-8'); ?>">
                </a>
                <div class="name"><?php echo htmlspecialchars($fetch_product['name'], ENT_QUOTES, 'UTF-8'); ?></div>
                <div class="price">$<?php echo number_format($fetch_product['price'], 2); ?></div>
                <form action="" method="post">
                    <input type="number" min="1" name="product_quantity" value="1" class="inp">
                    <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($fetch_product['image'], ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($fetch_product['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="product_price" value="<?php echo number_format($fetch_product['price'], 2); ?>">
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
            <div class="pagination">
            <?php if ($current_page > 1): ?>
                <a href="?page=<?php echo $current_page - 1; ?>&sort=<?php echo $sort; ?>" class="page-link">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&sort=<?php echo $sort; ?>" class="page-link <?php echo ($i == $current_page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages): ?>
                <a href="?page=<?php echo $current_page + 1; ?>&sort=<?php echo $sort; ?>" class="page-link">Next &raquo;</a>
            <?php endif; ?>
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
</body>
</html>
