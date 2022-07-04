<?php

//创建连接
$servername = 'mysql'; //域名
$database = 'blog';
$username = 'blog_user'; //用户名
$passwd = '123456'; //密码
$port = '3306'; //端口

//检测连接
$conn = mysqli_connect($servername, $username, $passwd, $database, $port);

if (!$conn) {
    die("connection failed:" . mysqli_connect_errno());
} else {
    echo "Connection to mysql success";
    mysqli_close($conn); //关闭连接

}

