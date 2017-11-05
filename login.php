<?php 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$conn=mysql_connect("localhost","root","123456");
mysql_query("set name 'utf-8'");
mysql_select_db("login",$conn);
$result=mysql_query("select * from dl where username='$username'",$conn);

$row=mysql_fetch_assoc($result);    //解析

if($username==$row['username']&&$password==$row['password']){
    echo '登陆成功';
   $_SESSION['userid'] = $row['id'];
   $_SESSION['username'] = $row['username'];
   $_SESSION['role'] = $row['role'];
   echo '<br> userid:'.$_SESSION['userid'];
   
   if($row['role'] == 'student'){
       header("Location:zuoye.php") ;
   }
   else if($row['role'] == 'teacher') {
        header("Location:zuoye1.php") ;
   }
   
}else{
    echo '账号密码不正确';
}

?>

