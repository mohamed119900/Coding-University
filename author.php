<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
  <!-- Bootstrap RTL -->
  <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
  <!--  Custom css  -->
  <link rel="stylesheet" href="../layout/css/custom.css">
    <title>Document</title>
</head>
<body>
    


<?php
include 'layout/include/header.php';

if (isset($_GET['author'])) {
    $bookAuthor = $_GET['author'];
}
?>
<!--    End navbar    -->

    <div class="books">
        <div class="container">
            <div class="author-info bg-secondary text-white p-2 mb-3">
            <span>جميع كتب</span>
            <span><?php echo $bookAuthor ?></span>
        </div>
            <div class="row">
                <?php
                    $query = "SELECT * FROM mybooks WHERE bookAuthor = '$bookAuthor'";
                    $result = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($result)){
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
                                    <button class="custom-btn">تحميل الكتاب</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>

<!-- Start Footer -->
<?php
include 'layout/include/footer.php';
?>











</body>
</html>