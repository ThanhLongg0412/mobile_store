<?php
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id = $prd_id";
$row = mysqli_fetch_array(mysqli_query($connect, $sql));
if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $capacity = $_POST['capacity'];
    $prd_status = $_POST['prd_status'];
    $file = $_POST['prd_image'];
    $cat_id = $_POST['cat_id'];
    $sql = "UPDATE product SET prd_name = '$prd_name', prd_image = '$file', prd_price = '$prd_price', 
    capacity = '$capacity', prd_status = '$prd_status', cat_id = '$cat_id' WHERE prd_id = $prd_id ";
    mysqli_query($connect, $sql);
    header('location: index.php?pagelayout=product');
}
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin/index.php?pagelayout=user">Danh sách sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$row['prd_name'] ?></li>
        </ol>
    </nav>
    <h1>Chỉnh sửa sản phẩm</h1>
    <?php
    if(isset($error)) echo $error;
    ?>
    <form role="form" method="post">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="prd_name" required class="form-control" value="<?=$row['prd_name'] ?>">
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="prd_image" required class="form-control">
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" name="prd_price" required class="form-control" value="<?=$row['prd_price'] ?>">
        </div>
        <div class="form-group">
            <label>Dung lượng</label>
            <input type="text" name="capacity" required class="form-control" value="<?=$row['capacity'] ?>">
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select name="prd_status" class="form-control">
                <option value="1" selected>Còn hàng</option>
                <option value="2">Hết hàng</option>
            </select>
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select name="cat_id" class="form-control">
                <?php
                $query = mysqli_query($connect, 'SELECT * FROM category ORDER BY cat_id ASC');
                while($row = mysqli_fetch_array($query)){
                ?>
                <option value="<?=$row['cat_id'] ?>"><?=$row['cat_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button name="sbm" type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="reset" class="btn btn-warning">Làm mới</button>
    </form>
</div>