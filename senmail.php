<?php


if (isset($_POST["submit"])){

    if(isset( $_POST['name'])   &&  isset( $_POST['email'])   &&  isset( $_POST['message'])    &&  isset( $_POST['subject'])     ){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        
        
        if(   $name === '' && $email === '' && $subject === '' && $message === ''){

            echo "<script type='text/javascript'>alert('الرجاء تعبئة الحقول');
            </script>";
        }


  
    }else{
    
        $content="From: $name \n Email: $email \n Message: $message";
        $recipient = "mohammed@gmail.com";
        $mailheader = "From: $email \r\n";
        mail($recipient, $subject, $content, $mailheader) or die("Error!");
        echo "Email sent!";
   
    }



}


?>


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
  <link rel="stylesheet" href="../layout/css/custom.css">

</head>


<body>
<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4" style="color:black !important;">كن علي اتصال مع قسمك</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5" style="color:black !important;">عزيزي الطالب يمكنك ارسال أي ملاحظة علي الموقع او أي شكوي تخص الكتب أو أي طلب  لكتاب معين وسوف يتم توفيره دال الموقع في أقرب وقت
    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5" style="padding:50px !important;">
            <form id="contact-form" name="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        <label for="name" class="">اسم الطالب</label>
                            <input type="text" id="name" name="name" class="form-control">
                         
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        <label for="email" class="">البريد الإلكتروني</label>
                            <input type="text" id="email" name="email" class="form-control">
                           
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                        <label for="subject" class="">عنون الطلب</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                           
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                        <label for="message">محتوي الطلب</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                           
                        </div>

                    </div>
                </div>
                <!--Grid row-->
                    <button class="btn btn-primary"  name="submit"> ارسال </button>
            </form>
    <br>

            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p style="color:black !important;">ليبيا - صبراته</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p style="color:black !important;"> 00218.3622002</p>
                    <p style="color:black !important;">00218.233621123</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p style="color:black !important;">info@sabu.edu.ly </p>
                </li>
              
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
      <!-- Start Footer -->
  <?php
  include 'layout/include/footer.php';
  ?>

</body>

</html>