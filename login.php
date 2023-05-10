<?php
include 'layout/include/header.php';
?>
<?php
//session_start();
include './dashboard/include/connection.php';
// check if session isset
if (isset($_SESSION['userInfo'])) {
  header('Location:index.php');
} else {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول</title>
    <!-- Bootstrap and Bootstrap Rtl -->
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
  <!-- Bootstrap RTL -->
  <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
  <!--  Custom css  -->
  <link rel="stylesheet" href="../layout/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <style>
      .login {
        width: 300px;
        margin: 80px auto;
        font-family: janna lt;
      }

      .login h5 {
        color: #555;
        margin-bottom: 30px;
        margin-top: 10px;
        text-align: center;
      }

      .login button {
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
      <!-- Log to dashboard  -->
      <?php
      if (isset($_POST['log'])) {
        $userInfo = $_POST['userInfo'];
        $userPass = $_POST['password'];

        //check if inputs are not empty
        if (empty($userInfo) || empty($userPass)) {
          echo "<div class='alert alert-danger'>" . "الرجاء مل الحقول أدناه" . "</div>";
        }
        // check if values are match
        else {
     






        }
      }
      ?>
      <form action="./dashboard/include/login.inc.php" method="POST">
        <h5>تسجيل الدخول</h5>
        <div class="form-group">
          <label for="mail"> رقم القيد  </label>
          <input type="text" class="form-control" id="mail" name="userInfo" />
        </div>
        <div class="form-group">
          <label for="pass">كلمة السر</label>
          <input type="password" class="form-control" id="pass" name="password" />
        </div>
        <button class="custom-btn" name="log">تسجيل الدخول</button>
      </form>
    </div>

    <?php
  include 'layout/include/footer.php';
  ?>



  <?php
}
  ?>