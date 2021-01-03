<?php
//include 'conn.php';

//session_start();//开启session才能使用，而且要结含cookie来s使用
//$_SESSION['user']=$_POST;
//var_dump($_SESSION['user']);

//  表单提交后...
$posts = $_POST;
//  清除一些空白符号
foreach ($posts as $key => $value) {
    $posts[$key] = trim($value);
}
$username = $posts["username"];
//$password = md5($posts["password"]); //假设数据库存储的是用户名和 md5 加密后的密码
$password = $posts["password"];

$usertype= (int)$posts["usertype"];
if($usertype === 1){
    $table="tb_admin";
}elseif ($usertype === 2){
    $table="tb_user";
}

//$query = "SELECT * FROM `tb_user` WHERE `password` = '$password' AND `username` = '$username'";
$query = "SELECT * FROM $table WHERE `password` = '$password' AND `username` = '$username'";
//  取得查询结果

// 创建连接
$conn = new mysqli('localhost', 'root', '20001114', 'db_library');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$res = mysqli_query($conn, $query);
$arr = array();
while ($row = mysqli_fetch_assoc($res)) {
    array_push($arr, $row);
}
$userInfo = $arr;

if (!empty($userInfo)) {
    //  当验证通过后，启动 Session
    session_start();
    //  注册登陆成功的 admin 变量，并赋值 true
    $_SESSION["admin"] = true;
    $_SESSION["username"] = $username;


} else {
//    echo $query;
//    echo $usertype;
    die("用户名密码错误");
}