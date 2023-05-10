

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>تحميل الكتاب </title>
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
  <!-- Bootstrap RTL -->
  <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
  <!--  Custom css  -->
  <link rel="stylesheet" href="../layout/css/custom.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<?php
include 'layout/include/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<!--    End navbar    -->

<!-- Start show book -->
<div class="books">
    <div class="container">
        <div class="book">
            <div class="row">
                <?php
                $query = "SELECT * FROM mybooks WHERE id='$id'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="col-md-4">
                    <div class="book-cover">
                        <img src="uploads\bookCovers/<?php echo $row['bookCover']; ?>" alt=" Book cover">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="book-content">
                        <h4><?php echo $row['bookTitle']; ?></h4>
                        <h5>
                            <a href="author.php?author=<?php echo $row['bookAuthor']; ?>"><?php echo $row['bookAuthor']; ?></a>
                        </h5>
                        <hr>
                        <p><?php echo $row['bookContent']; ?></p>

                        <?php
                            if (isset($_SESSION['userInfo'])) {
                                ?>
                                          <button class="custom-btn" style="width: 160px">
                                <a href="uploads\books/<?php echo $row['book']; ?>" download>تحميل الكتاب</a>
                            </button>
                      <?php } ?>
                            
                       

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End show book -->

<!-- Start Related Books -->
<div class="related-books">
    <div class="container">
        <h4>كتب ذات صلة</h4>
        <hr>
        <div class="row">
        <?php 
            if(isset($_GET['category'])){
                $bookCat = $_GET['category'];
            }
            // fetch related books
            $query = "SELECT * FROM mybooks WHERE bookCat = '$bookCat' AND id !='$id'";
            $res = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="related-book text-center">
                    <div class="cover">
                        <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>">
                            <img src="uploads/bookCovers/<?php echo $row['bookCover']; ?>" alt="Book Cover">
                        </a>
                    </div>
                    <div class="title">
                        <h5>
                            <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat'];?>"><?php echo $row['bookTitle']; ?></a>
                        </h5>
                    </div>
                </div>
            </div>            
            <?php
            }
        ?>
        </div>
    </div>
</div>
<!-- End Related Books -->

<!-- Start Footer -->
<?php
include 'layout/include/footer.php';
?>


</body>
</html>