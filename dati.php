<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$tm1=$_POST["daan1"];
$tm2=$_POST["daan2"];

$conn=mysql_connect("localhost","root","123456");
mysql_query("set name 'gb2312'");
mysql_select_db("ti",$conn);
for($i=1;$i<=10;$i++){
    
    $result=mysql_query("select * from ti where tihao='$i'",$conn);
    $row=mysql_fetch_assoc($result);
    if($i==1){
        if($tm1==$row['daan']){
            echo '题目'.$i.'回答正确<br/>';   
        }else{
            echo '题目'.$i.'回答错误<br/>';
        }
    }
    if($i==2){
        if($tm2==$row['daan']){
            echo '题目'.$i.'回答正确<br/>';   
        }else{
            echo '题目'.$i.'回答错误<br/>';
        }
    }
    if($i==3){
        if($tm3==$row['daan']){
            echo '题目'.$i.'回答正确<br/>';   
        }else{
            echo '题目'.$i.'回答错误<br/>';
        }
    }
    
    
    
    

}
  


?>