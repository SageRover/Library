<!doctype html>
<?php
//  防止全局变量造成安全隐患
$admin = false;
//  启动会话，这步必不可少
session_start();
//  判断是否登陆
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
    echo "您已经成功登陆";
} else {
    //  验证失败，将 $_SESSION["admin"] 置为 false
    $_SESSION["admin"] = false;
    die("您无权访问");
}
?>
<!--lang属性对每张页面中的主要语言进行声明，也只是个声明，主要是根据W3C标准，对搜索引擎和浏览器友好。-->
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>test1</title>
    <!--    以下都是我修改的最新最适合的Bootstrap4相关文件引入-->
    <!-- 新 Bootstrap4 核心 CSS 文件 -->
    <!--    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/3.5.1/jquery.min.js"></script>

    <!--    &lt;!&ndash; bootstrap.bundle.min.js 用于弹窗、提示、下拉菜单，包含了 popper.min.js &ndash;&gt;-->
    <!--    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>-->

    <!--    &lt;!&ndash; 最新的 Bootstrap4 核心 JavaScript 文件 &ndash;&gt;-->
    <!--    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>

</head>

<body>
<!--<table class="table table-bordered">-->
<!--    <tr>-->
<!--        <th>名字</th>-->
<!--        <th>开始时间</th>-->
<!--        <th>是否真实</th>-->
<!--        <th>设备</th>-->
<!--    </tr>-->
<!--</table>-->
<!--bootstrap-select多选框相关的文件引入-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


<!-- main_container starts here -->

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><h1>顾客列表</h1></div>
    <div class="panel-body">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <form method="post">
        <div class="form-inline row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="select" class="selectpicker">
                <option value="bookname">bookname</option>
                <option value="Id">Id</option>
                <option value="ISBN">ISBN</option>
                <option value="author">author</option>
                <option value="publisher">publisher</option>

            </select>
            <input id="select_value" type="text" class="form-control" placeholder="关键字" name="data"/>
            <button type="button" class="btn btn-primary" onclick="selectbook()">查 找</button>
            <button type="button" class="btn btn-outline-success" value="按钮"
                    onclick="window.location.href='/add_book.html'">添加
            </button>

        </div>
    </form>
    <!--<form method="post" action="../select/">
        <select name="select" class="selectpicker">
            <option value="name">name</option>
            <option value="sex">sex</option>
            <option value="id">id</option>

        </select>
        <input type="text" name="data"/>
        <input type="submit" value="查找"/>
    </form>-->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <!-- Table -->
    <table class="table table-striped  table-borderless table-hover " id="tabletest">
        <!--    <thead class="thead-light">-->
        <tr>
            <th>Id</th>
            <th>书名bookname</th>
            <th>ISBN</th>
            <th>typeid</th>
            <th>作者author</th>
            <th>出版社publisher</th>
            <th>价格price</th>
            <th>edit</th>
            <th>delete</th>

        </tr>
        <!--    </thead>-->
    </table>
</div>

<!--主页面显示图书列表-->
<script>
    $.ajax({
        type: "get",
        url: "php/book_list.php",
        success: function (data) {
//			JSON.parse(JSON.stringify(data))
//			alert(data);
            console.log(data);
            console.log(typeof data);
            var arr = JSON.parse(data);

            console.log(typeof arr);
            console.log(arr);
            let str = ``;
            for (let i = 0; i < arr.length; i++) {
                str += `<tr>
							<td>${arr[i].Id}</td>
							<td>${arr[i].bookname}</td>
							<td>${arr[i].ISBN}</td>
							<td>${arr[i].typeid}</td>
							<td>${arr[i].author}</td>
							<td>${arr[i].publisher}</td>
							<td>${arr[i].price}</td>
							<td><a href="/edit_book.html?${i}">edit</a></td>
							<td><button class="btn btn-danger"
							onclick="deletebook(${arr[i].Id})">删除</button></td>
<!--                            <td><a onclick="deletebook(${arr[i].Id})">delete</a></td>-->
					    </tr>`

            }
            $("#tabletest").append(str)
        },
        error: function () {
            alert("图书列表显示错误");
        }
    });
</script>
<!--删除图书-->
<script type="text/javascript">
    function deletebook(Id) {
        data = {
            Id: Id
        };
//	data=JSON.stringify(data);
//         alert(data);
        console.log(data);
        console.log(typeof data);

        $.ajax({
            method: "post",
            url: "php/delete_book.php",//url
            data: data,
            success: function (result) {
//				var obj = JSON.parse(result);
//				alert(obj.message);
                alert(result);
                console.log("看alert判断是否成功");
                window.location.reload();

            },
            error: function (msg) {
                alert(msg);
                console.log("失败了");

            }
        });
    }
</script>
<!--查找图书-->
<script type="text/javascript">
    $(function () {
        $("select").change(function () {
            console.log($("select option:selected").text())
        })
    })

    function selectbook() {
        // console.log($("select option:selected").text())
        // alert(typeof ($("select option:selected").text()))
        // $("select option:selected").text()
        // alert(select_value.value);
        var value=select_value.value
        console.log(value)
        console.log(typeof (value))

        if (value==""){
            alert("请输入值再点击查询");
            window.location.reload();
        }
        data = {
            type: $("select option:selected").text(),
            value: value,
        };
        // alert(select_value.value);
        console.log(data);
//         console.log(typeof (select_value.value));
        $.ajax({
            method: "post",
            url: "php/select_book.php",//url
            data: data,
            success: function (result) {
//				var obj = JSON.parse(result);
//				alert(obj.message);
//                 alert(result);
                console.log("看alert判断是否成功");
                // window.location.reload();
                var arr = JSON.parse(result);

                console.log(typeof arr);
                console.log(arr);
                let str = `<table class="table table-striped  table-borderless table-hover " id="tabletest">
                        <tr>
                            <th>Id</th>
                            <th>书名bookname</th>
                            <th>ISBN</th>
                            <th>typeid</th>
                            <th>作者author</th>
                            <th>出版社publisher</th>
                            <th>价格price</th>
                            <th>edit</th>
                            <th>delete</th>
                       </tr>`;
                for (let i = 0; i < arr.length; i++) {
                    str += `<tr>
							<td>${arr[i].Id}</td>
							<td>${arr[i].bookname}</td>
							<td>${arr[i].ISBN}</td>
							<td>${arr[i].typeid}</td>
							<td>${arr[i].author}</td>
							<td>${arr[i].publisher}</td>
							<td>${arr[i].price}</td>
							<td><a href="/edit_book.html?${i}">edit</a></td>
							<td><button class="btn btn-danger"
							onclick="deletebook(${arr[i].Id})">删除</button></td>
<!--                            <td><a onclick="deletebook(${arr[i].Id})">delete</a></td>-->
					    </tr>`
                }
                str += `</table>`
                $("#tabletest").replaceWith(str)

            },
            error: function (msg) {
                alert(msg);
                console.log("失败了");

            }
        });
    }
</script>
</body>
</html>
