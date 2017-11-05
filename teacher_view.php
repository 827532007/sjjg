<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once 'lib/DB.php';

$submit_id = (int)$_GET['submitid'];
$db = new MysqlDB();

$sql = <<<EOT
SELECT sub.`id`, sub.user_id, ans.question_id, ans.daan, que.timu, que.a, que.b, que.c, que.d, que.type 
FROM `submit` sub left join daan ans 
ON 
sub.`id` = ans.submit_id 
left  join dati que 
ON 
que.id = ans.question_id 
where sub.`id`=$submit_id
EOT;

$queAnsResults = $db->query($sql);
//echo var_export($queAnsResults, true);
//echo '<br>';

$queAnsList = [];
foreach($queAnsResults as $qa) {
    $elem = [];
    $elem['title'] = $qa[4];
    $elem['a'] = $qa[5];
    $elem['b'] = $qa[6];
    $elem['c'] = $qa[7];
    $elem['d'] = $qa[8];
    $elem['answer'] = $qa[3];
    $elem['type'] = $qa[9];
    $elem['que_id'] = $qa[2];
    array_push($queAnsList, $elem);
}

$queAnsListStr = json_encode($queAnsList);
?>

<html>
    <head>
        <title>审核列表</title>
    </head>
    <body>
        <div id="queAnsList">
            <div v-for="q in qlist">
                <div>${q.title}</div>
                <div class="options" v-if="q.type=='select'">
                    <input type="radio" v-bind:name="'q_'+q.que_id" value="a" v-bind:checked="q.checked_a">${q.a}<br>
                    <input type="radio" v-bind:name="'q_'+q.que_id" value="b" v-bind:checked="q.checked_b">${q.b}<br>
                    <input type="radio" v-bind:name="'q_'+q.que_id" value="c" v-bind:checked="q.checked_c">${q.c} <br>
                    <input type="radio" v-bind:name="'q_'+q.que_id" value="d" v-bind:checked="q.checked_d">${q.d} <br>
                </div>
                <div class="text" v-if="q.type=='text'">
                    <input name="answer" type="text">
                </div>
            </div>
        </div>
        <form id="commentsForm" action="teacher_submit.php" method="POST">
            <input type="hidden" name="submitid" value="<?php echo $submit_id;?>">
            <textarea id="comments" name="comments">
            </textarea>
            <input type="submit" value="提交">
        </form>
        <p></p>
    </body>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/vue.min.js"></script>
    <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
    var queAnsListStr = '<?php echo $queAnsListStr;?>';
    var queAnsList = JSON.parse(queAnsListStr);
    
    $(function(){
        
        for(q in queAnsList) {
            var que = queAnsList[q]
            que['checked_a'] = '';
            que['checked_b'] = '';
            que['checked_c'] = '';
            que['checked_d'] = '';
//            if(que.answer == 'a'){
//                que['checked_a'] = 'checked';
//            }
            switch(que.answer)
            {
                case 'a':
                    que['checked_a'] = 'checked';
                break;
                case 'b':
                    que['checked_b'] = 'checked';
                break;
                case 'c':
                    que['checked_c'] = 'checked';
                break;
                case 'd':
                    que['checked_d'] = 'checked';
                break;
            }
        }
        
        for(q in queAnsList) {
            console.log(q + " " + queAnsList[q]['checked_a']);
        }
        
        var app = new Vue({
            delimiters: ['${', '}'],
            el: '#queAnsList',
            data: {
              qlist: queAnsList
            }
        });
        
        CKEDITOR.replace( 'comments' );
    });
    </script>
</html>