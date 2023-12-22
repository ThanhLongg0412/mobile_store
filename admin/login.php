<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['sbm'])){
        $email = "longg@gmail.com";
        $password = "123";
        if($_POST['mail'] == $email && $_POST['pass'] == $password){
            $_SESSION['user'] = $_POST['mail'];
            $_SESSION['pass'] = $_POST['pass'];
            header('location: index.php');
        }else{
            $error = '<div class="alert alert-danger">Tài khoản hoặc mật khẩu không đúng!</div>';
        }
    }
    ?>
    <div class="login">
        <h1>Mobile Store</h1>
        <h2>Login</h2>
        <div class="col-md-7">
            <?php
            if(isset($error)) {
                echo $error;
            }
            ?>
            <form role="form" method="post">
                <fieldset>
                    <div class="form-group">
                        <input name="mail" type="email" class="form-control" placeholder="E-mail" autofocus>
                    </div>
                    <div class="form-group">
                        <input name="pass" type="password" class="form-control" placeholder="Mật khẩu">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" value="Remember Me">Nhớ tài khoản
                        </label>
                    </div>
                    <button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>