<?php
$cat_id = $_GET['cat_id'];
$sql = "SELECT * FROM category WHERE cat_id = $cat_id";
$row = mysqli_fetch_array(mysqli_query($connect, $sql));
if(isset($_POST['sbm'])){
    $cat_name = $_POST['cat_name'];
    $sql_check = "SELECT cat_name FROM category WHERE cat_name = '$cat_name'";
    $query_check = mysqli_query($connect, $sql_check);
    $row_check = mysqli_fetch_array($query_check);
    if($row_check >= 1){
        $error = '<div class="alert alert-danger">Danh mục đã tồn tại!</div>';
    }else {
        $sql = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = $cat_id";
        $query = mysqli_query($connect, $sql);
        header('location: index.php?pagelayout=category');
    }
}
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin/index.php?pagelayout=category">Danh sách danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$row['cat_name'] ?></li>
        </ol>
    </nav>
    <h1>Chỉnh sửa danh mục</h1>
    <?php
    if(isset($error)) echo $error;
    ?>
    <form role="form" method="post">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="cat_name" required class="form-control" value="<?=$row['cat_name'] ?>">
        </div>
        <button name="sbm" type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="reset" class="btn btn-warning">Làm mới</button>
    </form>
</div>