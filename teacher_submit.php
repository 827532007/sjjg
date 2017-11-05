<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$submitId = $_POST['submitid'];
$comments = $_POST['comments'];
echo $submitId;
echo '<br>';
echo $comments;

$created_at = $comments;
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
$db->query($sql);}
    
   