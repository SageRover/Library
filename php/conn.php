<?php
// 创建连接
$conn = new mysqli('localhost','root','20001114','db_library');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
