<?php
if(!defined('SECURITY')){
    header('location: index.php');
}
$sql = 'SELECT * FROM category';
$query = mysqli_query($connect, $sql);
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item active">Danh sách danh mục</li>
        </ol>
    </nav>
    <h1>Danh sách danh mục</h1>
    <a class="btn btn-success" href="../admin/index.php?pagelayout=add_category">
        <img src="images/add_circle_FILL0_wght400_GRAD0_opsz48.svg" width="15%" height="23">
        Thêm danh mục
    </a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($query)) { 
            ?>
            <tr>
                <td><?=$row['cat_id'] ?></td>
                <td><?=$row['cat_name'] ?></td>
                <td>
                    <a class="btn btn-primary" href="../admin/index.php?pagelayout=edit_category&cat_id=<?=$row['cat_id'] ?>">
                        <img src="images/edit_square_FILL0_wght400_GRAD0_opsz48.svg" width="50%">
                    </a>
                    <a class="btn btn-danger" href="../admin/index.php?pagelayout=delete_category&cat_id=<?=$row['cat_id'] ?>">
                        <img src="images/delete_FILL0_wght400_GRAD0_opsz48.svg" width="50%">
                    </a>
                </td>
            </tr>
            <?php } ?>  
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>