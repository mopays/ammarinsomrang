<?php
require_once('connectdb.php');
session_start();
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
$id = $_SESSION['user'];
   if(isset($_POST['add_cart'])){
      $pname	= $_POST['pname'];
      $pprice	= $_POST['pprice'];
      $userid	= $id;
      $pdetail	= $_POST['pdetail'];
      $quintity = 1;
   
      $insert =  $db->prepare("INSERT INTO `cart` ( pname, pprice, userid, pdetail, quintity) VALUES ( ?,? ,? ,? ,? );");
      $insert->execute([$pname , $pprice , $userid ,$pdetail , $quintity]);





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
      <title>HOME</title>
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
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <?php
      include_once('header.php')
      ?>
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="text-bg">
                     <h1> <span class="blodark"> ช.วิเชียรพัฒนากิจ</h1> </span> 
                     <p>ร้านจำหน่ายอุปกรณ์ช่างคุณภาพดี</p>
                     <a class="read_more" href="#">Shop now</a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="ban_img">
                     <figure><img src="images/ban_img1.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- six_box section -->
      <div class="six_box">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-2.5 col-sm-2 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i onclick="window.location.href='#Color'"><img src="images/icon_color.png" alt="#"/></i>
                     <span>Color</span>
                  </div>
               </div>
               <div class="col-md-2.5 col-sm-3 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i onclick="window.location.href='#Equipment'"><img src="images/icon_equipment.png" alt="#"/></i>
                     <span>Equipment</span>
                  </div>
               </div>
               <div class="col-md-2.5 col-sm-2 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i onclick="window.location.href='#Sable'" ><img src="images/icon_cable.png" alt="#"/></i>
                     <span>Sable</span>
                  </div>
               </div>
               <div class="col-md-2.5 col-sm-3 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i onclick="window.location.href='#Stationery'"><img src="images/icon_stationery.png" alt="#"/></i>
                     <span>Stationery</span>
                  </div>
               </div>
               <div class="col-md-2.5 col-sm-2 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i onclick="window.location.href='#Pipes'" ><img src="images/icon_pipe.png" alt="#"/></i>
                     <span>Pipes</span>
                  </div>
               </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end six_box section -->
      <!-- project section -->
      <div id="project" class="project">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Products</h2>
                  </div>
               </div>
            </div>
            <div class="row">
            <h2 id="Color">Color</h2>
            <div class="product_main">
            
            <?php
              $select =  $db->prepare("SELECT * FROM products WHERE pcategoryid = ? ");
               $select->execute(['1']);
               while($row = $select->fetch(PDO::FETCH_ASSOC)){
             ?>
                  <form action="" method="POST">
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img style="height:100%;" src="images/<?php echo $row['img'] ?>" alt="#"/></div>
                     <h3 ><?php echo $row['pname'] ?></h3>
                     <h5 ><?php echo $row['pprice'] ?></h5>
                     <input type="hidden" value="<?php echo $row['pname'] ?>" name="pname">
                     <input type="hidden" value="<?php echo $row['pprice'] ?>" name="pprice">
                     <input type="hidden" value="<?php echo $row['pdetail'] ?>" name="pdetail">
                     <input type="submit" value="ADD TO CART" name="add_cart" class="btn-success">
                  </div>
                  </form>
            <?php
               }
            ?>
            </div>
            </div>

            <div class="row">
            <h2 id="Equipment">Equipment</h2>
            <div class="product_main">
            
            <?php
              $select =  $db->prepare("SELECT * FROM products WHERE pcategoryid = ? ");
               $select->execute(['2']);
               while($row = $select->fetch(PDO::FETCH_ASSOC)){
             ?>
                  <form action="" method="post">
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img style="height:100%;" src="images/<?php echo $row['img'] ?>" alt="#"/></div>
                     <h3><?php echo $row['pname'] ?></h3>
                     <h5><?php echo $row['pprice'] ?></h5>
                     <input type="hidden" value="<?php echo $row['pname'] ?>" name="pname">
                     <input type="hidden" value="<?php echo $row['pprice'] ?>" name="pprice">
                     <input type="hidden" value="<?php echo $row['pdetail'] ?>" name="pdetail">
                     <input type="submit" value="ADD TO CART" name="add_cart" class="btn-success">
                  </div>
                  </form>
            <?php
               }
            ?>
            </div>
            </div>

            <div class="row">
            <h2 id="Sable">Sable</h2>
            <div class="product_main">
            <br>
            <?php
              $select =  $db->prepare("SELECT * FROM products WHERE pcategoryid = ? ");
               $select->execute(['3']);
               while($row = $select->fetch(PDO::FETCH_ASSOC)){
             ?>
                  <form action="" method="post">
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img style="height:100%;" src="images/<?php echo $row['img'] ?>" alt="#"/></div>
                     <h3><?php echo $row['pname'] ?></h3>
                     <h5><?php echo $row['pprice'] ?></h5>
                     <input type="hidden" value="<?php echo $row['pname'] ?>" name="pname">
                     <input type="hidden" value="<?php echo $row['pprice'] ?>" name="pprice">
                     <input type="hidden" value="<?php echo $row['pdetail'] ?>" name="pdetail">
                     <input type="submit" value="ADD TO CART" name="add_cart" class="btn-success">
                  </div>
                  </form>
            <?php
               }
            ?>
            </div>
            </div>


            <div class="row">
            <h2 id="Stationery">Stationery</h2>
            <div class="product_main">
            
            <?php
              $select =  $db->prepare("SELECT * FROM products WHERE pcategoryid = ? ");
               $select->execute(['4']);
               while($row = $select->fetch(PDO::FETCH_ASSOC)){
             ?>
                  <form action="" method="post">
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img style="height:100%;" src="images/<?php echo $row['img'] ?>" alt="#"/></div>
                     <h3><?php echo $row['pname'] ?></h3>
                     <h5><?php echo $row['pprice'] ?></h5>
                     <input type="hidden" value="<?php echo $row['pname'] ?>" name="pname">
                     <input type="hidden" value="<?php echo $row['pprice'] ?>" name="pprice">
                     <input type="hidden" value="<?php echo $row['pdetail'] ?>" name="pdetail">
                     <input type="submit" value="ADD TO CART" name="add_cart" class="btn-success">
                  </div>
                  </form>
            <?php
               }
            ?>
            </div>
            </div>


            <div class="row">
            <h2 id="Pipes">Pipes</h2>
            <div class="product_main">
            
            <?php
              $select =  $db->prepare("SELECT * FROM products WHERE pcategoryid = ? ");
               $select->execute(['5']);
               while($row = $select->fetch(PDO::FETCH_ASSOC)){
             ?>
                  <form action="" method="post">
                  <div class="project_box ">
                     <div class="dark_white_bg" ><img style="height:100%;" src="images/<?php echo $row['img'] ?>" alt="#"/></div>
                     <h3><?php echo $row['pname'] ?></h3>
                     <h5><?php echo $row['pprice'] ?></h5>
                     <input type="hidden" value="<?php echo $row['pname'] ?>" name="pname">
                     <input type="hidden" value="<?php echo $row['pprice'] ?>" name="pprice">
                     <input type="hidden" value="<?php echo $row['pdetail'] ?>" name="pdetail">
                     <input type="submit" value="ADD TO CART" name="add_cart" class="btn-success">
                  </div>
                  </form>
            <?php
               }
            ?>
            </div>
            </div>
         </div>
      </div>
      <!-- end project section -->
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

