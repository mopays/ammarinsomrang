<?php
require_once('connectdb.php');
session_start();
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
$id = $_SESSION['user'];

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_cart_item = $db->prepare("DELETE FROM `cart` WHERE cid = ?");
    $delete_cart_item->execute([$delete_id]);
    header('location:cart.php');
}
if(isset($_GET['delete_all'])){
    $delete_cart_item = $db->prepare("DELETE FROM `cart` WHERE userid = ?");
    $delete_cart_item->execute([$id]);
    header('locaiton:caart.php');
}
if(isset($_POST['update_p_qty'])){
    $cart_id  = $_POST['cart_id'];
    $p_qty = $_POST['p_qty'];
    $update_p_qty = $db->prepare("UPDATE `cart` SET quintity = ? WHERE cid = ?");
    $update_p_qty->execute([$p_qty, $cart_id]);
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
        padding:10px;
        background-color:#FF9888;
        color:white;
        border-radius:  5px;
    }
    
   </style>
   <body class="main-layout">
      <!-- loader  -->
     
      <!-- end loader -->
      <?php
        include_once('header.php')
      ?>
    
  <!-- cart -->
  <section class="shopping">
        <h1 class="heading">product added</h1>

        <div class="box-container">
         
            <?php
                $gran_total = 0;
                $select_cart = $db->prepare("SELECT * FROM `cart` WHERE userid = ?");
                $select_cart->execute([$id]);
                
                while($row = $select_cart->fetch(PDO::FETCH_ASSOC)){
                    if($select_cart->rowCount() > 0){
                
               
            ?>
            <form action=""  method="post" class="box">
                <a href="cart.php?delete=<?php echo $row['cid']?>" name="delete" class="fas fa-times" onclick="return confirm('do you srue you want to delete')"></a>
                <div class="space"></div>
                <div class="name"><?php echo $row['pname']?></div>
                <div class="price"><?php echo $row['pprice']?> ฿ </div>
                <input type="hidden" name="cart_id" value="<?php echo $row['cid'] ?>">
               <div class="flex-btn">
                    <input type="number" min="1" value="<?php echo $row['quintity'] ?>" class="p_qty" name="p_qty">
                    <input style="margin-top:0;" type="submit" value="update" name="update_p_qty" class="option-btn">
               </div>
                <div class="sub-total">sub total : <span><?php echo  $sub_total = ($row['pprice'] * $row['quintity'])?> ฿</span></div>
            </form>
    
            <?php 
            $gran_total += $sub_total;     
                }else{
                    echo "<p style='text-align:center;color:red;font-size:4rem;'>no product add</p>";
                }
            }
         ?>
           
         
        </div>

        <div class="cart-total">
                <p>gran total : <span><?php echo $gran_total ?> ฿</span></p>
                <a href="home.php" class="option-btn">continue shopping</a>
                <a href="cart.php?delete_all" class="delete-btn <?php echo ($gran_total > 1)? '': 'disabled'; ?>" >Delete all</a>
                <a href="checkout.php" class="btn <?php echo ($gran_total > 1)? '': 'disabled'; ?>">proceed to checkout</a>
        </div>
     
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

