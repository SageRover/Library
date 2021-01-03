<!doctype html>
<?php
//  防止全局变量造成安全隐患
$admin = false;
//  启动会话，这步必不可少
session_start();
//  判断是否登陆
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
//    echo "您已经成功登陆";
} else {
    //  验证失败，将 $_SESSION["admin"] 置为 false
    $_SESSION["admin"] = false;

//    echo("您无权访问");
    //重定向浏览器
    header("Location: login.php");
    //确保重定向后，后续代码不会被执行
    exit;
}
?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>首页 - 图书管理系统</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="yinqi">
    <link href="【1】很不错/css/bootstrap.min.css" rel="stylesheet">
    <link href="【1】很不错/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="【1】很不错/css/style.min.css" rel="stylesheet">


    <link rel="icon" type="image/x-icon" href="img/library.png"/>
    <script src="https://cdn.staticfile.org/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<div class="lyear-layout-web">
    <div class="lyear-layout-container">
        <!--左侧导航-->
        <aside class="lyear-layout-sidebar">

            <!-- logo -->
            <div id="logo" class="sidebar-header">
                <a href="index.html"><img src="img/library.png" title="LightYear" alt="LightYear"/></a>
            </div>
            <div class="lyear-layout-sidebar-scroll">

                <nav class="sidebar-main">
                    <ul class="nav nav-drawer">
                        <li class="nav-item active"><a href="index.html"><i class="mdi mdi-library-books"></i> 图书管理</a></li>
                        <li class="nav-item nav-item-has-subnav"><a><i class="mdi mdi-calendar-clock"></i> 借阅记录</a></li>
                        <li class="nav-item nav-item-has-subnav"><a ><i class="mdi mdi-account-multiple"></i> 用户信息</a><span></span></li>
                        <li class="nav-item nav-item-has-subnav"><a><i class="mdi mdi-account-key"></i> 管理员信息</a></li>

                        <!--                        <li class="nav-item nav-item-has-subnav">-->
                        <!--                            <a href="javascript:void(0)"><i class="mdi mdi-language-javascript"> 设置</i> </a>-->
                        <!--                        </li>-->
                    </ul>
                </nav>

                <div class="sidebar-footer">
                    <p class="copyright">18计算机2班苏睿 1800303206</p>
                </div>
            </div>
        </aside>
        <!--End 左侧导航-->

        <!--头部信息-->
        <header class="lyear-layout-header">
            <nav class="navbar navbar-default">
                <div class="topbar">
                    <!--左上角当前页面标题-->
                    <div class="topbar-left">
                        <div class="lyear-aside-toggler">
                            <span class="lyear-toggler-bar"></span>
                            <span class="lyear-toggler-bar"></span>
                            <span class="lyear-toggler-bar"></span>
                        </div>
                        <span class="navbar-page-title"> 图书管理后台首页 </span>
                    </div>
                    <!--右上角个人信息头像图标等-->
                    <ul class="topbar-right">
                        <li class="dropdown dropdown-profile">
                            <a href="javascript:void(0)" data-toggle="dropdown">
                                <img class="img-avatar img-avatar-48 m-r-10" src="img/个人.png" alt="Sage"/>
                                <span><?php echo $_SESSION['username'] ; ?>  <span class="caret"></span></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="lyear_pages_profile.html"><i class="mdi mdi-account"></i> 个人信息</a></li>
                                <li><a href="lyear_pages_edit_pwd.html"><i class="mdi mdi-lock-outline"></i> 修改密码</a>
                                </li>
                                <!--                                <li><a href="javascript:void(0)"><i class="mdi mdi-delete"></i> 清空缓存</a></li>-->
                                <li class="divider"></li>
                                <li><a href="JavaScript:exit();" ><i class="mdi mdi-logout-variant"></i> 退出登录</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--End 头部信息-->

        <!--页面主要内容-->
        <main class="lyear-layout-content">

            <div class="container-fluid">

                <!--                <div class="row">-->
                <!--                    <div class="col-sm-6 col-lg-3">-->
                <!--                        <div class="card bg-primary">-->
                <!--                            <div class="card-body clearfix">-->
                <!--                                <div class="pull-right">-->
                <!--                                    <p class="h6 text-white m-t-0">今日收入</p>-->
                <!--                                    <p class="h3 text-white m-b-0">102,125.00</p>-->
                <!--                                </div>-->
                <!--                                <div class="pull-left"><span class="img-avatar img-avatar-48 bg-translucent"><i-->
                <!--                                        class="mdi mdi-currency-cny fa-1-5x"></i></span></div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <!--                    <div class="col-sm-6 col-lg-3">-->
                <!--                        <div class="card bg-danger">-->
                <!--                            <div class="card-body clearfix">-->
                <!--                                <div class="pull-right">-->
                <!--                                    <p class="h6 text-white m-t-0">用户总数</p>-->
                <!--                                    <p class="h3 text-white m-b-0">920,000</p>-->
                <!--                                </div>-->
                <!--                                <div class="pull-left"><span class="img-avatar img-avatar-48 bg-translucent"><i-->
                <!--                                        class="mdi mdi-account fa-1-5x"></i></span></div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <!--                    <div class="col-sm-6 col-lg-3">-->
                <!--                        <div class="card bg-success">-->
                <!--                            <div class="card-body clearfix">-->
                <!--                                <div class="pull-right">-->
                <!--                                    <p class="h6 text-white m-t-0">下载总量</p>-->
                <!--                                    <p class="h3 text-white m-b-0">34,005,000</p>-->
                <!--                                </div>-->
                <!--                                <div class="pull-left"><span class="img-avatar img-avatar-48 bg-translucent"><i-->
                <!--                                        class="mdi mdi-arrow-down-bold fa-1-5x"></i></span></div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <!--                    <div class="col-sm-6 col-lg-3">-->
                <!--                        <div class="card bg-purple">-->
                <!--                            <div class="card-body clearfix">-->
                <!--                                <div class="pull-right">-->
                <!--                                    <p class="h6 text-white m-t-0">新增留言</p>-->
                <!--                                    <p class="h3 text-white m-b-0">153 条</p>-->
                <!--                                </div>-->
                <!--                                <div class="pull-left"><span class="img-avatar img-avatar-48 bg-translucent"><i-->
                <!--                                        class="mdi mdi-comment-outline fa-1-5x"></i></span></div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div class="row">-->

                <!--                    <div class="col-lg-6">-->
                <!--                        <div class="card">-->
                <!--                            <div class="card-header">-->
                <!--                                <h4>每周用户</h4>-->
                <!--                            </div>-->
                <!--                            <div class="card-body">-->
                <!--                                <canvas class="js-chartjs-bars"></canvas>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <!--                    <div class="col-lg-6">-->
                <!--                        <div class="card">-->
                <!--                            <div class="card-header">-->
                <!--                                <h4>交易历史记录</h4>-->
                <!--                            </div>-->
                <!--                            <div class="card-body">-->
                <!--                                <canvas class="js-chartjs-lines"></canvas>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <!--                </div>-->

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>图书信息列表</h4>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <form method="post">
                                <div class="form-inline row">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select name="select" class="form-control">
                                        <option value="bookname">bookname</option>
                                        <option value="Id">Id</option>
                                        <option value="ISBN">ISBN</option>
                                        <option value="author">author</option>
                                        <option value="publisher">publisher</option>

                                    </select>
                                    <input id="select_value" type="text" class="form-control" placeholder="关键字"
                                           name="data"/>
                                    <button type="button" class="btn btn-info" onclick="selectbook()"><i class="mdi mdi-magnify"></i> 查 找</button>
                                    <button type="button" class="btn btn btn-success"
                                            onclick="window.location.href='add_book.html'"><i class="mdi mdi-plus"></i> 添 加
                                    </button>
                                </div>
                            </form>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="book_table" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <!--                                            <th>项目名称</th>-->
                                            <!--                                            <th>开始日期</th>-->
                                            <!--                                            <th>截止日期</th>-->
                                            <!--                                            <th>状态</th>-->
                                            <!--                                            <th>进度</th>-->

                                            <th>书名Bookname</th>
                                            <th>ISBN</th>
                                            <th>类型Typeid</th>
                                            <th>作者Author</th>
                                            <th>出版社Publisher</th>
                                            <th>价格Price</th>
                                            <th>入馆时间InTime</th>
                                            <th>状态</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                        </thead>
                                        <tbody id="book_table_tbody">
                                        <tr>
                                            <td>1</td>
                                            <td>高等数学</td>
                                            <td>9787302447757</td>
                                            <td>12/05/2019</td>
                                            <td>12/05/2019</td>
                                            <td>12/05/2019</td>
                                            <td>105.00</td>
                                            <td>12/05/2019</td>
                                            <td><span class="label label-warning">借出</span></td>
                                            <!--                                            <td><a href="/edit_book.html?${i}">edit</a></td>-->
                                            <td>
                                                <button class="btn btn-success" onclick="deletebook(${arr[i].Id})">编辑
                                                </button>
                                            </td>
                                            <td>
                                                <!--                                                <button class="label  btn-danger" onclick="deletebook(${arr[i].Id})"><i class="mdi mdi-delete-forever"></i></button>-->
                                                <button class="btn btn-danger" onclick="deletebook(${arr[i].Id})">删除
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>假如给我三天光明</td>
                                            <td>9787302447757</td>
                                            <td>12/05/2019</td>
                                            <td>12/05/2019</td>
                                            <td>12/05/2019</td>
                                            <td>65.00</td>
                                            <td>12/05/2019</td>
                                            <td><span class="label label-primary">在馆</span></td>
                                            <!--                                            <td><a href="/edit_book.html?${i}">edit</a></td>-->
                                            <td>
                                                <button class="btn btn-success" onclick="deletebook(${arr[i].Id})">编辑
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="deletebook(${arr[i].Id})">删除
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </main>
        <!--End 页面主要内容-->
    </div>
</div>

<!--主页面显示图书列表-->
<script>
    $.ajax({
        type: "get",
        url: "php/book_list.php",
        success: function (data) {
            console.log(data);
            console.log(typeof data);
            var arr = JSON.parse(data);

            console.log(typeof arr);
            console.log(arr);
            let str = ``;
            for (let i = 0; i < arr.length; i++) {
                if (parseInt(arr[i].state) === 1) {
                    arr[i].state = "<span class=\"label btn-primary\">在馆</span>"
                } else {
                    arr[i].state = "<span class=\"label label-warning\">借出</span>"
                }
                str += `<tr>
							<td>${arr[i].Id}</td>
							<td>${arr[i].bookname}</td>
							<td>${arr[i].ISBN}</td>
							<td>${arr[i].typeid}</td>
							<td>${arr[i].author}</td>
							<td>${arr[i].publisher}</td>
							<td>${arr[i].price}</td>
							<td>${arr[i].inTime}</td>
							<td>${arr[i].state}</td>

							<td><button class="btn btn-success" onclick="deletebook(${arr[i].Id})">编辑</button> </td>
							<td><button class="btn btn-danger"
							onclick="deletebook(${arr[i].Id})">删除</button></td>
					    </tr>`


            }
            $("#book_table_tbody").append(str)
        },
        error: function () {
            alert("图书列表显示错误");
        }
    });
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
        var value = select_value.value
        console.log(value)
        console.log(typeof (value))

        if (value == "") {
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
							<td><a href="edit_book.html?${i}">edit</a></td>
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
<!--退出-->
<script type="text/javascript">
    function exit() {
        $.ajax({
            method: "get",
            url: "php/delete_session.php",//url
            success: function (result) {
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
<script type="text/javascript" src="【1】很不错/js/jquery.min.js"></script>
<script type="text/javascript" src="【1】很不错/js/bootstrap.min.js"></script>
<script type="text/javascript" src="【1】很不错/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="【1】很不错/js/main.min.js"></script>
</script>
</body>
</html>