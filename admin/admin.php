<?php
if(!defined('SECURITY')) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/assignment.css">
    <title>Mobile Store</title>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Mobile Store</a>
            <div class="dropdown" style="margin-right: 40px;">
                <a class= "dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none">
                    <img src="images/person_FILL0_wght400_GRAD0_opsz48.svg">
                    <?=$_SESSION['user'] ?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                    <li><a class="dropdown-item" href="../admin/logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    include_once('master/sidebar.php');
    if(isset($_GET['pagelayout'])){
        switch($_GET['pagelayout']){
            case 'product': include_once('product/product.php'); break;
            case 'add_product': include_once('product/add_product.php'); break;
            case 'edit_product': include_once('product/edit_product.php'); break;
            case 'delete_product': include_once('product/delete_product.php'); break;

            case 'category': include_once('category/category.php'); break;
            case 'add_category': include_once('category/add_category.php'); break;
            case 'edit_category': include_once('category/edit_category.php'); break;
            case 'delete_category': include_once('category/delete_category.php'); break;

            case 'user': include_once('user/user.php'); break;
            case 'add_user': include_once('user/add_user.php'); break;
            case 'edit_user': include_once('user/edit_user.php'); break;
            case 'delete_user': include_once('user/delete_user.php'); break;
        }
    }else{
        include_once('master/dashboard.php');
    }
    ?>
</body>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>