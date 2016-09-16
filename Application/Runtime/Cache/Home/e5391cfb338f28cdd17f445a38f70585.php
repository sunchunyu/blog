<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>孙春雨的博客</title>
    <script src= "/scy/Public/Js/jquery-1.11.0.min.js"></script>
	
    <link rel="stylesheet" type="text/css" href="/scy/Public/Css/index.css">
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
	
<article class="blogs">
    <h1 class="t_nav"><span>好咖啡要和朋友一起品尝，资源也要和同样喜欢它的人一起分享。</span>
        <a href="/" class="n1">网站首页</a><a href="#" class="n2">资源分享</a></h1>
    <div class="newblog left">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
        <h2 style="margin: 10px 0 10px 0"><?php echo ($vo["title"]); ?></h2>
        <p class="dateview"><span><?php echo ($vo["create_time"]); ?></span><span>文章类型： <?php echo ($vo["cover"]); ?></span></p>
        <h3>资源简介：</h3>
        <br />
        <section class="nlist">
            <p><?php echo ($vo["content"]); ?></p>
            <a  href="https://app.yinxiang.com/Home.action#n=43ba3913-e770-4b44-9879-b67a9a411a35&ses=4&sh=2&sds=5&" target="_blank" class="readmore" style="float: left;margin: 10px 0 10px 0">下载>></a>
        </section>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="line"></div>
    </div>
    <aside class="right">
        <div class="about_c">
            <p>1.学会分享才会有进步</p>
            <p>2.女生必须要独立</p>
            <p>3.我的青春我做主</p>
            <p>4.一个爱说爱笑的人很少人会不喜欢</p>
        </div>

    </aside>
</article>
<script src="_JS_/slider.js"></script>
<script src="_JS_/slider.js"></script>
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?139776525d123c02b34e2af812369ab0";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script>window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "16" }, "slide": { "type": "slide", "bdImg": "1", "bdPos": "right", "bdTop": "100" } }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>

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


</html>