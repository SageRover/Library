<?php
//$students = json_decode($_POST);

// 创建连接
$conn = new mysqli('localhost','root','20001114','db_library');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

//$sql = "DELETE FROM tb_book WHERE Id=31";

$sql = "DELETE FROM tb_book WHERE Id=".$_POST['Id'];

if ($conn->query($sql) === TRUE) {
    echo "记录删除成功";
//    echo json_encode("添加成功");
} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "记录删除失败！";
    echo $_POST['Id'];
    echo gettype($_POST['Id']);
    echo $_POST[0];
    echo gettype($_POST[0]);
//    echo $_POST.Id;
//    echo gettype($_POST.Id);


//    echo json_encode("添加失败");
}
$conn->close();
?>