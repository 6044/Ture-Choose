<?php
	session_start();
	//echo $_SESSION['id'];
	if(!$_SESSION["id"]) header("Location:login.html");
?>
<!DOCTYPE html>
<html>
<head>
  
  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/index.css">
   <script src="/scripts/jquery.min.js"></script>
   <script src="sjs/bootstrap.min.js"></script>
   <!--<iframe src="menu.html" width="100%" height="60px" scrolling="no"></iframe>-->
   <style type="text/css">

body {background-color: #FFFFCC}


</style>

</head>

<body>

<link href="images/style1.css" rel="stylesheet" type="text/css" />
<ul id="nav">
    <li><a href="index.php">首页</a></li>
    <li><a href="partner.php">驴友组队</a></li>
    <li><a href="rocboss/index.php">驴友社区</a></li>
    <li><a href="gonglv/index.php">旅游攻略</a></li>
    <li><a href="in.php">路线评价</a></li>
    <li><a href="logout.php">退出</a></li>
</ul>
	
	<style>
<!--
body, ul, li, p {
 margin: 0;
 padding: 0;
}
ul{
 list-style-type:none;
}
body {
 font-family:"Times New Roman", Times, serif;
 
}
#box {
 position:relative;
 width:1026px;
 height:610px;
 margin:10px auto;
}
#box .imgList{
 position:relative;
 width:1024px;
 height:608px;
 overflow:hidden;
}
#box .imgList li{
 position:absolute;
 top:0;
 left:0;
 width:1024px;
 height:608px;
}
#box .countNum{
 position:absolute;
 right:0;
 bottom:5px;
}
#box .countNum li{
 width:20px;
 height:20px;
 float:left;
 color:#fff;
 border-radius:20px;
 background:#f90;
 text-align:center;
 margin-right:5px;
 cursor:pointer;
 opacity:0.7;
 filter:alpha(opacity=70);
}
#box .countNum li.current{
 background:#f60;
 font-weight:bold;
 opacity:1;
 filter:alpha(opacity=70);
}
-->
</style>
<script>
<!--
 function runImg(){}
 runImg.prototype={
  bigbox:null,//最外层容器
  boxul:null,//子容器ul
  imglist:null,//子容器img
  numlist:null,//子容器countNum
  prov:0,//上次显示�?
  index:0,//当前显示�?
  timer:null,//控制图片转变效果
  play:null,//控制自动播放
  imgurl:[],//存放图片
  count:0,//存放的个�?
  $:function(obj)
  {
   if(typeof(obj)=="string")
   {
    if(obj.indexOf("#")>=0)
    {
     obj=obj.replace("#","");
     if(document.getElementById(obj))
     {
      return document.getElementById(obj);
     }
     else
     {
      alert("没有容器"+obj);
      return null;
     } 
    }
    else
    {
     return document.createElement(obj);
    }
   }
   else
   {
    return obj;
   }
  },
  //初始�?
  info:function(id)
  {
   this.count=this.count<=6?this.count:6;
   this.bigbox=this.$(id);
   for(var i=0;i<2;i++)
   {
    var ul=this.$("ul");
    for(var j=1;j<=this.count;j++)
    {
     var li=this.$("li");
     li.innerHTML=i==0?this.imgurl[j-1]:j;
     ul.appendChild(li);
    }
    this.bigbox.appendChild(ul);
   }
   this.boxul=this.bigbox.getElementsByTagName("ul");
   this.boxul[0].className="imgList";
   this.boxul[1].className="countNum";
   this.imglist=this.boxul[0].getElementsByTagName("li");
   this.numlist=this.boxul[1].getElementsByTagName("li");
   for(var j=0;j<this.imglist.length;j++)
   {
    this.alpha(j,0);
   }
   this.alpha(0,100);
   this.numlist[0].className="current";
  },
  //封装程序入口
  action:function(id)
  {
   this.autoplay();
   this.mouseoverout(this.bigbox,this.numlist);
  },
  //图片切换效果
  imgshow:function(num,numlist,imglist)
  {
   this.index=num;
   var pralpha=100;
   var inalpha=0;
   for(var i=0;i<numlist.length;i++)
   {
    numlist[i].className="";
   }
   numlist[this.index].className="current";
   clearInterval(this.timer);
                        for(var j=0;j<this.imglist.length;j++)
          {
           this.alpha(j,0);
          }
   this.alpha(this.prov,100);
   this.alpha(this.index,0);
   var $this=this;
   //利用透明度来实现切换图片
   this.timer=setInterval(function(){
    inalpha+=2;
    pralpha-=2;
    if(inalpha>100){inalpha=100};//不能大于100
    if(pralpha<0){pralpha=100};
    //为兼容性赋样式
    $this.alpha($this.prov,pralpha);
    $this.alpha($this.index,inalpha);
    if(inalpha==100&&pralpha==0){clearInterval($this.timer)};//当等�?00的时候就切换完成�?
   },20)//经测�?0是我认为最合适的�?
  },
  //设置透明�?
  alpha:function(i,opacity){
   this.imglist[i].style.opacity=opacity/100;
   this.imglist[i].style.filter="alpha(opacity="+opacity+")";
  },
  //自动播放
  autoplay:function(){
   var $this=this;
   this.play=setInterval(function(){
    $this.prov=$this.index;
    $this.index++;
    if($this.index>$this.imglist.length-1){$this.index=0};
    $this.imgshow($this.index,$this.numlist,$this.imglist);
    },2000)
  },
  //处理鼠标事件
  mouseoverout:function(box,numlist)
  {
   var $this=this;
   box.onmouseover=function()
   {
    clearInterval($this.play);
   }
   box.onmouseout=function()
   {
    $this.autoplay($this.index);
   }
   for(var i=0;i<numlist.length;i++)
   {
    numlist[i].index=i;
    numlist[i].onmouseover=function(){
     $this.prov=$this.index;
     $this.imgshow(this.index,$this.numlist,$this.imglist);
    }
   }
  }
 }
 window.onload=function(){
  var runimg=new runImg();
  runimg.count=6;
  runimg.imgurl=[
  "<img src=\"img/Dali.jpg\"/>",
  "<img src=\"img/Hainan.jpg\"/>",
  "<img src=\"img/jzg.jpg\"/>",
  "<img src=\"img/Zhangjj.jpg\"/>",
  "<img src=\"img/xianggelll.jpg\"/>",
  "<img src=\"img/xizang.jpg\"/>"];
  runimg.info("#box");
  runimg.action("#box");
 }
-->
</script>

<div id="box"></div>
<!--
	<div class="content">
		<div class="middle">
			<ul class="nav">
				<li class = "list">
					<a class = "photo" href = "http://baike.baidu.com/view/19051.htm">
						<img  src="img/张家�?.jpg" />
					</a>
					<div class = "text">
						<p>张家�?/p>
					</div>				
				</li>
				<li class = "list">
					<a class = "photo" href = "http://lvyou.baidu.com/hainan/">
						<img  src="img/海南.jpg" />
					</a>
					<div class = "text">
						<p>海南�?/p>
					</div>				
				</li>
				<li class = "list">
					<a class = "photo" href = "http://baike.baidu.com/view/772876.htm?from_id=5785&type=syn&fromtitle=%E9%A6%99%E6%A0%BC%E9%87%8C%E6%8B%89&fr=aladdin">
						<img  src="img/香格里拉2.jpg" />
					</a>
					<div class = "text">
						<p>香格里拉</p>
					</div>				
				</li>
				<li class = "list">
					<a class = "photo" href = "http://baike.baidu.com/view/161491.htm?fromtitle=%E5%A4%A7%E7%90%86&fromid=32237&type=syn">
						<img  src="img/大理.jpg" />
					</a>
					<div class = "text">
						<p>大理</p>
					</div>
				</li>
				<li class = "list">
					<a class = "photo" href = "http://baike.baidu.com/subview/2162/12026629.htm">
						<img  src="img/丽江.jpg" />
					</a>
					<div class = "text">
						<p>丽江</p>
					</div>
				</li>
				<li class = "list">
					<a class = "photo" href = "http://baike.baidu.com/view/481819.htm?fromtitle=%E4%B9%9D%E5%AF%A8%E6%B2%9F&fromid=122560&type=syn">
						<img  src="img/九寨�?jpg" />
					</a>
					<div class = "text">
						<p>九寨�?/p>
					</div>
				</li>
			</ul>
		</div>
	</div>-->
	<div class="foot">
		<div class= "foot2">
			<small>&copy真选组</small><br />
			<small>Connect us:18646083517</small>	
		</div>
	</div>
	
	
</body>
</html>
