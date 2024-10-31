<?php
/**
 * error
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error！页面未找到</title>
    <style>
        body {
            background-color: #0099CC;
            color: #FFFFFF;
            font-family: Microsoft Yahei, "Helvetica Neue", Helvetica, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;
            margin-left: 100px;
        }
        .face {
            font-size: 100px;
        }
        p{
            font-size: 24px;
            padding: 8px;
            line-height: 40px;
        }
        .tips {
            font-size: 16px
        }
        /*针对小屏幕的优化*/
        @media screen and (max-width: 600px) {
            body{
                margin: 0 10px;
            }
            p{
                font-size: 18px;
                line-height: 30px;
            }
            .tips {
                display: inline-block;
                padding-top: 10px;
                font-size: 14px;
                line-height: 20px;
            }
        }
    </style>
</head>
<body>
<script>
    var i = 5;
    var intervalid;
    intervalid = setInterval("cutdown()", 1000);
    function cutdown() {
        if (i == 0) {
            window.location.href = "<?php $this->options->siteUrl(); ?>?error=404";
            clearInterval(intervalid);
        }
        document.getElementById("mes").innerHTML = i;
        i--;
    }
    window.onload = cutdown;
</script>
<span class="face">:(</span>
<p>您访问的页面没有找到。<br>
    <span id="mes"></span> 秒后转至网站首页；<br>
<p class="paddingbox">或者在倒计时结束前点击以下链接继续浏览网页</p>
<p>》<a style="cursor:pointer" onclick="history.back()">返回上一页面</a></p>
<span class="tips">如果您想了解更多信息，则可以稍后在线搜索此错误: 算了你还是别搜了……</span>
</p>
</body>
</html>
