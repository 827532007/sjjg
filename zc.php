<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$username=$_POST["username"];
$password=$_POST["password"];
$conn=mysql_connect("localhost","root","123456");
mysql_query("set name 'gb2312'");
mysql_select_db("login",$conn);
/*
获取到用户名，查找数据库，查看是否有用户名，如果有用户名输出用户名，如果没有则执行下面语句
  */
$result=mysql_query("select * from dl where username='$username'",$conn);
$row=mysql_fetch_assoc($result); 
if($username==$row["username"]){
    echo "用户名以存在";
}else{
    mysql_query("insert into dl(username,password)value('$username','$password')");
    echo "注册成功"; 
}

?>

