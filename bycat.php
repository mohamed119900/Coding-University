<!DOCTYPE html>
<?php
include 'layout/include/header.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>كتب </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <!-- Bootstrap RTL -->
    <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
    <!--  Custom css  -->
    <link rel="stylesheet" href="../layout/css/custom.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>


<body>

    <?php

    if (isset($_GET["category"])) {
        $catname=$_GET["category"];


        
    $query = "SELECT * FROM mybooks WHERE bookCat ='".$catname."'";
    $result = mysqli_query($con, $query);
    }
    ?>

<div class="books">
    <div class="container">
        <div class="row">
            <?php
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













    <!-- Start Footer -->
    <?php
    include 'layout/include/footer.php';
    ?>

</body>

</html>