<!DOCTYPE html>
<?php
include 'layout/include/header.php';
include './dashboard/include/connection.php';

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ملف الطالب </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
  <!-- Bootstrap RTL -->
  <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
  <!--  Custom css  -->
  <link rel="stylesheet" href="../layout/css/custom.css">


</head>


<body>
  <?php



  $sql_query = "SELECT * FROM users WHERE useruid = '" . $_SESSION['userInfo'] . "';";
  $result = mysqli_query($con, $sql_query);

  ?>


  <div class="container mt-5 d-flex justify-content-center " style="width:900px !important;">
    <div class="card p-3" style="width:900px !important;">
      <div class="d-flex align-items-center ">
        <div class="image"> <img src="./layout/images/unnamed.png" class="rounded" width="155"> </div>
        <div class="ml-3 w-100">
          <h3class="mb-0 mt-0">
            <?php
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              echo "<h4>البريد الإلكتروني</h4>";
              echo $row['email'];
              echo "<h4 class='mb-0 mt-0'>";
              echo "<h4>رقم القيد</h4>";
              echo $row['useruid'];
              echo " </h4>";
            }
            ?>

          </h3> 
            </div>
      </div>
    </div>
  </div>



  <!-- Start Footer -->
  <?php
  include 'layout/include/footer.php';
  ?>

</body>

</html>