<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
    session_start();
    require_once 'lib/DB.php';
    $db = new MysqlDB();
    $sql = 'select zhang from zhangjie group by zhang';
    $chapters = $db->query($sql);
    $sql = 'select jie from zhangjie group by jie';
    $sections = $db->query($sql);
    echo var_export($chapters, true);
    echo "<br>";
    echo var_export($sections);
    echo '<br> userid:'.$_SESSION['userid'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>《数据结构》在线学习网</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/ys.css" rel="stylesheet" type="text/css" />
<link href="css/st.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />

        
</head>

<body>


<div class="head">

<div class=" block" style="padding-top:30px;">
<div class="fr">


</div>


<div class="fl tiitl" style=" color:#FFF; font-size:40px; margin-right:10px; margin-top:5px;">《数据结构》在线课程学习网</div>



<ul class="nav nav-pills">
  <li class="active">
    <a href="index.html">首页</a>
  </li>
 
  <li><a href="sheitnr.html" style="color:#FFF">教学课件</a></li>
  <li><a href="baoming.html" style="color:#FFF">作业</a></li>
  <li><a href="neirong.html" style="color:#FFF">论坛</a></li>
  <li><a href="zuc.html" style="color:#FFF">注册</a></li>
  <li><a href="dl.html" style="color:#FFF">登录</a></li>
</ul>


</div>
</div>

<div class="block1" style="margin-top:20px;">
    <form action="zuoye_timu.php" method="post" >
    <p>章：<select name="chapter">
            <?php 
            foreach ($chapters as $key=>$val){
                echo '<option value="'.$val[0].'">'. $val[0].'</option>';
            }
            ?>
        </select></p><br/>
    <p>小节：<select name="section">
            <?php 
            foreach ($sections as $key=>$val){
                echo '<option value="'.$val[0].'">'. $val[0].'</option>';
            }
            ?>
        </select></p><br/>
            <button id="submit" type="submit">提交</button>
        </form>
<ul >
  
  <li><a href="sheitnr.html" >第一章第一节 作业</a></li>
  <li><a href="baoming.html" >第一章第二节 作业</a></li>
  
    
</ul>




</div>

<!--------------------主体结束------------------------------------------------>

<div style="height:30px;"></div>
<div id="footer">
    <div class="footer">
        <p class="slogn" style=" text-align:center"><img src="images/ge.jpg" width="270" height="40" /></a></p>
    
  </div>
</div>
</body>
</html>
