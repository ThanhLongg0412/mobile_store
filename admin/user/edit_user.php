<?php
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM user WHERE user_id = $user_id";
$row = mysqli_fetch_array(mysqli_query($connect, $sql));
if(isset($_POST['sbm'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $phone_number = $_POST['phone_number'];
    $role = $_POST['role'];
    $sql_check = "SELECT email FROM user WHERE email = '$email'";
    $query_check = mysqli_query($connect, $sql_check);
    $row_check = mysqli_fetch_array($query_check);
    if($password != $re_password){
        $error = '<div class="alert alert-danger">Nhập lại mật khẩu không đúng!</div>';
    }elseif ($row_check >= 1) {
        $error = '<div class="alert alert-danger">Email đã tồn tại!</div>';
    }else {
        $sql = "UPDATE user SET 
        username = '$username', email = '$email', password = '$password', phone_number = $phone_number, role = $role
        WHERE user_id = $user_id";
        $query = mysqli_query($connect, $sql);
        header('location: index.php?pagelayout=user');
    }
}
?>
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin/index.php?pagelayout=user">Danh sách thành viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$row['username'] ?></li>
        </ol>
    </nav>
    <h1>Chỉnh sửa thành viên</h1>
    <?php
    if(isset($error)) echo $error;
    ?>
    <form role="form" method="post">
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" name="username" required class="form-control" value="<?=$row['username'] ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" required value="<?=$row['email'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input name="password" required type="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input name="re_password" required type="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" name="phone_number" required class="form-control" value="<?=$row['phone_number'] ?>">
        </div>
        <div class="form-group">
            <label>Quyền</label>
            <select name="role" class="form-control">
                <option value="1" <?php if($row['role'] == 1) {
                    echo 'selected';
                } ?>>Admin</option>
                <option value="2" <?php if($row['role'] == 2) {
                    echo 'selected';
                } ?>>Nhân viên</option>
            </select>
        </div>
        <button name="sbm" type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="reset" class="btn btn-warning">Làm mới</button>
    </form>
</div>