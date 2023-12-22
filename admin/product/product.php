<?php
if(!defined('SECURITY')){
    header('location: index.php');
}
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else {
    $page = 1;
}
$row_per_page = 5;
$num_row = mysqli_num_rows(mysqli_query($connect, 'SELECT * FROM product'));
$num_page = ceil($num_row / $row_per_page);
$per_row = $page * $row_per_page - $row_per_page;
$sql = 'SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id 
ORDER BY prd_id ASC LIMIT '.$per_row.', '. $row_per_page;
$query = mysqli_query($connect, $sql);
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
        </ol>
    </nav>
    <h1>Danh sách sản phẩm</h1>
    <a class="btn btn-success" href="../admin/index.php?pagelayout=add_product">
        <img src="images/add_circle_FILL0_wght400_GRAD0_opsz48.svg" width="15%">
        Thêm sản phẩm
    </a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Dung lượng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?=$row['prd_id'] ?></td>
                <td><?=$row['prd_name'] ?></td>
                <td><img width="130" height="180" src="images/<?= $row['prd_image'] ?>"></td>
                <td><?= number_format($row['prd_price']) ?>Đ</td>
                <td><?= $row['capacity'] ?>GB</td>
                <?php
                if($row['prd_status'] == 1){
                    echo '<td><span class="label label-success">Còn hàng</span></td>';
                }else {
                    echo '<td><span class="label label-danger">Hết hàng</span></td>';
                }
                ?>
                <td><?=$row['cat_name'] ?></td>
                <td>
                    <a class="btn btn-primary" href="../admin/index.php?pagelayout=edit_product&prd_id=<?=$row['prd_id'] ?>">
                        <img src="images/edit_square_FILL0_wght400_GRAD0_opsz48.svg" width="50%">
                    </a>
                    <a class="btn btn-danger" href="../admin/index.php?pagelayout=delete_product&prd_id=<?=$row['prd_id'] ?>">
                        <img src="images/delete_FILL0_wght400_GRAD0_opsz48.svg" width="50%">
                    </a>
                </td>
            </tr>
            <?php 
            } 
            ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="index.php?pagelayout=product&page=<?php 
                $page--; 
                if($page == 0){
                    $page = 1; 
                    echo $page;
                }else {
                    echo $page;
                } 
                ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            for($i = 1; $i <= $num_page; $i++){
            ?>
            <li class="page-item"><a class="page-link" href="index.php?pagelayout=product&page=<?php echo $i ?>"><?= $i ?></a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href="index.php?pagelayout=product&page=<?php 
                $page++; 
                if($page == $num_page){
                    $page = $num_page; 
                    echo $page;
                }else {
                    echo $page;
                } 
                ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>