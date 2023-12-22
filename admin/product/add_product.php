<?php
if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $capacity = $_POST['capacity'];
    $prd_status = $_POST['prd_status'];
    $file = $_FILES['prd_image']['name'];
    $tmp_file = $_FILES['prd_image']['tmp_name'];
    $cat_id = $_POST['cat_id'];
    $sql = "INSERT INTO product (prd_name, prd_image, prd_price, capacity, prd_status, cat_id) 
    VALUES ('$prd_name', '$file', '$prd_price', $capacity, $prd_status, $cat_id)";
    mysqli_query($connect, $sql);
    move_uploaded_file($tmp_file, 'images/'.$file);
    header('location: index.php?pagelayout=product');
}
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin/index.php?pagelayout=category">Danh sách sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
        </ol>
    </nav>
    <h1>Thêm sản phẩm</h1>
    <?php
    if(isset($error)) echo $error;
    ?>
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" required name="prd_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" required name="prd_image" class="form-control">
        </div>
        <div class="form-group">
            <label>Giá tiền</label>
            <input type="text" required name="prd_price" class="form-control">
        </div>
        <div class="form-group">
            <label>Dung lượng</label>
            <input type="text" required name="capacity" class="form-control">
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
        <button name="sbm" type="submit" class="btn btn-primary">Thêm mới</button>
        <button type="reset" class="btn btn-warning">Làm mới</button>
    </form>
</div>