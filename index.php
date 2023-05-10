<!DOCTYPE html>
<?php
include 'layout/include/header.php';
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>الرئيسية </title>
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
  <!-- Bootstrap RTL -->
  <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
  <!--  Custom css  -->
  <link rel="stylesheet" href="../layout/css/custom.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

</head>


<body>

  <div class="hero">

    <img src="./layout/images/ulogo.png" alt="" srcset="" style=" height:auto; margin-left:auto; margin-right:auto;  width: 30%; display:block; padding-top:40px;;">
    <p style="text-align:center;  margin-left:auto; margin-right:auto;  width: 70%; display:block; color:black; font-size:30px !important;"> جامعة صبراتة هي إحدى الجامعات الحكوميّة بدولة ليبيا، ومقرّ إدارتها بمدينة صبراتة، وتتكوّن في أصلها من مجموعة كليّات يرجع تاريخ تأسيس بعض منهاإلى سنة 1992م، حيث كانت تبعيّة تلك الكليّات منذ تأسيسها إلى جامعة الزاوية حتّى صدر قرار مجلس الوزراء رقم (157) لسنة 2015م القاضي بإنشاء جامعة صبراتة وفصل تلك الكليّات عن جامعة الزّاوية وتحديد تبعيّتها إلى جامعة صبراتة، ويبلغ عدد كليّات الجامعة حالياً (16) كليّة </p>
  </div>
  </div>

  <!-- Start banar  -->
  <div class="banar">
    <div class="overlay"></div>
    <div class="lib-info text-center">
      <h4>حمّل عشرات الكتب مجاناً </h4>
      <p style="color:white !important; font-size:24px;">جامعة صبراته قسم الحاسوب موقع للمراجع و الكتب</p>
    </div>
  </div>
  <!-- End banar -->

  <!-- Start Books -->
  <div class="books">
    <div class="container">
      <div class="row">
        <?php
        $query = "SELECT * FROM mybooks ORDER BY id DESC";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-6 col-lg-4">
              <div class="card text-center">
                <div class="img-cover">
                  <img src="uploads\bookCovers/<?php echo $row['bookCover']; ?>" alt="Book Cover" class="card-img-top">
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>"><?php echo $row['bookTitle']; ?></a>
                  </h4>
                  <p class="card-text"><?php echo mb_substr($row['bookContent'], 0, 150, "UTF-8"); ?></p>
                  <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>">
                    <?php
                    if (isset($_SESSION['userInfo'])) {
                    ?>
                      <button class="custom-btn">عرض الكتاب</button>

                    <?php
                    }
                    ?>
                  </a>
                </div>
              </div>
            </div>
          <?php
          }
        } else {
          ?>
          <div class="text-center">لاتوجد أي كتب</div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <!-- End Books -->







  <div class="row" style="background-color:#2826B6; color:white !important">

<div class="col-md-3 col-sm-6 mb-4">
    <p style="text-align:center ; font-weight:bold ; margin-top:30px; font-size:30px; color:white !important">

        15,218
        <br>
        طالب وطالبة
    </p>
</div>

<div class="col-md-3 col-sm-6 mb-4">
    <p style="text-align:center ; font-weight:bold ; margin-top:30px; font-size:30px; color:white !important">
        1091
        <br>
        عضو هيئة تدريس
    </p>
</div>

<div class="col-md-3 col-sm-6 mb-4">
    <p style="text-align:center ; font-weight:bold ; margin-top:30px; font-size:30px; color:white !important">
        5
        <br>
        مراكز
    </p>
</div>

<div class="col-md-3 col-sm-6 mb-4">
    <p style="text-align:center ; font-weight:bold ; margin-top:30px; font-size:30px; color:white !important">
        19
        <br>
        كلية
    </p>
</div>

</div>
  </div>









  <!-- Start Footer -->
  <?php
  include 'layout/include/footer.php';
  ?>

</body>

</html>