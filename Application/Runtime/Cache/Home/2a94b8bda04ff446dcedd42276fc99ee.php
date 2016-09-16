<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>孙春雨的博客</title>
    <script src= "/scy/Public/Js/jquery-1.11.0.min.js"></script>
	
    <link rel="stylesheet" type="text/css" href="/scy/Public/Css/index.css">

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
	
    <div class="banner">
        <section class="box">
            <ul class="texts">
                <p>我在我的世界里辛苦劳作</p>
                <p>你在你的世界里快乐玩耍</p>
                <p>你笑我不懂得享受，我笑你没有远大的理想</p>
            </ul>
            <div class="avatar">
                <a href="<?php echo U('About/about');?>">
                    <span>Chunyu.Sun</span>
                </a>
            </div>
        </section>
    </div>
    <article>
        <h2 class="title_tj">
            <p> 文章 <span>推荐</span> </p>
        </h2>
        <div class="bloglist left">

            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h3>
                    <a ><?php echo ($vo["title"]); ?></a>
                </h3>
                <figure>
                    <a>
                        <img src="/scy/Public/img/title1.jpg" data-original="/scy/Public/img/title1.jpg" data-bd-imgshare-binded="1" style="display: block">
                    </a>
                </figure>
                <ul>
                    <p>  <?php echo ($vo["content"]); ?></p>
                    <a href="<?php echo U('Read/read');?>?id=<?php echo ($vo["id"]); ?>" target="_blank" class="readmore">阅读全文>></a>
                </ul>
                <p class="dateview">
                    <span><?php echo ($vo["create_time"]); ?></span>
                <span>
                    <a href="<?php echo U('Read/read');?>?id=<?php echo ($vo["id"]); ?>">评论：</a>
                    <span class="ds-thread-count replies"><?php echo ($vo["com_count"]); ?></span>
                </span>
                    <span>作者：<?php echo ($vo["author"]); ?></span>
                <span>
                    个人博客：
                    【“
                    <a><?php echo ($vo["cover"]); ?></a>
                    ”】
                </span>
                </p><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <aside class="right">
            <div class="weather">
                <iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&amp;id=12&amp;icon=1&amp;num=1"></iframe>
            </div>
            <div class="news">
                <h3 class="ph">
                    <p>
                        站内
                        <span class="sousuo">搜索</span>
                    </p>
                </h3>
                <ul>
                    <li  class="getsousuo">></li>
                    <!--<a><?php echo ($vo["title"]); ?></a>-->
                </ul>
                <input id="sousuo" type="text" style="margin: 20px auto" placeholder="输入搜索关键字">
                <input type="submit" class="bdcs-search-form-submit" id="bdcs-search-form-submit" value="搜索">
                <input type="hidden" id="url" value="<?php echo U();?>" />
                <div style="display: block" id="putup">
                    <!--<?php echo ($vo["mytitle"]); ?>;-->
                </div>

            </div>
            <h3 class="links">
                <p>
                    友情
                    <span>链接</span>
                </p>
            </h3>
            <ul class="website">
                <li><a target="_blank" href="http://http://scy.zhengjunfei.cn/index.php/Index/index.html">个人博客</a></li>
                <li><a target="_blank" href="http://http://scy.zhengjunfei.cn/index.php/Share/share.html">分享社</a></li>
                <li><a target="_blank" href="http://2993120339@qq.com">邮箱</a></li>
            </ul>
        </aside>
    </article>


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


    <script>
//     $("#bdcs-search-form-submit").click(function(){
//         var sousuo =  $("#sousuo").val();
//         var url = $("#url").attr("value");
//         var aa = url+"/bb/"+sousuo ;
//        window.location.href=     aa;
//     })


    </script>

    <script src="/scy/Public/Js/slider.js"></script>
    <script>
      $("readmore").click(function(){
          var thecontent =$(this).find("p").text();
          $("putup").find("p").text("");
      })

      $("sousuo").onClick(function(){
          var title = $(this).find("$vo.title").text();
          $("getsousuo").find("$vo.title").text("");

      })
    </script>


</html>