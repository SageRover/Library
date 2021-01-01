<?php  header('content-type:text/html;charset="utf-8"');
$conn = mysqli_connect("localhost", "root", "20001114", "db_library");
if (!$conn) {
    echo "数据库连接失败 : ";
    die("Connection failed: " . mysqli_connect_error());
}
// 插入数据
$sql = "INSERT INTO tb_book(ISBN,bookname, typeid,author,publisher,price,inTime,operator) values ('132','1','12','123','12321','2113','2020-2-3','1331')";
if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功";
//    echo json_encode("添加成功");
} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "失败！";
//    echo json_encode("添加失败");
}

mysqli_close($conn);

?>

