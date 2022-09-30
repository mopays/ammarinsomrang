  <?php
  include_once("connectdb.php");
  ini_set('display_startup_errors', 1);
  session_start();
      
  if(isset($_POST['login'])){
    $email_login = $_POST['login_email'];
    $password_login = md5($_POST['login_password']);

    if(empty($email_login)){
        $error[] = 'please enter email';
    }else if(empty($password_login)){
        $error[] = 'please enter password';
    }else{
        $select = $db->prepare("SELECT * FROM `user` WHERE email = ? OR password = ?");
        $select->execute([$email_login, $password_login]);
        $row =  $select->fetch(PDO::FETCH_ASSOC);
        if($email_login == $row['email']){
            if($password_login ==  $row['password']){
                header('refresh:1;home.php');
                $_SESSION['user'] = $row['uid'];
                $loginMsg = 'ล็อกอินสำเร็จกำลังเข้าสู่ระบบ โปรดรอซักครู่';
            }else{
                $error[] = 'รหัสผ่านไม่ถูกต้องโปรดลองอีกครั้ง';
            }
        }else{
            $error[] = 'email ไม่ถูกต้องโปรดลองอีกครั้ง';
        }
    }
}

    if(isset($_POST['register'])){
      $email = $_POST['Email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $hpassword = md5($cpassword);

    if(empty($email)){
          $error[] = 'please enter email';
      }else if(empty($password)){
          $error[] = 'please enter password';
      }else if(empty($cpassword)){
          $error[] = 'please confirm password';
      }else{
          $select = $db->prepare("SELECT email FROM `user` WHERE email = ?  ");
          $select->execute([$email]);
          $row = $select->fetch(PDO::FETCH_ASSOC);
          if($email != $row['email']){
                  if($password == $cpassword){
                          $insert = $db->prepare("INSERT INTO `user` ( email, password) VALUES (?, ?);");
                          $insert->execute([$email, $hpassword]);
                          $insertMsg[] = 'สมัครเส็จสิ้น';
                          header('refresh:1;index.php');   
                  }else{
                      $error[] = 'รหัสผ่านไม่ตรงกัน ลองใหม่อีกครั้ง';
                  }
          }else{
              $error[] = 'emailนี้ถูกใช้ไปเเล้วกรุณาป้อนemailอื่น';
          }
      }
  }



?>
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  
    <title>login</title>
</head>
<body>

    <section class="forms-section">
        <h1 class="section-title">ช. วิเชียรพัฒนกิจ</h1>
         
    <?php if(isset($error)){
            foreach($error as $error){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $error ?>
            </div>
    <?php }} ?>

      <?php if(isset($loginMsg)){ ?>
          <div class="alert alert-success" role="alert">
              <?php echo $loginMsg ?>
          </div>
      <?php } ?>  

        <div class="forms">
          <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
              Login
              <span class="underline"></span>
            </button>
            <form class="form form-login" method="POST">
              <fieldset>
                <legend>Please, enter your email and password for login.</legend>
                <div class="input-block">
                  <label for="login-email">email</label>
                  <input id="login-email" name="login_email" type="email" >
                </div>
                <div class="input-block">
                  <label for="login-password">Password</label>
                  <input id="login-password" name="login_password" type="password" >
                </div>
              </fieldset>
              <button type="submit" name="login" class="btn-login">Login</button>
            </form>
          </div>





          <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
              Sign Up
              <span class="underline"></span>
            </button>
            <form method="POST" class="form form-signup"  >
              <fieldset>
                <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                <div class="input-block">
                  <label for="signup-email">E-mail</label>
                  <input id="signup-email" name="Email" type="email" >
                </div>
                <div class="input-block">
                  <label for="signup-password">password</label>
                  <input id="signup-password" name="password" type="password" >
                </div>
                <div class="input-block">
                  <label for="signup-password-confirm">password</label>
                  <input id="signup-password-confirm"  name="cpassword" type="password" >
                </div>
              </fieldset>
              <button type="submit"  name="register" class="btn-signup">register</button>
            </form>
          </div>
        </div>
      </section>
      
 
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>