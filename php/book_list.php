<?php  header('content-type:text/html;charset="utf-8"');
$conn = mysqli_connect("localhost", "root", "20001114", "db_library");
if (!$conn) {
    echo "数据库连接失败 : ";
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM tb_book order by Id";
$res = mysqli_query($conn, $sql);
$arr = array();
while ($row = mysqli_fetch_assoc($res)) {
    array_push($arr, $row);
}
ob_clean();
echo json_encode($arr,true);
mysqli_close($conn);

?>