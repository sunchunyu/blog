<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>孙春雨的博客</title>
    <script src= "/scy/Public/Js/jquery-1.11.0.min.js"></script>
	
    <link rel="stylesheet" type="text/css" href="/scy/Public/Css/login.css">

</head>
<body>
	<div>
		<header>
		    <div id="logo"><a href="#"></a></div>
		    <nav class="topnav" id="topnav">
		        <a href="<?php echo U('Index/index');?>"><span>首页</span><span class="en">Protal</span></a>
		        <a href="<?php echo U('About/about');?>"><span>关于我</span><span class="en">About</span></a>
		        <!--<a href="<?php echo U('Photos/photo');?>"><span>相册</span><span class="en">Photo</span></a>-->
		        <a href="<?php echo U('Briefly/doing');?>" ><span>碎言碎语</span><span class="en">Doing</span></a>
		        <a href="<?php echo U('Share/share');?>"><span>资源分享</span><span class="en">Share</span></a>
		        <a href="<?php echo U('Message/gustbook');?>"><span>留言版</span><span class="en">Gustbook</span></a>
		        <a href="<?php echo U('Login/logout');?>"><span><?php echo ($account_view); ?></span><span class="en">login/out</span></a>

		    </nav>
		</header>
	</div>
	
	<div class="wrapper">
		<div class="container">
			<h1>Welcome to Scy</h1>
			<form class="form">
				<input type="text" id="account" placeholder="用户名">
				<div class=account_tip><img id="tips" src="/scy/Public/img/tips.png" alt="accountTest"></div>
				<input type="password" id="pwd" placeholder="密码">
				<div class=pwd_tip><img id="tips" src="/scy/Public/img/tips.png" alt="pwdTest"></div>
				<input type="password" id="repwd" placeholder="确认密码">
				<div class=repwd_tip><img id="tips" src="/scy/Public/img/tips.png" alt="pwdTest"></div>
				<button type="button" id="return-button">返回登录</button>
				<button type="button" id="register-submit">注册</button>
			</form>
		</div>
	</div>

	<footer>
    	<p>Design by SCY
    		<a href="#" target="_blank">联系我</a>
    		<a href="#" target="_blank">计科131</a>
    	</p>
    	<div id="tbox">
     	   <a id="gotop" href="#" title="返回顶部">顶部</a>
     	   <a id="togbook" href="<?php echo U('Message/gustbook');?>" title="给我留言" style="display: block">留言</a>
    	</div>
	</footer>
</body>


    <script src="/scy/Public/Js/slider.js"></script>
    <script src="/scy/Public/Js/login.js"></script>
    <script>
    	$('#account').blur(function(){
	    	if ($(this).val().length == 0) {
	    		$('.account_tip').find("img").hide();
	   		} else {
	    		$('.account_tip').css("right","117px");
	    		$.post("<?php echo U('Login/checkAccount');?>",{account:$(this).val()},function(data){
	    			if (data == "false") {
	    				$('#tips').css("left","-40px");
	    			} else {
	    				$('#tips').css("left","0px");
	    			}
	    		})
	    		$('.account_tip').find("img").show();
	    	}
		})
    	$("#register-submit").click(function(){
    		$.post("<?php echo U('Login/registerSubmit');?>",{account:$('#account').val(),pwd:$('#pwd').val()},function(data) {
    			if (data == "true") {
    				alert("注册成功！");
    				window.location.href="<?php echo U('Login/open');?>";
    			} else {
    				alert("注册失败！");
    			}
    		})
		})
    </script>


</html>