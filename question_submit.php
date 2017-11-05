<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once 'lib/DB.php';

$userid = $_SESSION['userid'];
$quesIdListStr = $_POST["quesIdList"];
$quesIdList = json_decode($quesIdListStr);
$chp_id = $_POST['chp_id'];

$answer = [];
foreach($quesIdList as $ques) {
    $answer[$ques] = $_POST[$ques];
}
echo var_export($answer, true);

// 生成提交记录
$created_at = date('Y-m-d H:i:s');
$sql = "insert into submit(chp_id, user_id, created_at) value('$chp_id', $userid, '$created_at') ";
echo '<br>'.$sql;

$db = new MysqlDB();
$db->query($sql);
$submitId = $db->getId();
echo '<br>'.'submit id:'.$submitId;

foreach($answer as $key=>$val) {
    $quesName = split('_', $key);
    $quesId = $quesName[1];
    $sql = "insert into daan (question_id, daan, submit_id) value($quesId, '$val', $submitId)";
    echo '<br>'.$sql;
    $db->query($sql);
}
        
/*
$db = new MysqlDB();
$sql = "select `id`, zhang, jie from zhangjie WHERE zhang='$chapter' and jie='$section'";
$row = $db->query($sql);

$zhangId = $row[0][0];
$sql = "select `id`, , type from  where zhangjie =$zhangId";
$row = $db->query($sql);
*/
