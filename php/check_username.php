<?php
// 创建连接
$conn = new mysqli('localhost', 'root', '20001114', 'db_library');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$username = $_POST['username'];
$sql = "SELECT * FROM tb_user WHERE username = $username";

$res = mysqli_query($conn, $sql);
//$arr = array();
//while ($row = mysqli_fetch_assoc($res)) {
//    array_push($arr, $row);
//}

//echo $sql;
//echo $res;


if (!empty($res)) {
    //为空
    echo "存在";
}else{
    echo "OK";
}
$conn->close();
