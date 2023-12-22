<?php
if(isset($_POST['sbm'])){
    $cat_name = $_POST['cat_name'];
    $sql = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
    mysqli_query($connect, $sql);
    header('location: index.php?pagelayout=category');
}
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin/index.php?pagelayout=category">Danh sách danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm danh mục</li>
        </ol>
    </nav>
    <h1>Thêm danh mục</h1>
    <?php
    if(isset($error)) echo $error;
    ?>
    <form role="form" method="post">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input name="cat_name" required class="form-control">
        </div>
        <button name="sbm" type="submit" class="btn btn-primary">Thêm mới</button>
        <button type="reset" class="btn btn-warning">Làm mới</button>
    </form>
</div>