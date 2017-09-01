<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            #inner{
                width: 100%;
                height: 100px;
                padding: 8px;
                line-height: 22px;
                text-align:justify;
                color: #000000;
                border:1px solid #ffecb0;
                background:rgba(255,254,224,.7);
                box-shadow:2px 2px 7px rgba(0,0,0,.2);/*阴影*/
                border-radius: 4px; /*圆角*/
            }
        </style>
        <script>
            function getTop(e){
                var offset = e.offsetTop;
                if(e.offsetParent() != null)
                    offset += getTop(e.offsetParent);
                return offset;
            }
            //先把浮动层对象存在一个变量中，方便后面调用
            var obj = document.getElementsById("inner");
            //获取浮动层元素离窗口顶部的距离
            var top = getTop(obj);

            window.onscroll = function(){
                //获取窗口的scrollTop
                var bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                if (bodyScrollTop > top){
                    /*当窗口的滚动高度大于浮动层距离窗口顶部的距离时，也就是原理中说的第一种情况
                     *我们把这个浮动层position值设为fixed，top值设为0px，让它定位在窗口顶部*/
                    obj.style.position = "fixed";
                    obj.style.top = "0px";
                } else {
                    /*当窗口的滚动高度小于浮动层距离窗口顶部的距离时，也就是原理中说的第一种情况
                     *我们把这个浮动层position值设为static或为空，让它回归文档流
                     *让它回到原来的位置上去*/
                    obj.style.position = "static";
                }

            }


        </script>
    </head>
    <body>
    <div style="height: 100px;"></div>
    <div id="inner">
        我是智能浮动层，往下拖动滚动条，我永远在这里<br />
        往上拖动滚动条，我又回来了
    </div>
    <div style="height: 800px;"></div>
    </body>
</html>
