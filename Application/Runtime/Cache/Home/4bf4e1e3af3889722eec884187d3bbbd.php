<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>孙春雨的博客</title>
    <script src= "/scy/Public/Js/jquery-1.11.0.min.js"></script>
	
    <link rel="stylesheet" type="text/css" href="/scy/Public/Css/about.css">

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
	
<article class="aboutcon">
    <h1 class="t_nav">
        <span>学如春起之苗，不见其长，日有所增</span>
        <a href="<?php echo U('Index/index');?>" class="n1">网站首页</a>
        <a href="<?php echo U('About/about');?>" class="n2">关于我</a>
    </h1>
<!--<?php echo ($list[0]["id"]); ?>-->
    <!--<?php var_dump( $list)?>-->
    <div class="about left">
        <h2>关于我</h2>
        <ul>
            <p>女，前端开发工程师</p>
            <p>专注于前端开发</p>
            <p>一个爱笑的傻女孩</p>
        </ul>
        <h2>关于我的大学</h2>
        <p>河南科技学院</p>
        <p>信息工程学院</p>
        <p>计算机科学与技术</p>
        <p>计科131班</p>
    </div>
    <aside class="right">
        <div class="about_c">
            <p>扣扣：<span>2993120339</span></p>
            <p>姓名：孙春雨</p>
            <p>生日：1994年6月</p>
            <p>籍贯：河南省周口市</p>
            <p>现居：河南省新乡市</p>
            <p>职业：前端开发工程师</p>
        </div>
    </aside>
</article>
<block name="script">
    <script src="/scy/Public/Js/slider.js"></script>

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



</html>