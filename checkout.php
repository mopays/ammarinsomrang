<?php
require_once('connectdb.php');
session_start();
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
$id = $_SESSION['user'];

if(isset($_POST['order'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $address = $_POST['address'];
    $placee_on = date('d-m-y');

    $cart_total = 0;
    $cart_products[] = '';
    
    $cart_query = $db->prepare("SELECT * FROM `cart` WHERE userid = ?");
    $cart_query->execute([$id]);
    if($cart_query->rowCount() > 0){
        while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
            $cart_products[] = $cart_item['pname'].'('.$cart_item['quintity'].')';
            $sub_total = ($cart_item['pprice'] * $cart_item['quintity']);
            $cart_total += $sub_total;
        }
    }
    $total_product = implode(',', $cart_products);
    $order_quert = $db->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
    $order_quert->execute([$name, $number, $email, $method, $address, $total_product, $cart_total]);

    if($cart_total == 0){
        $message[] = 'your cart is empty';
    }else if($order_quert->rowCount() > 0){
        $message[] = 'order placed already';
    }else{
        $insert_order = $db->prepare("INSERT INTO `orders`(userid, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
        $insert_order->execute([$id, $name, $number, $email, $method, $address, $total_product, $cart_total]);

        $delete_cart = $db->prepare("DELETE FROM `cart` WHERE userid = ?");
        $delete_cart->execute([$id]);

        $message[] = 'order placed success';
        header('location:home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>CART</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <style>
    .shopping{
        max-width: 1200px;
        margin: 0 auto;
    }
    h1{
        text-align:center;
        font-size:60px;
        margin:50px 0 50px 0;
    }
    .space{
        padding:60px 0 60px 0;
    }
    .option-btn,
    .delete-btn,
    .btn
    {
        padding: 20px;
        width: 100%;
        margin:20px;
        background-color:#FF9888;
        color:white;
        border-radius:  10px;
    }
    
   </style>
   <body class="main-layout">
      <!-- loader  -->
     
      <!-- end loader -->
      <?php
        include_once('header.php')
      ?>
    

    <section class="display-orders">
            <?php
                $cart_grand_total = 0;
                $select_cart_items = $db->prepare("SELECT * FROM `cart` WHERE userid = ?");
                $select_cart_items->execute([1]);
                if($select_cart_items->rowCount() > 0){
                    while($fetch_cart_times = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
                        $cart_total_price = ($fetch_cart_times['pprice'] * $fetch_cart_times['quintity']);
                        $cart_grand_total += $cart_total_price;
        
            ?>
            <p><?php echo $fetch_cart_times['pname'] ?> <span>(<?php echo $fetch_cart_times['pprice']. '฿'. 'x' . $fetch_cart_times['quintity']?>)</span></p>
            <?php 
                        }
                    }else{
                        echo '<p class="empty"> your cart is emoty</p>';
                    }
            ?>
            <div class="grand-total">grand total : <span>฿ <?php echo $cart_grand_total?></span></div>
        </section>
        <section class="checkout-order">
            <form action="" method="post">
                <h3>place your order</h3>
                <div class="flex">
                    <div class="inputBox">
                        <span>your name :</span>
                        <input type="text" name="name" placeholder="enter your name" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>your number :</span>
                        <input type="number" name="number" placeholder="enter your number" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>your email :</span>
                        <input type="email" name="email" placeholder="enter your email" class="box" required>
                    </div>
                    <div class="inputBox">
                       <span>payment method : </span>
                       <select name="method"  class="box" required>
                           <option value="cash on delivery" default> cash on delivery</option>
                           <option value="credit card">credit card</option>
                           <option value="K+">K+</option>
                       </select>
                    </div>
                    <div class="inputBox">
                        <span>address line1 :</span>
                        <input type="text" name="address" placeholder="enter your address" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>country :</span>
                        <input type="text" name="country" placeholder="enter your country" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>pic code :</span>
                        <input type="number" name="pin_code" placeholder="enter your pin code" class="box" required>
                    </div>
                </div>
                <input type="submit" name="order" class="btn <?php echo($cart_grand_total > 0)? '':'disabled'; ?>" value="place order">
            </form>
        </section>


      <!-- fashion section -->
    <?php
        include_once('footer.php')
    ?>
      <!-- end three_box section -->
    

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      
   </body>
</html>

