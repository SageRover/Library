<?php header('content-type:text/html;charset="utf-8"');
$conn = mysqli_connect("localhost", "root", "20001114", "db_library");
if (!$conn) {
    echo "数据库连接失败 : ";
    die("Connection failed: " . mysqli_connect_error());
}
if ($_POST['type'] === 'Id') {
    $_POST['value'] = (int)$_POST['value'];
}
//$_POST['type']=str_replace($_POST['type']);



//$sql = "SELECT * FROM tb_book WHERE'" . $_POST['type'] . "'='" . $_POST['value'] . "'order by Id";
$sql = "SELECT * FROM tb_book WHERE  ".$_POST['type'] . " = '" . $_POST['value'] . "' order by Id";


//if ($conn->query($sql) === TRUE) {
//    echo "记录查找成功";
////    echo json_encode("添加成功");
//} else {
////    echo "Error: " . $sql . "<br>" . $conn->error;
//    echo "记录查找失败！";
////    echo $_POST['Id'];
////    echo gettype($_POST['Id']);
////    echo $_POST[0];
////    echo gettype($_POST[0]);
////    echo $_POST.Id;
////    echo gettype($_POST.Id);
//
//
////    echo json_encode("添加失败");
//}

$res = mysqli_query($conn, $sql);
$arr = array();
while ($row = mysqli_fetch_assoc($res)) {
    array_push($arr, $row);
}
ob_clean();
echo json_encode($arr, true);
//echo $sql;
//echo $_POST['value'];
//echo gettype($_POST['value']);
//echo $_POST['type'];
//echo gettype($_POST['type']);

mysqli_close($conn);

?>