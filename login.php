<!--<!DOCTYPE html>-->
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
//    die("您无权访问");
}
?>
<?php
//session_start();
////  这种方法是将原来注册的某个变量销毁
//unset($_SESSION['admin']);
//unset($_SESSION['user']);
//
////  这种方法是销毁整个 Session 文件
//session_destroy();
//?>

<html>

<head>
    <meta charset="UTF-8">
    <title>我的“书屋”</title>
    <link rel="stylesheet" href="css/index.css"/>

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/library.png" />

</head>

<body>
<img src="img/bgImg.jpg" class="bgImg"/>
<div class="content">
    <div class="bidTitle">我的“书屋”登录</div>
    <div class="logCon">
        <?php if (!$_SESSION['admin'] === true) { ?>
            <form >
                <div class="line"><span>账号 ：</span>
                    <input class="bt_input" type="text" id="username" name="username" placeholder="请输入用户名"/>
                </div>
                <div class="line"><span>密码 ：</span>
                    <input class="bt_input" type="password" id="password" name="password" placeholder="请输入密码"/>
                </div>
                <style type = “text/css”>
                    #a-register{
                        color: #1b809e; text-decoration:none;
                    }
                </style>

                <div class="remember">

                    <a id="a-register" type="button" class="btn btn-link" href="register.html">注册</a>
                    <a href="register.html"><button type="button" class="btn btn-link" >注册</button></a>

                    <input type="checkbox" id="admin_check" tabindex="4" value="管理员">
                    <label>管理员</label>
                </div>
                <div>
                    <button type="submit" class="logingBut" onclick="login()">登录</button>
                </div>
            </form>
        <?php } else { ?>
            <h1><?php echo $_SESSION['username'] . ' 已经登录'; ?></h1>
            <button type="submit" class="logingBut" onclick="window.location.href='index.php'">进入主页</button>
            <button type="submit" class="logingBut" onclick="exit()">退出</button>
        <?php } ?>
    </div>
</div>
<div style="text-align:center;">
</div>
<!--登录-->
<script type="text/javascript">
    function login() {
        let usertype;
        if (document.getElementById("admin_check").checked == true) {
            console.log("管理员登录")
            usertype = 1;
        } else {
            usertype = 2;
            console.log("普通用户登录")
        }

        data = {
            usertype: usertype,
            username: document.getElementById("username").value,
            password: document.getElementById("password").value,
        };
        $.ajax({
            method: "post",
            url: "php/login.php",//url
            data: data,
            success: function (result) {
                if (result == 'undefined' || !result || !/[^\s]/.test(result)) {
                    //为空
                } else {
                    //不为空
                    alert(result);
                }
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
</body>
</html>