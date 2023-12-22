<?php
    $connect = mysqli_connect('localhost', 'root', '', 'thanh long');
    $sql = 'SELECT * FROM user';
    $query = mysqli_query($connect, $sql);
    // echo mysqli_num_rows($query);
?>