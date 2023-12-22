<?php
if(!defined('SECURITY')){
    header('location: index.php');
}
$sql = 'SELECT * FROM user';
$query = mysqli_query($connect, $sql);
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item active">Danh sách thành viên</li>
        </ol>
    </nav>
    <h1>Danh sách thành viên</h1>
    <a href="../admin/index.php?pagelayout=add_user" class="btn btn-success">
        <img src="images/add_circle_FILL0_wght400_GRAD0_opsz48.svg" width="15%">
        Thêm thành viên
    </a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">SĐT</th>
                <th scope="col">Email</td>
                <th scope="col">Quyền</th>
                <th score="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?=$row['user_id'] ?></td>
                <td><?=$row['username'] ?></td>
                <td><?=$row['phone_number'] ?></td>
                <td><?=$row['email'] ?></td>
                <?php
                if($row['role'] == 1) {
                    echo '<td>Admin</td>';
                }else {
                    echo '<td>Nhân viên</td>';
                }
                ?>
                <td class="form-group">
                    <a class="btn btn-primary" href="../admin/index.php?pagelayout=edit_user&user_id=<?=$row['user_id'] ?>">
                        <img src="images/edit_square_FILL0_wght400_GRAD0_opsz48.svg" width="50%">
                    </a>
                    <a class="btn btn-danger" href="../admin/index.php?pagelayout=delete_user&user_id=<?=$row['user_id'] ?>">
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

