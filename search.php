    <?php
    include 'layout/include/header.php';
    //include './dashboard/include/connection.php';

    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>ملف الطالب </title>
      <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
      <!-- Bootstrap css -->
      <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
      <!-- Bootstrap RTL -->
      <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
      <!--  Custom css  -->
      <link rel="stylesheet" href="../layout/css/custom.css">
      <script type="text/javascript" src="/layout/js/script.js"></script>

      <link rel="stylesheet" href="../layout/custom.css">


    </head>

    <body>
      <?php
      //include './dashboard/include/connection.php';
      $con = mysqli_connect("localhost", "root", "", "pdf");
      ?>
 

    
         
        
                 
        
 

      <div class="jumbotron text-center" style="background-color:white !important;">
        <h1>البحث عن كتاب </h1>
        <br>    <br>
        <div class="col-md-9 mb-md-0 mb-5" style="  margin-right:50%; margin-left:50%; width:80%">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
            <div class="col-sm-6">
              <input type="text" class="form-control" id="search" name="name" placeholder="ادخل اسم الكتاب">
              <br>
              <button type="submit" class="btn btn-primary" name="submit">بحث</button>
              <br>
          </form>
        </div>
   
      </div>
      <br>    <br>
      <div class="container">
        <div class="row">
 
          <table class="table ">
          <thead>
              <tr>
                <th>اسم الكتاب</th>
       
        
                <th style="width:100px !important;">التصنيف</th>
         
         
             
      
                <th>عرض الكتاب</th>
              </tr>
            </thead>
  
            <tbody id="output">

            <?php
                 if (isset($_POST['submit'])) {
                  $value = $_POST['name'];
                  $sql = "SELECT * FROM mybooks WHERE bookTitle ='$value' ";
                 $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                     
            <td><?php echo $row['bookTitle'] ;  ?></td>
            <td style="width:20px !important;"><?php echo $row['bookCat'] ;  ?></td>






           <td><a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>">عرض الكتاب</a></td>
                   
          <?php
             }
      }
    
      ?>

            </tbody>
      
            </table>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
      </div>


      </script>
      <?php
  include 'layout/include/footer.php';
  ?>


    </body>

    </html>