<?php
if(isset($_POST['sbm'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $phone_number = $_POST['phone_number'];
    $role = $_POST['role'];
    $sql_check = "SELECT username FROM user WHERE email = '$email'";
    $query_check = mysqli_query($connect, $sql_check);
    $row_check = mysqli_num_rows($query_check);
    if($password != $re_password){
        $error = '<div class="alert alert-danger">Nhập lại mật khẩu không đúng!</div>';
    }elseif($row_check >= 1){
        $error = '<div class="alert alert-danger">Tài khoản người dùng đã tồn tại!</div>';
    }else{
        $sql = "INSERT INTO user (username, email, password, phone_number, role) 
        VALUES ('$username', '$email', '$password', $phone_number, $role)";
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
            <li class="breadcrumb-item active" aria-current="page">Thêm thành viên</li>
        </ol>
    </nav>
    <h1>Thêm thành viên</h1>
    <?php
    if(isset($error)) echo $error;
    ?>
    <form role="form" method="post">
        <div class="form-group">
            <label>Họ và tên</label>
            <input name="username" required class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" required type="text" class="form-control" placeholder="">
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
            <input name="phone_number" required type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Quyền</label>
            <select name="role" class="form-control">
                <option value="1">Admin</option>
                <option value="2">Nhân viên</option>
            </select>
        </div>
        <button name="sbm" type="submit" class="btn btn-primary">Thêm mới</button>
        <button type="reset" class="btn btn-warning">Làm mới</button>
    </form>
</div>