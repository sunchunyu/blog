<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>孙春雨的博客</title>
    <script src= "/scy/Public/Js/jquery-1.11.0.min.js"></script>
	
    <link rel="stylesheet" type="text/css" href="/scy/Public/Css/photo.css">
    <!--<link rel="stylesheet" type="text/css" href="/scy/Public/Css/pingpu.css">-->

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
	
    <div>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="margin: 20px 10% 20px 10%;font-size: 16px;text-align: center;line-height: 25px"> <?php echo ($vo["content"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div style="margin: 20px 10% 20px 10%; ">

        <div class="comment_view">
            <?php
 for ($i=0; $i < count($data); $i++) { echo '<hr style="margin-top: 5px;margin-bottom: 5px;"><img class="head_img" align="left" src="/scy/Public/img/head.png" alt="head-portrait"><div class="contents">'; echo '<span class="account">姓名:'.$data[$i]['id'].'</span><br>'; echo '<span class="content">内容:'.$data[$i]['content'].'</span><br>'; echo '<span class="date">时间:'.$data[$i]['create_time'].'</span><span class="reply_a" onclick="reply('.$data[$i]['publish_u_id'].','.$data[$i]['id'].','.$data[$i]['id'].')" style="margin-left: 10px;color: black;">回复</span><br></div>'; for ($j=0; $j < count($value[$i]); $j++) { echo '<div class="reply"><hr style="margin-top: 5px;margin-bottom: 5px;"><img class="head_img_small" align="left" src="/scy/Public/img/head.png" alt="head-portrait"><div class="contents">'; echo '<span class="account">姓名:'.$value[$i][$j]['id'].'</span><br>'; echo '<span class="content">内容:'.$value[$i][$j]['content'].'</span><br>'; echo '<span class="date" style="margin-left: 40px;">时间:'.$value[$i][$j]['create_time'].'</span><span class="reply_a" onclick="reply('.$value[$i][$j]['publish_u_id'].','.$value[$i][$j]['root_id'].','.$value[$i][$j]['id'].')" style="margin-left: 10px;color: black;">回复</span><br></div></div>'; } } ?>
        </div>
        <!--<h3>添加评论</h3>-->
        <div class="clear_float"><hr style="margin-top: 5px;margin-bottom: 10px;"></div>
        <div class="comment_area">
            <img class="head_img" align="left" src="/scy/Public/img/head.png" alt="head-portrait">
            <div class="comment">
                <a href="#reply"></a>
                <input type="hidden" class="reply_u_id" value="">
                <input type="hidden" class="root_id" value="">
                <div class="Input_Box">
                    <textarea class="Input_text"></textarea>
                    <div class="faceDiv"></div>
                    <div class="Input_Foot"><a class="imgBtn" href="javascript:void(0);"></a><a class="postBtn">确定</a></div>
                </div>
            </div>
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
    <!--<script src="/scy/Public/Js/gill.js"></script>-->
    <!--<script src="/scy/Public/Js/photo.js"></script>-->
    <script>
        $('.postBtn').click(function() {
            if ($('.Input_text').val().length == 0) {
                alert("回复内容不能为空！");
            } else {
                $.post("<?php echo U('Message/publish_message');?>",{message:$('.Input_text').val(),reply_u_id:$('.reply_u_id').val(),root_id:$('.root_id').val()},function(data) {
                    if (data == "true") {
                        location.reload(true);
                        location.hash="#";
                        alert("发表评论成功！");
                    } else if(data == "logout") {
                        alert("请先完成登录操作，然后返回发表留言。");
                    } else {
                        alert("发表评论失败!请稍后再试……");
                    }

                })
            }
        })
        function reply(reply_u_id,root_id,account) {
            $('.reply_u_id').val(reply_u_id);
            $('.root_id').val(root_id);
            $('.Input_text').val("回复 "+account+":");
            //跳转锚
            location.hash="#reply";
            $('.Input_text').focus();
        }
    </script>


</html>