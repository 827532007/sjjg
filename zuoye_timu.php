
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once 'lib/DB.php';

$chapter = $_POST['chapter'];
$section = $_POST['section'];

$db = new MysqlDB();
$sql = "select `id`, zhang, jie from zhangjie WHERE zhang='$chapter' and jie='$section'";
$row = $db->query($sql);

$zhangId = $row[0][0];
$sql = "select `id`, timu, a, b, c, d, type from dati where zhangjie =$zhangId";
$row = $db->query($sql);
//echo var_export($row, true);
//echo "</br>";
//echo count($row);
//echo "<br>";

$questions = Array();                                                      //获取题目
$i = 0;
foreach($row as $key=>$val) {
    $q = Array();
    $q['id'] = $row[$i][0];
    $q['title'] = $row[$i][1];
    $q['a'] = $row[$i][2];
    $q['b'] = $row[$i][3];
    $q['c'] = $row[$i][4];
    $q['d'] = $row[$i][5];
    $q['type'] = $row[$i][6];
    array_push( $questions, $q);
    $i++;
}
// echo json_encode($questions);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据结构网</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/ys.css" rel="stylesheet" type="text/css" />

<!-------------------------------------------文字滚动---------------------------------------------->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.list_lh li:even').addClass('lieven');
})
$(function(){
	$("div.list_lh").myScroll({
		speed:40, //数值越大，速度越慢
		rowHeight:68 //li的高度
	});
});
</script>


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
    
</ul>


</div>
</div>




    <body>
        
        <div id="quesList">
            <form action="question_submit.php" method="POST">
            <input type="hidden" name="quesIdList" v-bind:value="quesIdList">
            <input type="hidden" name="chp_id" v-bind:value="chpId">
            <div v-for="q in qlist">
                <p></p>
                <div>${q.title}</div>
                <div class="options" v-if="q.type=='select'">
                    <input type="radio" v-bind:name="'q_'+q.id" value="a">${q.a} <br>
                    <input type="radio" v-bind:name="'q_'+q.id" value="b">${q.b} <br>
                    <input type="radio" v-bind:name="'q_'+q.id" value="c">${q.c} <br>
                    <input type="radio" v-bind:name="'q_'+q.id" value="d">${q.d} <br>
                </div>
                <div class="text" v-if="q.type=='text'">
                    <input name="answer" type="text">
                </div>
            </div>
            <button id="submit" type="submit">提交</button>
            </form>
        </div>
    </body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/vue.min.js"></script>
<script type="text/javascript">
    var questionsStr = '<?php echo json_encode($questions);?>';
    var questions = JSON.parse(questionsStr); //JSON.stringify()
    var chapterId = '<?php echo $zhangId;?>';
    
    for(var q in questions) {
        var ques = questions[q];
        console.log('title:' + ques['title']);
    }

    $(function(){
        var app = new Vue({
            delimiters: ['${', '}'],
            el: '#quesList',
            data: {
              qlist: questions,
              chpId: chapterId,
              quesIdList: []
            }
        });
        
        var quesIdList = new Array();
        for(que in questions) {
            if(questions.hasOwnProperty(que)) {
                console.log('_______ques id:' + questions[que]['id']);
                quesIdList.push('q_' + questions[que]['id']);
            }
        }
        
        app.quesIdList = JSON.stringify(quesIdList);
    });
</script>
<div class="clear"></div>


<div style="height:30px;"></div>
<div id="footer">
    <div class="footer">
        <p class="slogn" style=" text-align:center"><img src="images/ge.jpg" width="270" height="40" /></a></p>
    
  </div>
</div>




</body>
</html>

