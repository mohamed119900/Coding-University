<!DOCTYPE html>
<?php

include 'layout/include/header.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الاقسام </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css">
    <!-- Bootstrap RTL -->
    <link rel="stylesheet" href="../layout/css/bootstrap-rtl.css">
    <!--  Custom css  -->
    <link rel="stylesheet" href="../layout/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>


<body>




    <?php



    $sql_query = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql_query);

    ?>




    <div class="books">
        <div class="container">
            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-center">
                            <div class="card-header">
                            <a href="bycat.php?id=<?php echo $row['id'] ?>&&category=<?php echo $row['categoryName'] ?>">
                                <?php echo $row['categoryName']?>
                                </a>
                            </div>
                            <div class="card-footer text-muted">
                                
                                <?php echo $row['categoryDate']  ?>
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