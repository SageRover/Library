<?php
//$students = json_decode($_POST);

// 创建连接
$conn = new mysqli('localhost','root','20001114','db_library');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$inTime = date("Y-m-d",strtotime($_POST["inTime"]));
// 插入数据
$sql = "insert into tb_book(ISBN,bookname, typeid,author,publisher,price,inTime,operator) 
values ('".$_POST['ISBN']."','".$_POST['bookname']."','".$_POST['typeid']."','".$_POST['author']."','".$_POST['publisher']."','".$_POST['price']."','".$inTime."','".$_POST['operator']."')";

if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功";
//    echo json_encode("添加成功");
} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
    echo $_POST["ISBN"];
    echo "新记录插入失败！";
//    echo json_encode("添加失败");
}
$conn->close();
?>