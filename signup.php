<?php
include 'layout/include/header.php';
?>
<?php 
    //session_start();
    include './dashboard/include/connection.php';
    // check if session isset
    if(isset($_SESSION['userInfo'])){
        header('Location:index.php');
    }
    else{
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل حساب</title>
    <!-- Bootstrap and Bootstrap Rtl -->
    <link rel="stylesheet" href="./dashboard/css/bootstrap.min.css">
    <link rel="stylesheet" href="./dashboard/css/bootstrap-rtl.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="./dashboard/css/custom.css">

<style>
  .login{
    width: 300px;
    margin: 80px auto;
    font-family: janna lt;
  }
  .login h5{
    color: #555;
    margin-bottom: 30px;
    margin-top: 10px;
    text-align: center;
  }
  .login button{
    margin-right: 80px;
    padding: 5px;
    width: 140px;
    background: #00b593;
    border: 1px solid #00b593;
    color: #fff;
  }
</style>

</head>

<body>

  <div class="login">
<!-- Signup to website  -->
   <?php 
        if(isset($_POST['submit']))  {
            $userName = $_POST['username'];
            $userEmail = $_POST['email'];
            $userUid = $_POST['useruid'];
            $phoneNum = $_POST['phonenum'];
            $userPass = $_POST['password'];



            //check if inputs are not empty
            if(empty($userName) || empty($userUid) || empty($phoneNum) || empty($userPass) || empty($userEmail) ){
                echo "<div class='alert alert-danger'>" . "الرجاء مل الحقول أدناه" . "</div>";
            }
            // check if values are match
            else{


                $sql = " INSERT INTO users (username, email , phonenum , pass , useruid) VALUES (? , ? ,? ,? ,? );";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location:../book/signup.php");
                    echo "<div class='alert alert-danger'>" . "حدث خطأ عند التسجيل الرجاء المحاولة مرة أخري او الاتصال بالدعم الفني" . "</div>";
                    exit();
                }
            
            
                $haedpwd = password_hash($userPass, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sssss", $userName, $userEmail, $phoneNum, $haedpwd, $userUid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("location:../book/login.php?message=UserSignedUp");
                






















                // $query = "SELECT * FROM admin WHERE (adminName='$adminInfo' OR adminEmail='$adminInfo') AND adminPass='$adminPass '";
                // $result = mysqli_query($con,$query);
                // $row = mysqli_num_rows($result);
                
                // if($row > 0){
                //     $_SESSION['adminInfo'] = $adminInfo;
                //     header('Location:dashboard.php');
                // }
                // else{
                //     echo "<div class='alert alert-danger'>" . "البيانات غير متطابقة الرجاء المحاولة مرة أخرى" . "</div>";
                // }
            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <h5>تسجيل حساب</h5>
      <div class="form-group">
        <label for="mail"> إسم المستخدم </label>
        <input type="text" class="form-control"  id="mail" name="username"/>
      </div>
      
      <div class="form-group">
        <label for="mail">  البريد الإلكتروني </label>
        <input type="text" class="form-control"  id="mail" name="email"/>
      </div>


      <div class="form-group">
        <label for="mail"> رقم القيد</label>
        <input type="text" class="form-control"  id="mail" name="useruid"/>
      </div>


      <div class="form-group">
        <label for="mail"> رقم الهاتف</label>
        <input type="text" class="form-control"  id="mail" name="phonenum"/>
      </div>



      <div class="form-group">
        <label for="pass">كلمة السر</label>
        <input type="password" class="form-control"  id="pass" name="password"/>
      </div>
      <button class="custom-btn" name="submit">تسجيل حساب</button>
    </form>
  </div>

  <?php
    //include '../include/footer.php';
  ?>


<?php
    }
?>