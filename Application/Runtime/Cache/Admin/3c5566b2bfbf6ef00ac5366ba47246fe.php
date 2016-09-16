<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>电子琴管理系统</title>
    <link rel="stylesheet" type="text/css" href="/scy/Public/Admin/css/login.css" media="all">
</head>
<body id="login-page">
<div id="main-content">
    <div class="login-body">
        <div class="login-main pr">
            <form action="<?php echo U('do_login');?>" method="post" class="login-form">
                <h3 class="welcome">电子琴管理平台</h3>
                <div id="itemBox" class="item-box">
                    <div class="item">
                        <i class="icon-login-user"></i>
                        <input type="text" name="username" placeholder="请填写用户名" autocomplete="off" />
                    </div>
                    <span class="placeholder_copy placeholder_un">请填写用户名</span>
                    <div class="item b0">
                        <i class="icon-login-pwd"></i>
                        <input type="password" name="password" placeholder="请填写密码" autocomplete="off" />
                    </div>
                    <span class="placeholder_copy placeholder_pwd">请填写密码</span>
                    <div class="item verifycode" id="verifycode">
                        <i class="icon-login-verifycode"></i>
                        <input type="text" name="verify" placeholder="请填写验证码" autocomplete="off">
                        <a class="reloadverify" title="换一张" href="javascript:void(0)">换一张？</a>
                    </div>
                    <span id="notice_vol" class="placeholder_copy placeholder_check">请填写验证码</span>
                    <div id="verifycode_img">
                        <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Public/verify');?>">
                    </div>
                </div>
                <div class="login_btn_panel">
                    <button class="login-btn " type="submit">
                        <span class="in"><i class="icon-loading"></i>登 录 中 ...</span>
                        <span class="on">登 录</span>
                    </button>
                    <div id='notice' class="check-tips" ></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="/scy/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript">

    $(document).ready(function(){
        var verifyimg = $(".verifyimg").attr("src");
        $(".reloadverify").click(function(){
            if( verifyimg.indexOf('?') > 0){
                $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });

    });

    /* 登陆表单获取焦点变色 */
    $(".login-form").on("focus", "input", function(){
        $(this).closest('.item').addClass('focus');
    }).on("blur","input",function(){
        $(this).closest('.item').removeClass('focus');
    });
    //表单提交
    $("form").ajaxStart(function(){
                $("button[type ='submit']").addClass("log-in").attr("disabled", true);
            })
            .ajaxStop(function(){
                $("button[type ='submit']").removeClass("log-in").attr("disabled", false);
            });
    $("form").submit(function(e){
        var self = $(this);
        $.post(self.attr("action"), self.serialize(), success, "text");

        function success(data){
            if(data == 1){
                window.location.href = "/scy/index.php/Admin/User/index.html";
            }else{
                $('#notice').html(data);
                $(".reloadverify").click();
            }
        }
        //阻止默认行为
        e.preventDefault();
    });

</script>

</body>
</html>