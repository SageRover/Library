<?php
//$students = json_decode($_POST);

// 创建连接
$conn = new mysqli('localhost', 'root', '20001114', 'db_library');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$Id = (int)$_POST['Id'];
// 插入数据

//$sql = "UPDATE tb_book SET ISBN=".$_POST['ISBN'].", bookname=".$_POST['ISBN'].",typeid=".$_POST['ISBN'] ;
$sql = "UPDATE tb_book SET ISBN='" . $_POST['ISBN'] . "', bookname='" . $_POST['bookname'] . "',typeid='" . $_POST['typeid'] .
    "'WHERE Id=". $Id;
//
//$sql = "UPDATE tb_book SET ISBN=" . $_POST['ISBN'] . ", bookname=" . $_POST['bookname'] . ",typeid=" . $_POST['typeid'];
//$sql = "UPDATE tb_book SET ISBN='29', bookname='29',typeid= '29'    WHERE Id= 31";

if ($conn->query($sql) === TRUE) {
    echo $_POST["Id"];
    echo "记录修改成功";
    echo gettype($Id);
    echo gettype($_POST["Id"]);
    echo gettype($_POST["ISBN"]);
    echo gettype($_POST["bookname"]);
    echo gettype($_POST["typeid"]);


//    echo json_encode("添加成功");
} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "Id:".$_POST["Id"];
    echo "记录修改失败！";
    echo gettype($Id);
    echo gettype($_POST["Id"]);
    echo gettype($_POST["ISBN"]);
    echo gettype($_POST["bookname"]);
    echo gettype($_POST["typeid"]);


//    echo json_encode("添加失败");
}
$conn->close();
?>